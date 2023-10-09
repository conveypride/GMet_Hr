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
        Schema::create('s_tasks', function (Blueprint $table) {
            $table->id();
            $table->text('projectTitle')->nullable();
            $table->text('deadline')->nullable();
            $table->text('assignedTo')->nullable();
            $table->text('projectDescription')->nullable();
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
        Schema::dropIfExists('s_tasks');
    }
};
