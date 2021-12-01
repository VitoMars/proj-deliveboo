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
        return view('guest.restaurants.index', compact('restaurants'));
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

        return view('guest.restaurants.show', compact('restaurant'));
    }
}

