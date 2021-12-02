@extends('layouts.app')

@section('content')
<div class="container mt-3">
   <div class="row">
      {{-- Lista Ristoranti --}}
      <div class="col-md-12">
         <div class="card mb-3">
            <div class="card-header pr-0 pl-0">
               Lista ristoranti
            </div>
            <ol class="m-2">
               @foreach ($restaurants as $restaurant)
               <li class="my-3">
                  <a href="{{ route('restaurants.show', $restaurant->id) }}">{{$restaurant["name"]}}</a>
               </li>
               @endforeach
            </ol>
         </div>
      </div>
   </div>
</div>
@endsection