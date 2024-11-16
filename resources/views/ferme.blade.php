<!DOCTYPE html>
<html lang="en">
<x-monheader>

</x-monheader>

<title>A Propos</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>


<style>
  body {
    margin: 2rem;
  }

  .modal-dialog {
    max-width: 800px;
    margin: 30px auto;
  }

  .modal-body {
    position: relative;
    padding: 0px;
  }

  .btn-close {
    position: absolute;
    right: -30px;
    top: 0;
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

  <div class="container py-5 mt-5">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary video-btn" data-bs-toggle="modal" data-src="/images/video.mp4" data-bs-target="#myModal">
      Regarder la vidéo
    </button>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></span>
            </button>
            <!-- 16:9 aspect ratio -->
            <div class="ratio ratio-16x9">
              <iframe class="embed-responsive-item" src="" id="video" allowscriptaccess="always" allow="autoplay"></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      let videoSrc;

      document.querySelectorAll('.video-btn').forEach(button => {
        button.addEventListener('click', () => {
          videoSrc = button.getAttribute('data-src');
        });
      });

      const myModal = document.getElementById('myModal');
      myModal.addEventListener('shown.bs.modal', function() {
        document.getElementById('video').src = videoSrc + "?autoplay=1";
      });

      myModal.addEventListener('hide.bs.modal', function() {
        document.getElementById('video').src = '';
      });
    });
  </script>

  <x-monfooter>
  </x-monfooter>
  <x-monbody>
  </x-monbody>
</body>

</html>