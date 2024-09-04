<?php

namespace App\Http\Controllers;

use App\Http\Resources\BrandResource;
use App\Interfaces\BrandRepositoryInterface;
use App\Http\Requests\BrandRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;

class BrandController extends Controller
{
    public function __construct(private readonly BrandRepositoryInterface $brandRepository)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): ResourceCollection
    {
        return $this->brandRepository->list();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandRequest $request): BrandResource
    {
        return $this->brandRepository->store($request);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandRequest $request, int $id): JsonResponse|BrandResource
    {
        return $this->brandRepository->update($request, $id);
    }
}
