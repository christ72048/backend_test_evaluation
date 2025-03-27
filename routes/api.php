<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\VehiculeController;
use App\Http\Controllers\Api\InterventionController;

Route::apiResource('vehicules', VehiculeController::class);
Route::apiResource('interventions', InterventionController::class);
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
