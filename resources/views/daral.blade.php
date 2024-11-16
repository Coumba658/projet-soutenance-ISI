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
        <div class='buttons'>
          @if (Route::has('login'))
          @auth
          <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Profil</a>
          @else
          <a href="{{ route('login') }}" class='btn btn-outline-success rounded-pill'>
            <i class='fa fa-user me-1'></i>
            Login
          </a>
          @if (Route::has('register'))
          <a href="{{ route('register') }}" class='btn btn-outline-success rounded-pill ms-2'>
            <i class='fa fa-user-plus me-1'></i>
            Inscription
          </a>
          @endif
          @endauth

          @endif
          <a href="{{route('cart.index')}}" class='btn btn-outline-success rounded-pill ms-2'>
            <i class='fa fa-shopping-cart me-1'></i>{{ Cart::count() }}
          </a>
        </div>
      </div>
    </div>
  </nav>

  <div class="mt-5 py-5">
    <div class="table-responsive d-flex py-4 ms-5">
      <button type="button" class="btn btn-outline-success rounded-pill button-cat shadow-sm"><a href="{{route('tout-produit')}}" class="text-success button-cat" style="text-decoration: none;">Tous les Produits</a></button>

      @foreach($categorie as $cate)
      <div class="mx-2">
        <button type="button" class="btn btn-outline-success rounded-pill button-cat shadow-sm"><a href="{{route('voir-categorie',['id'=>$cate->id])}}" class="text-success button-cat" style="text-decoration: none;">{{$cate->libelle}}</a></button>
      </div>
      @endforeach
    </div>
  </div>
  @if (session('success'))
  <div class="alert alert-success col-md-6 offset-3 text-center">
    {{ session('success')}}
  </div>
  @endif
  <div class="container d-flex justify-content-center">
    <div class="row g-0">
      @foreach($produit as $produit)
      <div class="mt-3 ms-4" style="width: 14rem;">
        <img src="{{ url('public/Image/'.$produit->image) }}" alt="" class="card-img-top" height="150">
        <div class="card-body">
          <h5 class="card-title">{{$produit->libelle}}</h5>
          <h3 class="card-prix text-success">{{$produit->prix}} FCFA</h3>
          <p class="card-text">{{$produit->description}}</p>
          <!--<a href="{{route('voir-produit',['id'=>$produit->id])}}" class="btn btn-success">Détails produit</a>-->
          <a href="#" class="btn btn-success"
            data-bs-toggle="modal"
            data-bs-target="#productModal"
            data-product-id="{{$produit->id}}"
            data-product-title="{{$produit->libelle}}"
            data-product-price="{{$produit->prix}} FCFA"
            data-product-description="{{$produit->description}}"
            data-product-image="{{ url('public/Image/'.$produit->image) }}">
            Détails produit
          </a>
        </div>
      </div>
      @endforeach
    </div>
  </div>
  <x-monfooter>
  </x-monfooter>
  <x-monbody>

  </x-monbody>

  <!-- Modal -->
  <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="productModalLabel">Détails du produit</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <img id="modalProductImage" src="" alt="Product Image" class="img-fluid mb-3">
          <h5 id="modalProductTitle" class="card-title"></h5>
          <h3 id="modalProductPrice" class="text-success"></h3>
          <p id="modalProductDescription"></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          <form action="{{ route('cart.store') }}" method="POST">
            @csrf
            <input type="hidden" id="modalProductId" name="produit_id" value="">
            <button type="submit" class="btn btn-success">Ajouter au panier</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    var productModal = document.getElementById('productModal');
    productModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget; // Le bouton qui a ouvert le modal
        
        // Obtenir les données du produit
        var productId = button.getAttribute('data-product-id');
        var productTitle = button.getAttribute('data-product-title');
        var productPrice = button.getAttribute('data-product-price');
        var productDescription = button.getAttribute('data-product-description');
        var productImage = button.getAttribute('data-product-image');

        // Mettre à jour les contenus du modal
        productModal.querySelector('#modalProductId').value = productId;
        productModal.querySelector('#modalProductImage').src = productImage;
        productModal.querySelector('#modalProductTitle').textContent = productTitle;
        productModal.querySelector('#modalProductPrice').textContent = productPrice;
        productModal.querySelector('#modalProductDescription').textContent = productDescription;
    });
</script>

</body>

</html>