<!DOCTYPE html>
<html lang="en">
<x-monheader>
</x-monheader>
<x-monnav>
</x-monnav>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" />
@vite(['resources/css/marche.css'])

<body>

  <div class="mt-5 py-5">
    <div class="table-responsive d-flex py-3 ms-5">
      <button type="button" class="btn btn-outline-success rounded-pill button-cat shadow-sm"><a href="{{route('tout-produit')}}" class="text-success button-cat" style="text-decoration: none;">Tous les Produits</a></button>

      @foreach($categorie as $cate)
      <div class="mx-2">
        <button type="button" class="btn btn-outline-success rounded-pill button-cat shadow-sm"><a href="{{route('voir-categorie',['id'=>$cate->id])}}" class="text-success button-cat" style="text-decoration: none;">{{$cate->libelle}}</a></button>
      </div>
      @endforeach
    </div>
  </div>

  @if (session('success'))
  <div id="alertBox" class="alert alert-success col-md-3 offset-5 text-center p-1" role="alert" style="background-color: inherit;">
    {{ session('success')}}
  </div>
  @endif


  <div class="row">
    @foreach($produit as $produit)
    <div class="col-lg-2 col-md-4 col-sm-6 mb-4"> <!-- Ajustement pour 6 colonnes sur grands écrans -->
      <div class="product-grid">
        <div class="product-image">
          <a href="{{ route('voir-produit', ['id' => $produit->id]) }}" class="image">
            <img class="img-1" src="{{ url('public/Image/'.$produit->image) }}" alt="Produit Image">
          </a>
        </div>
        <div class="product-content">
          <h5 class="card-title">{{ $produit->libelle }}</h5>
          <h3 class="card-prix text-success">{{ $produit->prix }} FCFA</h3>
          <form action="{{ route('cart.store') }}" method="POST">
            @csrf
            <input type="hidden" name="produit_id" value="{{ $produit->id }}">
            <button type="submit" class="btn btn-success btn-sm">
              <i class="fa fa-plus me-1"></i>Ajouter au panier
            </button>
          </form>
        </div>
      </div>
    </div>
    @endforeach
  </div>


  <script>
  // Faire disparaître l'alerte après 3 secondes
  setTimeout(function() {
    const alertBox = document.getElementById('alertBox');
    if (alertBox) {
      alertBox.classList.remove('show'); // Retirer la classe 'show' pour faire disparaître l'alerte
      alertBox.classList.add('fade'); // Appliquer l'animation de disparition
    }
  }, 2000); // 3000 ms = 3 secondes
</script>
  <x-monfooter>
  </x-monfooter>
  <x-monbody>
  </x-monbody>
</body>

</html>