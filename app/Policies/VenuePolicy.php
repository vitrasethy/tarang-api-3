<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Venue;
use Illuminate\Auth\Access\HandlesAuthorization;

class VenuePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {

    }

    public function view(User $user, Venue $venue): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, Venue $venue): bool
    {
    }

    public function delete(User $user, Venue $venue): bool
    {
    }

    public function restore(User $user, Venue $venue): bool
    {
    }

    public function forceDelete(User $user, Venue $venue): bool
    {
    }
}
