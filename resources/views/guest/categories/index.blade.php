@extends('layouts.app')

@section('title',' | Categorie')

@section('content')
<div class="container mt-3">
    <div class="row">
        {{-- Alert Modifica --}}
        @if (session('status'))
        <div class="alert alert-success w-100">
            {{ session('status') }}
        </div>
        @endif

        {{-- Lista Categorie --}}
        <div class="col-md-12">
            <div class="mb-3">
                <div class="text-white fw-bold fs-1 mb-4 my-text-shadow pr-0 pl-0">
                    Categorie
                </div>
                <div class="w-100">
                    <div class="row py-2 g-3">
                        @foreach ($categories as $category)
                        {{-- <li class="my-3">
                            <a href="{{ route('categories.show', $category['id']) }}">{{$category["name"]}}</a>
                        </li> --}}
                        <a href="{{ route('categories.show', $category['id']) }}" class="card my-card my-col-3 p-0 border-0 overflow-hidden d-flex flex-column justify-content-center align-items-center">
                            <img class="category-img w-100 p-0 m-0" src="{{ asset('images/categories/' . $category->slug . '.png') }}" alt="{{$category->name}} Image">
                            <div class="category-name d-flex justify-content-center align-items-center"><span class="p-0 m-0">{{$category->name}}</span></div>

                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection