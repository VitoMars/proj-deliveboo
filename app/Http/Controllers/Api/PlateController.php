<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Plate;

class PlateController extends Controller
{
    public function index($slug)
    {
        $user = User::where('slug', $slug)->first();
        $food = Plate::where('user_id', $user->id)->get();
        // $plate = Plate::all();
        $data = [
            "success" => true,
            "plates" => $food,
        ];
        return response()->json($data);
    }
}
