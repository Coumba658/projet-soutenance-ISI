<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\EleveurController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\CategorieController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::get('/produits',  [ProduitController::class, 'index'])->middleware(['auth'])->name('produits');
Route::get('/ajoutProduit',  [ProduitController::class, 'create'])->middleware(['auth'])->name('ajoutProduit');
Route::post('/ajoutProduit',  [ProduitController::class, 'store'])->middleware(['auth'])->name('ajoutProduit');
Route::get('/modifierProduit/{id}',  [ProduitController::class, 'edit'])->middleware(['auth']);
Route::put('/updateProduit/{id}',  [ProduitController::class, 'update'])->middleware(['auth']);
Route::delete('/deleteProduit/{id}', [ProduitController::class, 'delete']);


Route::get('/e-daral', [ProduitController::class, 'getProduit'])->name('tout-produit');
Route::get('/categorie/{id}', [ProduitController::class, 'getMouton'])->name("voir-categorie");
Route::get('/produit/{id}', [ProduitController::class, 'show'])->name("voir-produit");

// cart Route
Route::get('/panier', [CartController::class, 'index'])->name('cart.index');
Route::post('panier/ajouter', [CartController::class, 'store'])->name('cart.store');
Route::put('panier/{rowId}', [CartController::class, 'update'])->name('cart.update');
Route::delete('panier/{rowId}', [CartController::class, 'destroy'])->name('cart.destroy');

Route::get('viderPanier', function () {
    Cart::destroy();
});
Route::get('/ferme', function () {
    return view('ferme');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/admin', [UserController::class, 'index'])->middleware(['auth'])->name('admin');
Route::get('/supprimerUser/{id}', [UserController::class, 'delete']);

//Categorie Route
Route::get('/categorie',  [CategorieController::class, 'index'])->middleware(['auth'])->name('categories');
Route::get('/ajoutCategorie',  [CategorieController::class, 'create'])->middleware(['auth'])->name('ajoutCategorie');
Route::post('/ajoutCategorie',  [CategorieController::class, 'store'])->middleware(['auth'])->name('ajoutCategorie');
Route::get('/modifierCategorie/{id}',  [CategorieController::class, 'edit'])->middleware(['auth']);
Route::put('/updateCategorie/{id}',  [CategorieController::class, 'update'])->middleware(['auth']);
Route::delete('/deleteCategorie/{id}', [CategorieController::class, 'delete']);

//Paiement Route
Route::get('/paiement', [PaiementController::class, 'index'])->name('paiement.index');
Route::post('/paiement', [PaiementController::class, 'Payment'])->name('paiement.index');
Route::match(['get','post'],'/notify_url', [PaiementController::class, 'notify_url'])->name('notify_url');
Route::match(['get','post'],'/return_url', [PaiementController::class, 'return_url'])->name('return_url');

