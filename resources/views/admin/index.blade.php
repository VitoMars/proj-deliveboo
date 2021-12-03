@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card mt-3">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    Bentornato, {{ Auth::user()->name }}.
                </div>
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

            <div class="card mb-3">
                <div class="card-header pr-0 pl-0">
                    Il tuo ristorante
                </div>

                @if( $restaurant )
                <ul class="m-0">
                    <li class="m-3">
                        {{-- Show --}}
                        <div class="h5 d-flex">
                            <a href="{{route('admin.restaurants.show', $restaurant['id'])}}">{{$restaurant["name"]}}</a>
                        </div>
                        {{-- Edit --}}
                        <a class="btn btn-outline-info" data-mdb-ripple-color="dark"
                            href="{{ route('admin.restaurants.edit', $restaurant['id']) }}" class="card-link">
                            <i class="far fa-edit me-2"></i>Modifica
                        </a>
                    </li>
                </ul>
                @else
                <div class="m-2">Non hai ancora creato un ristorante!</div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection