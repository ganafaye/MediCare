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
        Schema::create('dossiers_medicaux', function (Blueprint $table) {
    $table->id();
    $table->foreignId('patiente_id')->constrained('patientes')->onDelete('cascade'); // Relie au patient
    $table->foreignId('medecin_id')->constrained('medecins')->onDelete('cascade'); // Relie au médecin
    $table->text('diagnostic'); // Diagnostic posé par le médecin
    $table->text('traitement')->nullable(); // Traitement conseillé
    $table->text('observations')->nullable(); // Remarques supplémentaires
    $table->timestamps();
});
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dossiers_medicaux');
    }
};
