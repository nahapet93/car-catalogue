<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CarModelResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'year' => $this->year,
            'brandId' => $this->brand_id,
            'brand' => $this->brand->name,
            'interiorColorId' => $this->interior_color_id,
            'interiorColor' => $this->interiorColor->name,
            'exteriorColorId' => $this->exterior_color_id,
            'exteriorColor' => $this->exteriorColor->name,
            'engineType' => $this->engineType->name,
            'transmissionType' => $this->transmissionType->name,
        ];
    }
}
