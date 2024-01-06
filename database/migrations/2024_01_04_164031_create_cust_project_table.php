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
        Schema::create('cust_project', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('year', 30);
            $table->enum('type', [0, 1, 2]);
            $table->string('last_year_revenue', 30)->nullable();
            $table->string('insured_employees', 30)->nullable();
            $table->string('insurance_male', 30)->nullable();
            $table->string('insurance_female', 30)->nullable();
            $table->string('production_chart', 30)->nullable();
            $table->text('clients_market')->nullable();
            $table->text('export_status')->nullable();
            $table->string('contact_name', 30)->nullable();
            $table->string('contact_email', 30)->nullable();
            $table->string('contact_phone', 30)->nullable();
            $table->text('nas_link')->nullable();
            $table->string('carbon_done', 30)->nullable();
            $table->enum('status', [0, 1, 2]);
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cust_project');
    }
};
