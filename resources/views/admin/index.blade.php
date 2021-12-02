@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    Bentornato, {{ Auth::user()->name }}.
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-100 mt-5">
    <div class="row">
        {{-- Alert Modifica --}}
        @if (session('status'))
        <div class="alert alert-success w-100">
            {{ session('status') }}
        </div>
        @endif

        {{-- Lista Ristoranti --}}
        <div class="col-md-12">

            <a href="{{ route('admin.restaurants.create') }}">
                <button type="button" class="my-btn-blue btn my-4 text-white">Aggiungi Ristorante</button>
            </a>

            <div class="card mb-3">
                <div class="card-header pr-0 pl-0">
                    I tuoi ristoranti
                </div>
                <ul>
                    <li class="my-3">
                        {{-- Show --}}
                        <a href="{{route('admin.restaurants.show', $restaurant['id'])}}">{{$restaurant["name"]}}</a>
                        {{-- Edit --}}
                        <a class="btn btn-outline-info mx-2" data-mdb-ripple-color="dark"
                            href="{{ route('admin.restaurants.edit', $restaurant['id']) }}" class="card-link">
                            <i class="far fa-edit"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection