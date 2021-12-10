@extends('layouts.dashboard')

@section('title',' | ' . $order->guest_name)

@section('content')
<div class="container-fluid mt-5">
    <div class="row">
        {{-- Alert Modifica --}}
        @if (session('status'))
        <div class="alert alert-success w-100">
            {{ session('status') }}
        </div>
        @endif

        {{-- Dettaglio ordine --}}
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header pr-0 pl-0">
                    Dettaglio Ordine
                </div>
                <ul>
                    <li><strong>Nome Cliente: </strong>{{$order["guest_name"]}}</li>
                    <li><strong>Email: </strong>{{$order["email"]}}</li>
                    <li><strong>Data Ordine: </strong>{{$order["order_date"]}}</li>
                    <li><strong>Indirizzo: </strong>{{$order["address"]}}</li>
                    <li><strong>Note: </strong>{{$order["note"]}}</li>
                    <li><strong>Costo spedizione: </strong>{{$order["delivery_cost"]}}€</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection