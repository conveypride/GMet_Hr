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
        Schema::create('estimates', function (Blueprint $table) {
            $table->id();
            $table->text('estimate_number');
            $table->text('client')->nullable();
            $table->text('project')->nullable();
            $table->text('email')->nullable();
            $table->text('tax')->nullable();
            $table->text('client_address')->nullable();
            $table->text('billing_address')->nullable();
            $table->text('estimate_date')->nullable();
            $table->text('expiry_date')->nullable();
            $table->text('total')->nullable();
            $table->text('tax_1')->nullable();
            $table->text('discount')->nullable();
            $table->text('grand_total')->nullable();
            $table->text('other_information')->nullable();
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
        Schema::dropIfExists('estimates');
    }
};
