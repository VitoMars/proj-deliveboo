@extends('layouts.dashboard')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 d-flex flex-column">
            <div class="card mb-3">
                <div class="card-header py-0 px-4">
                    <h2 class="mt-3 mb-3">Aggiungi Piatto</h2>
                </div>
                <div class="card-body d-flex flex-column py-3 px-4">
                    <form action="{{ route('admin.plates.update', $plate->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- Nome --}}
                        <div class="form-group">
                            <label class="mt-2" for="name">Nome</label>
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror" value="{{old('name', $plate->name)}}">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Descrizione --}}
                        <div class="form-group">
                            <label class="mt-2" for="description">Descrizione</label>
                            <textarea name="description" id="description"
                                class="form-control @error('description') is-invalid @enderror">{!!old('description', $plate->description)!!}</textarea>
                            @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Categoria Menu --}}
                        <div class="form-group">
                            <label class="mt-2" for="menu_category">Categoria Menu</label>
                            <select class="form-select" name="menu_category" id="menu_category">
                                <option value="Primi Piatti">Primi Piatti</option>
                                <option value="Secondi Piatti">Secondi Piatti</option>
                                <option value="Dolci">Dolci</option>
                                <option value="Pizza">Pizza</option>
                                <option value="Panini">Panini</option>
                                <option value="Bevande">Bevande</option>
                                <option value="Birre">Birre</option>
                                <option value="Vini">Vini</option>
                            </select>
                            @error('menu_category')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Prezzo --}}
                        <div class="form-group">
                            <label class="mt-2" for="price">Prezzo €</label>
                            <input type="number" name="price" id="price" min="0.00" max="999.99" step="0.50"
                                class="form-control @error('price') is-invalid @enderror" value="{{old('price', $plate->price)}}">
                            @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Visibilità --}}
                        <div class="form-group">
                            <label class="mt-2" for="visibility">
                                Vuoi che questo piatto sia visibile agli utenti?
                            </label>
                            <select class="form-select" name="visibility" id="visibility">
                                <option value="1">Si</option>
                                <option value="0">No</option>
                            </select>
                            @error('visibility')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Bottone Invia --}}
                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-primary text-white mt-2">Invia</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection