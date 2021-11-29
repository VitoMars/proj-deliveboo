@extends('layouts.dashboard')

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
                        <a href="{{ route('admin.categories.show', $category["id"]) }}">{{$category["name"]}}</a>
                        <a class="btn btn-outline-info mx-2" data-mdb-ripple-color="dark" href="{{ route('admin.categories.edit', $category['id']) }}" class="card-link"><i class="far fa-edit"></i></i></a>
                        <!-- Modal button -->
                        <button type="button" class="btn btn-outline-danger mx-2" data-bs-toggle="modal"
                            data-bs-target="#deleteCategory{{$category->id}}">
                            <i class="far fa-trash-alt"></i>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="deleteCategory{{$category->id}}" tabindex="-1"
                            aria-labelledby="deleteCategoryLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteCategoryLabel">
                                            Eliminazione categoria: {{$category->name}}
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Sei sicuro di voler elimanare la categoria?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Annulla</button>
                                        <form method="POST"
                                            action="{{ route('admin.categories.destroy', $category['id']) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Elimina</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection