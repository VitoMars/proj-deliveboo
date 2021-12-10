@extends('layouts.dashboard')

@section('title',' | Categorie')

@section('content')
<div class="container-fluid mt-5">
    <div class="row">
        {{-- Alert Modifica --}}
        @if (session('status'))
        <div class="alert alert-success w-100">
            {{ session('status') }}
        </div>
        @endif

        {{-- Lista Categorie --}}
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header pr-0 pl-0">
                    Lista categorie
                </div>
                <ol>
                    @foreach ($categories as $category)
                    <li class="m-2">
                        {{-- Show --}}
                        <a href="{{ route('admin.categories.show', $category['id']) }}">{{$category["name"]}}</a>
                    </li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection