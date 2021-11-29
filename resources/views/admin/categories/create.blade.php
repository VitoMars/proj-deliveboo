@extends('layouts.dashboard')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 d-flex flex-column">
            <div class="card mb-3">
                <div class="card-header py-0 px-4">
                    <h2 class="mt-3 mb-3">Aggiungi Categoria</h2>
                </div>
                <div class="card-body d-flex flex-column py-3 px-4">
                    <form action="{{ route('admin.categories.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        {{-- Nome --}}
                        <div class="form-group">
                            <label class="mt-2" for="name">Nome Categoria</label>
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
                            @error('name')
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