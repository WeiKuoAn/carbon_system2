<?php

use App\Models\ipcc_report;
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
        Schema::create('ipcc_list', function (Blueprint $table) {
             $table->id();
            // $table->bigInteger('ipcc_id');
            // $table->foreign('ipcc_id')->references('id')->on('ipcc_report');
            // $table->integer('code');
            // $table->string('name');
            // $table->float('value',8,2);
 
             $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ipcc_list');
    }
};
