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
        Schema::create('devices', function (Blueprint $table) {
            $table->id(); // 流水號
            $table->string('code', 20); // 設備代碼
            $table->text('description')->nullable(); // 設備名稱
            $table->timestamps(); // created_at 和 updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('devices');
    }
};
