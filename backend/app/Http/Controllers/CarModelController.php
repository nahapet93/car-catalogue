<?php

namespace App\Http\Controllers;

use App\Http\Resources\CarModelResource;
use App\Models\CarModel;
use App\Http\Requests\CarModelRequest;

class CarModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CarModelResource::collection(CarModel::with([
            'brand',
            'exteriorColor',
            'interiorColor',
            'engineType',
            'transmissionType',
        ])->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarModelRequest $request)
    {
        $model = CarModel::create([
            'name' => $request->name,
            'year' => $request->year,
            'price' => $request->price,
            'brand_id' => $request->brandId,
            'engine_type_id' => $request->engineTypeId,
            'transmission_type_id' => $request->transmissionTypeId,
            'exterior_color_id' => $request->exteriorColorId,
            'interior_color_id' => $request->interiorColorId,
        ]);

        return CarModelResource::make($model);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarModelRequest $request, int $id)
    {
        $model = CarModel::find($id);
        $model->update([
            'name' => $request->name,
            'year' => $request->year,
            'price' => $request->price,
            'brand_id' => $request->brandId,
            'engine_type_id' => $request->engineTypeId,
            'transmission_type_id' => $request->transmissionTypeId,
            'exterior_color_id' => $request->exteriorColorId,
            'interior_color_id' => $request->interiorColorId,
        ]);

        return CarModelResource::make($model);
    }
}
