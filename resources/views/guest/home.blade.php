<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>DeliveBoo | Consegna a domicilio</title>
    {{-- Fonts --}}
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>

<body class="m-0">
    ciaoooo
    <div class="position-ref full-height w-100">
        {{-- Navbar --}}
        <header>
            <div class="my-navbar w-75 mx-auto px-3 nav-bar d-flex align-items-center justify-content-between">
                <a class="h-100" href=""><img class="logo-home" src="{{ asset('images/deliveboo-logo-christmas.png') }}"
                        alt="DeliveBoo Logo"></a>
                @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                    <a class="my-btn-green btn" href="{{ url('/') }}">Home</a>
                    <a class="my-btn-green btn" href="{{ url('/admin') }}">Admin</a>
                    <a class="my-btn-red btn" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
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
        <main>
            {{-- Banner --}}
            <div class="container-fluid w-100 banner">
                <div class="container w-75 h-100 position-relative">
                    <img class="banner-top-image w-100" src="{{ asset('images/banner-top-image.png') }}" alt="">
                    <div class="row px-5 d-flex justify-content-center align-items-center w-100 h-100">
                        <div class="col-6 h-100 d-flex flex-column justify-content-center">
                            <span class="fw-bold text-white fs-2 mb-5 mx-3 my-text-shadow">I piatti che ami, a
                                domicilio.</span>
                            <div class="buttons-wrap w-100 d-flex flex-column justify-content-center">
                                <a href="{{ route('restaurants.index') }}">
                                    <button type="button" class="my-btn-blue btn w-75 my-2">Vedi tutti i
                                        ristoranti</button>
                                </a>
                                <a href="{{ route('categories.index') }}">
                                    <button type="button" class="my-btn-blue btn w-75 my-2">Vedi tutti le
                                        categorie</button>
                                </a>
                            </div>
                        </div>
                        <div class="right col-6 h-100 d-flex justify-content-center align-items-center">
                            <img class="rider-banner slideInRight h-100" src="{{ asset('images/rider-home.png') }}"
                                alt="Rider Image">
                        </div>
                    </div>
                </div>
            </div>
            {{-- Banner --}}

            {{-- Section 1 --}}

            <div class="container-fluid w-75 la-selezione px-5 py-5">
                <h1 class="mb-5">La selezione di Deliveboo</h1>
                <div class="container">
                    <div class="row mb-5 w-100 gx-5 d-flex">
                        <div class="col-5 d-flex flex-column">
                            <div class="small-wrap d-flex w-100">
                                <img class="w-100" style="height: 150px" src="{{ asset('images/categories/hamburger-home.png') }}" alt="Hamburger image">
                                <h3 class="">Hamburger</h3>
                            </div>
                            <p class="mt-2">
                                I grandi classici che scaldano il cuore, perfetti in ogni momento.
                            </p>
                            <a href="{{ route('categories.show', $category['id']=5) }}">Scopri gli Hamburger</a>
    
                        </div>
                        <div class="col-7 d-flex flex-column">
                            <div class="large-wrap w-100">
                                <img class="w-100" style="height: 150px" src="{{ asset('images/categories/dolci-natalizi.png') }}" alt="Dolci e Dessert image">
                                <h3>Dolci Natalizi</h3>
                            </div>
                            <p class="mt-2">
                                Dolci piaceri per rendere le feste ancora più gustose.
                            </p>
                            <a href="{{ route('categories.show', $category['id']=7) }}">Scopri i Dessert</a>
                        </div>
                    </div>
                    <div class="row w-100 gx-5 d-flex">
                        <div class="col-7 d-flex flex-column">
                            <div class="large-wrap w-100">
                                <img class="w-100" style="height: 150px" src="{{ asset('images/categories/il-miglior-sushi.png') }}" alt="Il miglior Sushi image">
                                <h3>Il miglior Sushi</h3>
                            </div>
                            <p class="mt-2">
                                Il sushi è molto di più che mettere del pesce sul riso. Il sushi è una forma d’arte.
                            </p>
                            <a href="{{ route('categories.show', $category['id']=7) }}">Scopri il Sushi</a>
                        </div>

                        <div class="col-5 d-flex flex-column">
                            <div class="small-wrap d-flex w-100">
                                <img class="w-100" style="height: 150px" src="{{ asset('images/categories/pizza-home.png') }}" alt="Pizza image">
                                <h3 class="">Pizza</h3>
                            </div>
                            <p class="mt-2">
                                Se si fa in quattro per renderti felice, è una pizza.
                            </p>
                            <a href="{{ route('categories.show', $category['id']=5) }}">Scopri la Pizza</a>
                        </div>
                    </div>
                </div>

            </div>

            {{-- Section 1 --}}

        </main>
        @include('partials.footer')
</body>

</html>