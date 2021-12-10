@extends('layouts.dashboard')

@section('title',' | Ristoranti')

@section('content')
<div class="container-fluid mt-5">
    <div class="row">
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