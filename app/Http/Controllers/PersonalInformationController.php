<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PersonalInformation;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

// use DB;

class PersonalInformationController extends Controller
{

   

    /** save record */
    public function saveRecord(Request $request)
    {
        // dd($request->user_id);
        // exit();
        // $request->validate([
        //     'passport_no'          => 'required|string|max:255',
        //     'passport_expiry_date' => 'required|string|max:255',
        //     'tel'                  => 'required|string|max:255',
        //     'nationality'          => 'required|string|max:255',
        //     'hometown'             => 'required|string|max:255',
        //     'marital_status'       => 'required|string|max:255',
        //     'maritalDate'          => 'required|string|max:255',
        //     'children'             => 'required|string|max:255',
        // ]);

        DB::beginTransaction();
        try {
            
            $user_information = PersonalInformation::firstOrNew(
                ['user_id' =>  $request->user_id],
            );
            // Get the updated columns with their old and new values
$updatedColumns = $user_information->trackUpdatedColumns($request->all());
// Log::alert("message",$updatedColumns);
// exit();
            $user_information->user_id              = $request->user_id;
            $user_information->passport_no          = $request->passport_no;
            $user_information->passport_expiry_date = $request->passport_expiry_date;
            $user_information->tel                  = $request->tel;
            $user_information->nationality          = $request->nationality;
            $user_information->hometown             = $request->hometown;
            $user_information->marital_status       = $request->marital_status;
            $user_information->maritalDate          = $request->maritalDate;
            $user_information->children             = $request->children;
            $user_information->save();
             
// activity_logs
$dt       = Carbon::now();
$todayDate = $dt->toDayDateTimeString();
$activityLog = ['name'=> Session::get('name'),'email'=> Session::get('email'),'description' => 'Updated employee '.$request->user_id.' personal infomation: '.json_encode($updatedColumns).'','date_time'=> $todayDate,];
DB::table('activity_logs')->insert($activityLog);

            DB::commit();
            Toastr::success('Personal information Updated successfully :)','Success');
            return redirect()->back();
            
        } catch(\Exception $e) {
            Log::alert($e);
            DB::rollback();
            Toastr::error('Add personal information fail :)','Error');
            return redirect()->back();
        }
    }
}
