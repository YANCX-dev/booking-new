<div class="col">
    <div class="card h-100">
        <img src="https://via.placeholder.com/150" class="card-img-top" alt="Example Image">
        <div class="card-body d-flex flex-column">
            <p class="card-text">Room type:{{$room->room_type}}</p>
            <p class="card-text">Name: {{$room->name}}</p>
            <a href="{{route('bookTheNumber', $room->id)}}">
                <button class="btn btn-primary mt-auto w-100">To book</button>
            </a>
        </div>
    </div>
</div>
