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
        Schema::create('add_jobs', function (Blueprint $table) {
            $table->id();
            $table->text('job_title')->nullable();
            $table->text('department')->nullable();
            $table->text('job_location')->nullable();
            $table->text('no_of_vacancies')->nullable();
            $table->text('experience')->nullable();
            $table->text('age')->nullable();
            $table->text('salary_from')->nullable();
            $table->text('salary_to')->nullable();
            $table->text('job_type')->nullable();
            $table->text('status')->nullable();
            $table->text('start_date')->nullable();
            $table->text('expired_date')->nullable();
            $table->longText('description')->nullable();
            $table->longText('count')->nullable();
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
        Schema::dropIfExists('add_jobs');
    }
};
