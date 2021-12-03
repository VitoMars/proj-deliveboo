<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Restaurant;
use App\Category;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        // $restaurants = Restaurant::all();
        $restaurant = Restaurant::where('user_id', '=', Auth::user()->id)->first();      
        return view('admin.index', compact('restaurant'));
    }
}
