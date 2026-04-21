<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vehicle;

class VehiclePolicy
{
    public function viewAny(User $user)
    {
        return true;
    }


    public function view(User $user, Vehicle $vehicle)
    {
        return $user->isAdmin() || $vehicle->user_id === $user->id;
    }


	/**
     * Determine whether the user can create vehicles.
     * Only admins can create vehicles, matching UserPolicy.
     */
    public function create(User $user)
    {
        return $user->isAdmin();
    }


    /**
     * Determine whether the user can update the vehicle.
     * Only admins can update vehicles.
     */
    public function update(User $user, Vehicle $vehicle)
    {
        return $user->isAdmin();
    }


    /**
     * Determine whether the user can delete the vehicle.
     * Only admins can delete vehicles.
     */
    public function delete(User $user, Vehicle $vehicle)
    {
        return $user->isAdmin();
    }
}
