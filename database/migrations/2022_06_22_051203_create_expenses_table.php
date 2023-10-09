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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->text('item_name')->nullable();
            $table->text('purchase_from')->nullable();
            $table->text('purchase_date')->nullable();
            $table->text('purchased_by')->nullable();
            $table->text('amount')->nullable();
            $table->text('paid_by')->nullable();
            $table->text('status')->nullable();
            $table->text('attachments')->nullable();
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
        Schema::dropIfExists('expenses');
    }
};
