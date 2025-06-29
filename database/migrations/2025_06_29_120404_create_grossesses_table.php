<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('grossesses', function (Blueprint $table) {
        $table->id();

        // Références
        $table->foreignId('patiente_id')->constrained()->cascadeOnDelete();
        $table->foreignId('medecin_id')->nullable()->constrained()->nullOnDelete();

        // Données de grossesse
        $table->date('date_debut')->nullable();       // Date estimée de début de grossesse
        $table->date('date_terme')->nullable();       // Date prévue d'accouchement (DPA)
        $table->integer('nombre_bebes')->default(1); // Grossesse simple, gémellaire, etc.
        $table->text('notes_initiales')->nullable();  // Commentaires ou antécédents
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grossesses');
    }
};
