<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Plate;
use App\User;

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
    
    public function show(Request $request)
    {
        // var_dump($request);
        $food = Plate::where('id', $request->id )->first();

        $data = [
            "success" => true,
            "plates" => $food,
        ];
        return response()->json($data);
    }
}
