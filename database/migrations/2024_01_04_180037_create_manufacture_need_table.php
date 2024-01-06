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
        Schema::create('manufacture_need', function (Blueprint $table) {
            $table->id()->comment('主鍵');
            $table->unsignedBigInteger('user_id')->nullable()->comment('使用者ID');
            $table->string('project_id')->comment('專案ID');
            $table->text('context')->comment('簡述內容');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manufacture_need');
    }
};
