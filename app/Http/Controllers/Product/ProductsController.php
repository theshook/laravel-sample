<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use App\Http\Requests\StorePhotoProductRequest;
use App\Models\Product;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->success(
            Product::with('photos')->paginate(request()->query('sizePerPage', 25)),
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $product = Product::create($request->validated());

        return $this->success(
            $product,
            'Product created successfully',
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return $this->success($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->validated());

        return $this->success(
            $product,
            'Product updated successfully',
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return $this->success(
            null,
            'Product deleted successfully',
            204
        );
    }

    public function upload(StorePhotoProductRequest $request, Product $product)
    {
        if ($request->file('photo')) {
            $file = $request->file('photo');

            $name = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $url = $file->storeAs('products', $name);

            $product->photos()->create([
                'name' => $name,
                'extension' => $extension,
                'url' => $url,
            ]);
        }

        return $product->load('photos');
    }
}
