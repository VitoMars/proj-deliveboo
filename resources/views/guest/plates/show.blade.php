@extends('layouts.app')

@section('title',' | ' . $plate->name)

@section('content')
<div class="container-fluid mt-100">
    <div class="row">
        {{-- Alert Modifica --}}
        @if (session('status'))
        <div class="alert alert-success w-100">
            {{ session('status') }}
        </div>
        @endif

        {{-- Dettaglio Piatti --}}
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header pr-0 pl-0">
                    Dettaglio Piatti
                </div>
                <ul>
                    @if($plate->cover)
                    <img class="img-thumbnail my-3" style="max-height: 300px" src="{{ asset('storage/'. $plate->cover)}}">
                    @endif
                    <li><strong>Nome Piatto: </strong>{{$plate["name"]}}</li>
                    <li><strong>Descrizione: </strong>{{$plate["description"]}}</li>
                    <li><strong>Prezzo: </strong>{{$plate["price"]}}€</li>
                    <li><strong>Categoria Piatto: </strong>{{$plate["menu_category"]}}</li>
                    <li><strong>Valutazione: </strong>
                        @if ($plate["rating"])
                        {{$plate["rating"]}}/5
                        @else
                        Non disponibile
                        @endif
                    </li>
                    <li><strong>Disponibità: </strong>
                        @if ($plate["visibility"]=="1")
                        Disponibile
                        @else
                        Non Disponibile
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection