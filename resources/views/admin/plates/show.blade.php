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

        {{-- Dettaglio Piatti --}}
        <div class="col-md-12">
            <div class="card mb-3">
                {{-- Detete --}}
                <button type="button" class="btn btn-outline-danger mx-2" data-bs-toggle="modal"
                data-bs-target="#deletePlate{{$plate->id}}">
                    <i class="far fa-trash-alt"></i>
                </button>

                {{-- Modal Button Delete --}}
                <div class="modal fade" id="deletePlate{{$plate->id}}" tabindex="-1"
                    aria-labelledby="deletePlateLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deletePlateLabel">
                                    Eliminazione piatto: {{$plate->name}}
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-body">
                                Sei sicuro di voler elimanare il piatto?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                    Annulla
                                </button>
                                <form method="POST" action="{{ route('admin.plates.destroy', $plate['id']) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger text-white">Elimina</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-header pr-0 pl-0">
                    Dettaglio Piatti
                </div>
                <ul>
                    @if($plate->cover)
                    <img class="img-thumbnail my-3" style="max-height: 300px" src="{{ asset('storage/'. $plate->cover)}}">
                    @endif
                    <li><strong>Nome Piatto: </strong>{{$plate["name"]}}</li>
                    <li><strong>Descrizione: </strong>{{$plate["description"]}}</li>
                    <li><strong>Prezzo: </strong>{{$plate["price"]}}€</li>
                    <li><strong>Categoria Piatto: </strong>{{$plate["menu_category"]}}</li>
                    <li><strong>Valutazione: </strong>
                        @if ($plate["rating"])
                        {{$plate["rating"]}}/5
                        @else
                        Non disponibile
                        @endif
                    </li>
                    <li><strong>Visibilità: </strong>
                        @if ($plate["visibility"]=="1")
                        Si
                        @else
                        No
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection