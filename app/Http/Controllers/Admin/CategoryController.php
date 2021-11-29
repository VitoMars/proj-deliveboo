<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.categories.create");
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
            'name' => 'required'
        ]);

        $form_data = $request->all();
        $new_category = new Category();
        $new_category->fill($form_data);

        //Metodo per creare lo slug in automatico
        // $slug = Str::slug($new_category->name);

        // $new_category->slug = $slug;
        $slug = Str::slug($new_category->name, '-');
        $slug_base = $slug;

        $slug_presente = Category::where('slug', $slug)->first();

        $contatore = 1;

        while ($slug_presente) {
            $slug = $slug_base . '-' . $contatore;
            $slug_presente = Category::where('slug', $slug)->first();
            $contatore++;
        }

        $new_category->slug = $slug;
        $new_category->save();

        // return redirect()->route('admin.categories.index')->with('status', 'Il ristorante è stato inserito correttamente.');
        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        if (!$category) {
            abort(404);
        }

        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        if (!$category) {
            abort(404);
        }
        return view("admin.categories.edit", compact("category"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $form_data = $request->all();

        if ($form_data['name'] != $category->name) {
            //è stato modificato il titoo, quindi devo modificare anche lo slug
            $slug = Str::slug($form_data['name'], '-');
            // $slug_base = $slug;

            $slug_presente = Category::where('slug', $slug)->first();

            $contatore = 1;

            while ($slug_presente) {
                $slug = $slug . '-' . $contatore;
                $slug_presente = Category::where('slug', $slug)->first();
                $contatore++;
            }
            $form_data['slug'] = $slug;
        }

        $category->update($form_data);

        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Category $category  
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.categories.index')->with('status', 'Categoria eliminata.');
    }
}
