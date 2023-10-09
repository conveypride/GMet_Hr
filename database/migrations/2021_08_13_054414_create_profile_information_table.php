<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_information', function (Blueprint $table) {
            $table->id();
            $table->text('name')->nullable();
            $table->text('user_id')->nullable();
            $table->text('email')->nullable();
            $table->text('birth_date')->nullable();
            $table->text('gender')->nullable();
            $table->text('address')->nullable();
            $table->text('state')->nullable();
            $table->text('country')->nullable();
            $table->text('pin_code')->nullable();
            $table->text('phone_number')->nullable();
            $table->text('department')->nullable();
            $table->text('designation')->nullable();
            $table->text('reports_to')->nullable();
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
        Schema::dropIfExists('profile_information');
    }
}
