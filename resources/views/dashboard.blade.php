 <!DOCTYPE html>
 <html lang="en">

 <x-monheader>
 </x-monheader>
 @vite(['resources/css/dashboard.css'])

 <body>
   <nav class="navbar navbar-expand-lg bg-white py-3 shadow-sm fixed-top">
     <div class="container-fluid">
       <div>
         <a href='/'><img src="/images/agrimarket-logo.png" alt="logo" width="200" height="40"></img></a>
       </div>
       <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
       </button>
       <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
           <li class="nav-item">
             <a class="nav-link active" aria-current="page" href="/">Accueil</a>
           </li>
           <li class="nav-item">
             <a class="nav-link ms-4" href="/ferme">A Propos</a>
           </li>
           <li class="nav-item">
             <a class="nav-link ms-4" href="/e-daral">Le Marché</a>
           </li>
           <li class="nav-item">
             <a class="nav-link ms-4" href="/contact">Contact</a>
           </li>
         </ul>
         <div>
           <a href="{{route('cart.index')}}" class='btn btn-outline-success rounded-pill ms-2'>
             <i class='fa fa-shopping-cart me-1'></i>{{ Cart::count() }}
           </a>
         </div>&nbsp;&nbsp;&nbsp;
         <div class='buttons'>
           @guest
           @if (Route::has('login'))
           <li class="nav-item">
             <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
           </li>
           @endif

           @if (Route::has('register'))
           <li class="nav-item">
             <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
           </li>
           @endif
           @else
           <div class="nav-item dropdown">
             <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
               {{ Auth::user()->prenom }}
             </a>

             <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
               <a class="dropdown-item" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                 {{ __('Se Deconnecter') }}
               </a>

               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                 @csrf
               </form>
             </div>
           </div>
           @endguest
         </div>
       </div>
     </div>
   </nav>

   <div class="page-content page-container" id="page-content">
     <div class="padding">
       <div class="row">
         <div class="col-sm-6">

         @if (auth()->user()->role_id === 2)
           <div class="list list-row block" style="text-align: end;">
             @foreach (Cart::content() as $item)
             <div class="list-item left" data-id="19">
               <img src="{{ url('public/Image/'.$item->model->image) }}" alt="" width="70" class="img-fluid rounded shadow-sm">
               <div class="flex left">
                 <a href="#" class="item-author text-color" data-abc="true">{{$item->model->libelle}}</a>
               </div>
               <div class="no-wrap right">
                 <div class="item-date text-muted text-sm d-none d-md-block">{{$item->subtotal()}} CFA</div>
               </div>
             </div>
             @endforeach

             <div class="list-item mt-4" data-id="7">
               <div class="flex left">
                 <a href="#" class="item-author text-color" data-abc="true">Total: {{ Cart::subtotal() }}FCFA</a>
               </div>
               <div class="no-wrap right">
                 <a href="{{ route('paiement.index') }}">
                   <button class="btn btn-success ms-5">Passer la commande <i class="fa fa-check text-white" aria-hidden="true"></i></button>
                 </a>
               </div>
             </div>
           </div>
           @else
           <h2>Gestion des Commandes</h2>
           @endif
         </div>
       </div>
     </div>
   </div>
   <div class="mt-5 py-5 ms-5">

   </div>

   <x-monfooter>
   </x-monfooter>
   <x-monbody>
   </x-monbody>
 </body>

 </html>