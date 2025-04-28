<?php

namespace App\Http\Controllers\API;

use App\Models\Intervention;
use App\Http\Controllers\Controller;
use App\Http\Resources\InterventionResource;
use App\Http\Resources\InterventionCollection;
use Illuminate\Http\Request;

class InterventionController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Intervention::class);
        
        $interventions = Intervention::with('vehicule')->paginate(10);
        // return response()->Json($interventions, 200);
        return new InterventionCollection($interventions);
    }

    public function store(Request $request)
    {
        $this->authorize('create', Intervention::class);
        
        $request->validate([
            'vehicule_id' => 'required|exists:vehicules,id',
            'nature_intervention' => 'required|string|max:255',
            'fait_generateur' => 'required|string|max:255',
            'detail_fait_generateur' => 'required|string',
            // 'date_intervention' => 'nullable|date',
            // 'cout' => 'nullable|numeric',
            // 'statut' => 'nullable|string|max:50',
            // 'notes' => 'nullable|string',
        ]);

        $intervention = Intervention::create($request->all());
        
        return (new InterventionResource($intervention))
            ->additional(['message' => 'Intervention créée avec succès'])
            ->response()
            ->setStatusCode(201);
    }

    public function show(Intervention $intervention)
    {
        $this->authorize('view', $intervention);
        
        $intervention->load('vehicule');
        return new InterventionResource($intervention);
    }

    public function update(Request $request, Intervention $intervention)
    {
        $this->authorize('update', $intervention);
        
        $request->validate([
            'vehicule_id' => 'required|exists:vehicules,id',
            'nature_intervention' => 'required|string|max:255',
            'fait_generateur' => 'required|string|max:255',
            'detail_fait_generateur' => 'required|string',
            // 'date_intervention' => 'nullable|date',
            // 'cout' => 'nullable|numeric',
            // 'statut' => 'nullable|string|max:50',
            // 'notes' => 'nullable|string',
        ]);

        $intervention->update($request->all());
        
        return (new InterventionResource($intervention))
            ->additional(['message' => 'Intervention mise à jour avec succès']);
    }

    public function destroy(Intervention $intervention)
    {
        $this->authorize('delete', $intervention);
        
        $intervention->delete();
        
        return response()->json(['message' => 'Intervention supprimée avec succès']);
    }
}