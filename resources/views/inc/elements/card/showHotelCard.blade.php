@extends('layouts.app')

@section('content')
    <div class="min-vh-100">

        <div class="container">

            <h1 class="mb-5 mt-2">Available rooms in {{$hotelName}}</h1>

            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                @foreach($numbersOfHotel as $room)
                    @include('inc.elements.card.roomCard')
                @endforeach
            </div>

        </div>
    </div>
@endsection
