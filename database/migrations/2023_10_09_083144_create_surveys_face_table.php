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
        Schema::create('surveys_face', function (Blueprint $table) {
            $table->increments('id');  // 流水號 (自動遞增)
            $table->unsignedInteger('survey_id');  // 對應問卷標題資料表的 id
            $table->string('name', 20);  // 面向名稱
            $table->text('description')->nullable();  // 面向簡短描述或說明 (可為空)
            $table->timestamps();  // created_at 和 updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surveys_face');
    }
};
