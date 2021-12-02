<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Plate;
use App\Restaurant;
use Illuminate\Support\Facades\Auth;

class PlateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {      

        $userRestaurant = Restaurant::where('user_id', Auth::user()->id)->first();

        return view('admin.plates.index')->with('plates', $userRestaurant->plates );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.plates.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'description' => 'required',
            'menu_category' => 'required|max:20',
            'price' => 'required',
            'visibility' => 'required',
            'rating' => 'nullable',
            'cover' => 'nullable|image',
            'restaurant_id' => 'nullable|exists:restaurant,id',
        ]);

        $form_data = $request->all();
        $new_plate = new Plate();
        // Verifico se è stata caricata un'immagine
        if (array_key_exists("image", $form_data)) {
            // Salviamo l'immagine e recuperiamo il percorso
            $cover_path = Storage::put("plate_covers", $form_data["image"]);
            // Aggiungiamo all'array che viene usato nella funzione fill
            // la chiave cover che contiene il percorso relativo dell'immagine caricata a partire da public/storage
            $form_data["cover"] = $cover_path;
        }

        $new_plate->fill($form_data);
        // $new_plate->restaurant_id = Restaurant::all()->13;
        $userRestaurant = Restaurant::where('user_id', Auth::user()->id)->first();
        $new_plate->restaurant_id = $userRestaurant->id;



        $new_plate->save();

        return redirect()->route('admin.restaurants.show', $userRestaurant->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  Plate $plate
     * @return \Illuminate\Http\Response
     */
    public function show(Plate $plate)
    {
        if (!$plate) {
            abort(404);
        }

        return view('admin.plates.show', compact('plate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Plate $plate
     * @return \Illuminate\Http\Response
     */
    public function edit(Plate $plate)
    {
        if (!$plate) {
            abort(404);
        }
        return view("admin.plates.edit", compact("plate"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Plate $plate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plate $plate)
    {
        $request->validate([
            'name' => 'required|max:50',
            'description' => 'required',
            'menu_category' => 'required|max:20',
            'price' => 'required',
            'visibility' => 'required',
            'rating' => 'nullable',
            'img' => 'nullable',
            'restaurant_id' => 'nullable|exists:restaurant,id',
        ]);

        $form_data = $request->all();

        $plate->update($form_data);

        return redirect()->route('admin.plates.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Plate $plate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plate $plate)
    {
        $plate->delete();

        $userRestaurant = Restaurant::where('user_id', Auth::user()->id)->first();


        return redirect()->route('admin.restaurants.show', $userRestaurant['id'])->with('status', 'Piatto eliminato.');
    }
}
