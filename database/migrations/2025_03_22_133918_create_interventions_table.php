<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('interventions', function (Blueprint $table) {
            $table->id();
            $table->integer('vehicule_id');
            $table->foreign('vehicule_id')->references('id')->on('vehicules')->onDelete('cascade');

            // Champs pour le formulaire
            $table->enum('nature_intervention', [
                'maintenance', 'reparation', 'controle_technique', 'nettoyage', 'autre'
            ]);

            $table->enum('fait_generateur', [
                'incident', 'usure', 'accident', 'controle_preventif', 'autre'
            ]);

            $table->enum('detail_fait_generateur', [
                'frein', 'moteur', 'carrosserie', 'pneu', 'vidange', 'autre'
            ]);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interventions');
    }
};
