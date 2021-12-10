<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
        
        return response()->json([
            'success' => true,
            'results' => $categories
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $categories = Category::where('slug', $slug)->first();
        return response()->json([
            'success' => true,
            'results' => $categories
        ]);
    }
}
