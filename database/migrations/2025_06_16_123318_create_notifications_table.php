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
        Schema::create('notifications', function (Blueprint $table) {
    $table->id();
    $table->foreignId('patiente_id')->nullable()->constrained('patientes')->onDelete('cascade'); // ✅ Associe à un patient
    $table->foreignId('medecin_id')->nullable()->constrained('medecins')->onDelete('cascade'); // ✅ Associe à un médecin
    $table->foreignId('secretaire_id')->nullable()->constrained('secretaires')->onDelete('cascade'); // ✅ Associe à un secrétaire
    $table->foreignId('admin_id')->nullable()->constrained('administrateurs')->onDelete('cascade'); // ✅ Associe à un admin
    $table->string('type'); // ✅ Type de notification (confirmation, annulation...)
    $table->text('message'); // ✅ Contenu de la notification
    $table->boolean('is_read')->default(false); // ✅ État lu ou non
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
