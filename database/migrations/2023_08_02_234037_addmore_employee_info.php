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
        Schema::table('personal_information', function (Blueprint $table) {
            //
            $table->text('hometown')->nullable();
            $table->text('birthcert')->nullable();
             $table->text('ssnit')->nullable();
$table->text('maritalDate')->nullable();
$table->text('comment')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('personal_information', function (Blueprint $table) {
            //
        });
    }
};
