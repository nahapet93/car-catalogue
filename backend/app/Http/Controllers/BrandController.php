<?php

namespace App\Http\Controllers;

use App\Http\Resources\BrandResource;
use App\Models\Brand;
use App\Http\Requests\BrandRequest;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return BrandResource::collection(Brand::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandRequest $request): BrandResource
    {
        $brand = Brand::create([
            'name' => $request->name
        ]);

        return BrandResource::make($brand);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandRequest $request, int $id)
    {
        $brand = Brand::find($id);
        $brand->update([
            'name' => $request->name
        ]);

        return BrandResource::make($brand);
    }
}
