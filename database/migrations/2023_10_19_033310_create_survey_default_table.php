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
        Schema::create('survey_default', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('survey_id'); // 对应问卷標題資料表的外键
            $table->string('score', 20); // 问卷分数
            $table->text('reply'); // 问卷回覆
            $table->text('suggestion'); // 问卷建議
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('survey_default');
    }
};
