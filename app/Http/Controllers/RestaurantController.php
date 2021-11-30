<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;

class RestaurantController extends Controller
{
    public function index()
    {
        // $restaurants = Restaurant::all();
        $restaurants = Restaurant::all();
        return view('guest.restaurants', compact('restaurants'));
    }
}
