<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('/categories.index', compact('categories')); // compact ile degiskeni gonderiyoruz
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('/categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $validated_data = $request->validate([
            'name' => 'required|max:100',
            'color' => 'nullable|max:7',
            'description' => 'nullable|max:255'
        ]);

        /*
        $name = $request->input('name');
        $color = $request->input('color');
        $description = $request->input('description');
        // Category modelini kullanarak yeni kategori olusturuyoruz
        */
        
        Category::create($validated_data);

        return redirect()->back()->with('success', 'Category created succesfly.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        // laravel arkada idden categoryi kendisi bulur
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // kategoriyi siler
        $category->delete();
        return redirect(route('categories.index'));

    }
}
