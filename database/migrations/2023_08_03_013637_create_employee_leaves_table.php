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
        Schema::create('employee_leaves', function (Blueprint $table) {
            $table->id();
            $table->text('user_id')->nullable();
            $table->text('leavefrom')->nullable();
            $table->text('leaveto')->nullable();
            $table->text('leavetype')->default('nonEstablishedWithoutPay');
            $table->text('signedbySupervisor')->default('false');
            $table->text('supervisorname')->nullable();
            $table->text('leavereason')->nullable();
            $table->text('status')->nullable();
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
        Schema::dropIfExists('employee_leaves');
    }
};
