<?php

namespace App\Http\Controllers;

use App\Models\department;
use App\Models\EmployeeLeave;
use App\Models\JuniorEmployeeLeave;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\LeavesAdmin;
use App\Models\MediumEmployeeLeave;
use App\Models\SeniorEmployeeLeave;
use App\Models\User;
// use DB;
use DateTime;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LeavesController extends Controller
{
    // leaves
    public function leaves()
    {
        $leaves = DB::table('employee_leaves')
                    ->join('users', 'users.employeeId', '=', 'employee_leaves.user_id')
                    ->where('employee_leaves.leavetype', '!=', 'nonEstablishedWithoutPay')
                    ->select('employee_leaves.*', 'users.position','users.name','users.avatar')
                    ->get();
$leavestatusCount = DB::table('employee_leaves')->where('status', NULL)->where('leavetype', '!=', 'nonEstablishedWithoutPay')->count();
                    $employees = DB::table('employees')
                    ->select('name', 'employee_id')
                    ->get();

        return view('form.leaves',compact('leaves','employees','leavestatusCount'));
    }
    // save record
    public function saveRecord(Request $request)
    {
        $request->validate([
            'leavetype'   => 'required|string|max:255',
            'leavereason' => 'required|string|max:255',
        ]);
if(!empty($request->employeeId) && isset($request->employeeId)){
 $iduser = $request->employeeId;

}else{
    $iduser = Auth::user()->employeeId; 
}

 
$userdeparts = User::where('employeeId', $iduser)->first();
//
$userdepartment =  department::where('department', $userdeparts['department'])->first();
//  dd($userdepartment );
// exit();
        DB::beginTransaction();
        try {

            // $from_date = new DateTime($request->from_date);
            // $to_date = new DateTime($request->to_date);
            // $day     = $from_date->diff($to_date);
            // $days    = $day->d;
          

            $leaves = new EmployeeLeave();
            $leaves->user_id        = $iduser;
            $leaves->leavetype    = $request->leavetype;
            $leaves->leavefrom     = NULL;
            $leaves->leaveto       = NULL;
            $leaves->leavereason  = $request->leavereason;
            $leaves->supervisorname  = $userdepartment['departmenthead'];
            $leaves->save();
            
            DB::commit();
            Toastr::success('Create new Leaves successfully :)','Success');
            return redirect()->back();
        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('Add Leaves fail :)','Error');
            return redirect()->back();
        }
    }

    // edit record
    public function editRecordLeave(Request $request)
    {
        DB::beginTransaction();
        try {

            $from_date = new DateTime($request->from_date);
            $to_date = new DateTime($request->to_date);
            $day     = $from_date->diff($to_date);
            $days    = $day->d;

            $update = [
                'id'           => $request->id,
                'leave_type'   => $request->leave_type,
                'from_date'    => $request->from_date,
                'to_date'      => $request->to_date,
                'day'          => $days,
                'leave_reason' => $request->leave_reason,
            ];

            LeavesAdmin::where('id',$request->id)->update($update);
            DB::commit();
            Toastr::success('Updated Leaves successfully :)','Success');
            return redirect()->back();
        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('Update Leaves fail :)','Error');
            return redirect()->back();
        }
    }

    // delete record
    public function deleteLeave(Request $request)
    {
        try {

            LeavesAdmin::destroy($request->id);
            Toastr::success('Leaves admin deleted successfully :)','Success');
            return redirect()->back();
        
        } catch(\Exception $e) {

            DB::rollback();
            Toastr::error('Leaves admin delete fail :)','Error');
            return redirect()->back();
        }
    }

    // leaveSettings
    public function leaveSettings($id)
    {
        // 
        if($id == 'junior'){
            $leavesett = JuniorEmployeeLeave::get();
            
            $type = "Junior ";
            Toastr::success('Junior Employee Leave Setting Page Opened successfully :)','Success');
            return view('form.leavesettings', compact("leavesett","type"));
        }else if($id == 'medium'){
            $leavesett = MediumEmployeeLeave::get();
            $type = "Medium ";
            Toastr::success('Medium Employee Leave Setting Page Opened successfully :)','Success');
            return view('form.leavesettings', compact("leavesett","type"));
        }else if($id == 'senior'){
            $leavesett = SeniorEmployeeLeave::get(); 
            $type = "Senior ";
            Toastr::success('Senior Employee Leave Setting Page Opened successfully :)','Success');
            return view('form.leavesettings', compact("leavesett","type"));
        }else{
            return redirect()->back();
            Toastr::error('Something went wrong with the Leave Setting Page :)','Error');
        }

    }

     // form/leavesemployee/annalstatus
    public function save(Request $request)
    {
               // Handle the incoming AJAX data and return a response
               $data = $request->all(); // Access the posted data
               $dt       = Carbon::now();
               $todayDate = $dt->toDayDateTimeString();
            //    $data = array_merge(array($key=>false),$datas);

               if($data['employeeType'] == "Junior"){
if(isset($data['annualleaveStatus']) ){
    JuniorEmployeeLeave::updateOrInsert(
     ['id' => 1], 
      [     
        'annualleaveStatus' => $data['annualleaveStatus']
      ],
    ['created_at' =>  $todayDate ],
     ['updated_at' =>  $todayDate ]
     ); 
}

if(isset($data['annualleaveMaxDays'])){
    JuniorEmployeeLeave::updateOrInsert(
        ['id' => 1],
       [
        'annualleaveMaxDays' => $data['annualleaveMaxDays']
       ],
       ['updated_at' =>  $todayDate ]
     );
}
         
if(isset($data['annualleaveCarryForwardStatus'])){
    JuniorEmployeeLeave::updateOrInsert(
        ['id' => 1],
       [
        'annualleaveCarryForwardStatus' => $data['annualleaveCarryForwardStatus']
       ],
       ['updated_at' =>  $todayDate ]
     );
}

if(isset($data['annualleaveCarryForwardMaxDays'])){
    JuniorEmployeeLeave::updateOrInsert(
        ['id' => 1],
       [
        'annualleaveCarryForwardMaxDays' => $data['annualleaveCarryForwardMaxDays']
       ],
       ['updated_at' =>  $todayDate ]
     );
}

if(isset($data['sickleaveStatus'])){
    JuniorEmployeeLeave::updateOrInsert(
        ['id' => 1],
       [
        'sickleaveStatus' => $data['sickleaveStatus']
       ],
       ['updated_at' =>  $todayDate ]
     );
}

if(isset($data['sickleaveMaxDays'])){
    JuniorEmployeeLeave::updateOrInsert(
        ['id' => 1],
       [
        'sickleaveMaxDays' => $data['sickleaveMaxDays']
       ],
       ['updated_at' =>  $todayDate ]
     );
}

if(isset($data['hospitalisationleaveStatus'])){
    JuniorEmployeeLeave::updateOrInsert(
        ['id' => 1],
       [
        'hospitalisationleaveStatus' => $data['hospitalisationleaveStatus']
       ],
       ['updated_at' =>  $todayDate ]
     );
}

if(isset($data['hospitalisationleaveMaxDays'])){
    JuniorEmployeeLeave::updateOrInsert(
        ['id' => 1],
       [
        'hospitalisationleaveMaxDays' => $data['hospitalisationleaveMaxDays']
       ],
       ['updated_at' =>  $todayDate ]
     );
}

if(isset($data['maternityleaveStatus'])){
    JuniorEmployeeLeave::updateOrInsert(
        ['id' => 1],
       [
        'maternityleaveStatus' => $data['maternityleaveStatus']
       ],
       ['updated_at' =>  $todayDate ]
     );
}

if(isset($data['maternityleaveMaxDays'])){
    JuniorEmployeeLeave::updateOrInsert(
        ['id' => 1],
       [
        'maternityleaveMaxDays' => $data['maternityleaveMaxDays']
       ],
       ['updated_at' =>  $todayDate ]
     );
}

if(isset($data['paternityleaveStatus'])){
    JuniorEmployeeLeave::updateOrInsert(
        ['id' => 1],
       [
        'paternityleaveStatus' => $data['paternityleaveStatus']
       ],
       ['updated_at' =>  $todayDate ]
     );
}

if(isset($data['paternityleaveMaxDays'])){
    JuniorEmployeeLeave::updateOrInsert(
        ['id' => 1],
       [
        'paternityleaveMaxDays' => $data['paternityleaveMaxDays']
       ],
          ['updated_at' =>  $todayDate ]
     );
}

}else if($data['employeeType'] == "Medium"){
    if(isset($data['annualleaveStatus']) ){
        MediumEmployeeLeave::updateOrInsert(
         ['id' => 1], 
          [     
            'annualleaveStatus' => $data['annualleaveStatus']
          ],
        ['created_at' =>  $todayDate ],
         ['updated_at' =>  $todayDate ]
         ); 
    }
    
    if(isset($data['annualleaveMaxDays'])){
        MediumEmployeeLeave::updateOrInsert(
            ['id' => 1],
           [
            'annualleaveMaxDays' => $data['annualleaveMaxDays']
           ],
           ['updated_at' =>  $todayDate ]
         );
    }
             
    if(isset($data['annualleaveCarryForwardStatus'])){
        MediumEmployeeLeave::updateOrInsert(
            ['id' => 1],
           [
            'annualleaveCarryForwardStatus' => $data['annualleaveCarryForwardStatus']
           ],
           ['updated_at' =>  $todayDate ]
         );
    }
    
    if(isset($data['annualleaveCarryForwardMaxDays'])){
        MediumEmployeeLeave::updateOrInsert(
            ['id' => 1],
           [
            'annualleaveCarryForwardMaxDays' => $data['annualleaveCarryForwardMaxDays']
           ],
           ['updated_at' =>  $todayDate ]
         );
    }
    
    if(isset($data['sickleaveStatus'])){
        MediumEmployeeLeave::updateOrInsert(
            ['id' => 1],
           [
            'sickleaveStatus' => $data['sickleaveStatus']
           ],
           ['updated_at' =>  $todayDate ]
         );
    }
    
    if(isset($data['sickleaveMaxDays'])){
        MediumEmployeeLeave::updateOrInsert(
            ['id' => 1],
           [
            'sickleaveMaxDays' => $data['sickleaveMaxDays']
           ],
           ['updated_at' =>  $todayDate ]
         );
    }
    
    if(isset($data['hospitalisationleaveStatus'])){
        MediumEmployeeLeave::updateOrInsert(
            ['id' => 1],
           [
            'hospitalisationleaveStatus' => $data['hospitalisationleaveStatus']
           ],
           ['updated_at' =>  $todayDate ]
         );
    }
    
    if(isset($data['hospitalisationleaveMaxDays'])){
        MediumEmployeeLeave::updateOrInsert(
            ['id' => 1],
           [
            'hospitalisationleaveMaxDays' => $data['hospitalisationleaveMaxDays']
           ],
           ['updated_at' =>  $todayDate ]
         );
    }
    
    if(isset($data['maternityleaveStatus'])){
        MediumEmployeeLeave::updateOrInsert(
            ['id' => 1],
           [
            'maternityleaveStatus' => $data['maternityleaveStatus']
           ],
           ['updated_at' =>  $todayDate ]
         );
    }
    
    if(isset($data['maternityleaveMaxDays'])){
        MediumEmployeeLeave::updateOrInsert(
            ['id' => 1],
           [
            'maternityleaveMaxDays' => $data['maternityleaveMaxDays']
           ],
           ['updated_at' =>  $todayDate ]
         );
    }
    
    if(isset($data['paternityleaveStatus'])){
        MediumEmployeeLeave::updateOrInsert(
            ['id' => 1],
           [
            'paternityleaveStatus' => $data['paternityleaveStatus']
           ],
           ['updated_at' =>  $todayDate ]
         );
    }
    
    if(isset($data['paternityleaveMaxDays'])){
        MediumEmployeeLeave::updateOrInsert(
            ['id' => 1],
           [
            'paternityleaveMaxDays' => $data['paternityleaveMaxDays']
           ],
              ['updated_at' =>  $todayDate ]
         );
    }
    
}else if($data['employeeType'] == "Senior"){
    if(isset($data['annualleaveStatus']) ){
        SeniorEmployeeLeave::updateOrInsert(
         ['id' => 1], 
          [     
            'annualleaveStatus' => $data['annualleaveStatus']
          ],
        ['created_at' =>  $todayDate ],
         ['updated_at' =>  $todayDate ]
         ); 
    }
    
    if(isset($data['annualleaveMaxDays'])){
        SeniorEmployeeLeave::updateOrInsert(
            ['id' => 1],
           [
            'annualleaveMaxDays' => $data['annualleaveMaxDays']
           ],
           ['updated_at' =>  $todayDate ]
         );
    }
             
    if(isset($data['annualleaveCarryForwardStatus'])){
        SeniorEmployeeLeave::updateOrInsert(
            ['id' => 1],
           [
            'annualleaveCarryForwardStatus' => $data['annualleaveCarryForwardStatus']
           ],
           ['updated_at' =>  $todayDate ]
         );
    }
    
    if(isset($data['annualleaveCarryForwardMaxDays'])){
        SeniorEmployeeLeave::updateOrInsert(
            ['id' => 1],
           [
            'annualleaveCarryForwardMaxDays' => $data['annualleaveCarryForwardMaxDays']
           ],
           ['updated_at' =>  $todayDate ]
         );
    }
    
    if(isset($data['sickleaveStatus'])){
        SeniorEmployeeLeave::updateOrInsert(
            ['id' => 1],
           [
            'sickleaveStatus' => $data['sickleaveStatus']
           ],
           ['updated_at' =>  $todayDate ]
         );
    }
    
    if(isset($data['sickleaveMaxDays'])){
        SeniorEmployeeLeave::updateOrInsert(
            ['id' => 1],
           [
            'sickleaveMaxDays' => $data['sickleaveMaxDays']
           ],
           ['updated_at' =>  $todayDate ]
         );
    }
    
    if(isset($data['hospitalisationleaveStatus'])){
        SeniorEmployeeLeave::updateOrInsert(
            ['id' => 1],
           [
            'hospitalisationleaveStatus' => $data['hospitalisationleaveStatus']
           ],
           ['updated_at' =>  $todayDate ]
         );
    }
    
    if(isset($data['hospitalisationleaveMaxDays'])){
        SeniorEmployeeLeave::updateOrInsert(
            ['id' => 1],
           [
            'hospitalisationleaveMaxDays' => $data['hospitalisationleaveMaxDays']
           ],
           ['updated_at' =>  $todayDate ]
         );
    }
    
    if(isset($data['maternityleaveStatus'])){
        SeniorEmployeeLeave::updateOrInsert(
            ['id' => 1],
           [
            'maternityleaveStatus' => $data['maternityleaveStatus']
           ],
           ['updated_at' =>  $todayDate ]
         );
    }
    
    if(isset($data['maternityleaveMaxDays'])){
        SeniorEmployeeLeave::updateOrInsert(
            ['id' => 1],
           [
            'maternityleaveMaxDays' => $data['maternityleaveMaxDays']
           ],
           ['updated_at' =>  $todayDate ]
         );
    }
    
    if(isset($data['paternityleaveStatus'])){
        SeniorEmployeeLeave::updateOrInsert(
            ['id' => 1],
           [
            'paternityleaveStatus' => $data['paternityleaveStatus']
           ],
           ['updated_at' =>  $todayDate ]
         );
    }
    
    if(isset($data['paternityleaveMaxDays'])){
        SeniorEmployeeLeave::updateOrInsert(
            ['id' => 1],
           [
            'paternityleaveMaxDays' => $data['paternityleaveMaxDays']
           ],
              ['updated_at' =>  $todayDate ]
         );
    }

}
            
 
            Log::info(json_encode($data));
            //    Process the data and prepare a response
               $response = [
                   'status' => 'success',
                   'message' => 'Request processed successfully',
                   'data' => json_encode($data),
               ];
         return response()->json($response);
       
    }


    // attendance admin
    // public function employesstingssetingtype()
    // {
    //     return view('form.attendance');
    // }


    // attendance admin
    public function attendanceIndex()
    {
        return view('form.attendance');
    }

    // attendance employee
    public function AttendanceEmployee()
    {
        return view('form.attendanceemployee');
    }

    // leaves Employee
    public function leavesEmployee()
    {
        // annualLeave
        $currentyear = now()->year;
       
        $iduser = Auth::user()->employeeId;
        $leaaves = EmployeeLeave::where('user_id', $iduser)->where('leavetype', '!=', 'nonEstablishedWithoutPay')->orderBy('id', 'DESC')->get();
        $approvedLeave = EmployeeLeave::where('user_id', $iduser)->where('status', 'dgApproved')->get();
        $totalleave = 0;
        $remainingleave= 64;
        if(!empty($approvedLeave)){
foreach ($approvedLeave  as  $record) {
            # code...
       $from_date = Carbon::parse( $record->leavefrom);
            $to_date = Carbon::parse( $record->leaveto); 
            $day     = $from_date->diffInDays($to_date) + 1;
            $totalleave += $day;
           
    }
    $remainingleave=  $remainingleave - $totalleave; 
    }else{
            $totalleave = 0;
        }
        
$ids = [];
        $issupervisor = department::where('departmenthead', Auth::user()->name)->first();
if(!empty($issupervisor)){
    $useperteue= "true";
    $department = $issupervisor->department;
$useresinthesameDepartment = User::where('department',$department)->get('employeeId');
if(!empty($useresinthesameDepartment)){
    $data = EmployeeLeave::whereIn('user_id', $useresinthesameDepartment)->where('leavetype', '!=', 'nonEstablishedWithoutPay')->where('status', NULL)->get();
}


}else{
    $useperteue = "false";
    $data = "null";
}

        return view('form.leavesemployee',compact('leaaves','totalleave',"remainingleave", "useperteue", 'data'));
    }

    // shiftscheduling
    public function shiftScheduLing()
    {
        return view('form.shiftscheduling');
    }

    // shiftList
    public function shiftList()
    {
        return view('form.shiftlist');
    }

    public function approveorreject( Request $request, $id)
    {
        if($id == 'rejected'){
            $approveorreject= [
            'status'=>  $id, 
            'signedbySupervisor' => 'false'
        ]; 
        }else{
            $approveorreject= [
                'status'=>  $id, 
                'signedbySupervisor' => 'true'
            ]; 
        }
       
        EmployeeLeave::where('id',$request->approverej)->update($approveorreject);
        Toastr::success('Action successfully :)','Success');
        return redirect()->back();

// dd($request->approverej, $id);
        // return view('form.shiftlist');
    }


}
