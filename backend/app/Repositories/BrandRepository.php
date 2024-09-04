<?php

namespace App\Repositories;

use App\Http\Requests\BrandRequest;
use App\Http\Resources\BrandResource;
use App\Interfaces\BrandRepositoryInterface;
use App\Models\Brand;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;

class BrandRepository implements BrandRepositoryInterface {
    public function list(): ResourceCollection
    {
        return BrandResource::collection(Brand::all());
    }

    public function store(BrandRequest $request): BrandResource
    {
        $brand = Brand::create([
            'name' => $request->name
        ]);

        return BrandResource::make($brand);
    }

    public function update(BrandRequest $request, int $id): JsonResponse|BrandResource
    {
        try {
            $brand = tap(Brand::findOrFail($id))->update([
                'name' => $request->name
            ])->first();

            return BrandResource::make($brand);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        }
    }
}
