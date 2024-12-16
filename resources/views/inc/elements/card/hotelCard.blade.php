<div class="col">
    <div class="card h-100">
        <img src="https://via.placeholder.com/150" class="card-img-top" alt="Example Image">
        <div class="card-body d-flex flex-column">
            <h5 class="card-title">Hotel:{{$hotel->name}}</h5>
            <p class="card-text">Country:{{$hotel->country_name}}</p>
            <p class="card-text">Rating: {{$hotel->rating}}</p>
            <a href="{{route('showHotelCard', $hotel->id)}}">
                <button class="btn btn-primary mt-auto w-100">Show rooms</button>
            </a>
        </div>
    </div>
</div>





