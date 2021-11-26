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
                        Dettaglio Piatti
                    </div>
                    <ul>
                        <li><strong>Nome Piatto: </strong>{{$plate["name"]}}</li>
                        <li><strong>Descrizione: </strong>{{$plate["description"]}}</li>
                        <li><strong>Prezzo: </strong>{{$plate["price"]}}€</li>
                        <li><strong>Categoria Piatto: </strong>{{$plate["menu_category"]}}</li>
                        <li><strong>Valutazione: </strong>{{$plate["rating"]}}/5</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection