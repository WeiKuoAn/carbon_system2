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
        Schema::create('emission_data', function (Blueprint $table) {
            $table->id();  // PK, Auto-incrementing ID
            $table->string('emission_id');
            $table->string('frequency');
            $table->enum('value_type', ['1', '2', '3']);
            $table->string('value');  // Assuming a precision of 8 and a scale of 2
            $table->string('unit')->nullable();  // Nullable, as you didn't specify whether it's required or not
            $table->string('emission_value');  // Assuming a precision of 8 and a scale of 2
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emission_data');
    }
};
