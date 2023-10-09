<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('medium_employee_leaves', function (Blueprint $table) {
            $table->id();
            $table->text('annualleaveStatus')->nullable();
            $table->text('annualleaveMaxDays')->nullable();
            $table->text('annualleaveCarryForwardStatus')->nullable();
            $table->text('annualleaveCarryForwardMaxDays')->nullable();
            $table->text('sickleaveStatus')->nullable();
            $table->text('sickleaveMaxDays')->nullable();
            $table->text('hospitalisationleaveStatus')->nullable();
            $table->text('hospitalisationleaveMaxDays')->nullable();
            $table->text('maternityleaveStatus')->nullable();
            $table->text('maternityleaveMaxDays')->nullable();
            $table->text('paternityleaveStatus')->nullable();
            $table->text('paternityleaveMaxDays')->nullable();
            $table->timestamps();
        });

         DB::table('medium_employee_leaves')->insert([
            ['annualleaveStatus'=>'off',],
           
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medium_employee_leaves');
    }
};
