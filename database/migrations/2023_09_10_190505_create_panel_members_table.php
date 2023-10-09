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
        Schema::create('panel_members', function (Blueprint $table) {
            $table->id();
            $table->text('name')->nullable();
            $table->text('uniqueid')->nullable();
            $table->text('password')->nullable();
            $table->text('expirinDate')->nullable();
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
        Schema::dropIfExists('panel_members');
    }
};
