<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function index()
    {
        return view('product.store');
    }

    function store(StoreProductRequest $request)
    {
        $validated = $request->validated();
        if ($request->hasFile('product_image')) {

            $image = $request->file('product_image');
            $orginalName = $image->getClientOriginalName();
            $imagePath = $request->file('product_image')->storeAs('product_images',$orginalName, 'public');
            $validated['product_image'] = $imagePath;
        }
        Product::create($validated);
        return redirect()->back()->with('success', 'Product saved successfully');
    }

    function show()
    {
        return Product::all();
    }
}
