<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();  // 流水號 (自動增長)
            $table->string('name', 10)->nullable(); // 分行名稱 (不必要)
            $table->string('contact_name', 10); // 分行聯絡人姓名
            $table->string('contact_phone', 20); // 分行聯絡人電話
            $table->string('contact_email', 100); // 分行聯絡人電子郵件
            $table->text('address'); // 分行地址
            $table->text('note'); // 備註
            $table->timestamps();  // created_at 和 updated_at (timestamp)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('branches');
    }
};

