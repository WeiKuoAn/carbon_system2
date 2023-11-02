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
        Schema::create('01_starting', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stage_id')->constrained('stages');
            $table->text('meeting_file_path')->nullable();
            $table->date('commitment_date')->nullable();
            $table->text('organization_file_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('01_starting');
    }
};
