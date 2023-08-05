<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePhotoProductRequest;
use App\Http\Requests\UpdatePhotoProductRequest;
use App\Models\PhotoProduct;

class PhotoProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePhotoProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PhotoProduct $photoProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePhotoProductRequest $request, PhotoProduct $photoProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PhotoProduct $photoProduct)
    {
        //
    }
}
