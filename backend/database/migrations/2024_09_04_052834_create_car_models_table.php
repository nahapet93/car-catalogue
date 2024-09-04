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
        Schema::create('car_models', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->year('year');
            $table->integer('price');
            $table->foreignId('brand_id')->constrained('brands');
            $table->foreignId('engine_type_id')->constrained('engine_types');
            $table->foreignId('transmission_type_id')->constrained('transmission_types');
            $table->foreignId('exterior_color_id')->constrained('colors');
            $table->foreignId('interior_color_id')->constrained('colors');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('car_models', function (Blueprint $table) {
            $table->dropForeign(['brand_id']);
            $table->dropForeign(['engine_type_id']);
            $table->dropForeign(['transmission_type_id']);
            $table->dropForeign(['exterior_color_id']);
            $table->dropForeign(['interior_color_id']);
        });
        Schema::dropIfExists('car_models');
    }
};
