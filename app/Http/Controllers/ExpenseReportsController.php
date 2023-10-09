<?php

namespace App\Http\Controllers;

use App\Models\EmployeeLeave;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExpenseReportsController extends Controller
{
    // view page
    public function index()
    {
        return view('reports.expensereport');
    }

    // view page
    public function invoiceReports()
    {
        return view('reports.invoicereports');
    }
    
    // daily report page
    public function dailyReport()
    {
        return view('reports.dailyreports');
    }

    // leave reports page
    public function leaveReport()
    {
        $leaves = DB::table('employee_leaves')
                    ->join('users', 'users.employeeId', '=', 'employee_leaves.user_id')
                    ->select('employee_leaves.*',  'users.avatar','users.name','users.employeeId','users.department' )
                    ->orderByDesc('employee_leaves.id')
                    ->where('employee_leaves.leavetype', '!=', 'nonEstablishedWithoutPay')
                    ->where('employee_leaves.status', 'supervisorApproved')
                    ->get();

                    $keavess = DB::table('employee_leaves')
                    ->leftjoin('users', 'users.employeeId', '=', 'employee_leaves.user_id')
                    ->select('employee_leaves.*', 'users.avatar','users.name','users.employeeId','users.department' )
                    ->orderByDesc('employee_leaves.id')
                    ->where('employee_leaves.leavetype', '!=', 'nonEstablishedWithoutPay')
                    ->get();
                    // dd($keavess);
        return view('reports.leavereports',compact('leaves', 'keavess'));
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
