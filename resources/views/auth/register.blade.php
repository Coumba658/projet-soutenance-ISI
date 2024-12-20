<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-monheader>

   </x-monheader>
    <!-- CSS only -->
    <title>AgriMarket</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-white py-3 shadow-sm fixed-top">
  <div class="container-fluid">
    <div>
     <a href='/'><img src="/images/agrimarket-logo.png" alt="logo" width="150" height="30"></img></a>
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
          <a class="nav-link ms-4" href="/e-daral">E-daral</a>
        </li>
        <li class="nav-item">
          <a class="nav-link ms-4" href="/ferme">Ferme</a>
        </li>
        <li class="nav-item">
          <a class="nav-link ms-4" href="/contact">Contact</a>
        </li>
      </ul>
      <div class='buttons'>
         @if (Route::has('login'))
         @auth
         <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
         @else
           <a href="{{ route('login') }}" class='btn btn-outline-success rounded-pill'>
           <i class='fa fa-user me-1'></i>
           Login
           </a>
           @if (Route::has('register'))
           <a href="{{ route('register') }}" class='btn btn-outline-success rounded-pill ms-2 '>
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
<div class="mt-5 py-3"> 
<x-guest-layout>
    <x-auth-card>
        
                <x-slot name="logo">
                    <a href="/">
                        <!--<x-application-logo class="w-20 h-20 fill-current text-gray-500" />-->   
                    </a>
                </x-slot>
     
                 <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
           
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div>
                        <x-label for="name" :value="__('Nom')" />

                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                    </div>
                    <!-- prenom -->
                    <div>
                        <x-label for="prenom" :value="__('Prenom')" />

                        <x-input id="prenom" class="block mt-1 w-full" type="text" name="prenom" :value="old('prenom')" required autofocus />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-label for="email" :value="__('Email')" />

                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-label for="password" :value="__('Mot de passe')" />

                        <x-input id="password" class="block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="new-password" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-label for="password_confirmation" :value="__('Confirmer le mot de passe')" />

                        <x-input id="password_confirmation" class="block mt-1 w-full"
                                        type="password"
                                        name="password_confirmation" required />
                    </div>

                    <!-- Champ Test -->
                    <div class="mt-4">
                        <x-label for="telephone" :value="__('Telephone')" />

                        <x-input id="telephone" class="block mt-1 w-full" type="text" name="telephone" :value="old('telephone')" required />
                    </div>
                    <!-- Champ adresse -->
                    <div>
                        <x-label for="adresse" :value="__('Adresse')" />

                        <x-input id="adresse" class="block mt-1 w-full" type="text" name="adresse" :value="old('adresse')" required/>
                    </div>
                     <!-- Champ cni -->
                    <div>
                        <x-label for="cni" :value="__('CNI')" />

                        <x-input id="cni" class="block mt-1 w-full" type="text" name="cni" :value="old('cni')" required/>
                    </div>
                     <!-- Champ role -->
                     <div class="mt-4">

                    <x-label for="compte" :value="__('Profil')" />
                    <select class="form-select block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" aria-label="Default select example" name="compte">
                       
                    @foreach($role as $role)
                        <option value="{{$role->id}}">{{$role->nomRole}}</option>
                       @endforeach
                    </select>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                            {{ __('Vous avez déjà un compte?') }}
                        </a>

                        <x-button class="ml-4">
                            {{ __('Inscription') }}
                        </x-button>
                    </div>
                </form> 
            </x-auth-card>
            </x-guest-layout>
            </div>
          
<!-- JavaScript Bundle with Popper -->
<x-monfooter>
</x-monfooter>
<x-monbody>

</x-monbody>
</body>
</html>
