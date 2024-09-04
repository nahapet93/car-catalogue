<?php

namespace App\Repositories;

use App\Http\Requests\CarModelRequest;
use App\Http\Resources\CarModelResource;
use App\Interfaces\CarModelRepositoryInterface;
use App\Models\CarModel;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CarModelRepository implements CarModelRepositoryInterface {
    public function list(Request $request): ResourceCollection
    {
        $query = CarModel::with([
            'brand',
            'exteriorColor',
            'interiorColor',
            'engineType',
            'transmissionType',
        ]);

        if ($request->get('brandId')) {
            $query->where(['brand_id' => $request->get('brandId')]);
        }

        if ($request->get('exteriorColorId')) {
            $query->where(['exterior_color_id' => $request->get('exteriorColorId')]);
        }

        if ($request->get('interiorColorId')) {
            $query->where(['interior_color_id' => $request->get('interiorColorId')]);
        }

        if ($request->get('name')) {
            $query->where('name', 'LIKE', $request->get('name') . '%');
        }

        if ($request->get('year')) {
            $query->where(['year' => $request->get('year')]);
        }

        return CarModelResource::collection($query->get());
    }

    public function store(CarModelRequest $request): CarModelResource
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

    public function update(CarModelRequest $request, int $id): JsonResponse|CarModelResource
    {
        try {
            $model = tap(CarModel::findOrFail($id))->update([
                'name' => $request->name,
                'year' => $request->year,
                'price' => $request->price,
                'brand_id' => $request->brandId,
                'engine_type_id' => $request->engineTypeId,
                'transmission_type_id' => $request->transmissionTypeId,
                'exterior_color_id' => $request->exteriorColorId,
                'interior_color_id' => $request->interiorColorId,
            ])->first();

            return CarModelResource::make($model);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        }
    }
}
