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
        Schema::create('survey_questions', function (Blueprint $table) {
            $table->increments('id');  // 流水號 (自動遞增)
            $table->unsignedInteger('survey_id');  // 對應問卷標題資料表的 id
            $table->unsignedInteger('face_id');  // 面向
            $table->string('type', 20);  // 問題類型
            $table->text('options');  // 問卷選項 (以 JSON 格式儲存)
            $table->text('score');  // 該問題的分數
            $table->timestamps();  // created_at 和 updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surveys_questions');
    }
};
