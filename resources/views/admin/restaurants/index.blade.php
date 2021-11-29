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

        {{-- Lista Ristoranti --}}
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header pr-0 pl-0">
                    Lista ristoranti
                </div>
                <ul>
                    @foreach ($restaurants as $restaurant)
                    <li class="my-3">
                        {{-- Show --}}
                        <a href="{{route('admin.restaurants.show', $restaurant["id"])}}">{{$restaurant["name"]}}</a>
                        {{-- Edit --}}
                        <a class="btn btn-outline-info mx-2" data-mdb-ripple-color="dark" href="{{ route('admin.restaurants.edit', $restaurant['id']) }}" class="card-link"><i class="far fa-edit"></i></i></a>
                        {{-- Delete --}}
                        <button type="button" class="btn btn-outline-danger mx-2" data-bs-toggle="modal"
                            data-bs-target="#deleteRestaurant{{$restaurant->id}}">
                            <i class="far fa-trash-alt"></i>
                        </button>

                        <!-- Modal Delete Button -->
                        <div class="modal fade" id="deleteRestaurant{{$restaurant->id}}" tabindex="-1"
                            aria-labelledby="deleteRestaurantLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteRestaurantLabel">
                                            Eliminazione ristorante: {{$restaurant->name}}
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close">
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Sei sicuro di voler elimanare il ristorante?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                            Annulla
                                        </button>
                                        <form method="POST"
                                            action="{{ route('admin.restaurants.destroy', $restaurant['id']) }}">
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