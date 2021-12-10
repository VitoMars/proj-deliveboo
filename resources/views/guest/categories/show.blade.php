@extends('layouts.app')

@section('title',' | ' . $category->name)

@section('content')
<div class="container mt-3">
    <div class="row">
        {{-- Alert Modifica --}}
        @if (session('status'))
        <div class="alert alert-success w-100">
            {{ session('status') }}
        </div>
        @endif

        {{-- Body --}}
        <div class="col-md-12">
            <div class="mb-3">
                {{-- <div class="card-header my-bg-blue text-white fw-bold pr-0 pl-0"> --}}
                <div class="text-white fw-bold fs-1 mb-4 my-text-shadow pr-0 pl-0">
                   Categoria: {{ $category->name }}
                </div>
                {{-- <div class="card-body w-100"> --}}
                <div class="w-100">
                   <div class="row py-2 g-3">
                    @foreach ($category->restaurants as $restaurant)
                        <a style="height: 350px" href="{{ route('restaurants.show', $restaurant->id) }}" class="card my-card my-col-3 py-2 d-flex flex-column justify-content-center align-items-center">
                        <div class="card-logo d-flex align-items-center justify-content-center">
                            <img class="w-100" src="{{ asset('images/logo-restaurant-default.png') }}" alt="{{ $restaurant->name}} Logo">
                        </div>
                        <div class="card-body w-100 d-flex flex-column">
                            <h3 class="fs-4">{{$restaurant->name}}</h3>
                                <p class="restaurant-description text-dark">{{$restaurant->description}}</p>
                                <div class="restaurant-category-list">

                                    @foreach ($restaurant->categories as $category)
                                    <span class="mx-2">{{$category->name}}  </span>
                                    @endforeach
                                </div>
                        </div>
                        </a>
                    @endforeach
                   </div>
                </div>
             </div>
        </div>
    </div>
</div>
@endsection