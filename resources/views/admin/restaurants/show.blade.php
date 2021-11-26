@extends('layouts.dashboard')

@section('content')    
    <div class="container-fluid mt-100">
        <div class="row">
            @if (session('status'))
                <div class="alert alert-success w-100">
                    {{ session('status') }}
                </div>
            @endif
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
                        <li><strong>Costo spedizione: </strong>{{$restaurant["delivery_cost"]}}€</li>
                        <li><strong>Specialità: </strong>{{$restaurant["speciality"]}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection