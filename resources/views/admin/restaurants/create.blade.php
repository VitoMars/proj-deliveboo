@extends('layouts.dashboard')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 d-flex flex-column">
            <div class="card mb-3">
                <div class="card-header py-0 px-4">
                    <h2 class="mt-3 mb-3">Aggiungi Ristorante</h2>
                </div>
                <div class="card-body d-flex flex-column py-3 px-4">
                    <form name="myRestaurantForm" action="{{ route('admin.restaurants.store')}}" method="post"
                        enctype="multipart/form-data" onsubmit="return validateRestaurantForm()">
                        @csrf
                        @method('POST')

                        {{-- Nome --}}
                        <div class="form-group">
                            <label class="mt-2" for="name">Nome</label>
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Indirizzo --}}
                        <div class="form-group">
                            <label class="mt-2" for="address">Indirizzo</label>
                            <input type="text" name="address" id="address"
                                class="form-control @error('address') is-invalid @enderror" value="{{old('address')}}">
                            @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Descrizione --}}
                        <div class="form-group">
                            <label class="mt-2" for="address">Descrizione</label>
                            <textarea name="description" id="description"
                                class="form-control @error('description') is-invalid @enderror">{!!old('description')!!}</textarea>
                            @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Costo Spedizione --}}
                        <div class="form-group">
                            <label class="mt-2" for="delivery_cost">Costo Spedizione</label>
                            <select class="form-select" name="delivery_cost" id="delivery_cost">
                                <option value="0.00">Gratis</option>
                                <option value="1.00">1.00€</option>
                                <option value="1.50">1.50€</option>
                                <option value="2.00">2.00€</option>
                                <option value="2.50">2.50€</option>
                                <option value="3.00">3.00€</option>
                            </select>
                            @error('delivery_cost')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Upload file --}}
                        <div class="form-group">
                            <label for="" class="d-block mt-2">Immagine di copertina</label>
                            <input type="file" id="image" name="image" class="@error('image') is-invalid @enderror">
                            @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Categoria --}}
                        <div class="form-group">
                            <label class="mt-2 d-block" for="categories[]">Categoria: </label>
                            @foreach ($categories as $category)
                            <div class="form-check-inline mt-1">
                                <input name="categories[]" class="form-check-input" type="checkbox"
                                    value="{{ $category->id }}" {{ in_array($category->id, old('categories', [])) ?
                                'checked=checked' : '' }}>
                                <label class="form-check-label">
                                    {{ $category->name }}
                                </label>
                            </div>
                            @endforeach
                            @error('categories')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Bottone Invia --}}
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary text-white mt-2">Invia</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function validateRestaurantForm(){
        var selected = false;
        for (var i=0; i<document.forms["myRestaurantForm"].elements.length; i++){
            if (document.forms["myRestaurantForm"].elements[i].type && document.forms["myRestaurantForm"].elements[i].type.toLowerCase() == "checkbox" && document.forms["myRestaurantForm"].elements[i].checked)
            selected = true;
        }
        if (!selected){
            alert ("Devi spuntare almeno una categoria");
        };
    }
</script>
@endsection