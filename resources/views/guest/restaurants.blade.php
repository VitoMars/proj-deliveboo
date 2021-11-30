@extends('layouts.dashboard')

@section('content')
<div class="container-fluid mt-100">
   <div class="row">
      {{-- Lista Ristoranti --}}
      <div class="col-md-12">
         <div class="card mb-3">
            <div class="card-header pr-0 pl-0">
               Lista ristoranti
            </div>
            <ul>
               @foreach ($restaurants as $restaurant)
               <li class="my-3">
                  <a href="">{{$restaurant["name"]}}</a>
               </li>
               @endforeach
            </ul>
         </div>
      </div>
   </div>
</div>
@endsection