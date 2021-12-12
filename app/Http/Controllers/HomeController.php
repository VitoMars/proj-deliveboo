<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::all();
        return view('guest.home', compact('categories'));
    }

    public function profile()
    {
        return view('guest.home');
    }

    public function generateToken() {
        $api_token = Str::random(80);

        $user = Auth::user();

        $user->api_token = $api_token;
        $user->save();

        return redirect()->route('generate-token');
    }
}
