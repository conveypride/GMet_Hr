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
        Schema::create('personal_information', function (Blueprint $table) {
            $table->id();
            $table->text('user_id');
            $table->text('passport_no');
            $table->text('passport_expiry_date')->nullable();
            $table->text('tel')->nullable();
            $table->text('nationality')->nullable();
            $table->text('religion')->nullable();
            $table->text('marital_status')->nullable();
            $table->text('employment_of_spouse')->nullable();
            $table->text('children')->nullable();
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
        Schema::dropIfExists('personal_information');
    }
};
