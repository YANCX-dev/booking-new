<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $hotels = Hotel::all();

        if(!$hotels->isEmpty()){
            return view('home', compact('hotels'));
        }

        return view('home');

    }
}
