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
        Schema::create('cust_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->text('introduce')->nullable();
            $table->string('capital', 30)->nullable();
            $table->string('contact_name', 30)->nullable();
            $table->string('contact_job', 30)->nullable();
            $table->string('contact_email', 30)->nullable();
            $table->string('contact_phone', 30)->nullable();
            $table->string('registration_no', 30)->nullable();
            $table->string('county', 30)->nullable();
            $table->string('district', 30)->nullable();
            $table->text('address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cust_data');
    }
};
