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

        {{-- Lista Piatti --}}
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header pr-0 pl-0">
                    Lista piatti
                </div>
                <ul>
                    @foreach ($plates as $plate)
                    <li>
                        {{-- Show --}}
                        <a href="{{ route(" admin.plates.show", $plate["id"]) }}"> {{$plate["name"]}}</a> -
                        {{-- Edit --}}
                        <a href="{{ route('admin.plates.edit' , $plate['id']) }}">Edit</a>
                        {{-- Detete --}}
                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                            data-bs-target="#deletePlate{{$plate->id}}">
                            Delete
                        </button>

                        {{-- Modal Button Delete --}}
                        <div class="modal fade" id="deletePlate{{$plate->id}}" tabindex="-1"
                            aria-labelledby="deletePlateLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deletePlateLabel">Eliminazione piatto:
                                            {{$plate->name}}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Sei sicuro di voler elimanare il piatto?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Annulla</button>
                                        <form method="POST" action="{{ route('admin.plates.destroy', $plate['id']) }}">
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