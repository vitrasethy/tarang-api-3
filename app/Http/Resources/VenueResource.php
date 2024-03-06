<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Venue */
class VenueResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'size' => $this->size,
            'photo' => asset($this->photo),
            'description' => $this->description,

            'sportType' => new SportTypeResource($this->whenLoaded('sportType')),
        ];
    }
}
