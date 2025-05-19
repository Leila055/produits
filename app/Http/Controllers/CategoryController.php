<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories=Category::all();
    return view('category.index', compact('categories'));

    }
    public function create()
    {
        return view('category.create');
    }
    public function store(Request $request)
    {
        $data=$request-> validate([
         'name'=>'required'
        ]);
        Category::create($data);
        return redirect()->route('categories.index')->with('success','product created succefully');

    }
    public function show(Category $category)
    {
        $products= $category->products()->get();  // envoi des produits vers la vue catgory/index.blade.php
        return view('category.show',compact('category','products'));
    }
    public function edit(Category $category)
    {
       return view('category.edit',compact('category'));
    }
    public function update(Request $request, Category $category)
    {
         $data=$request-> validate([
         'name'=>'required'
        ]);
        $category->update($data);
        return redirect()->route('categories.index')->with('success','product updated successfully');

    }


    public function destroy(Category $category)
    {
         $category->delete();
        return redirect()->route('categories.index')->with('success','product deleted successfully');

    }
}
