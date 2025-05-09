<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\VehiculeController;
use App\Http\Controllers\API\InterventionController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\AuthController; 

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Routes d'authentification publiques
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);
Route::post('/reset-password', [AuthController::class, 'resetPassword']);

// Routes protégées par authentification
Route::middleware('auth:sanctum')->group(function () {
    // Profil et déconnexion
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/change-password', [AuthController::class, 'changePassword']);
    
    // Routes des véhicules - accessibles à tous les utilisateurs authentifiés
    Route::apiResource('vehicules', VehiculeController::class);
    
    // Routes des interventions - accessibles à tous les utilisateurs authentifiés
    Route::apiResource('interventions', InterventionController::class);
    
    // Routes des utilisateurs - accessibles uniquement aux administrateurs
    Route::middleware('role:admin')->group(function () {
        Route::apiResource('users', UserController::class);
    });
});