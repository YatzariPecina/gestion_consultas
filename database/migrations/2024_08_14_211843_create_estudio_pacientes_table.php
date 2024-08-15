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
        Schema::create('estudio_pacientes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_compra');
            $table->unsignedBigInteger('id_estudio');
            $table->date('fecha_estudio');
            $table->time('hora_estudio');
            $table->timestamps();

            $table->foreign('id_compra')->references('id')->on('compras');
            $table->foreign('id_estudio')->references('id')->on('estudios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudio_pacientes');
    }
};
