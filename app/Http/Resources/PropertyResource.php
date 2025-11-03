<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PropertyResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'price' => $this->price,
            'owner' => $this->owner,
            'offerer' => $this->offerer,
            'lat' => $this->lat,
            'lng' => $this->lng,
            'location' => $this->location,
            'user' => $this->whenLoaded('user'),
            'category' => $this->whenLoaded('category'),
            'property_type' => $this->whenLoaded('propertyType'),
            'contract_type' => $this->whenLoaded('contractType'),
            'features' => $this->whenLoaded('features'),
            'attribute_values' => $this->whenLoaded('propertyAttributeValues'),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
