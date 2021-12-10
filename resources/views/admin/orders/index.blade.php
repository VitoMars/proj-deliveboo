@extends('layouts.dashboard')

@section('title',' | Ordini')

@section('content')
<div class="container-fluid mt-5">
    <div class="row">
        @if (session('status'))
        <div class="alert alert-success w-100">
            {{ session('status') }}
        </div>
        @endif
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header pr-0 pl-0">
                    Lista ordini
                </div>
                <ol>
                    @foreach ($orders as $order)
                    <li class="m-2">
                        <a href="{{ route('admin.orders.show', $order['id']) }}">
                            {{$order["guest_name"] ." - ".$order["address"]}}
                        </a>
                    </li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection