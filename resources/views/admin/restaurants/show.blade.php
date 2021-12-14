@extends('layouts.dashboard')

@section('title',' | ' . $restaurant->name)

@section('content')
<div class="container-fluid mt-2">
    <div class="row">
        {{-- Alert modifica --}}
        @if (session('status'))
        <div class="alert alert-success w-100">
            {{ session('status') }}
        </div>
        @endif

        {{-- Dettaglio Ristorante --}}
        <div class="col-md-12">
            <div class="my-text-blue fw-bold fs-1 mb-3 pr-0 pl-0">
                {{$restaurant["name"]}}
            </div>
            <div style="height: 250px" class="card border-0 my-shadow p-4 mb-3">
                <div class="row">

                    <div class="col-9">
                        <div class="d-flex my-text-blue fw-bolder fs-5 mb-3">
                            {{$restaurant->city}} · {{$restaurant->address}} · <span class="ms-1"> Consegna: 
                                @if ($restaurant["delivery_cost"])
                                {{$restaurant["delivery_cost"]}}€
                                @else
                                Gratis
                                @endif</span>
                        </div>
        
                        <p>{{$restaurant->description}}</p>
                    </div>
                    <div class="col-3 d-flex justify-content-center">
                        @if ($restaurant->cover)
                            <img class="w-50" src="{{ asset('storage/'. $restaurant->cover)}}">
                        @else
                        <img class="w-50" src="{{ asset('images/logo-restaurant-default.png') }}" alt="{{ $restaurant->name}} Logo">
                        @endif
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="fs-5 fw-bolder">Categorie:</div>
                        <div>
                            @foreach ($restaurant->categories as $category)
                                <a href="{{ route('admin.categories.show', $category['id']) }}" class="fw-bolder fs-5 my-text-blue mx-2">{{$category['name']}}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <a href="{{ route('admin.plates.create') }}">
                <button type="button" class="my-btn-blue btn my-1 text-white">Aggiungi Piatto</button>
            </a>
        </div>
    </div>

    {{-- Card Piatti --}}
        <div class="row g-4">
            @foreach ($restaurant->plates as $plate)

            @if ($plate->visibility == 1)

            <div class="col-3">
                <div class="card p-3 scroll">
                    @if ($plate->cover)
                    <div class="my-card-image">
                        <img class="w-100 h-100"
                            src="{{ asset('storage/'. $plate->cover)}}"
                            >
                    </div>

                    @else
                    <div class="my-card-image">
                        <img src="https://www.buttalapasta.it/wp-content/uploads/2017/11/pizza-napoletana-vera-ricetta.jpg"
                            class="w-100 h-100" alt="img"
                            >
                    </div>
                    @endif
                    <div class="card-body">
                        <div>
                            <h5 class="card-title">{{$plate['name']}}</h5>
                            <span class="fw-bold">Descrizione: </span>
                            <div class="overflow">{{ $plate['description'] }}</div>
                            <div class="mb-2"><strong>Visibilità: </strong> Si <i class="fas fa-circle my-text-green"></i> </div>
                            <div><strong>Prezzo: </strong>{{ $plate['price'] }}€</div>
                            <div class="d-flex w-100 justify-content-around align-items-center mt-2">
                                {{-- Edit --}}
                                <a class="btn my-btn-blue-plates" data-mdb-ripple-color="dark"
                                href="{{ route('admin.plates.edit', $plate['id']) }}" class="card-link">
                                <i class="far fa-edit"></i> Modifica
                                </a>
                                {{-- Delete --}}
                                <form method="POST" action="{{ route('admin.plates.destroy', $plate['id']) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn my-btn-red-plates"><i class="fas fa-trash-alt"></i> Elimina</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else

            <div class="col-3">
                <div class="visibility-off card p-3 scroll">
                    @if ($plate->cover)
                    <div class="my-card-image">
                        <img class="w-100 h-100"
                            src="{{ asset('storage/'. $plate->cover)}}"
                            >
                    </div>

                    @else
                    <div class="my-card-image">
                        <img src="https://www.buttalapasta.it/wp-content/uploads/2017/11/pizza-napoletana-vera-ricetta.jpg"
                            class="w-100 h-100" alt="img"
                            >
                    </div>
                    @endif
                    <div class="card-body">
                        <div>
                            <h5 class="card-title">{{$plate['name']}}</h5>
                            <span class="fw-bold">Descrizione: </span>
                            <div class="overflow">{{ $plate['description'] }}</div>
                            <div class="mb-2"><strong>Visibilità: </strong> No <i class="fas fa-circle text-danger"></i> </div>
                            <div><strong>Prezzo: </strong>{{ $plate['price'] }}€</div>
                            <div class="d-flex w-100 justify-content-around align-items-center mt-2">
                                {{-- Edit --}}
                                <a class="btn my-btn-blue-plates" data-mdb-ripple-color="dark"
                                href="{{ route('admin.plates.edit', $plate['id']) }}" class="card-link">
                                <i class="far fa-edit"></i> Modifica
                                </a>
                                {{-- Delete --}}
                                <form method="POST" action="{{ route('admin.plates.destroy', $plate['id']) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn my-btn-red-plates"><i class="fas fa-trash-alt"></i> Elimina</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @endif

            @endforeach
        </div>
</div>
@endsection