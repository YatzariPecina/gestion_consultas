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
        Schema::create('consultas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_paciente');
            $table->unsignedBigInteger('id_enfermera');
            $table->string('temperatura_actual');
            $table->string('presion_arterial');
            $table->string('diagnostico');
            $table->timestamps();

            $table->foreign('id_paciente')->references('id')->on('pacientes');
            $table->foreign('id_enfermera')->references('id')->on('enfermeras');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultas');
    }
};
