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
        Schema::create('grupos_manejo', function (Blueprint $table) {
            $table->char('id', 36)->primary()->default(DB::raw('uuid()'));
            $table->char('periodo_id', 36);
            $table->string('horario');
            $table->unsignedInteger('cupo_total');
            $table->unsignedInteger('total_hombres');
            $table->unsignedInteger('total_mujeres');
            $table->timestamps();

            $table->foreign('periodo_id')->references('id')->on('periodos_manejo')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grupos_manejo');
    }
};
