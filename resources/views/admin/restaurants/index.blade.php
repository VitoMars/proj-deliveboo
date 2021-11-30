@extends('layouts.dashboard')

@section('content')
<div class="container-fluid mt-100">
    <div class="row">
        {{-- Alert Modifica --}}
        @if (session('status'))
        <div class="alert alert-success w-100">
            {{ session('status') }}
        </div>
        @endif

        {{-- Lista Ristoranti --}}
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header pr-0 pl-0">
                    Lista ristoranti
                </div>
                <ul>
                    @foreach ($restaurants as $restaurant)
                    <li class="my-3">
                        {{-- Show --}}
                        <a href="{{route('admin.restaurants.show', $restaurant['id'])}}">{{$restaurant["name"]}}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection