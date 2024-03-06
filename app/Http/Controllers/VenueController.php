<?php

namespace App\Http\Controllers;

use App\Http\Requests\VenueRequest;
use App\Http\Resources\VenueResource;
use App\Models\Venue;
use Illuminate\Support\Facades\Storage;

class VenueController extends Controller
{
    public function index()
    {
//        $this->authorize('viewAny', Venue::class);

        return VenueResource::collection(Venue::all());
    }

    public function store(VenueRequest $request)
    {
//        $this->authorize('create', Venue::class);

        $request->validated();

        $venue = Venue::create([
            'name' => $request->input('name'),
            'sport_type_id' => $request->input('sport_type_id'),
            'size' => $request->input('size'),
            'photo' => $request->file('photo')->store('venues'),
            'description' => $request->input('description'),
        ]);

        return new VenueResource($venue);
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

        return new VenueResource($venue);
    }

    public function destroy(Venue $venue)
    {
//        $this->authorize('delete', $venue);

        $venue->delete();

        return response()->json();
    }
}
