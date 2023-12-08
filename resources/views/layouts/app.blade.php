<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Friendly Notification') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">  <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-md">
            <div class="container">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
          {{--              @guest
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
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest--}}
                    </ul>
                </div>
            </div>
        </nav>

        <main class="">
           <div style="display: grid; grid-template-rows: 100%; grid-template-columns: 15% 85%">
               <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px; background-color:#1d293b; ">
                   <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">

                       <span class="fs-4"><img src="http://diunsa.friendlystore.net/Logo/Logo_Diunsa_2022-03.png" width="200" alt=""></span>
                   </a>
                   <hr>
                   <ul class="nav nav-pills flex-column mb-auto">
                       <li class="nav-item">
                           <a href="{{route('tienda')}}" @if(request()->routeIs('tienda')) class="nav-link active" @else class="nav-link link-dark"  @endif  aria-current="page">
                               <svg class="bi me-2" width="16" height="16"><use xlink:href="Tienda"></use></svg>
                               Registrar Tienda
                           </a>
                       </li>
                       <li>
                           <a href="{{route('employee')}}" @if(request()->routeIs('employee')) class="nav-link active" @else class="nav-link link-dark"  @endif  >
                               <svg class="bi me-2" width="16" height="16"><use xlink:href="Sipervisor"></use></svg>
                               Registrar Supervisor
                           </a>
                       </li>
                       <li>
                           <a href="{{route('terminal')}}" @if(request()->routeIs('terminal')) class="nav-link active" @else class="nav-link link-dark"  @endif>
                               <svg class="bi me-2" width="16" height="16"><use xlink:href="Terminal"></use></svg>
                               Registrar Terminal
                           </a>
                       </li>

                   </ul>
                   <hr>
                   <div class="dropdown">

                   </div>
               </div>
               @yield('content')
           </div>
        </main>
    </div>
</body>
</html>
