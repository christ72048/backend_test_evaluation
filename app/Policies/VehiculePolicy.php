<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vehicule;
use Illuminate\Auth\Access\Response;

class VehiculePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // Tous les utilisateurs authentifiés peuvent voir la liste des véhicules
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Vehicule $vehicule): bool
    {
        // Tous les utilisateurs authentifiés peuvent voir les détails d'un véhicule
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // Exemple: Seuls les utilisateurs avec le rôle "admin" ou "gestionnaire" 
        // peuvent créer des véhicules.
        // Pour implémenter cela, vous devrez ajouter un système de rôles ou de permissions
        // return $user->hasRole('admin') || $user->hasRole('gestionnaire');
        
        // Pour l'instant, permettre à tous les utilisateurs authentifiés
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Vehicule $vehicule): bool
    {
        // Exemple: Seuls les utilisateurs avec le rôle "admin" ou "gestionnaire" 
        // peuvent mettre à jour des véhicules.
        // return $user->hasRole('admin') || $user->hasRole('gestionnaire');
        
        // Pour l'instant, permettre à tous les utilisateurs authentifiés
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Vehicule $vehicule): bool
    {
        // Exemple: Seuls les utilisateurs avec le rôle "admin" peuvent supprimer des véhicules
        // return $user->hasRole('admin');
        
        // Pour l'instant, permettre à tous les utilisateurs authentifiés
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Vehicule $vehicule): bool
    {
        // Si vous utilisez les SoftDeletes
        // return $user->hasRole('admin');
        
        // Pour l'instant, permettre à tous les utilisateurs authentifiés
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Vehicule $vehicule): bool
    {
        // Si vous utilisez les SoftDeletes
        // return $user->hasRole('admin');
        
        // Pour l'instant, permettre à tous les utilisateurs authentifiés
        return true;
    }
}