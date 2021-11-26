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
                        Dettaglio Categoria
                    </div>
                    <ul>
                        <li><strong>Nome Categoria: </strong>{{$category["name"]}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection