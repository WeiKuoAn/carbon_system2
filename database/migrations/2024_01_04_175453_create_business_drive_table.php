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
        Schema::create('business_drive', function (Blueprint $table) {
            $table->id()->comment('主鍵');
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->comment('使用者ID');
            $table->string('project_id', 30)->comment('專案ID');
            $table->string('name', 30)->comment('名稱');
            $table->string('numbers', 30)->comment('統一編號');
            $table->string('principal', 30)->comment('負責人');
            $table->string('employeecount', 30)->comment('員工數');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_drive');
    }
};
