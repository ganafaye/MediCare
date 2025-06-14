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
    Schema::create('rendez_vous', function (Blueprint $table) {
        $table->id();
        $table->foreignId('patiente_id')->constrained('patientes')->onDelete('cascade');
        $table->foreignId('medecin_id')->constrained('medecins')->onDelete('cascade');
        $table->foreignId('secretaire_id')->nullable()->constrained('secretaires')->onDelete('set null'); // Un rendez-vous peut être pris sans secrétaire
        $table->foreignId('admin_id')->nullable()->constrained('administrateurs')->onDelete('set null'); // L'admin peut suivre sans forcément intervenir
        $table->dateTime('date_heure'); // Utilisation de 'date_heure' pour plus de clarté
        $table->enum('statut', ['en_attente', 'confirmé', 'annulé'])->default('en_attente');
        $table->text('motif')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rendezvous');
    }
};
