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
      <div class='buttons'>
        <a href="{{route('cart.index')}}" class='btn btn-outline-success rounded-pill ms-2' style="font-size: initial;">
          <i class='fa fa-shopping-cart me-1'></i>{{ Cart::count() }}
        </a>
        @if (Route::has('login'))
        @auth
        @if (auth()->user()->role_id === 1)
        <button class='btn btn-success rounded-pill' style="position: relative; right: 250px;">
          <a href="{{url('/ajoutProduit')}}" class="text-white">Postez vos produits</a>
        </button>
        @endif
        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline" style="color: initial;">Dashboard</a>
        @else
        <a href="{{ route('login') }}" class='btn btn-outline-success rounded-pill ms-2'>
          <i class='fa fa-user me-1'></i>
          Connexion
        </a>
        @if (Route::has('register'))
        <a href="{{ route('register') }}" class='btn btn-outline-success rounded-pill ms-2'>
          <i class='fa fa-user-plus me-1'></i>
          Inscription
        </a>
        @endif
        @endauth
        @endif
      </div>
    </div>
  </div>
</nav>