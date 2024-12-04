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
        Schema::table('inscritos', function (Blueprint $table) {
            $table->string('genero');
            $table->string('documento');
            $table->string('edad');
            $table->integer('asistio');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('campana_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inscritos', function (Blueprint $table) {
            $table->dropColumn('genero');
            $table->dropColumn('documento');
            $table->dropColumn('asistio');
            $table->dropForeign('inscritos_user_id_foreign');
            $table->dropForeign('inscritos_campana_id_foreign');
        });
    }
};
