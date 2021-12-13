@extends('layouts.app')

@section('title',' | ' . $restaurant->name)

{{-- @section('cart')
<script src="{{ mix('js/main.js') }}"></script>
@endsection --}}

@section('content')
<div class="container mt-3">
    <div class="row">
        {{-- <script src="{{ mix('js/main.js') }}"></script> --}}
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
                </ul>
            </div>
        </div>


        {{-- Card Piatti --}}
        {{-- <div class="container mt-3">
            <div class="row g-4">
                @foreach ($restaurant->plates as $plate)

                @if ($plate->visibility == 1)

                <div class="col-3">
                    <div class="card scroll">
                        @if ($plate->cover)
                        <img class="img-thumbnail mt-3" style="height:250px; width:100%"
                            src="{{ asset('storage/'. $plate->cover)}}">
                        @else
                        <img src="https://www.buttalapasta.it/wp-content/uploads/2017/11/pizza-napoletana-vera-ricetta.jpg"
                            style="height:250px; width:100%" class="card-img-top mt-3 " alt="img">
                        @endif
                        <div class="card-body">
                            <div>
                                <h5 class="card-title">{{$plate['name']}}</h5>
                                <span class="fw-bold">Descrizione: </span>
                                <div class="overflow">{{ $plate['description'] }}</div>
                                <div><strong>Prezzo: </strong>{{ $plate['price'] }}€</div>
                                <a href="#" class="btn btn-primary">Aggiungi al carrello</a>
                            </div>
                        </div>
                    </div>
                </div>
                @else

                <div class="col-3">
                    <div class="visibility-off card scroll">
                        @if ($plate->cover)
                        <img class="img-thumbnail mt-3" style="height:250px; width:100%"
                            src="{{ asset('storage/'. $plate->cover)}}">
                        @else
                        <img src="https://www.buttalapasta.it/wp-content/uploads/2017/11/pizza-napoletana-vera-ricetta.jpg"
                            style="height:250px; width:100%" class="card-img-top mt-3 " alt="img">
                        @endif
                        <div class="card-body">
                            <div>
                                <h5 class="card-title">{{$plate['name']}}</h5>
                                <span class="fw-bold">Descrizione: </span>
                                <div class="overflow">{{ $plate['description'] }}</div>
                                <div><strong>Prezzo: </strong>{{ $plate['price'] }}€</div>
                                <a href="#" class="btn btn-danger">Non Disponibile</a>
                            </div>
                        </div>
                    </div>
                </div>

                @endif

                @endforeach
            </div>
        </div> --}}
    </div>
    <div id="app">
        {{-- <Home></Home>
        <vue-App></vue-App> --}}
    </div>

    @endsection