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
        Schema::create('manufacture_expected', function (Blueprint $table) {
            $table->id()->comment('主鍵');
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->comment('使用者ID');
            $table->foreignId('project_id')->constrained()->onDelete('cascade')->comment('專案ID');
            $table->string('name', 30)->comment('設備名稱');
            $table->string('brand', 30)->nullable()->comment('設備品牌');
            $table->string('model', 30)->nullable()->comment('設備型號');
            $table->string('purpose', 30)->nullable()->comment('用途/規格');
            $table->string('cost', 30)->nullable()->comment('費用');
            $table->string('procurement', 30)->nullable()->comment('採購對象');
            $table->string('origin', 30)->nullable()->comment('產地');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manufacture_expected');
    }
};
