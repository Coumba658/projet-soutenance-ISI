<!DOCTYPE html>
<html lang="en">
<x-monheader>
</x-monheader>
<x-monnav>
</x-monnav>

<title>A Propos</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
@vite(['resources/css/about.css'])

<body>

  <header>
    <div class="overlay"></div>

    <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
      <source src="/images/aboutHeader.mp4" type="video/mp4">
    </video>

    <div class="container h-100">
      <div class="d-flex h-100 text-center align-items-center">
        <div class="w-100 text-white">
          <h1 class="display-3">À Propos</h1>
        </div>
      </div>
    </div>
  </header>

  <section class="my-5">
    <div class="container">
      <div class="row">
        <div class="col-md-8 mx-auto">
          <p>Chez AgriMarket, notre mission est de connecter directement les agriculteurs et les consommateurs, en supprimant les intermédiaires pour offrir des produits frais, de qualité et à des prix compétitifs. Nous croyons fermement en l'importance de soutenir les communautés agricoles tout en facilitant l'accès des consommateurs à des produits locaux et biologiques.</p>
          <br>
          <h3>Pourquoi choisir AgriMarket ?</h3>
          <br>
          <h5>Pour les agriculteurs :</h5>
          <p>Nous offrons aux producteurs une plateforme simple et efficace pour mettre en valeur leurs récoltes, gérer leurs ventes et interagir directement avec leurs clients.</p>
          <br>
          <h5>Pour les consommateurs :</h5>
          <p>Découvrez un large choix de produits agricoles locaux, issus de fermes de confiance. Faites vos achats en toute transparence et recevez vos produits directement chez vous.</p>
        </div>
      </div>
    </div>
  </section>


  <div class="about-section">
    <div class="video-container">
      <video id="aboutVideo" class="video" controls style="display: none;">
        <source src="/images/video.mp4" type="video/mp4">
        Votre navigateur ne prend pas en charge la vidéo.
      </video>
      <button class="play-button" id="playButton">
        <span class="play-icon">&#9658;</span>
      </button>
    </div>
  </div>

  <script>
    const playButton = document.getElementById('playButton');
    const video = document.getElementById('aboutVideo');

    playButton.addEventListener('click', () => {
      playButton.style.display = 'none'; // Cache le bouton
      video.style.display = 'block'; // Affiche la vidéo
      video.play(); // Joue la vidéo
    });
  </script>


  <x-monfooter>
  </x-monfooter>
  <x-monbody>
  </x-monbody>
</body>

</html>