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
       Schema::create('medecins', function (Blueprint $table) {
        $table->id();
        $table->foreignId('admin_id')->nullable()->constrained('administrateurs')->onDelete('cascade');
        $table->string('nom');
        $table->string('prenom');
        $table->string('email')->unique();
        $table->string('password');
        $table->string('telephone')->nullable();
        $table->string('specialite');
        $table->string('numero_professionnel')->nullable();
        $table->text('experience')->nullable();
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medecins');
    }
};
