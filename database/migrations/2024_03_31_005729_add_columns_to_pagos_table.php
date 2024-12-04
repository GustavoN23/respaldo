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
        Schema::table('pagos', function (Blueprint $table) {
            $table->string('nombre_vacuna');
            $table->integer('monto');
            $table->string('status');
            $table->foreignId('inscrito_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pagos', function (Blueprint $table) {
            $table->dropColumn('nombre_vacuna');
            $table->dropColumn('monto');
            $table->dropColumn('status');
            $table->dropForeign('pagos_inscrito_id_foreign');
        });
    }
};
