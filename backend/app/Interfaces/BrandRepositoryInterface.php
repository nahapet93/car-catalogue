<?php

namespace App\Interfaces;

use App\Http\Requests\BrandRequest;
use App\Http\Resources\BrandResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;

interface BrandRepositoryInterface
{
    public function list(): ResourceCollection;
    public function store(BrandRequest $request): BrandResource;
    public function update(BrandRequest $request, int $id): JsonResponse|BrandResource;
}
