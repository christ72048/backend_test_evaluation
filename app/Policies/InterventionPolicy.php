<?php

namespace App\Policies;

use App\Models\Intervention;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class InterventionPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // Tous les utilisateurs authentifiés peuvent voir la liste des interventions
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Intervention $intervention): bool
    {
        // Tous les utilisateurs authentifiés peuvent voir les détails d'une intervention
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // Exemple: Seuls les utilisateurs avec le rôle "admin", "gestionnaire" ou "technicien" 
        // peuvent créer des interventions
        //return $user->hasRole('admin') || $user->hasRole('gestionnaire') || $user->hasRole('technicien');
        
        // Pour l'instant, permettre à tous les utilisateurs authentifiés
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Intervention $intervention): bool
    {
        // Exemple: Seuls les utilisateurs avec le rôle "admin", "gestionnaire" ou le créateur
        // de l'intervention peuvent la mettre à jour
        // return $user->hasRole('admin') || $user->hasRole('gestionnaire') || $intervention->user_id === $user->id;
        
        // Pour l'instant, permettre à tous les utilisateurs authentifiés
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Intervention $intervention): bool
    {
        // Exemple: Seuls les utilisateurs avec le rôle "admin" ou le créateur
        // de l'intervention peuvent la supprimer
        // return $user->hasRole('admin') || $intervention->user_id === $user->id;
        
        // Pour l'instant, permettre à tous les utilisateurs authentifiés
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Intervention $intervention): bool
    {
        // Si vous utilisez SoftDeletes
        // return $user->hasRole('admin');
        
        // Pour l'instant, permettre à tous les utilisateurs authentifiés
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Intervention $intervention): bool
    {
        // Si vous utilisez SoftDeletes
        // return $user->hasRole('admin');
        
        // Pour l'instant, permettre à tous les utilisateurs authentifiés
        return true;
    }
}