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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->date('year');
            $table->string('fuel_type');
            $table->integer('door_count');
            $table->bigInteger('price');
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreignId('color_id')->references('id')->on('colors')->onDelete('cascade');
            $table->foreignId('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->foreignId('model_id')->references('id')->on('car_models')->onDelete('cascade');
            $table->foreignId('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
