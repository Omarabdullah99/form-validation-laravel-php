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
        Product::create($validated);
        return redirect()->back()->with('success', 'Product saved successfully');
    }
}
