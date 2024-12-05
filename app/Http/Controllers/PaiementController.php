<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class PaiementController extends Controller
{
    public function index()
    {
        return view('paiement.index');
    }

    public function Payment(Request $request)
    {
        Log::info('Paiement initier', ['request' => $request->all()]);
        $ref_commande = 'CMD-' . date("YmdHis");
        $customfield = json_encode([
            'customer_name' => $request->input('customer_name', ''),
            'customer_email' => $request->input('customer_email', ''),
            'customer_phone' => $request->input('customer_phone', '')
        ]);

        $postFields = array(
            "item_name" => "Paiement",
            "item_price" => $request->input('amount'),
            "currency" => "xof",
            "ref_command" => $ref_commande,
            "command_name" => "Paiement en ligne",
            "env" => "test", // ou "prod" pour la production
            "success_url" => "http://localhost:8000/dashboard", // reddiriger vers la page de visualisation de la facture
            "ipn_url" => "https://paytech.sn/api/payment/notify", //route('notify_url'),
            "cancel_url" => "http://localhost:8000/panier"//route('panier'), // reddiriger vers la page du panier
        //     "custom_field" => $customfield
        );

        $response = $this->post('https://paytech.sn/api/payment/request-payment', $postFields, [
            "API_KEY: " . env('APIKEY'),
            "API_SECRET: " . env('APISECRET')
        ]);

        $response_data = json_decode($response, true);

        if (isset($response_data['success']) && $response_data['success'] === 1) {
            Log::info('Paiement effectuer', ['response' => $response_data]);
            return redirect($response_data['redirect_url']);
        } else {
            Log::info('Paiement echoué', ['response' => $response_data]);
            return back()->with('error', 'Une erreur est survenue lors de l\'initialisation du paiement.');
        }
    }

    private function post($url, $data = [], $header = [])
    {
        $strPostField = http_build_query($data);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $strPostField);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array_merge($header, [
            'Content-Type: application/x-www-form-urlencoded;charset=utf-8',
            'Content-Length: ' . mb_strlen($strPostField)
        ]));

        $response = curl_exec($ch);
        curl_close($ch);
        
        return $response;
    }

    //configuration de l'api la notification
    public function notify_url(Request $request)
    {
        /* 1- Recuperation des paramètres postés sur l'url par CinetPay
         * https://docs.cinetpay.com/api/1.0-fr/checkout/notification#les-etapes-pour-configurer-lurl-de-notification
         * */
        if (isset($request->cpm_trans_id)) {
            // A l'aide de l'identifiant de votre transaction, vérifier que la commande n'a pas encore été traité
            $VerifyStatusCmd = "1"; // valeur du statut à récupérer dans votre base de donnée
            if ($VerifyStatusCmd == '00') {
                // La commande a été déjà traité
                // Arret du script
                die();
            }

            /* 2- Dans le cas contrait, on vérifie l'état de la transaction en cas de tentative de paiement sur CinetPay
            * https://docs.cinetpay.com/api/1.0-fr/checkout/notification#2-verifier-letat-de-la-transaction */
            $cinetpay_check = [
                "apikey" => env("APIKEY"),
                "site_id" => $request->cpm_site_id,
                "transaction_id" => $request->cpm_trans_id
            ];

            $response = $this->getPayStatus($cinetpay_check); // appel fonction de requête pour récupérer le statut

            //On recupère la réponse de CinetPay
            $response_body = json_decode($response, true);
            if ($response_body['code'] == '00') {
                /* correct, on délivre le service
                 * https://docs.cinetpay.com/api/1.0-fr/checkout/notification#3-delivrer-un-service*/
                echo 'Felicitation, votre paiement a été effectué avec succès';
            } else {
                // transaction a échoué
                echo 'Echec, code:' . $response_body['code'] . ' Description' . $response_body['description'] . ' Message: ' . $response_body['message'];
            }
            // Mettez à jour la transaction dans votre base de donnée
            /*  $commande->update(); */
        } else {
            print("cpm_trans_id non fourni");
        }
    }

    //configuration de l'api de retour
    public function return_url(Request $request)
    {
        /* 1- recuperation des données postées par CinetPay
         * https://docs.cinetpay.com/api/1.0-fr/checkout/retour#les-etapes-pour-configurer-lurl-de-retour */
        if (isset($request->transaction_id) || isset($request->token)) {
            /* 2- on vérifie l'état de la transaction sur CinetPay ou dans notre base de donnée
            * https://docs.cinetpay.com/api/1.0-fr/checkout/notification#2-verifier-letat-de-la-transaction */
            $cinetpay_check = [
                "apikey" => env("APIKEY"),
                "site_id" => env("SITE_ID"),
                "transaction_id" => $request->transaction_id
            ];
            // appel fonction de requête pour récupérer le statut chez CinetPay
            $response = $this->getPayStatus($cinetpay_check);
            //On recupère la réponse de CinetPay
            $response_body = json_decode($response, true);
            if ($response_body['code'] == '00') {
                /* correct, on redirige le client vers la page souhaité */
                return back()->with('info', 'Felicitation, votre paiement a été effectué avec succès');
            } else {
                /* correct, on redirige le client vers la page souhaité */
                return back()->with('info', 'Echec, votre paiement a échoué');
            }
        } else {
            print("transaction non fourni");
        }
    }

    public function getPayStatus($data)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api-checkout.cinetpay.com/v2/payment/check',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 45,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_HTTPHEADER => array(
                "content-type:application/json"
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err)
            print($err);
        else
            return ($response);
    }
}
