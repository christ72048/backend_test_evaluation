<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Intervention extends Model
{
    protected $fillable = [
        'vehicule_id',
        'nature_intervention',
        'fait_generateur',
        'detail_fait_generateur',
        'date_intervention',
        'cout',
        'statut',
        'notes',
    ];

    /**
     * Les options de statut possibles
     */
    public static $statuts = [
        'programmée',
        'en_cours',
        'terminée',
        'annulée'
    ];

    /**
     * Obtenir le véhicule associé à l'intervention
     */
    public function vehicule()
    {
        return $this->belongsTo(Vehicule::class);
    }

    /**
     * Filtre les interventions par statut
     */
    public function scopeStatut($query, $statut)
    {
        if ($statut) {
            return $query->where('statut', $statut);
        }
        return $query;
    }

    /**
     * Filtre les interventions par véhicule
     */
    public function scopeVehicule($query, $vehiculeId)
    {
        if ($vehiculeId) {
            return $query->where('vehicule_id', $vehiculeId);
        }
        return $query;
    }

    /**
     * Filtre les interventions par date
     */
    public function scopeDate($query, $date)
    {
        if ($date) {
            return $query->whereDate('date_intervention', $date);
        }
        return $query;
    }
}