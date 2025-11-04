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
        Schema::create('property_attribute_values', function (Blueprint $table) {
            $table->id();
            $table->string('slug', 255)->unique()->nullable();
            $table->unsignedBigInteger('property_id');
            $table->unsignedBigInteger('attribute_id');
            $table->string('value', 255);
            $table->timestamps();

            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
            $table->foreign('attribute_id')->references('id')->on('property_attribute_definitions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_attribute_values');
    }
};
