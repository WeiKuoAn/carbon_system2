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
        Schema::create('04_system_calculation', function (Blueprint $table) {
            $table->id();
            $table->text('emission_inventory_file_path')->nullable();
            $table->string('verification_unit_review')->nullable();
            $table->date('verification_unit_review_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('04_system_calculation');
    }
};
