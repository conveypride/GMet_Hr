<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EmployeeLeave;
use Illuminate\Http\Request;
// use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use PDF;
// use App\Models\User;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // main dashboard
    public function index()
    {
        $userrole = Session::get('role_name');
        if($userrole == "Normal User"){
            return view('job.useralljobs');
 }else if($userrole == "Employee"){
     $dt        = Carbon::now();
     $todayDate = $dt->toDayDateTimeString();
     return view('dashboard.emdashboard',compact('todayDate'));
 }else if($userrole == "Admin"){
    $pendingapplicants = DB::table('apply_for_jobs')->where('status', 'pending')->count();
    $employeesOnLeave = EmployeeLeave::where('leaveto', '>', now()->toDateString())->where('status','dgApproved')->count();
    $retirementAge = 64;
    $ageThreshold = $retirementAge - 5; 
    $employeesRetirementDue = Employee::whereRaw("TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) BETWEEN {$ageThreshold} AND {$retirementAge}") ->count();
// Get the current date
$today = Carbon::now()->format('m-d'); // Format: month-day
// Retrieve Employee whose birthday matches today's date
$birthday = Employee::whereRaw("DATE_FORMAT(birth_date, '%m-%d') = ?", [$today])->count();
$employeestotal = Employee::select('id')->count();

return view('dashboard.dashboard', compact('pendingapplicants', 'employeesOnLeave', 'employeesRetirementDue', 'birthday', 'employeestotal'));
 }else if ($userrole == "Super Admin"){
    $pendingapplicants = DB::table('apply_for_jobs')->where('status', 'pending')->count();
    $employeesOnLeave = EmployeeLeave::where('leaveto', '>', now()->toDateString())->where('status','dgApproved')->count();
    $retirementAge = 64;
    $ageThreshold = $retirementAge - 5; 
    $employeesRetirementDue = Employee::whereRaw("TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) BETWEEN {$ageThreshold} AND {$retirementAge}") ->count();
// Get the current date
$today = Carbon::now()->format('m-d'); // Format: month-day
// Retrieve Employee whose birthday matches today's date
$birthday = Employee::whereRaw("DATE_FORMAT(birth_date, '%m-%d') = ?", [$today])->count();
$employeestotal = Employee::select('id')->count();

return view('dashboard.dashboard', compact('pendingapplicants', 'employeesOnLeave', 'employeesRetirementDue', 'birthday', 'employeestotal'));
 }else if ($userrole == "Client"){
     return view('home');
 }else{
             return view('errors.404');
             }
// return view('home');
    }
    // employee dashboard
    public function emDashboard()
    {
        $userrole = Session::get('role_name');
        if($userrole == "Employee"){
        $dt        = Carbon::now();
        $todayDate = $dt->toDayDateTimeString();
        return view('dashboard.emdashboard',compact('todayDate'));
        }else{
            return view('errors.404');
        }
    }



    
   // admin & superAdmin dashboard
    public function adminsDashboard()
    {
        $userrole = Session::get('role_name');
        if($userrole == "Admin" || $userrole == "Super Admin" ){
            $pendingapplicants = DB::table('apply_for_jobs')->where('status', 'pending')->count();
            $employeesOnLeave = EmployeeLeave::where('leaveto', '>', now()->toDateString())->where('status','dgApproved')->count();
            $retirementAge = 64;
            $ageThreshold = $retirementAge - 5; 
            $employeesRetirementDue = Employee::whereRaw("TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) BETWEEN {$ageThreshold} AND {$retirementAge}") ->count();
     // Get the current date
    $today = Carbon::now()->format('m-d'); // Format: month-day
    // Retrieve Employee whose birthday matches today's date
    $birthday = Employee::whereRaw("DATE_FORMAT(birth_date, '%m-%d') = ?", [$today])->count();
    $employeestotal = Employee::select('id')->count();

        return view('dashboard.dashboard', compact('pendingapplicants', 'employeesOnLeave', 'employeesRetirementDue', 'birthday', 'employeestotal'));
    }else{
        return view('errors.404');
    }
    }

    public function generatePDF(Request $request)
    {
        // $data = ['title' => 'Welcome to ItSolutionStuff.com'];
        // $pdf = PDF::loadView('payroll.salaryview', $data);
        // return $pdf->download('text.pdf');
        // selecting PDF view
        $pdf = PDF::loadView('payroll.salaryview');
        // download pdf file
        return $pdf->download('pdfview.pdf');
    }
}
