<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    public function index()
    {

    $products=Product::query()->with('category')->paginate(10);

    return view('product.index', compact('products')); //envoi products vers index.blade.php


    }

    public function create()
    {
        $product = new Product();
        $categories = Category::all();
         return view('product.create', compact('product','categories'));
    }

    public function store(ProductRequest $request)
    {
         $data=$request-> validated();
        // Vérifier si une image a été téléchargée
         if ($request->hasFile('image')){
                $data['image'] = $request->file('image')->store('product', 'public');
            }
            // Créer le produit dans la base de données
        Product::create($data);
        return redirect()->route('products.index')->with('success','product created succefully');

     }

    public function edit(Product $product)
    {
                $categories=Category::all();
                return view('product.edit',compact('product','categories'));
    }

    public function update(ProductRequest $request, Product $product)
    {
         $data = $request->validated();
             // Vérification de l'image
         if ($request->hasFile('image')) {
        // Delete the old image
        if ($product->image && Storage::exists('public/' . $product->image)) {
            Storage::delete('public/' . $product->image);
        }
        // enregistrer nouveau image
        $data['image'] = $request->file('image')->store('product', 'public');
     }
        // Mise à jour du produit
        $product->fill($data)->save();
    return redirect()->route('products.index')->with('success', 'Product updated successfully');


    }


    public function destroy(Product $product)
    {
        $product->delete();
        return to_route('products.index')->with('success','product deleted successfully');
   }
}
