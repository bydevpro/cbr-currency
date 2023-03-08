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
        Schema::create('cbr_currencies', function (Blueprint $table) {
            $table->id('id')->autoIncrement()->nullable(false);
            $table->integer('currentId')->nullable(false);
            $table->string('currentNumCode')->nullable(false);
            $table->integer('currentCode')->nullable(false);
            $table->string('currentName')->nullable(false);
            $table->double('currentValue')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cbr_currencies');
    }
};
