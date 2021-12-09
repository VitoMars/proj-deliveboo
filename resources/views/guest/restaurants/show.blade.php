@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <div class="row">
    
        <div id="app">
            <vue-App></vue-App>
            <div>{{ $restaurant }}</div>
        </div>
            <script src="{{ mix('js/main.js') }}"></script>
    </div>
    @endsection

   