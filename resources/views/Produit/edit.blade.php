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
            <a href="{{ url('/dashboard') }}" class="dropdown-item text-sm text-gray-700 dark:text-gray-500 underline" style="color: initial;">Dashboard</a>
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

  <div class="container bg-white py-5">
    <div class="row py-4">
      <div class="col-md-6">
      <button class='btn btn-dark rounded-pill mt-4 ms-5'><a href="{{url('/produits')}}" class="text-white">Retour</a></button>
      <br>  
      <img src="/images/undraw_Online_re_x00h.png" width="505" height="450"></img>
      </div>
      <div class="col-md-6">
        <p class="text-success text-center fs-4 mt-4">Modification</p>
        <form method="POST" class="bg-white shadow rounded pb-3 pt-3" action="{{url('updateProduit/'.$produit->id)}}" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <input type="hidden" name="id" value="{{$produit->id}}">
          <div class="form-group" style="width: 75%; margin-left: 12%;">
            <label for="username">Nom produit</label>
            <input type="text" class="form-control" aria-describedby="libelle" name="libelle" value="{{ $produit->libelle }}">
          </div>
          <div class="form-group" style="width: 75%; margin-left: 12%;">
            <label for="fileupload">Image</label>
            <input class="form-control" input type="file" class="form-control-file ms-auto" aria-describedby="fileupload" name="image" value="{{$produit->image }}">
            <img src="{{ url('public/Image/'.$produit->image) }}" alt="" height="50px">
          </div>
          <div class="form-group" style="width: 75%; margin-left: 12%;">
            <label for="username">Prix</label>
            <input type="number" class="form-control" aria-describedby="prix" name="prix" value="{{ $produit->prix }}">
          </div>
          <div class="form-group" style="width: 75%; margin-left: 12%;">
            <label for="textarea">Description</label>
            <textarea class="form-control" rows="5" name="description">{{ $produit->description}}</textarea>
          </div>
          <div class="form-group" style="width: 75%; margin-left: 12%;">
            <label for="username">Date Ajout</label>
            <input type="date" class="form-control" aria-describedby="date_ajout" name="date_ajout" value="{{$produit->date_ajout}}">
          </div>
          <div class="form-group" style="width: 75%; margin-left: 12%;">
            <label for="eleveur">Categorie</label>
            <select class="form-select" aria-label="Default select example" name="categorie">
              @foreach($categorie as $cat)
              <option value="{{$cat->id}}"> {{$cat->libelle}} </option>
              @endforeach
            </select>
          </div>

          <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary" value="Update">Modifier</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <x-monfooter>
  </x-monfooter>
  <x-monbody>

  </x-monbody>
</body>

</html>