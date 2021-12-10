@extends('layouts.dashboard')

@section('title',' | ' . $restaurant->name)

@section('content')
<div class="container-fluid mt-5">
    <div class="row">
        {{-- Alert modifica --}}
        @if (session('status'))
        <div class="alert alert-success w-100">
            {{ session('status') }}
        </div>
        @endif

        {{-- Dettaglio Ristorante --}}
        <div class="col-md-12">
            <a href="{{ route('admin.plates.create') }}">
                <button type="button" class="my-btn-blue btn my-4 text-white">Aggiungi Piatto</button>
            </a>
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
                    <li><strong>I tuoi Piatti: </strong>
                        @foreach ($restaurant->plates as $plate)
                        <a href="{{ route('admin.plates.show', $plate['id']) }}" class="mx-2">{{$plate['name']}}</a>
                        @endforeach
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection