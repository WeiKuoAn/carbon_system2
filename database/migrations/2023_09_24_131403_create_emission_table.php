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
        Schema::create('emission', function (Blueprint $table) {
            $table->id();
            $table->string('basic_inventory_id', 20);
            $table->string('scope_id', 20);
            $table->string('source_id', 20);
            $table->string('iso16064_id', 20);
            $table->string('ghg_id', 20);
            $table->string('process_id', 20)->nullable();
            $table->string('device_id', 20)->nullable();
            $table->string('electricity_type', 20)->nullable();
            $table->string('electricity_source', 20)->nullable();
            $table->string('fuel', 20)->nullable();
            $table->text('text')->nullable();
            $table->text('image')->nullable();
            $table->enum('status', [0, 1])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emission');
    }
    
};
