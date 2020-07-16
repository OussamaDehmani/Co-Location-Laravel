<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Leaflet map-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin="" />

    <style type="text/css">
            #map{ /* la carte DOIT avoir une hauteur sinon elle n'apparaît pas */
                height:550px;
            }
        </style>
</head>
<body style='background-color:#F7BE81'>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light  shadow-sm" style='background-color:#993300'>
            <div class="container">
                <a  style='color:white' class="navbar-brand" href="{{ url('/') }}"  >
                  Co-Location
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>


         <!-- Search form -->
         <div class="input-group md-form form-sm form-1 pl-0">
                <i class="fas fa-search" aria-hidden="true"></i>
                <input class="form-control form-control-md md-5" type="text" placeholder="Search"
                    aria-label="Search">
        </div>



                <div class="collapse navbar-collapse" id="navbarSupportedContent" >
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                    <a class="nav-link" href="/demand" style='color:white'>Demands</a>
                    <a class="nav-link" href="/home" style='color:white'>Locations</a>
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a  style='color:white' class="nav-link" href="{{ route('login') }}" ><u>{{ __('Login') }}</u></a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <u><a  style='color:white' class="nav-link" href="{{ route('register') }}"><u>{{ __('Register') }}</u></a></u>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a style='color:white' id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="">
                                        {{ __('profile') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('addLoc') }}">
                                        {{ __('add location') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('addDem') }}">
                                        {{ __('add demand') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('logout') }}
                                    </a>
                                    

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                                
                            </li>
                        @endguest

                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <div class="col lg-3"></div>
                <div class="col lg-9">
                @yield('content')
                </div>
            </div>
        </main>
    </div>
</body>

</html>
