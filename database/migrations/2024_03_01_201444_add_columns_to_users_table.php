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
        Schema::table('users', function (Blueprint $table) {
            $table->integer('rol'); // 1 = persona, 2 = mascota, 3 = admin
            $table->string('segundoNombre');
            $table->string('apellido');
            $table->string('segundoApellido');
            $table->string('tipo_doc');
            $table->string('documento');
            $table->string('genero');
            $table->date('nacimiento');
            //modificado
            $table->string('edad');
            $table->string('orientacionSexual');
            $table->string('pais');
            $table->string('departamento');
            $table->string('municipio');
            // $table->string('lugarNacimiento');
            $table->string('regimenAfiliacion');
            $table->string('eps');
            $table->string('etnia');
            $table->string('desplazado');
            $table->string('discapacidad');
            // ->nullable()->after('discapacidad') quiere decir que el valor a ese capo poede llegar vacio null y que esta sociado a discapcisdad
            $table->string('descripcionDiscapacidad')->after('discapacidad');
            $table->string('victimaConflicto');
            $table->string('estudiante');
            $table->string('descripcionEstudiante')->after('estudiante');
            $table->string('paisResidencia');
            $table->string('departamentoResidencia');
            $table->string('municipioResidencia');
            $table->string('barrio');
            $table->string('comuna');
            $table->string('area');
            $table->string('direccion');
            $table->string('celular');
            $table->string('telefono');
            $table->string('autoriza');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('rol');
            $table->dropColumn('segundoNombre');
            $table->dropColumn('apellido');
            $table->dropColumn('segundoApellido');    
            $table->dropColumn('tipo_doc');
            $table->dropColumn('documento');
            $table->dropColumn('genero');
            $table->dropColumn('nacimiento');
            //modificado
            $table->dropColumn('edad');
            $table->dropColumn('orientacionSexual');
            $table->dropColumn('pais');
            $table->dropColumn('departamento');
            $table->dropColumn('municipio');
            // $table->dropColumn('lugarNacimiento');
            $table->dropColumn('regimenAfiliacion');
            $table->dropColumn('eps');
            $table->dropColumn('etnia');
            $table->dropColumn('desplazado');
            $table->dropColumn('discapacidad');
            $table->dropColumn('descripcionDiscapacidad');
            $table->dropColumn('victimaConflicto');
            $table->dropColumn('estudiante');
            $table->dropColumn('descripcionEstudiante');
            $table->dropColumn('paisResidencia');
            $table->dropColumn('departamentoResidencia');
            $table->dropColumn('municipioResidencia');
            $table->dropColumn('barrio');
            $table->dropColumn('comuna');
            $table->dropColumn('area');
            $table->dropColumn('direccion');
            $table->dropColumn('celular');
            $table->dropColumn('telefono');
            $table->dropColumn('autoriza');
        });
    }
};
