@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 d-flex flex-column">
                <div class="card  mb-3 ">
                    <div class="card-header -dark py-0 px-4">
                        <h2 class="mt-2 mb-3 restaurants"> Crea nuovo Ristorante</h2>
                    </div>
                    <div class="card-body d-flex flex-column py-3  px-4">
                        <form action="{{ route('admin.restaurants.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <label class="mt-2" for="name">Nome</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="mt-2" for="address">Indirizzo</label>
                                <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" value="{{old('address')}}">
                                @error('address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="mt-2" for="address">Descrizione</label>
                                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{!!old('description')!!}</textarea>
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>                            
                            <div class="form-group">
                                <label class="mt-2" for="delivery_cost">Costo Spedizione</label>
                                <select class="form-select" name="delivery_cost" id="delivery_cost" aria-label="Default select example">
                                    <option value="0.00"> Gratis</option>
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
                            <div class="form-group">
                                <label class="mt-2" for="address">Categoria</label>
                                @foreach ($categories as $category)
                                <div class="form-check form-check-inline">
                                    <input {{in_array($category->id, old('categories', [])) ? 'checked' : null}}
                                    value="{{ $category->id }}" type="checkbox" name="categories[]" class="form-check-input" id="{{'category' . $category->id}}">
                                    <label class="form-check-label" for="{{'category' . $category->id}}">{{ $category->name }}</label>
                                </div>
                                @endforeach
                            </div>
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