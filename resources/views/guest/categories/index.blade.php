@extends('layouts.app')

@section('content')
<div class="container-fluid mt-100">
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
                <ul>
                    @foreach ($categories as $category)
                    <li class="my-3">
                        {{-- Show --}}
                        <a href="{{ route('categories.show', $category['id']) }}">{{$category["name"]}}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection