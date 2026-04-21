<?php

namespace App\Filament\Resources\Users;

use App\Models\User;
use Filament\Support\Facades\FilamentView;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->isAdmin() || $user->isTechnician();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $model): bool
    {
        return $user->isAdmin() || $user->isTechnician() || $user->id === $model->id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model): bool
    {
        if ($user->isAdmin()) {
            return true;
        }

        // Users can edit their own profile, but not their role
        if ($user->id === $model->id && FilamentView::isEditingField('name', 'email', 'password')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model): bool
    {
        // Admin can delete anyone except themselves
        if ($user->isAdmin() && $user->id !== $model->id) {
            return true;
        }

        return false;
    }
}
