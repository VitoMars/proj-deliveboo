@extends('layouts.dashboard')

@section('content')
<div class="container-fluid mt-0">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="welcome-wrap py-4 px-3 fs-5">
                Bentornato, <span class="my-text-green text-capitalize fw-bold">{{ Auth::user()->name }}</span>.
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt-2">
    <div class="row">
        {{-- Alert Modifica --}}
        @if (session('status'))
        <div class="alert alert-success w-100">
            {{ session('status') }}
        </div>
        @endif

        {{-- Lista Ristoranti --}}
        <div class="col-md-12">

            @if (!$restaurant)
            <a href="{{ route('admin.restaurants.create') }}">
                <button type="button" class="my-btn-blue btn my-4 text-white d-flex align-items-center">
                    <i class="fas fa-plus pe-2" style=""></i>
                    Aggiungi Ristorante
                </button>
            </a>
            @endif

            @if( $restaurant )
            {{-- Edit --}}
            <div class="my-text-blue fw-bold fs-2 mb-3 pr-0 pl-0">
                Il tuo Ristorante
                <a class="btn btn-outline-info btn-edit-restaurant" data-mdb-ripple-color="dark"
                    href="{{ route('admin.restaurants.edit', $restaurant['id']) }}" class="card-link">
                    <i class="far fa-edit me-2"></i>Modifica
                </a>
            </div>

            <div class="col-3">
                <a style="height: 350px" href="{{ route('admin.restaurants.show', $restaurant->id) }}"
                    class="card my-card py-2 d-flex flex-column justify-content-center align-items-center">
                    <div class="card-logo d-flex align-items-center justify-content-center">
                        @if ($restaurant->cover)
                        <img class="w-100" src="{{ asset('storage/'. $restaurant->cover)}}">
                        @else
                        <img class="w-100" src="{{ asset('images/logo-restaurant-default.png') }}"
                            alt="{{ $restaurant->name}} Logo">
                        @endif
                    </div>
                    <div class="card-body w-100 d-flex flex-column">
                        <h3 class="fs-4">{{$restaurant->name}}</h3>
                        <p class="restaurant-description text-dark">{{$restaurant->description}}</p>
                        <div class="restaurant-category-list">

                            @foreach ($restaurant->categories as $category)
                            <span class="mx-2">{{$category->name}} </span>
                            @endforeach
                        </div>
                    </div>
                </a>
            </div>
            @else
            <div class="m-2">Non hai ancora creato un ristorante!</div>
            @endif
        </div>
    </div>
</div>
@endsection