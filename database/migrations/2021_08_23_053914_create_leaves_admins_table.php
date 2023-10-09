<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeavesAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves_admins', function (Blueprint $table) {
            $table->id();
            $table->text('user_id')->nullable();
            $table->text('leave_type')->nullable();
            $table->text('from_date')->nullable();
            $table->text('to_date')->nullable();
            $table->text('day')->nullable();
            $table->text('leave_reason')->nullable();
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
        Schema::dropIfExists('leaves_admins');
    }
}
