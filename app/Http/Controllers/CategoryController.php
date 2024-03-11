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
        $cats = Category::paginate(6);
        return view('category.index', ['cats' => $cats]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
           'name' => 'required|unique:categories'
        ]);

        $cat_name = $request->name;

        $cat = Category::create([
            'name' => $cat_name
        ]);

        return back()->with(['status' => 'Category created successfully.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
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
    public function update(Request $request)
    {
        $id = $request->get('id');

        $request->validate([
            'name' => 'required|unique:categories,name,' . $id
        ]);

        $cat_name = $request->get('name');

        $cat = Category::find($id);
        $cat->update(['name' => $cat_name]);
        return back()->with(['status' => 'Category updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->get('id');
        $cat = Category::find($id);
        $cat->delete();

        return back()->with(['status' => 'Category deleted successfully.']);
    }
}
