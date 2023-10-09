<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estimates_adds', function (Blueprint $table) {
            $table->id();
            $table->text('estimate_number');
            $table->text('item')->nullable();
            $table->text('description')->nullable();
            $table->text('unit_cost')->nullable();
            $table->text('qty')->nullable();
            $table->text('amount')->nullable();
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
        Schema::dropIfExists('estimates_adds');
    }
};
