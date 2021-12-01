<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\Plate;

class RestaurantController extends Controller
{
    public function index()
    {

        $plates = Plate::all();
        $restaurants = Restaurant::all();
        return view('guest.restaurants.index', compact('restaurants', 'plates'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Restaurant $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        if (!$restaurant) {
            abort(404);
        }
        // dd(Restaurant::find(2)->load('plates', 'categories'));
        return view('guest.restaurants.show', compact('restaurant'));
    }
}
