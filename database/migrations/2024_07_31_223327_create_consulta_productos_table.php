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
        Schema::create('consulta_productos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_consulta');
            $table->unsignedBigInteger('id_producto');
            $table->integer('cantidad')->default(1);
            $table->timestamps();

            $table->foreign('id_consulta')->references('id')->on('consultas');
            $table->foreign('id_producto')->references('id')->on('productos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consulta_productos');
    }
};
