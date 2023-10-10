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
        Schema::create('survey_response', function (Blueprint $table) {
            $table->increments('id'); // 流水號
            $table->unsignedBigInteger('survey_id'); // 對應問卷標題資料表
            $table->string('customer_id', 20); // 使用者ID
            $table->text('answers_data'); // 使用者回答記錄
            $table->string('score', 20); // 使用者這次回答的總分
            $table->timestamps(); // created_at 和 updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('survey_responses');
    }
};
