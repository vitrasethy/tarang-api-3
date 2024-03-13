<?php

namespace App\Http\Controllers;

use App\Http\Requests\SportTypeRequest;
use App\Http\Resources\SportTypeResource;
use App\Models\SportType;

class SportTypeController extends Controller
{
    public function index()
    {
//        $this->authorize('viewAny', SportType::class);

        $sportTypes = SportType::all();

        return SportTypeResource::collection($sportTypes);
    }

    public function store(SportTypeRequest $request)
    {
//        $this->authorize('create', SportType::class);

        $validated = $request->validated();

        SportType::create($validated);

        return response()->noContent();
    }

    public function show(SportType $sportType)
    {
//        $this->authorize('view', $sportType);

        return new SportTypeResource($sportType);
    }

    public function update(SportTypeRequest $request, SportType $sportType)
    {
//        $this->authorize('update', $sportType);

        $validated = $request->validated();

        $sportType->update($validated);

        return response()->noContent();
    }

    public function destroy(SportType $sportType)
    {
//        $this->authorize('delete', $sportType);

        $sportType->delete();

        return response()->noContent();
    }
}
