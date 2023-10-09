<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_salaries', function (Blueprint $table) {
            $table->id();
            $table->text('name')->nullable();
            $table->text('user_id')->nullable();
            $table->text('salary')->nullable();
            $table->text('basic')->nullable();
            $table->text('da')->nullable();
            $table->text('hra')->nullable();
            $table->text('conveyance')->nullable();
            $table->text('allowance')->nullable();
            $table->text('medical_allowance')->nullable();
            $table->text('tds')->nullable();
            $table->text('esi')->nullable();
            $table->text('pf')->nullable();
            $table->text('leave')->nullable();
            $table->text('prof_tax')->nullable();
            $table->text('labour_welfare')->nullable();
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
        Schema::dropIfExists('staff_salaries');
    }
}
