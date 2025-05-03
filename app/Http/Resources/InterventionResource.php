<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InterventionResource extends JsonResource
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
            'vehicule_id' => $this->vehicule_id,
            'vehicule' => $this->whenLoaded('vehicule', function() {
                return [
                    'id' => $this->vehicule->id,
                    'marque' => $this->vehicule->marque,
                    'modele' => $this->vehicule->modele,
                    'immatriculation' => $this->vehicule->immatriculation,
                ];
            }),
            'nature_intervention' => $this->nature_intervention,
            'fait_generateur' => $this->fait_generateur,
            'detail_fait_generateur' => $this->detail_fait_generateur,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}