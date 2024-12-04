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
        Schema::table('campanas', function (Blueprint $table) {
            $table->string('titulo');
            $table->date('fecha');
            $table->time('hora_desde');
            $table->time('hora_hasta');
            $table->string('departamento');
            $table->string('municipio');
            $table->string('direccion');// nombre de parque, hospital, escuela donde se realizara la campaña
            $table->string('empresa');
            $table->string('imagen');
            $table->text('descripcion');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('vacuna_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('campanas', function (Blueprint $table) {
            $table->dropColumn('titulo');
            $table->dropColumn('fecha');
            $table->dropColumn('hora_desde');
            $table->dropColumn('hora_hasta');
            $table->dropColumn('departamento');
            $table->dropColumn('municipio');
            $table->dropColumn('direccion');
            $table->dropColumn('empresa');
            $table->dropColumn('imagen');
            $table->dropColumn('descripcion');
            $table->dropForeign('campanas_user_id_foreign');
            $table->dropForeign('campanas_vacuna_id_foreign');
        });
    }
};