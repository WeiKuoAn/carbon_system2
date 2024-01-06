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
        Schema::create('user_groups', function (Blueprint $table) {
            $table->id(); // 序號 (主鍵)
            $table->string('name', 10); // 群組名稱
            $table->enum('status', ['1', '0']); // 狀態
            $table->timestamps(); // 建立時間和更新時間
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_groups');
    }
};
