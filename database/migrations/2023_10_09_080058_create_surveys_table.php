<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->increments('id');  // 流水號 (自動遞增)
            $table->string('category', 50);  // 問卷的類型
            $table->string('title', 50);  // 問卷的標題或名稱
            $table->text('description')->nullable();  // 簡短描述或說明
            $table->datetime('start_date');  // 問卷開放日期
            $table->datetime('end_date');  // 問卷結束日期
            $table->integer('status')->default(1);  // 1 代表開啟，0 代表關閉
            $table->timestamps();  // created_at 和 updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surveys');
    }
};
