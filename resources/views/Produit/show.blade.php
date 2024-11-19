<!DOCTYPE html>
<html lang="en">
<x-monheader>
  <link rel="stylesheet" media="screen and (max-width: 1280px)" href="card-produit.css" />
</x-monheader>

<style>
  body {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.8rem;
  }

  .card {
    max-width: 1000px;
    width: 100%;
    padding: 4rem;
    background-color: #072612;
    color: white;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)
  }

  @media(max-width:768px) {
    .card {
      width: 100%;
      padding: 1.5rem
    }
  }

  .row {
    margin: 0
  }

  .path {
    color: grey;
    margin-bottom: 1rem
  }

  .path a {
    color: #ffffff
  }

  .info {
    padding: 6vh 0vh
  }

  @media(max-width:768px) {
    .info {
      padding: 0
    }
  }

  .checked {
    color: rgb(255, 217, 0);
    margin-right: 1vh
  }

  .fa-star-half-full {
    color: rgb(255, 217, 0)
  }

  .imgProduit {
    height: fit-content;
    width: 75%;
    padding: 1rem
  }

  @media(max-width:768px) {
    img {
      padding: 2.5rem 0
    }
  }

  .title .col {
    padding: 0
  }

  #reviews {
    margin-left: 3vh;
    color: grey
  }

  .price {
    margin-top: 2rem
  }

  label.radio span {
    padding: 1vh 4vh;
    background-color: rgb(54, 54, 54);
    color: grey;
    display: inline-block;
    margin-right: 2vh
  }

  label.radio input:checked+span {
    border: 1px solid white;
    padding: 1vh 4vh;
    background-color: rgb(54, 54, 54);
    margin-right: 2vh;
    color: #ffffff;
    display: inline-block
  }

  .carousel-control-prev {
    width: unset
  }

  .carousel-control-next {
    left: 8vh;
    right: unset;
    width: unset
  }

  .lower {
    margin-top: 3rem
  }

  .lower i {
    padding: 2.5vh;
    margin-right: 1vh;
    color: grey;
    border: 1px solid rgb(85, 85, 85)
  }

  .lower .col {
    padding: 0
  }

  @media(max-width:768px) {
    .lower i {
      padding: 2vh;
      margin-right: 1vh;
      color: grey;
      border: 1px solid rgb(85, 85, 85)
    }
  }

  .btnPanier {
    background-color: transparent;
    border-color: rgba(186, 216, 125, 0.863);
    color: rgba(186, 216, 125, 0.863);
    padding: 1.8vh 4.5vh;
    height: fit-content;
    border-radius: 3px
  }

  .btn:focus {
    box-shadow: none;
    outline: none;
    box-shadow: none;
    color: white;
    -webkit-box-shadow: none;
    -webkit-user-select: none;
    transition: none
  }

  .btn:hover {
    color: white
  }

  @media(max-width:768px) {
    .btn {
      background-color: transparent;
      border-color: rgba(186, 216, 125, 0.863);
      color: rgba(186, 216, 125, 0.863);
      padding: 1vh;
      font-size: 0.9rem;
      height: fit-content;
      border-radius: 3px
    }
  }

  a {
    color: unset
  }

  a:hover {
    color: unset;
    text-decoration: none
  }

  label.radio input {
    position: absolute;
    top: 0;
    left: 0;
    visibility: hidden;
    pointer-events: none
  }
</style>

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
            <a class="nav-link ms-4" href="ferme">Contact</a>
          </li>
        </ul>
        <div>
          <a href="{{route('cart.index')}}" class='btn btn-outline-success rounded-pill ms-2'>
            <i class='fa fa-shopping-cart me-1'></i>{{ Cart::count() }}
          </a>
        </div>&nbsp;&nbsp;&nbsp;
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
            Register
          </a>
          @endif
          @endauth
          @endif
        </div>
      </div>
    </div>
  </nav>



  <div class="container d-flex justify-content-center align-items-center mt-5">
    <div class="card">
      <div class="row">
        <div class="col-md-6 text-center align-self-center">
          <img class="imgProduit img-fluid" src="{{ url('public/Image/'.$produits->image) }}">
        </div>
        <div class="col-md-6 info">
          <div class="row title">
            <div class="col">
              <h2>{{$produits->libelle}}</h2>
            </div>
          </div>
          <p>{{$produits->description}}</p>
          <h6 class="">{{$produits->date_ajout}}</h6><br>
          <div class="row price">
            <label class="radio"> <input type="radio" name="size1" value="small" checked>
              <span>
                <div class="row"><big><b>{{$produits->prix}} CFA</b></big></div>
              </span>
            </label>
            </label>
          </div>
        </div>
      </div>
      <div class="row lower">
        <div class="col"></div>
        <div class="col text-right align-self-center">
          <form action="{{ route('cart.store') }}" method="POST">
            @csrf
            <a class="" href="/e-daral" data-slide="prev"><i class="fa fa-arrow-left"></i></a>
            <input type="hidden" name="produit_id" value="{{ $produits->id }}">
            <button type="submit" class="btnPanier btn btn-success btn-sm">Ajouter au panier</button>
          </form>
        </div>
      </div>
    </div>
  </div>



  <x-monbody>
  </x-monbody>


</body>

</html>