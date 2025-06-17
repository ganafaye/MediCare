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
        Schema::create('consultations', function (Blueprint $table) {
        $table->id();
        $table->foreignId('medecin_id')->constrained()->onDelete('cascade');
        $table->foreignId('patiente_id')->constrained()->onDelete('cascade');
        $table->date('date_consultation'); // ✅ Date du rendez-vous
        $table->time('heure_consultation'); // ✅ Heure de la consultation
        $table->text('motif')->nullable(); // ✅ Raison de la visite
        $table->text('diagnostic')->nullable(); // ✅ Diagnostic du médecin
        $table->text('prescription')->nullable(); // ✅ Médicaments prescrits
        // 🔥 Nouveaux champs médicaux 🔥
        $table->decimal('poids', 5, 2)->nullable(); // ✅ Poids de la patiente (kg)
        $table->decimal('tension', 5, 2)->nullable(); // ✅ Tension artérielle (ex: 120.80)
        $table->integer('nombre_grossesses')->nullable(); // ✅ Nombre de grossesses
        $table->text('antecedents')->nullable(); // ✅ Antécédents médicaux

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultations');
    }
};
