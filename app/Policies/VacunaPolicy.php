<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vacuna;
use Illuminate\Auth\Access\Response;

class VacunaPolicy
{
    /**
     * Determine whether the user can view the model.
     * Policy para que un admin no pueda ver las vacunas que creo otro
     */
    public function view(User $user, Vacuna $vacuna): bool
    {
        return $user->id === $vacuna->user_id;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Vacuna $vacuna): bool
    {
        //Si el id del usuario que esta intentando editar la vacuna es igual al user_id que creo la vacuna,
        //le permitiremos acceso
        return $user->id === $vacuna->user_id;
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
    public function delete(User $user, Vacuna $vacuna): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Vacuna $vacuna): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Vacuna $vacuna): bool
    {
        //
    }
}
