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

        Schema::create('factures', function (Blueprint $table) {
        $table->id();
        $table->foreignId('rendezvous_id')->nullable()->constrained('rendezvous')->onDelete('cascade');
        $table->foreignId('patiente_id')->nullable()->constrained('patientes')->onDelete('cascade');
        $table->foreignId('medecin_id')->nullable()->constrained('medecins')->onDelete('cascade');
        $table->decimal('montant', 10, 2);
        $table->string('type_facture'); // Consultation, Échographie, Perfusion...
        $table->string('statut')->default('En attente');
        $table->string('methode_paiement')->nullable();
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factures');
    }
};
