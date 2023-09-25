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
        Schema::create('ipcc_report', function (Blueprint $table) {
            $table->id();  // 流水號 (自動增長)
        
            $table->text('year');
            //$table->string('name');
            $table->enum('name', ['0', '1','2','3','4','5','6']); 
            $table->string('quote');
            $table->timestamps();  // created_at 和 updated_at (timestamp)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ipcc_report');
    }
};
