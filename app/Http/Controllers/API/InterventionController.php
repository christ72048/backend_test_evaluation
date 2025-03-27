<?php

namespace App\Http\Controllers\API;

use App\Models\Intervention;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InterventionController extends Controller
{
    public function index()
    {
        $interventions = Intervention::with('vehicule')->get();
        return response()->Json($interventions, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'vehicule_id' => 'required|exists:vehicules,id',
            'nature_intervention' => 'required',
            'fait_generateur' => 'required',
            'detail_fait_generateur' => 'required',
        ]);

        $intervention = Intervention::create($request->all());

        return response()->json(['message' => 'Intervention créée', 'data' => $intervention], 201);
    }

    public function show(Intervention $intervention)
    {
        $intervention->load('vehicule');
        return response()->json($intervention, 200);
    }

    public function update(Request $request, Intervention $intervention)
    {
        $request->validate([
            'vehicule_id' => 'required|exists:vehicules,id',
            'nature_intervention' => 'required',
            'fait_generateur' => 'required',
            'detail_fait_generateur' => 'required',
        ]);

        $intervention->update($request->all());

        return response()->json(['message' => 'Intervention mise à jour', 'data' => $intervention], 200);
    }

    public function destroy(Intervention $intervention)
    {
        $intervention->delete();

        return response()->json(['message' => 'Intervention supprimée'], 200);
    }
}
