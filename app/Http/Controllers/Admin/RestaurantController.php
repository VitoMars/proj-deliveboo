<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Restaurant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Category;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::all();
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
            'speciality' => 'required|max:20',
            'user_id' => 'nullable|exists:users,id'
        ]);

        $form_data = $request->all();
        $new_restaurant = new Restaurant();
        $new_restaurant->fill($form_data);

        //Metodo per creare lo slug in automatico
        // $slug = Str::slug($new_restaurant->name);

        // $new_restaurant->slug = $slug;
        $slug = Str::slug($new_restaurant->title, '-');
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
        return redirect()->route('admin.restaurants.index');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
