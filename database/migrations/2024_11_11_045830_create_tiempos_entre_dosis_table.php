<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tiempos_entre_dosis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vacuna_id')->constrained()->onDelete('cascade'); // Relación con la tabla 'vacunas'
            $table->integer('dosis_numero'); // Número de la dosis (2, 3, 4...)
            $table->integer('dias'); // Tiempo en días entre dosis
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('tiempos_entre_dosis');
    }
};
