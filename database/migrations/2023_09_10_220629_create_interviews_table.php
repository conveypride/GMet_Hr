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
        Schema::create('interviews', function (Blueprint $table) {
            $table->id();
            $table->text("nomineeid")->nullable();
            $table->text("nomineename")->nullable();
            $table->text("dateofinterview")->nullable();
            $table->text("inteviewtype")->nullable();
            $table->text("panelid")->nullable();
            $table->text("emailcontent")->nullable();
            $table->text('interviewletter')->nullable();
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
        Schema::dropIfExists('interviews');
    }
};
