<?php

namespace App\Http\Controllers\API;

use App\Models\Vehicule;
use App\Http\Controllers\Controller;
use App\Http\Resources\VehiculeResource;
use App\Http\Resources\VehiculeCollection;
use Illuminate\Http\Request;

class VehiculeController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Vehicule::class);
        
        $vehicules = Vehicule::paginate(10);
        return new VehiculeCollection($vehicules);
    }

    public function store(Request $request)
    {
        $this->authorize('create', Vehicule::class);
        
        $request->validate([
            'marque' => 'required|string|max:100',
            'modele' => 'required|string|max:100',
            'immatriculation' => 'required|string|unique:vehicules|max:20',
            'date_mise_circulation' => 'nullable|date',
            'couleur' => 'nullable|string|max:50',
            'niv' => 'nullable|string|max:50',
            'odometre' => 'nullable|integer',
            'type_carburant' => 'nullable|string|max:50',
            'type_transmission' => 'nullable|string|max:50',
            'type_boite' => 'nullable|string|max:50',
            'ptac' => 'nullable|string',
            'type_vehicule' => 'nullable|string|max:50',
            'poids' => 'nullable|numeric',
            'longueur' => 'nullable|numeric',
            'largeur' => 'nullable|numeric',
            'hauteur' => 'nullable|numeric',
            'numero_flotte' => 'nullable|string|max:50',
        ]);

        $vehicule = Vehicule::create($request->all());
        
        return (new VehiculeResource($vehicule))
            ->additional(['message' => 'Véhicule créé avec succès'])
            ->response()
            ->setStatusCode(201);
    }

    public function show(Vehicule $vehicule)
    {
        $this->authorize('view', $vehicule);
        
        return new VehiculeResource($vehicule);
    }

    public function update(Request $request, Vehicule $vehicule)
    {
        $this->authorize('update', $vehicule);
        
        $request->validate([
            'marque' => 'required|string|max:100',
            'modele' => 'required|string|max:100',
            'immatriculation' => 'required|string|max:20|unique:vehicules,immatriculation,' . $vehicule->id,
            'date_mise_circulation' => 'nullable|date',
            'couleur' => 'nullable|string|max:50',
            'niv' => 'nullable|string|max:50',
            'odometre' => 'nullable|integer',
            'type_carburant' => 'nullable|string|max:50',
            'type_transmission' => 'nullable|string|max:50',
            'type_boite' => 'nullable|string|max:50',
            'ptac' => 'nullable|numeric',
            'type_vehicule' => 'nullable|string|max:50',
            'poids' => 'nullable|numeric',
            'longueur' => 'nullable|numeric',
            'largeur' => 'nullable|numeric',
            'hauteur' => 'nullable|numeric',
            'numero_flotte' => 'nullable|string|max:50',
        ]);

        $vehicule->update($request->all());
        
        return (new VehiculeResource($vehicule))
            ->additional(['message' => 'Véhicule mis à jour avec succès']);
    }

    public function destroy(Vehicule $vehicule)
    {
        $this->authorize('delete', $vehicule);
        
        $vehicule->delete();
        
        return response()->json(['message' => 'Véhicule supprimé avec succès']);
    }
}