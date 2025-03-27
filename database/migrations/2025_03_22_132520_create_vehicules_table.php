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
        Schema::create('vehicules', function (Blueprint $table) {
            $table->id();
            $table->string('marque');
            $table->string('modele');
            $table->date('date_mise_circulation');
            $table->string('couleur');
            $table->string('immatriculation')->unique();
            $table->string('niv')->unique(); // Numéro d'Identification du Véhicule (NIV ou VIN)
            $table->integer('odometre'); // Kilométrage
            $table->enum('type_carburant', ['essence', 'diesel', 'electrique', 'hybride', 'gpl']);
            $table->enum('type_transmission', ['traction', 'propulsion', 'integrale']);
            $table->enum('type_boite', ['manuelle', 'automatique', 'semi-automatique']);
            $table->enum('ptac', ['leger', 'lourd']); // PTAC : poids total autorisé en charge

            $table->enum('type_vehicule', ['berline', 'suv', 'utilitaire', 'camion', 'moto', 'autre']);

            // Infos supplémentaires que tu avais mentionnées
            $table->integer('poids')->nullable();
            $table->integer('longueur')->nullable();
            $table->integer('largeur')->nullable();
            $table->integer('hauteur')->nullable();
            $table->integer('numero_flotte')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicules');
    }
};
