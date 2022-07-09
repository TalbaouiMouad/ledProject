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
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet">  --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div>
        <nav class="navbar-expand-md navbar-dark bg-dark shadow-sm" id="navid">
            <div class="container-fluid d-flex align-items-center ">
              <a class="navbar-brand logo" href="{{ route('home') }}"> {{ config('app.name') }}</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-lg-0  align-items-center">
                    <li class="nav-item navli">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                        <li class="nav-item navli">
                            <a class="nav-link" href="/aboutUs">About Us</a>
                        </li>
                        <li class="nav-item navli">
                            <a class="nav-link" href="{{route('show.contactus')}}">Contact</a>
                        </li>
                        <li class="nav-item  navli">
                            <form method="GET" action="/search" class="search-box">
                                
                                <button href="#" class="btn-search"><i class="bi bi-search"></i></button>
                                <input type="text" class="input-search" name='search'  placeholder="Type to Search...">
                                <button  id="btn-search"  type="submit"><i class="bi bi-search"></i></button>
                               
                            </form>
                        </li>
                </ul>
                
                <ul class="navbar-nav ms-auto ">
                    @guest
                    
                        <li class="nav-item navli">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    
                    @if (Route::has('register'))
                        <li class="nav-item navli">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                    @endif
                    @else 
                    
                    @if(Auth::user()->is_admin)
                    <li class="nav-item navli">
                        <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                    </li> 
                    @endif
                  
                  <li class="nav-item dropdown navli">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="{{route('user.updateProfile',['id'=>Auth::user()->id])}}">Edit Profile</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                        </li>
                      
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                  </li>
             
                @endguest
                </ul>
              </div>
            </div>
            <div class="search" id="cart">
                <div id="cartcount"></div>
                <i class="bi bi-cart-fill"></i>
                <div id="cartitems"></div>
              </div>
        </nav>
    </div>
        <main id="main">
            @yield('content')
        </main>
        <footer id="footer">

        </footer>
    
    <script src="{{ asset('js/script.js') }}" ></script>
</body>
</html>
