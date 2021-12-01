@extends('layouts.app')

@section('content')
<div class="container-fluid mt-100">
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
    </div>
</div>
@endsection