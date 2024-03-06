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

        return SportTypeResource::collection(SportType::all());
    }

    public function store(SportTypeRequest $request)
    {
//        $this->authorize('create', SportType::class);

        return new SportTypeResource(SportType::create($request->validated()));
    }

    public function show(SportType $sportType)
    {
//        $this->authorize('view', $sportType);

        return new SportTypeResource($sportType);
    }

    public function update(SportTypeRequest $request, SportType $sportType)
    {
//        $this->authorize('update', $sportType);

        $sportType->update($request->validated());

        return new SportTypeResource($sportType);
    }

    public function destroy(SportType $sportType)
    {
//        $this->authorize('delete', $sportType);

        $sportType->delete();

        return response()->json();
    }
}
