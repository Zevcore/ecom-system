<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductsCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'images' => $this->images,
            'stock' => $this->stock,
            'specifications' => $this->specifications,
            'basePrice' => $this->basePrice,
            'discountPercent' => $this->discountPercent,
            'manufacturer' => $this->manufacturer
        ];
    }
}
