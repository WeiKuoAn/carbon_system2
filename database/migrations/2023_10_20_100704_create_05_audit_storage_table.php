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
        Schema::create('05_audit_storage', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stage_id')->constrained('stages');
            $table->text('internal_verification')->nullable()->comment('內部和外部'); // 若需要區分內部和外部，可以拆分成兩個欄位
            $table->string('ares_international_certification_iso14064_1')->nullable()->comment('亞瑞仕國際驗證ISO14064-1證書');
            $table->string('ares_international_certification_zero_carbon')->nullable()->comment('亞瑞仕國際驗證零碳證書');
            $table->string('un_carbon_certificate')->nullable()->comment('聯合國碳權證書');
            $table->text('inventory_checklist')->nullable()->comment('盤查清冊'); // 若有實體檔案，可能需要儲存路徑或使用另一資料表
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('05_audit_storage');
    }
};
