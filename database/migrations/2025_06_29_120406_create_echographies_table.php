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
    Schema::create('echographies', function (Blueprint $table) {
        $table->id();

        // Référence à la grossesse concernée
        $table->foreignId('grossesse_id')->constrained()->cascadeOnDelete();

        // Détails de l'échographie
        $table->string('titre')->nullable();           // ex : "Écho T1", "Écho morphologique"
        $table->date('date_examen')->nullable();       // Date de l'écho
        $table->string('fichier')->nullable();         // Chemin vers le fichier uploadé
        $table->text('observations')->nullable();      // Remarques du médecin
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('echographies');
    }
};
