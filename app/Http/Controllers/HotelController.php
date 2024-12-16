<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function show(int $id)
    {
        $AVAILABLE = 'available';
        $hotelName = Hotel::where('id', $id)->value('name');
        $numbersOfHotel = Room::where('hotel_id', $id)->where('status', $AVAILABLE )->get();

        if (count($numbersOfHotel) <= 0 ) {
            return redirect()->route('home')->with('message', 'No one is available for this hotel');
        }

        return view('inc.elements.card.showHotelCard', compact('numbersOfHotel','hotelName'));
    }

    public function book()
    {
        return 'BOOKED SUCCESSFULLY';
    }
}
