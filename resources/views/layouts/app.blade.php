<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('titre')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/scripts.js') }}"></script>

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.js')}}">
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                @if(Auth::user())  {{--raha authentifié--}}
                <a class="navbar-brand" href="">
                    NOGAE Group
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                       
                            @if(Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="/register">{{ __('Ajouter admin') }}</a>
                                </li>
                            @endif
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <center>
                                   <div class="dropdown">
                                     <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                         Parametres  <span class="caret"></span>
                                     </button><br><br>
                                  <ul class="dropdown-menu">
                                      <center>
                                          <li>
                                                <button type="button" data-toggle="modal" data-target="#Modif" class="btn btn-success">Modifier Profil</button>
                            
                                          </li><br>
                                          <li>
                                            <button type="button" data-toggle="modal" data-target="#Pass" class="btn btn-light">Mot de Passe</button>
        
                                      </li><br>

                                          <li class="divider"></li>
                                          <li>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Supp">Suppression</button>
                                          </li><br><br>
                
                                      </center>
                                  </ul> 
                                  <a class="btn btn-light" href="{{ route('logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                      {{ __('Se deconnecter') }}
                                  </a>
                        
                                {{-- <button type="button" data-toggle="modal" data-target="#Modif" class="btn btn-success">Modifier</button><br><br>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Supp">Supprimer</button><br><br>
                                <a class="btn btn-light" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Se deconnecter') }}
                                </a> --}}
                               </div>
                               </center>
                                
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endif
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>
  {{-- <script src="{{ asset('js/popper.min.js') }}"></script> --}}
  {{-- <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script> --}}
  {{-- <script src="{{ asset('js/bootstrap.bundle.min.js') }}"> --}}
  @yield('scripts')
      

</body>

</html>
