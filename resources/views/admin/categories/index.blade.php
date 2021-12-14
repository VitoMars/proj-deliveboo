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

        <div class="my-text-blue fw-bold fs-1 mb-3 pr-0 pl-0">
            Lista Categorie
        </div>

        {{-- Lista Categorie --}}
        <div class="col-md-12">
            <div class="card mb-3">
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