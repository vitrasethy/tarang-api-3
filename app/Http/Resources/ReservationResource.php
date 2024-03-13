<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Reservation */
class ReservationResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'phone' => $this->phone,
            'attendee' => $this->attendee,
            'date' => Carbon::parse($this->date)->toFormattedDayDateString(),
            'start_time' => Carbon::parse($this->start_time)->toTimeString(),
            'end_time' => Carbon::parse($this->end_time)->toTimeString(),

            'venue' => new VenueResource($this->whenLoaded('venue')),
            'user' => new UserResource($this->whenLoaded('user')),
        ];
    }
}
