@extends('layouts.app')


@section('content')
    <main class="min-vh-100">
        @if(isset($message))
            <p class="alert-warning">{{$message}}</p>
        @endif

        <div class="container my-5">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                @if($hotels)
                    @foreach($hotels as $hotel)
                        @include('inc.elements.card.hotelCard')
                    @endforeach
                @endif
            </div>
        </div>
    </main>
@endsection


