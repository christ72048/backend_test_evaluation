<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VehiculeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'marque' => $this->marque,
            'modele' => $this->modele,
            'immatriculation' => $this->immatriculation,
            'date_mise_circulation' => $this->date_mise_circulation,
            'couleur' => $this->couleur,
            'niv' => $this->niv,
            'odometre' => $this->odometre,
            'type_carburant' => $this->type_carburant,
            'type_transmission' => $this->type_transmission,
            'type_boite' => $this->type_boite,
            'ptac' => $this->ptac,
            'type_vehicule' => $this->type_vehicule,
            'poids' => $this->poids,
            'longueur' => $this->longueur,
            'largeur' => $this->largeur,
            'hauteur' => $this->hauteur,
            'numero_flotte' => $this->numero_flotte,
            'interventions_count' => $this->whenCounted('interventions'),
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}
//tentative pragination