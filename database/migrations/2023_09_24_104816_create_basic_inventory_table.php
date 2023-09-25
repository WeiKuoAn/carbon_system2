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
        Schema::create('basic_inventory', function (Blueprint $table) {
            $table->id(); // PK
            $table->string('year', 20)->comment('盤查年度');
            $table->enum('reason', [0, 1, 2])->comment('0：自主盤查,1：依法申報,2：其他'); // 登陸原因
            $table->enum('norm', [0, 1, 2])->comment('0：使用ISO14064-1標準,1：使用環保署標準'); // 依據規範
            $table->string('ipcc_id', 20)->comment('GWP版本'); // 
            $table->string('verification_agency', 100)->comment('查證機構'); // 
            $table->enum('status', [0, 1, 2, 3])->nullable()->comment('0：準備中,1：盤查中,2：驗證中,3：已完成'); // 
            $table->string('substantive', 20)->nullable()->comment('實質性門檻%數'); // 
            $table->string('significance', 20)->nullable()->comment('顯著性門檻%數'); // 
            $table->string('exclusion', 20)->nullable()->comment('排除性門檻%數'); // 
            $table->enum('base_year', [0, 1])->comment('基準年,0=是,1=否'); // 
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('basic_inventory');
    }
};
