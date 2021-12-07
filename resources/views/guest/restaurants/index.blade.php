@extends('layouts.app')

@section('content')
<div class="container mt-3">

   {{-- SLIDER --}}
   <div class="text-white fw-bold fs-5 mb-1 my-text-shadow pr-0 pl-0">
      Scegli una categoria
   </div>

   <div class="container testimonial-group scroll mb-3">

      <div class="row text-center py-2 px-1">
         @foreach ($categories as $category)
            <div class="col-2 py-0 px-1">
               <a href="{{ route('categories.show', $category['id']) }}">
                  <img class="w-100" src="{{ asset('images/categories/' . $category->slug . '.png') }}" alt="{{$category->name}} banner">
                  <h3>{{$category->name}}</h3>
               </a>
            </div>
         @endforeach
      </div>
    </div>


   {{-- SLIDER --}}


   <div class="row">
      {{-- Lista Ristoranti --}}
      <div class="col-md-12">
         {{-- <div class="card border-0 my-shadow mb-3"> --}}
         <div class="mb-3">
            {{-- <div class="card-header my-bg-blue text-white fw-bold pr-0 pl-0"> --}}
            <div class="text-white fw-bold fs-1 mb-3 my-text-shadow pr-0 pl-0">
               Ristoranti
            </div>
            {{-- <div class="card-body w-100"> --}}
            <div class="w-100">
               <div class="row py-2 g-4">
                  @foreach ($restaurants as $restaurant)
                  <div class="col-3">
                     <a style="height: 350px" href="{{ route('restaurants.show', $restaurant->id) }}" class="card my-card py-2 d-flex flex-column justify-content-center align-items-center">
                        <div class="card-logo d-flex align-items-center justify-content-center">
                           <img class="w-100" src="{{ asset('images/logo-restaurant-default.png') }}" alt="{{ $restaurant->name}} Logo">
                        </div>
                        <div class="card-body w-100 d-flex flex-column">
                           <h3 class="fs-4">{{$restaurant->name}}</h3>
                              <p class="restaurant-description text-dark">{{$restaurant->description}}</p>
                              <div class="restaurant-category-list">

                                 @foreach ($restaurant->categories as $category)
                                 <span class="mx-2">{{$category->name}}  </span>
                                 @endforeach
                              </div>
                        </div>
                     </a>
                  </div>
                  @endforeach
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection