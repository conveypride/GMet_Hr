<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // verifyprofile
            $table->text('verifiedprofile')->nullable();
            $table->text('employeeId')->nullable();
             });
             $dt       = Carbon::now();
             $todayDate = $dt->toDayDateTimeString();

             DB::table('users')->insert(
                [
                    ['name' => 'Administrator'],
                    ['user_id' => 'KH_00000'],
                    ['email' => 'Administrator@gmail.com'],
                    ['avatar' => 'photo_defaults.png'],
                    ['join_date' =>   $todayDate],
                    ['role_name' => 'Super Admin'],
                    ['status'    => 'Active'],
                    ['employeeId' =>  'Admin312'],
                    ['password'  => Hash::make('Administrator@gmail.com')],
                ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
