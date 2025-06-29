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
    Schema::create('suivis_grossesse', function (Blueprint $table) {
        $table->id();

        // Référence à la grossesse suivie
        $table->foreignId('grossesse_id')->constrained()->cascadeOnDelete();

        // Données de consultation
        $table->date('date_visite');                 // Date du suivi
        $table->float('poids')->nullable();          // Poids de la patiente
        $table->float('tension')->nullable();        // Tension artérielle
        $table->integer('age_gestationnel')->nullable(); // Semaine de grossesse (calculée ou saisie)
        $table->text('notes_medecin')->nullable();   // Recommandations ou remarques
        $table->string('document')->nullable();      // Ordonnance PDF ou fichier lié
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suivis_grossesse');
    }
};
