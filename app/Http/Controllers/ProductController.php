<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

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
            $imagePath = $request->file('product_image')->storeAs('product_images', $orginalName, 'public');
            $validated['product_image'] = $imagePath;
        }
        Product::create($validated);
        return redirect()->back()->with('success', 'Product saved successfully');
    }

    // function single(Request $request,  Product $product)
    // {
    //     try {
    //         return $product;
    //     } catch (\Exception $e) {
    //         //throw $th;
    //         dd($e->getMessage());
    //     }
    // }

    function single(Request $request, $id)
    {

            $product = Product::findOrFail($id);
            return $product;

    }
}
