<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login PCAM2.0</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />-->
    <!--<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">-->
    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>-->

    <!--<h1 class="bg-primary text-white text-center"> CATALOGO DE SUBESTACIONES GERENCIA </h1> PLANTILLA INICIAL ZONA GRO-MOR-->
     
    
    <!-- Scripts -->
    @vite(['resources/js/app.js'])
</head>
<link rel="stylesheet" href="css/login.css">
<body style="background-image: url(../imagenes/fondo_difuminado_login.jpg);">   
        
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                
               
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('INI', 'Inicio') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->

                    @if(Auth::check())
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" style="text-align:center; font-size:10pt; font-weight:bold" href="{{ route('catalogos.index') }}">{{ __('Catalogo de subestaciones') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="text-align:center; font-size:10pt; font-weight:bold" href="{{ route('zonas.index') }}">{{ __('Zonas') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="text-align:center; font-size:10pt; font-weight:bold"  href="{{ route('gerencias.index') }}">{{ __('Gerencias') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="text-align:center; font-size:10pt; font-weight:bold"  href="{{ route('subestaciones.index') }}">{{ __('Subestaciones') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="text-align:center; font-size:10pt; font-weight:bold"  href="{{ route('comentarios.index') }}">{{ __('Comentarios') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="text-align:center; font-size:10pt; font-weight:bold"  href="{{ route('tipoprocesos.index') }}">{{ __('Tipo de proceso') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="text-align:center; font-size:10pt; font-weight:bold"   href="{{ route('tipopuntos.index') }}">{{ __('Tipo de puntos') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="text-align:center; font-size:10pt; font-weight:bold"  href="{{ route('estadopuntos.index') }}">{{ __('Estado de puntos') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="text-align:center; font-size:10pt; font-weight:bold"  href="{{ route('puntos.index') }}">{{ __('Puntos') }}</a>
                        </li> 
                        @endif                  
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                     <a class="nav-link" href="{{ route('login') }}">{{ __('Ingresar') }}</a>
                                </li>
                            @endif

                           @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Salir') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
            @yield('content')
        </main>
        
    </div>
</body>
</html>
