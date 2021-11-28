<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Plate;

class PlateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plates = Plate::all();
        return view('admin.plates.index', compact('plates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $plates = Plate::all();
        // return view("admin.plates.create", compact("plates"));
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
            'img' => 'nullable',
            'restaurant_id' => 'nullable|exists:restaurant,id',
        ]);

        $form_data = $request->all();
        $new_plate = new Plate();
        $new_plate->fill($form_data);

        // Slug
        $slug = Str::slug($new_plate->name, '-');
        $slug_base = $slug;

        $slug_presente = Plate::where('slug', $slug)->first();

        $contatore = 1;

        while ($slug_presente) {
            $slug = $slug_base . '-' . $contatore;
            $slug_presente = Plate::where('slug', $slug)->first();
            $contatore++;
        }

        $new_plate->slug = $slug;
        $new_plate->save();

        return redirect()->route('admin.plates.index');
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
