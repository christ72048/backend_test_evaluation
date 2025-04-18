<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // Seuls les administrateurs peuvent voir la liste des utilisateurs
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $model): bool
    {
        // Un utilisateur peut voir son propre profil ou un admin peut voir n'importe quel profil
        return $user->id === $model->id || $user->hasRole('admin');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // Seuls les administrateurs peuvent créer des utilisateurs
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model): bool
    {
        // Un utilisateur peut mettre à jour son propre profil
        // Un admin peut mettre à jour n'importe quel profil
        return $user->id === $model->id || $user->hasRole('admin');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model): bool
    {
        // Seuls les administrateurs peuvent supprimer des utilisateurs
        // Et un admin ne peut pas se supprimer lui-même
        return $user->hasRole('admin') && $user->id !== $model->id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, User $model): bool
    {
        // Seuls les administrateurs peuvent restaurer des utilisateurs
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, User $model): bool
    {
        // Seuls les administrateurs peuvent supprimer définitivement des utilisateurs
        return $user->hasRole('admin') && $user->id !== $model->id;
    }
}