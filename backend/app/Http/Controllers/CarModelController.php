<?php

namespace App\Http\Controllers;

use App\Http\Resources\CarModelResource;
use App\Interfaces\CarModelRepositoryInterface;
use App\Http\Requests\CarModelRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CarModelController extends Controller
{
    public function __construct(private readonly CarModelRepositoryInterface $carModelRepository)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): ResourceCollection
    {
        return $this->carModelRepository->list($request);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarModelRequest $request): CarModelResource
    {
        return $this->carModelRepository->store($request);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarModelRequest $request, int $id): JsonResponse|CarModelResource
    {
        return $this->carModelRepository->update($request, $id);
    }
}
