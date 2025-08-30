<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('becas', function (Blueprint $table) {
            $table->char('id', 36)->primary()->default(DB::raw('uuid()'));
            $table->char('periodo_escolar_id', 36);
            $table->char('beneficiario_id', 36);
            $table->unsignedTinyInteger('porcentaje');
            $table->timestamps();

            $table->foreign('periodo_escolar_id')->references('id')->on('periodos_escolares')->onDelete('cascade');
            $table->foreign('beneficiario_id')->references('id')->on('beneficiarios')->onDelete('cascade');
            $table->unique(['periodo_escolar_id', 'beneficiario_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('becas');
    }
};
