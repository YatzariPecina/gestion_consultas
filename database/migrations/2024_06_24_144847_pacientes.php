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
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->date('fecha_nacimiento');
            $table->string('sexo');
            $table->string('telefono_paciente');
            $table->string('correo');
            $table->string('direccion')->nullable();
            $table->string('nacionalidad')->nullable();
            $table->string('nombre_contacto_emergencia');
            $table->string('telefono_contacto_emergencia');
            $table->string('RFC')->nullable();
            $table->string('observaciones')->nullable();

            $table->unsignedBigInteger('id_medico')->nullable();
            $table->foreign('id_medico')->references('id')->on('medicos');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
