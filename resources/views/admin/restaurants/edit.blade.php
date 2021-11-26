@extends('layouts.dashboard')
@section('title', 'Edit restaurant')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 d-flex flex-column">
            <div class="card mb-3">
                <div class="card-header py-0 px-4">
                    <h2 class="mt-3 mb-3 restaurants">Modifica Ristorante</h2>
                </div>
                <div class="card-body d-flex flex-column py-3 px-4">
                    <form action="{{ route('admin.restaurants.update', $restaurant->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        {{-- Nome --}}
                        <div class="form-group">
                            <label class="mt-2" for="name">Nome</label>
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', $restaurant->name) }}">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Indirizzo --}}
                        <div class="form-group">
                            <label class="mt-2" for="address">Indirizzo</label>
                            <input type="text" name="address" id="address"
                                class="form-control @error('address') is-invalid @enderror"
                                value="{{ old('address', $restaurant->address) }}">
                            @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Descrizione --}}
                        <div class="form-group">
                            <label class="mt-2" for="description">Descrizione</label>
                            <textarea name="description" id="description"
                                class="form-control @error('description') is-invalid @enderror">{!! old('description', $restaurant->description) !!}</textarea>
                            @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Costo Spedizione --}}
                        <div class="form-group">
                            <label class="mt-2" for="delivery_cost">Costo Spedizione</label>
                            <select class="form-select" name="delivery_cost" id="delivery_cost">
                                <option value="0.00" {{old('delivery_cost')=="0.00" ? 'selected' : '' }}>Gratis</option>
                                <option value="1.00" {{old('delivery_cost')=="1.00" ? 'selected' : '' }}>1.00€</option>
                                <option value="1.50" {{old('delivery_cost')=="1.50" ? 'selected' : '' }}>1.50€</option>
                                <option value="2.00" {{old('delivery_cost')=="2.00" ? 'selected' : '' }}>2.00€</option>
                                <option value="2.50" {{old('delivery_cost')=="2.50" ? 'selected' : '' }}>2.50€</option>
                                <option value="3.00" {{old('delivery_cost')=="3.00" ? 'selected' : '' }}>3.00€</option>
                            </select>
                            @error('delivery_cost')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Categoria --}}
                        <div class="form-group">
                            <label class="mt-2" for="categories[]">Categoria: </label>
                            @foreach ($categories as $category)
                            <div class="form-check form-check-inline">
                                @if ($errors->any())
                                <input {{ in_array($category->id, old('categories', [])) ? 'checked' : null }}
                                value="{{ $category->id }}" type="checkbox" name="categories[]"
                                class="form-check-input" id="{{ 'category' . $category->id }}">
                                <label class="form-check-label" for="{{ 'category' . $category->id }}">
                                    {{ $category->name }}
                                </label>
                                @else
                                <input {{ $restaurant->categories->contains($category->id) ? 'checked' : null }}
                                value="{{ $category->id }}" type="checkbox" name="categories[]"
                                class="form-check-input" id="{{ 'category' . $category->id }}">
                                <label class="form-check-label" for="{{ 'category' . $category->id }}">
                                    {{$category->name }}
                                </label>
                                @endif
                            </div>
                            @endforeach
                        </div>

                        {{-- Bottone Invia --}}
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Invia</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection