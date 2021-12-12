@extends('layouts.dashboard')

@section('title',' | I tuoi Piatti')

@section('content')
<div class="container-fluid mt-5">
    <div class="row">
        {{-- Alert Modifica --}}
        @if (session('status'))
        <div class="alert alert-success w-100">
            {{ session('status') }}
        </div>
        @endif

        <a href="{{ route('admin.plates.create') }}">
            <button type="button" class="my-btn-blue btn my-4 text-white">Aggiungi Piatto</button>
        </a>

        {{-- Lista Piatti --}}
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header pr-0 pl-0">
                    Lista piatti
                </div>
                <ul>
                    @foreach ($plates as $plate)
                    <li class="my-3">
                        {{-- Show --}}
                        <a href="{{ route('admin.plates.show', $plate['id']) }}"> {{$plate["name"]}}</a>

                        {{-- Visibilty --}}
                        <div class="form-check form-switch">
                            <input onclick="MyFunction()" class="form-check-input" type="checkbox" role="switch" id="visibilitySwitch" checked>
                            <label class="form-check-label" for="visibilitySwitch">Checked switch checkbox input</label>
                          </div>


                        {{-- Edit --}}
                        <a class="btn btn-outline-info mx-2" data-mdb-ripple-color="dark"
                            href="{{ route('admin.plates.edit', $plate['id']) }}" class="card-link">
                            <i class="far fa-edit"></i>
                        </a>
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
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
    function myFunction() {
       var element = document.getElementById("visibility");
       element.classList.toggle("visibility-off");
    }
</script>
@endsection