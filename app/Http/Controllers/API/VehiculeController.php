<?php

namespace App\Http\Controllers\API;

use App\Models\Vehicule;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VehiculeController extends Controller
{
    public function index()
    {
        return response()->json(Vehicule::all(), 200);
    }

    public function store(Request $request)
    {
    
        $request->validate([
            'marque' => 'required',
            'modele' => 'required',
            'immatriculation' => 'required|unique:vehicules',
        ]);
        $vehicule = Vehicule::create($request->all());
        return response()->json(['message' => 'Vehicule cree', 'data' => $vehicule], 201);
    }

    public function show(Vehicule $vehicule)
    {
        return response()->json($vehicule, 200);
    }

    public function update(Request $request, Vehicule $vehicule)
    {
        $request->validate([
            'marque' => 'required',
            'modele' => 'required',
            'immatriculation' => 'required|unique:vehicules,immatriculation,' . $vehicule->id,
        ]);

        $vehicule->update($request->all()); 
        return response()->json(['message' => 'Véhicule mis à jour', 'data' => $vehicule], 200);
    }

    public function destroy(Vehicule $vehicule)
    {
        $vehicule->delete();
        return response()->json(['message' => 'Véhicule supprimé'], 200);
    }
}
