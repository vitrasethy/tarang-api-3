<?php

namespace App\Http\Controllers;

use App\Http\Requests\VenueRequest;
use App\Http\Resources\VenueResource;
use App\Models\Venue;

class VenueController extends Controller
{
    public function index()
    {
//        $this->authorize('viewAny', Venue::class);

        $venus = Venue::with('sportType')->get();

        return VenueResource::collection($venus);
    }

    public function store(VenueRequest $request)
    {
//        $this->authorize('create', Venue::class);

        $request->validated();

        Venue::create([
            'name' => $request->input('name'),
            'sport_type_id' => $request->input('sport_type_id'),
            'size' => $request->input('size'),
            'photo' => $request->file('photo')->store('venues'),
            'description' => $request->input('description'),
        ]);

        return response()->noContent();
    }

    public function show(Venue $venue)
    {
//        $this->authorize('view', $venue);

        return new VenueResource($venue);
    }

    public function update(VenueRequest $request, Venue $venue)
    {
//        $this->authorize('update', $venue);

        $request->validated();

        $venue->update([
            'name' => $request->input('name'),
            'sport_type_id' => $request->input('sport_type_id'),
            'size' => $request->input('size'),
            'photo' => $request->file('venue')->store('venues'),
            'description' => $request->input('description'),
        ]);

        return response()->noContent();
    }

    public function destroy(Venue $venue)
    {
//        $this->authorize('delete', $venue);

        $venue->delete();

        return response()->noContent();
    }
}
