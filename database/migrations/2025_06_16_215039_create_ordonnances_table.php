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
         Schema::create('ordonnances', function (Blueprint $table) {
        $table->id();
        $table->foreignId('medecin_id')->constrained()->onDelete('cascade');
        $table->foreignId('patiente_id')->constrained()->onDelete('cascade');
        $table->text('contenu'); // ✅ Prescription du médecin
        $table->date('date_prescription'); // ✅ Date de l'ordonnance
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordonnances');
    }
};
