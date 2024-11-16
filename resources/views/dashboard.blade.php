 <!DOCTYPE html>
 <html lang="en">

 <x-monheader>
 </x-monheader>

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
                 {{ __('Logout') }}
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
   <div class="mt-5 py-5 ms-5">
     <h2 class="mt-5 py-4">Montant: {{ Cart::subtotal() }}FCFA</h2>
     <a href="{{ route('paiement.index') }}">
       <button class="btn btn-success mt-4 ms-5">Payer la commande <i class="fa fa-check text-white" aria-hidden="true"></i></button>
     </a>
   </div>
   <x-monfooter>
   </x-monfooter>
   <x-monbody>
   </x-monbody>
 </body>

 </html>