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
        Schema::create('iso14064', function (Blueprint $table) {
            $table->id();
            $table->foreignId('scope_id')->constrained(); // 這會創建一個外鍵，連結到 scopes 表的 id 欄位
            $table->string('name')->nullable(false); // 設置 name 欄位為非空（必要）
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iso14064');
    }
};
