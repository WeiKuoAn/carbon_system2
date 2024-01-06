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
        Schema::create('project_personnel', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('project_id', 30);
            $table->string('name', 30);
            $table->string('department', 30);
            $table->string('job', 30);
            $table->string('context', 30);
            $table->string('mobile', 30);
            $table->string('phone', 30);
            $table->string('experience', 30)->nullable();
            $table->string('email', 30)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_personnel');
    }
};
