<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('process_emissions', function (Blueprint $table) {
            $table->id();
            $table->string('process_code', 80)->nullable(false);
            $table->string('equipment_code', 80)->nullable(false);
            $table->string('fuel_name', 80)->nullable(false);
            $table->string('emission_data', 80)->nullable();
            $table->string('activity_data', 80)->nullable();
            $table->string('unit', 80)->nullable();
            $table->string('ghg_type', 80)->nullable();
            $table->string('single_source_emission_total', 80)->nullable();
            $table->string('single_source_percentage', 80)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('process_emissions');
    }
};
