<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    protected $fillable = [
        'marque',
        'modele',
        'date_mise_circulation',
        'couleur',
        'immatriculation',
        'niv',
        'odometre',
        'type_carburant',
        'type_transmission',
        'type_boite',
        'ptac',
        'type_vehicule',
        'poids',
        'longueur',
        'largeur',
        'hauteur',
        'numero_flotte',
    ];
    public function interventions()
{
    return $this->hasMany(Intervention::class);
}
}
