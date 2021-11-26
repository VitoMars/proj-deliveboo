@extends('layouts.dashboard')
@section('title', 'Edit restaurant')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <article>
                    <h1>Modifica restaurant</h1>
                    <form action="{{ route('admin.restaurants.update', $restaurant->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label class="mt-2" for="name">Nome</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', $restaurant->name) }}">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="mt-2" for="address">Indirizzo</label>
                            <input type="text" name="address" id="address"
                                class="form-control @error('address') is-invalid @enderror"
                                value="{{ old('address', $restaurant->address) }}">
                            @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="mt-2" for="address">Descrizione</label>
                            <textarea name="description" id="description"
                                class="form-control @error('description') is-invalid @enderror">{!! old('description', $restaurant->description) !!}</textarea>
                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="mt-2" for="address">Costo Spedizione</label>
                            <select class="form-select" name="delivery_cost" id="delivery_cost"
                                >
                                <option value="0.00" {{ old('delivery_cost') == 0.00 ? 'selected' : null }}>
                                    Gratis</option>
                                <option value="1.00" {{ old('delivery_cost') == 1.00 ? 'selected' : null }}>1.00€</option>
                                <option value="1.50" {{ old('delivery_cost') == 1.50 ? 'selected' : null }}>1.50€</option>
                                <option value="2.00" {{ old('delivery_cost') == 2.00 ? 'selected' : null }}>2.00€</option>
                                <option value="2.50" {{ old('delivery_cost') == 2.50 ? 'selected' : null }}>2.50€
                                </option>
                                <option value="3.00" {{ old('delivery_cost') == 3.00 ? 'selected' : null }}>3.00€
                                </option>
                            </select>
                            @error('delivery_cost')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label class="mt-2" for="address">Categoria</label>
                            @foreach ($categories as $category)
                                <div class="form-check form-check-inline">
                                    @if ($errors->any())
                                        <input {{ in_array($category->id, old('categories', [])) ? 'checked' : null }}
                                            value="{{ $category->id }}" type="checkbox" name="categories[]"
                                            class="form-check-input" id="{{ 'category' . $category->id }}">
                                        <label class="form-check-label"
                                            for="{{ 'category' . $category->id }}">{{ $category->name }}</label>
                                    @else
                                        <input {{ $restaurant->categories->contains($category->id) ? 'checked' : null }}
                                            value="{{ $category->id }}" type="checkbox" name="categories[]"
                                            class="form-check-input" id="{{ 'category' . $category->id }}">
                                        <label class="form-check-label"
                                            for="{{ 'category' . $category->id }}">{{ $category->name }}</label>
                                    @endif
                                </div>
                            @endforeach
                        </div>

                        {{-- @foreach ($tags as $tag)
                            <div class="form-check form-check-inline">
                                @if ($errors->any())
                                    <input {{ in_array($tag->id, old('tags', [])) ? 'checked' : null }}
                                        value="{{ $tag->id }}" type="checkbox" name="tags[]" class="form-check-input"
                                        id="{{ 'tag' . $tag->id }}">
                                    <label class="form-check-label text-white"
                                        for="{{ 'tag' . $tag->id }}">{{ $tag->name }}</label>
                                @else
                                    <input {{ $post->tags->contains($tag->id) ? 'checked' : null }}
                                        value="{{ $tag->id }}" type="checkbox" name="tags[]" class="form-check-input"
                                        id="{{ 'tag' . $tag->id }}">
                                    <label class="form-check-label text-white"
                                        for="{{ 'tag' . $tag->id }}">{{ $tag->name }}</label>
                                @endif
                            </div>
                        @endforeach --}}

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Invia</button>
                        </div>
                    </form>
                </article>

            </div>
        </div>
    </div>
@endsection
