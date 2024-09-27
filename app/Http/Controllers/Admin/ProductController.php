<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $products = Product::all();

        return view('Admin.productlist', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.createproduct');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {

        $path = $request->file('thumbnail')->store('thumbnails', 'public');

        $product = Product::create([
            'name' => $request->name,
            'category' => $request->category,
            'description' => $request->description,
            'price' => $request->price,
            'visibility' => $request->visibility,
            'discount' => $request->discount,
            'stock' => $request->stock,
            'thumbnail' => $path,
            'user_id' => Auth::user()->id,
        ]);

        $collecctions = $request->collection;
        if ($collecctions) {
            foreach ($collecctions as $collecction) {

                $image_path = $collecction->store('thumbnails', 'public');

                Image::create([
                    'product_id' => $product->id,
                    'path' => $image_path
                ]);

            }
        }

        return redirect(route('product.create'))->with('msg', 'Add Product Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $product = Product::with('images')->find($id);

        return view('Admin.productpreview', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $product = Product::with('images')->find($id);

        Storage::disk('public')->delete($product->thumbnail);

        $product->delete();

        foreach ($product->images as $image) {
            Storage::disk('public')->delete($image->path);
        }

        return redirect(route('product.index'))->with('msg', 'Delete product successfully.');
    }
}
