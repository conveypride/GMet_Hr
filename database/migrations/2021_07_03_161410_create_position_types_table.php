<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePositionTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('position_types', function (Blueprint $table) {
            $table->id();
            $table->text('position')->nullable();
            $table->timestamps();
        });

        DB::table('position_types')->insert([
            ['position' => 'Assistant Meteorologist'],
            ['position' => 'Senior Meteorological Technician'],
            ['position' => 'Assistant Adminstrative Officer'],
            ['position' => 'Assistant Internal Auditor'],
            ['position' => 'Assistant Estate Officer'],
            ['position' => 'Principal Legal Officer'],
            ['position' => 'Legal Officer'],
            ['position' => 'Senior Driver'],
            ['position' => 'Assistant Public Relation Officer'],
            ['position' => 'Assistant .IT Officer']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('position_types');
    }
}
