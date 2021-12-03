@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <div class="row">
        {{-- Alert modifica --}}
        @if (session('status'))
        <div class="alert alert-success w-100">
            {{ session('status') }}
        </div>
        @endif

        {{-- Dettaglio Ristorante --}}
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header pr-0 pl-0">
                    Dettaglio Ristorante
                </div>
                <ul>
                    <li><strong>Nome ristorante: </strong>{{$restaurant["name"]}}</li>
                    <li><strong>Città: </strong>{{$restaurant["city"]}}</li>
                    <li><strong>Indirizzo: </strong>{{$restaurant["address"]}}</li>
                    <li><strong>Descrizione: </strong>{{$restaurant["description"]}}</li>
                    <li><strong>Costo spedizione: </strong>
                        @if ($restaurant["delivery_cost"])
                        {{$restaurant["delivery_cost"]}}€
                        @else
                        Gratis
                        @endif
                    </li>
                    <li><strong>Categorie: </strong>
                        @foreach ($restaurant->categories as $category)
                        <a href="" class="mx-2">{{$category['name']}}</a>
                        @endforeach
                    </li>
                    <li><strong>Piatti: </strong>
                        @foreach ($restaurant->plates as $plate)
                        <a href="" class="mx-2">{{$plate['name']}}</a>
                        @endforeach
                    </li>
                    {{-- @foreach ($restaurants as $restaurant)
                    @foreach ($plates as $key => $plate)
                    <p>{{$key}}</p>
                    @endforeach
                    @endforeach --}}
                    {{-- {{$restaurant->plates}}

                    @dump($restaurant) --}}
                </ul>
            </div>
        </div>

        <div id="app" class="container">
            <div class="text-right"><button class="btn btn-primary" data-toggle="modal" data-target="#cartModal">Cart
                    ()</button></div>
        </div>

        {{-- Card Piatti --}}
        @foreach ($restaurant->plates as $plate)
        <div class="card m-2" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">{{$plate['name']}}</h5>
                <li><strong>Descrizione piatto: </strong>{{ $plate['description'] }}</li>
                <li><strong>Prezzo: </strong>{{ $plate['price'] }}€</li>
                {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p> --}}
                <a href="#" class="btn btn-primary mt-3">Aggiungi al carrello</a>
            </div>
        </div>
        @endforeach


    </div>
    @endsection