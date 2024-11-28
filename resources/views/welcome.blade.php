<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <x-monheader>
  </x-monheader>
  <x-monnav>
  </x-monnav>

  <title>AgriMarket</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

  <!-- script -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  @vite(['resources/css/welcome.css'])

</head>

<body>
  <div class='row py-5 baniere'>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="/images/ban2.png" alt="First slide">
          <div class="carousel-caption d-none d-md-block mb-5 pb-5">
            <div class="text-center py-5 mb-5"> <!-- Padding ajouté pour élever le texte -->
              <h5 class="fs-1 fw-bold">AGRIMARKET</h5>
              <p class="fs-6 mb-5">Votre plateforme en ligne pour accéder facilement aux meilleurs produits agricoles locaux. Soutenez les agriculteurs tout en garantissant des récoltes fraîches et de qualité à votre table. Rejoignez-nous dans notre mission de rendre les produits de la ferme accessibles à tous, tout au long de l'année.</p>
            </div>
          </div>
        </div>
        <!-- <div class="carousel-item">
          <img class="d-block w-100" src="/images/ban3.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="/images/ban1.jpg" alt="Third slide">
        </div> -->
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">précédent</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">suivant</span>
      </a>
    </div>
  </div>
  <div class="row annonce">
    <h2 class="text-success ms-5 mb-5 fw-bold">Annonces</h2>
    <div class="d-flex justify-content-around">
      <div class="row row-cols-1 row-cols-md-5 g-3">
        <div class="col md-3">
          <div class="" style="width: 14rem;">
            <img src="/images/pomme.jpg" class="card-img-top" alt="..." height="140">
            <div class="card-body">
              <h5 class="card-title fw-bold">Pommes</h5>
              <h4 class="card-prix text-success">80.000 CFA</h4>
              <p class="card-text">
                <i class="fa fa-whatsapp me-3 text-success fw-bold" aria-hidden="true"></i>77 234 23 43
                <br>
                <i class="fa fa-clock-o me-3 text-success" aria-hidden="true"></i>27-08-2022
              </p>
            </div>
          </div>
        </div>
        <div class="col md-3">
          <div class="" style="width: 14rem;">
            <img src="/images/tomate.jpg" class="card-img-top" alt="" height="140">
            <div class="card-body">
              <h5 class="card-title fw-bold">Tomates</h5>
              <h4 class="card-prix text-success">20.000 CFA</h4>
              <p class="card-text">
                <i class="fa fa-whatsapp me-3 text-success fw-bold" aria-hidden="true"></i>77 453 65 76
                <br>
                <i class="fa fa-clock-o me-3 text-success" aria-hidden="true"></i>30-08-2022
              </p>
            </div>
          </div>
        </div>
        <div class="col md-3">
          <div class="" style="width: 14rem;">
            <img src="/images/limon.jpg" class="card-img-top" alt="..." height="140">
            <div class="card-body">
              <h5 class="card-title fw-bold">Citrons </h5>
              <h4 class="card-prix text-success">30.000 CFA</h4>
              <p class="card-text">
                <i class="fa fa-whatsapp me-3 text-success fw-bold" aria-hidden="true"></i>76 553 77 46
                <br>
                <i class="fa fa-clock-o me-3 text-success" aria-hidden="true"></i>18-08-2022
              </p>
            </div>
          </div>
        </div>
        <div class="col md-3">
          <div class="" style="width: 14rem;">
            <img src="/images/fraise.jpg" class="card-img-top" alt="..." height="140">
            <div class="card-body">
              <h5 class="card-title fw-bold">Fraises</h5>
              <h4 class="card-prix text-success">60.000 CFA</h4>
              <p class="card-text">
                <i class="fa fa-whatsapp me-3 text-success fw-bold" aria-hidden="true"></i>77 063 35 75
                <br>
                <i class="fa fa-clock-o me-3 text-success" aria-hidden="true"></i>16-08-2022
              </p>
            </div>
          </div>
        </div>
        <div class="col md-3">
          <div class="" style="width: 14rem;">
            <img src="/images/pomme.jpg" class="card-img-top" alt="..." height="140">
            <div class="card-body">
              <h5 class="card-title fw-bold">Pommes</h5>
              <h4 class="card-prix text-success">80.000 CFA</h4>
              <p class="card-text">
                <i class="fa fa-whatsapp me-3 text-success fw-bold" aria-hidden="true"></i>77 234 23 43
                <br>
                <i class="fa fa-clock-o me-3 text-success" aria-hidden="true"></i>27-08-2022
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="mt-3"></div>
  </div>
  <x-monfooter>
  </x-monfooter>
  <x-monbody>
  </x-monbody>
</body>

</html>