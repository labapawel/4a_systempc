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
        Schema::create('sprzets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rodz_id');
            $table->unsignedBigInteger('salaid');
            $table->string('model')->nullable();
            $table->string('stanowisko')->nullable();
            $table->string('marka')->nullable();
            $table->string('serialno');
            $table->string('qr', 50)->nullable();
            $table->foreign('rodz_id')
            ->references('id')
            ->on('rodzaje_sps')
            ->onDelete('restrict'); 
            $table->foreign('salaid')
            ->references('id')
            ->on('sales')
            ->onDelete('restrict'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sprzets');
    }
};
