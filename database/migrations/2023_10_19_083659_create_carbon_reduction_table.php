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
        Schema::create('carbon_reduction', function (Blueprint $table) {
            $table->id();
            $table->string('customer_id')->comment('公司ID');
            $table->date('deadline')->comment('達成期限');
            $table->decimal('budget', 10, 2)->comment('預算');
            $table->string('measure_name')->comment('減排措施名稱');
            $table->text('description')->comment('減排措施描述');
            $table->decimal('estimated_cost', 10, 2)->comment('估計成本');
            $table->text('implementation')->comment('實施計劃');
            $table->string('progress_status', 50)->comment('進度狀態');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carbon_reduction');
    }
};
