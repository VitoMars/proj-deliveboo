<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Plate;
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $restaurants = Restaurant::all();
        // $plates = Plate::where('user_id', '=', Auth::user()->id)->get();
        // return view('admin.restaurants.index', compact('restaurants', 'plates'));
        return view('admin.restaurants.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view("admin.restaurants.create", compact("categories"));
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
            'city' => 'nullable|max:20',
            'address' => 'required',
            'description' => 'required',
            'delivery_cost' => 'nullable',
            'cover' => 'nullable|image',
            'category_id' => 'exists:categories,id',
            'user_id' => 'nullable|exists:users,id'
        ]);

        $form_data = $request->all();
        $new_restaurant = new Restaurant();
        // Verifico se è stata caricata un'immagine
        if (array_key_exists("image", $form_data)) {
            // Salviamo l'immagine e recuperiamo il percorso
            $cover_path = Storage::put("restaurants_covers", $form_data["image"]);
            // Aggiungiamo all'array che viene usato nella funzione fill
            // la chiave cover che contiene il percorso relativo dell'immagine caricata a partire da public/storage
            $form_data["cover"] = $cover_path;
        }
        $new_restaurant->fill($form_data);
        $new_restaurant->user_id = Auth::user()->id;

        //Metodo per creare lo slug in automatico
        // $slug = Str::slug($new_restaurant->name);

        // $new_restaurant->slug = $slug;
        $slug = Str::slug($new_restaurant->name, '-');
        $slug_base = $slug;

        $slug_presente = Restaurant::where('slug', $slug)->first();

        $contatore = 1;

        while ($slug_presente) {
            $slug = $slug_base . '-' . $contatore;
            $slug_presente = Restaurant::where('slug', $slug)->first();
            $contatore++;
        }

        $new_restaurant->slug = $slug;
        $new_restaurant->save();

        $new_restaurant->categories()->attach($form_data['categories']);

        // return redirect()->route('admin.restaurants.index')->with('status', 'Il ristorante è stato inserito correttamente.');
        return redirect()->route('admin.index');
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

        return view('admin.restaurants.show', compact('restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     *
     *  @param  Restaurant $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        if (!$restaurant) {
            abort(404);
        }
        $categories = Category::all();
        return view("admin.restaurants.edit", compact("restaurant", "categories"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     * @param  Restaurant $restaurant
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        $request->validate([
            'name' => 'required|max:50',
            'city' => 'nullable|max:20',
            'address' => 'required',
            'description' => 'required',
            'delivery_cost' => 'nullable',
            'category_id' => 'exists:categories,id',
            'user_id' => 'nullable|exists:users,id',
        ]);

        $form_data = $request->all();
        if ($form_data['name'] != $restaurant->name) {
            //è stato modificato il titoo, quindi devo modificare anche lo slug
            $slug = Str::slug($form_data['name'], '-');
            // $slug_base = $slug;

            $slug_presente = Restaurant::where('slug', $slug)->first();

            $contatore = 1;

            while ($slug_presente) {
                $slug = $slug . '-' . $contatore;
                $slug_presente = Restaurant::where('slug', $slug)->first();
                $contatore++;
            }
            $form_data['slug'] = $slug;
        }

        $restaurant->update($form_data);
        if (array_key_exists('categories', $form_data)) {
            $restaurant->categories()->sync($form_data['categories']);
        } else {
            $restaurant->categories()->sync([]);
        }
        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Restaurant $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        $restaurant->categories()->detach($restaurant->id);
        $restaurant->delete();

        return redirect()->route('admin.index')->with('status', 'Ristorante eliminato');
    }
}
