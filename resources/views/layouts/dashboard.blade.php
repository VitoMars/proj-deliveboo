<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Admin, Dashboard') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <header>

        <nav class="my-navbar w-100 mx-auto px-3 nav-bar d-flex align-items-center justify-content-between">
            <a class="h-100" href="{{ route('admin.index') }}"><img class="logo-home"
                    src="{{ asset('images/deliveboo-logoo.png') }}" alt="DeliveBoo Logo"></a>
            <div class="top-right links">
                <a class="my-btn-green btn" href="{{ route('index') }}">
                    Home
                </a>
                <a class="my-btn-red btn" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </nav>
    </header>



    <div class="container-fluid h-100">
        <div class="row h-100">
            <nav class=" h-100 col-md-2 d-none d-md-block my-bg-blue sidebar py-4">
                <div class="sidebar-sticky">
                    {{-- <img class="sidebar-angle" src="{{ asset('images/angle.png') }}" alt="angle"> --}}
                    <ul class="nav flex-column h-100">
                        {{-- Dashboard --}}
                        <li class="nav-item d-flex my-2 ">
                            <a class="nav-link d-flex justify-content-center align-items-center my-link-green"
                                href="{{ route('admin.index') }}">
                                <div style="width: 27px" class="d-flex justify-content-center align-items-center me-3">
                                    <i class="fas fa-house-user fs-4"></i>
                                </div>

                                <p class="m-0">Dashboarda</p>
                            </a>
                        </li>
                        <li class="nav-item d-flex my-2 ">
                            <a class="nav-link d-flex justify-content-center align-items-center my-link-green"
                                href="{{ route('admin.index') }}">
                                <div style="width: 27px" class="d-flex justify-content-center align-items-center me-3">
                                    <i class="fas fa-utensils fs-4"></i>
                                </div>
                                <p class="m-0">Lista Piatti</p>
                            </a>
                        </li>
                        {{-- Categories --}}
                        <li class="nav-item d-flex my-2 ">
                            <a class="nav-link d-flex justify-content-center align-items-center my-link-green"
                                href="{{ route('admin.categories.index') }}">
                                <div style="width: 27px" class="d-flex justify-content-center align-items-center me-3">
                                    <i class="fas fa-hashtag fs-4"></i>
                                </div>
                                <p class="m-0">Lista Categorie</p>
                            </a>
                        </li>
                        {{-- Orders --}}
                        <li class="nav-item d-flex my-2 ">
                            <a class="nav-link d-flex justify-content-center align-items-center my-link-green"
                                href="{{ route('admin.orders.index') }}">
                                <div style="width: 27px" class="d-flex justify-content-center align-items-center me-3">
                                    <i class="fas fa-shopping-cart fs-4"></i>
                                </div>
                                <p class="m-0">Lista Ordini</p>
                            </a>
                        </li>
                    </ul>

                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 pt-4">
                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>