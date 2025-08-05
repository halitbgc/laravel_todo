<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use RangeException;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // $categories = Category::all();
        $categories = Category::paginate(20);
        return view('/pages.categories.index', compact('categories')); // compact ile degiskeni gonderiyoruz
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        return view('/pages.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request):RedirectResponse
    {   
        $validated_data = $request->validated();

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
    public function show(Category $category): View
    {
        return view('/pages.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category): View
    {
        return view('/pages.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category): RedirectResponse
    {
        $validated_data = $request->validated();

        $category->update($validated_data);

        return redirect()->back()->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();
        return redirect(route('/pages.categories.index'));

    }
}
