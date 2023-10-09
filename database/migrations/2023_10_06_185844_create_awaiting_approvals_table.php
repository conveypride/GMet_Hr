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
        Schema::create('awaiting_approvals', function (Blueprint $table) {
            $table->id();
            $table->text('employee_id');
            $table->text('modifiername');
            $table->text('areaChanged');
            $table->text('areaChangedValue');
            $table->text('oldvalue');
            $table->text('descriptionOfAction');
            $table->text('status');
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
        Schema::dropIfExists('awaiting_approvals');
    }
};
