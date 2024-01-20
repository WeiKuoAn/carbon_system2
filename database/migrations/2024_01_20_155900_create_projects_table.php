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
        Schema::create('project_appendix', function (Blueprint $table) {
            $table->id();
            $table->string('project_id', 30);
            $table->text('checkboxes_status'); // 用於存儲序列化的 checkbox 狀態
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_appendix');
    }
};
