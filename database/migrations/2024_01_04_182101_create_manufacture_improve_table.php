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
        Schema::create('manufacture_improve', function (Blueprint $table) {
            $table->id()->comment('主鍵');
            $table->unsignedBigInteger('user_id')->comment('使用者ID');
            $table->string('project_id')->comment('專案ID');
            $table->string('name', 30)->comment('設備名稱');
            $table->string('focus', 50)->comment('改善重點');
            $table->string('cost', 30)->comment('費用');
            $table->string('delegate_object', 30)->comment('委託對象');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manufacture_improve');
    }
};
