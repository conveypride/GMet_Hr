<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->text('trainer_id')->nullable();
            $table->text('employees_id')->nullable();
            $table->text('training_type')->nullable();
            $table->text('trainer')->nullable();
            $table->text('employees')->nullable();
            $table->text('training_cost')->nullable();
            $table->text('start_date')->nullable();
            $table->text('end_date')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('trainings');
    }
}
