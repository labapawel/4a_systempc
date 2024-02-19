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
        Schema::create('material_wartoscs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sprz_id');
            $table->unsignedBigInteger('rodzmas_id');
            $table->string('wartosc');
            $table->foreign('sprz_id')
            ->references('id')
            ->on('sprzets')
            ->onDelete('restrict'); 

            $table->foreign('rodzmas_id')
            ->references('id')
            ->on('rodzaje_mas')
            ->onDelete('restrict'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('material_wartoscs');
    }
};
