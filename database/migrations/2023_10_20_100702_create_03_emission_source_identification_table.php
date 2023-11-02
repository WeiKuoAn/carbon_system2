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
        Schema::create('03_emission_source_identification', function (Blueprint $table) {
            $table->id();
            $table->text('activity_data_file_path')->nullable();
            $table->text('photo_collection')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('03_emission_source_identification');
    }
};
