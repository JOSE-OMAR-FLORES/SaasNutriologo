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
        Schema::create('progresos', function (Blueprint $table) {
        $table->id();
        $table->foreignId('paciente_id')->constrained()->onDelete('cascade');
        $table->date('fecha');
        $table->float('peso')->nullable();
        $table->float('cintura')->nullable();
        $table->float('cadera')->nullable();
        $table->float('altura')->nullable();
        $table->text('observaciones')->nullable();
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('progresos');
    }
};
