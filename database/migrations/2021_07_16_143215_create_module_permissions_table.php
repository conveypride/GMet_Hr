<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_permissions', function (Blueprint $table) {
            $table->id();
            $table->text('employee_id')->nullable();
            $table->text('module_permission')->nullable();
            $table->text('id_count')->nullable();
            $table->text('read')->nullable();
            $table->text('write')->nullable();
            $table->text('create')->nullable();
            $table->text('delete')->nullable();
            $table->text('import')->nullable();
            $table->text('export')->nullable();
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
        Schema::dropIfExists('module_permissions');
    }
}
