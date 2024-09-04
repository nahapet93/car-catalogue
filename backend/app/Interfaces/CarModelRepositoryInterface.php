<?php

namespace App\Interfaces;

use App\Http\Requests\BrandRequest;
use App\Http\Requests\CarModelRequest;
use App\Http\Resources\CarModelResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

interface CarModelRepositoryInterface
{
    public function list(Request $request): ResourceCollection;
    public function store(CarModelRequest $request): CarModelResource;
    public function update(CarModelRequest $request, int $id): JsonResponse|CarModelResource;
}
