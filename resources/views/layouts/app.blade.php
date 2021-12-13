<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon-16x16.png') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Deliveboo @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/main.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="radial-gradient">
    <img onclick="topFunction()" id="scrollUp" title="Vai sopra" src="{{asset('images/up-arrow.png')}}" alt="up arrow">
    <div>
        <header class="my-bg-blue">
            <div class="my-navbar w-75 mx-auto px-3 nav-bar d-flex align-items-center justify-content-between">
                {{-- <div class="logo px-3">DeliveBoo Logo</div> --}}
                <a class="h-100" href="{{ route('index') }}">
                    <img class="logo-home" src="{{ asset('images/deliveboo-logo-christmas.png') }}"
                        alt="DeliveBoo Logo">
                </a>
                @if (Route::has('login'))
                <div class="top-right links d-flex">
                    @auth
                    <a class="my-btn-green btn" href="{{ url('/') }}">Home</a>
                    {{-- <div class="dropdown">
                        <a class="dropdown-toggle my-btn-green btn" href="#" role="button" id="dropdownMenuLink"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('admin.index') }}">Dashboard</a></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul> --}}
                    </div>
                    @else
                    <a class="my-btn-green btn" href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                    <a class="my-btn-green btn" href="{{ route('register') }}">Register</a>
                    @endif
                    @endauth
                </div>
                @endif
            </div>
        </header>

        <main class="py-4">
            {{-- @yield('cart') --}}
            @yield('content')
        </main>
        @include('partials.footer')
    </div>

    <script>
        /* Button per tornare su */

        //Prendo il bottone
        var mybutton = document.getElementById("scrollUp");

        //Quando lìutende "scrolla" giù di 20px dall'inizio della pagina, il bottone spunta fuori
        window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
        }

        // Quando l'utente fa "click" sul bottone, viene effettuanto in automatico un scroll verso l'alto
        function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
        }

        /* Button per tornare su */
    </script>
</body>

</html>