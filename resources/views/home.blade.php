@extends('layouts.app')


    @section('content')
        <main class="flex-grow-1 min-vh-100">
        <div class="container">
            @if($hotels)
                @foreach($hotels as $hotel)
                    @include('inc.elements.hotelCard')
                @endforeach
            @endif
        </div>
        </main>
    @endsection


