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
        Schema::create('boundary_setting', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stage_id')->constrained('stages');
            $table->text('standard')->nullable()->comment('盤查使用標準');  // 使用標準
            $table->text('organizational_boundary_setting')->nullable()->comment('組織邊界設定');  // 使用標準
            $table->text('boundary_setting')->nullable()->comment('盤查邊界設定');;  // 邊界設定或檔案連結
            $table->text('boundary_address')->nullable()->comment('盤查邊界地址');  // 邊界地址
            $table->date('reference_year')->nullable()->comment('盤查年度');  // 基準年份
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boundary_setting');
    }
};
