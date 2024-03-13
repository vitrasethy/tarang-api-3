<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationRequest;
use App\Http\Resources\ReservationResource;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function index()
    {
//        $this->authorize('viewAny', Reservation::class);

        $reservations = Reservation::with(['venue', 'user'])->get();

        return ReservationResource::collection($reservations);
    }

    public function store(ReservationRequest $request)
    {
//        $this->authorize('create', Reservation::class);

        Reservation::create($request->validated());

        return response()->noContent();
    }

    public function show(Reservation $reservation)
    {
//        $this->authorize('view', $reservation);

        return new ReservationResource($reservation);
    }

    public function update(ReservationRequest $request, Reservation $reservation)
    {
//        $this->authorize('update', $reservation);

        $validated = $request->validated();

        $reservation->update($validated);

        return response()->noContent();
    }

    public function destroy(Reservation $reservation)
    {
//        $this->authorize('delete', $reservation);

        $reservation->delete();

        return response()->noContent();
    }
}
