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
       Schema::create('patientes', function (Blueprint $table) {
        $table->id();
        $table->foreignId('admin_id')->constrained('administrateurs')->onDelete('cascade');
        $table->string('nom');
        $table->string('email')->unique();
        $table->string('mot_de_passe');
        $table->string('telephone')->nullable();
        $table->date('date_naissance')->nullable();
        $table->string('groupe_sanguin')->nullable();
        $table->text('adresse')->nullable();
        $table->string('profession')->nullable();
        $table->dateTime('date_creation')->nullable();
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patientes');
    }
};
