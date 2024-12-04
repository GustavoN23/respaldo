<?php

namespace App\Policies;

use App\Models\Campana;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CampanaPolicy
{
    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Campana $campana): bool
    {
        return $user->id === $campana->user_id;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Campana $campana): bool
    {
        return $user->id === $campana->user_id;
    }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->rol == 3;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->rol == 3;
    }


    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Campana $campana): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Campana $campana): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Campana $campana): bool
    {
        //
    }
}
