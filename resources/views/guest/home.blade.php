<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon-16x16.png') }}">
    <title>DeliveBoo | Consegna a domicilio</title>
    {{-- Fonts --}}
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet"> --}}
</head>

<body class="m-0">
    <img onclick="topFunction()" id="scrollUp" title="Vai sopra" src="{{asset('images/up-arrow.png')}}" alt="up arrow">
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
                    <img class="banner-top-image w-100" src="{{ asset('images/banner-top-image-christmas.png') }}" alt="">
                    <div class="row px-5 d-flex justify-content-center align-items-center w-100 h-100">
                        <div class="col-6 h-100 d-flex flex-column justify-content-center">
                            <span class="fw-bold text-white fs-2 mb-5 mx-3 mt-4 my-text-shadow">I piatti che ami, a
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
                            <img class="rider-banner slideInRight h-100" src="{{ asset('images/rider-home-christmas.png') }}"
                                alt="Rider Image">
                        </div>
                    </div>
                </div>
            </div>
            {{-- Banner --}}

            {{-- Section 1 / La selezione di Deliveboo--}}

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

            {{-- Sezione 2 / Cosa cerchi?--}}

            <div class="container-fluid w-75 cosa-cerchi px-5 py-5">
                <h1 class="mb-5">Cosa cerchi?</h1>
                <ul class="d-flex flex-wrap">
                    @foreach ($categories as $category)
                        <a href="{{route('categories.show', $category->id)}}" class="my-link-blue fs-2 fw-bold mx-3 text-uppercase">{{ $category->name }}</a>
                    @endforeach
                </ul>
            </div>

            {{-- Sezione 2 --}}

            {{-- Section 3 --}}

            <div class="container-fluid w-100 novita-cucina px-5 py-5">
                <div class="container-fluid w-75 ">
                    <h1 class="mb-5">Novità dalla nostra cucina</h1>
                    <div class="row">
                        <div class="col-12 delivery-for-work mb-4">
                            <div class="row">
                                <div class="col-6 mx-0 p-0 left">
                                    <img class="w-100" src="{{ asset('images/delivery-for-work.png') }}" alt="Delivery For Work image">
                                </div>
                                <div class="col-6 mx-0 px-3 py-5 right d-flex flex-column ">
                                    <h3 class="mb-3">Deliveboo for Work</h3>
                                    <p>Clienti o colleghi affamati? il nostro team Corporate ti può aiutare.</p>
                                    <a class="my-btn-green btn my-2 w-25" href="">Contattaci</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 prova-app">
                            <div class="row">
                                <div class="col-6 mx-0 px-3 py-5 left d-flex flex-column ">
                                    <h3 class="mb-3">Hai già la nostra app?</h3>
                                    <p>Scaricala ora - disponibile su Apple store e Google Play!</p>
                                    <div style="height: 60px" class="social-wrap w-50 d-flex">
                                        <div class="download-button h-100">
                                            <a href="https://apps.apple.com/it/app/deliveroo-piatti-a-domicilio/id1001501844"  target="_blank"><img class="h-100" src="{{ asset('images/download-apple.svg') }}" alt="Download on App Store"></a>
                                        </div>
                                        <div class="download-button h-100">
                                            <a href="https://play.google.com/store/apps/details?id=com.deliveroo.orderapp&hl=it&gl=US"  target="_blank"><img class="h-100" src="{{ asset('images/download-google.svg') }}" alt="Download on Google Play"></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6 mx-0 p-0 right">
                                    <img class="w-100" src="{{ asset('images/sezione-app.png') }}" alt="Sezione app image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Section 3 --}}

            {{-- Section 4 / Lavora con Deliveboo--}}

            <div class="container-fluid w-75 lavora px-5 py-5">
                <h1 class="mb-5">Lavora con Deliveboo</h1>
                <div class="row gx-5">
                    <div class="col-4 lavora-rider">
                        <div class="card lavora-card m-2 pb-2 border-0 d-flex flex-column">
                            <img class="w-100" src="{{ asset('images/lavora-rider.png') }}" alt="Lavora con Noi Rider image">
                            <div class="lavora-text-area p-4">
                                <h1>Rider</h1>
                                <p>Diventa un rider: flessibilità, ottimi guadagni e un mondo di vantaggi per te.</p>
                                <a class="my-btn-green btn my-2" href="">Unisciti a noi</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 lavora-ristorante">
                        <div class="card lavora-card m-2 pb-2 border-0 d-flex flex-column">
                            <img class="w-100" src="{{ asset('images/lavora-restaurant.png') }}" alt="Lavora con Noi Restaurant image">
                            <div class="lavora-text-area p-4">
                                <h1>Ristorante</h1>
                                <p>Diventa partner di Deliveroo e raggiungi sempre più clienti. Ci occupiamo noi della consegna, così che la tua unica preoccupazione sia continuare a preparare il miglior cibo.</p>
                                <a class="my-btn-green btn my-2" href="">Diventa nostro partner</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 lavora-con-noi">
                        <div class="card lavora-card m-2 pb-2 border-0 d-flex flex-column">
                            <img class="w-100" src="{{ asset('images/lavora-con-noi.png') }}" alt="Lavora con Noi image">
                            <div class="lavora-text-area p-4">
                                <h1>Lavora con noi</h1>
                                <p>La nostra missione è trasformare il modo in cui le persone mangiano. È un obiettivo ambizioso, come noi, e ci servono persone che ci aiutino a raggiungerlo.</p>
                                <a class="my-btn-green btn my-2" href="">Scopri di più</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            {{-- Section 4 --}}

        </main>
        @include('partials.footer')

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