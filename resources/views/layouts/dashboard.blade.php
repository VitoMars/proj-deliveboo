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

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <header>

        <nav class="my-navbar w-100 mx-auto px-3 nav-bar d-flex align-items-center justify-content-between">
            <a class="h-100" href=""><img class="logo-home" src="{{ asset('images/deliveboo-logoo.png') }}" alt="DeliveBoo Logo"></a>
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



    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block my-bg-orange sidebar py-4">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column h-100">
                        {{-- Dashboard --}}
                        <li class="nav-item d-flex my-2 ">
                            <a class="nav-link d-flex justify-content-center align-items-center" href="{{ route('admin.index') }}">
                                <div style="width: 27px" class="d-flex justify-content-center align-items-center me-3">
                                    <i class="fas fa-house-user fs-4"></i>
                                </div>
                                
                                <p class="m-0">Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item d-flex my-2 ">
                            <a class="nav-link d-flex justify-content-center align-items-center" href="{{ route('admin.index') }}">
                                <div style="width: 27px" class="d-flex justify-content-center align-items-center me-3">
                                    <i class="fas fa-utensils fs-4"></i>
                                </div>
                                <p class="m-0">Lista Piatti</p>
                            </a>
                        </li>
                        {{-- Categories --}}
                        <li class="nav-item d-flex my-2 ">
                            <a class="nav-link d-flex justify-content-center align-items-center" href="{{ route('admin.categories.index') }}">
                                <div style="width: 27px" class="d-flex justify-content-center align-items-center me-3">
                                    <i class="fas fa-hashtag fs-4"></i>
                                </div>
                                <p class="m-0">Lista Categorie</p>
                            </a>
                        </li>
                        {{-- Orders --}}
                        <li class="nav-item d-flex my-2 ">
                            <a class="nav-link d-flex justify-content-center align-items-center" href="{{ route('admin.orders.index') }}">
                                <div style="width: 27px" class="d-flex justify-content-center align-items-center me-3">
                                    <i class="fas fa-shopping-cart fs-4"></i>
                                </div>
                                <p class="m-0">Lista Ordini</p>
                            </a>
                        </li>
                    </ul>

                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 py-4">
                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>