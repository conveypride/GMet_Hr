<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerformanceIndicatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performance_indicators', function (Blueprint $table) {
            $table->id();
            $table->text('user_id')->nullable();
            $table->text('designation')->nullable();
            $table->text('customer_eperience')->nullable();
            $table->text('marketing')->nullable();
            $table->text('management')->nullable();
            $table->text('administration')->nullable();
            $table->text('presentation_skill')->nullable();
            $table->text('quality_of_Work')->nullable();
            $table->text('efficiency')->nullable();
            $table->text('integrity')->nullable();
            $table->text('professionalism')->nullable();
            $table->text('team_work')->nullable();
            $table->text('critical_thinking')->nullable();
            $table->text('conflict_management')->nullable();
            $table->text('attendance')->nullable();
            $table->text('ability_to_meet_deadline')->nullable();
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
        Schema::dropIfExists('performance_indicators');
    }
}
