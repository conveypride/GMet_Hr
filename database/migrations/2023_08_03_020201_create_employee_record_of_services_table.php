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
        Schema::create('employee_record_of_services', function (Blueprint $table) {
            $table->id();
            $table->text('user_id')->nullable();
            $table->text('effectiveDate')->nullable();
            $table->text('grade')->nullable();
            $table->text('status')->nullable();
            $table->text('salaryscale')->nullable();
            $table->text('incrementalDate')->nullable();
            $table->text('department')->nullable();

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
        Schema::dropIfExists('employee_record_of_services');
    }
};
