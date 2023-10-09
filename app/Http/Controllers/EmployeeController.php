<?php

namespace App\Http\Controllers;

use App\Models\AttachemployeeFile;
use App\Models\awaitingApproval;
use Illuminate\Http\Request;
// use DB;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Employee;
use App\Models\department;
use App\Models\Designation;
use App\Models\EmployeeChildren;
use App\Models\EmployeeCourses;
use App\Models\EmployeeEducationalBackground;
use App\Models\EmployeeHonours;
use App\Models\Employeelanguages;
use App\Models\EmployeeLeave;
use App\Models\EmployeePhysDisabilities;
use App\Models\EmployeePreviousEmployee;
use App\Models\EmployeeRecordOfService;
use App\Models\User;
use App\Models\module_permission;
use App\Models\PersonalInformation;
use App\Models\ProfileInformation;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class EmployeeController extends Controller
{

 // add new employee record
 public function addnew()
 {
    $position    = DB::table('position_types')->get();
    $departments = DB::table('departments')->get();
     return view('form.addEmployee',compact('position','departments'));
 }

public function addnewEmployee(Request $request)
 {
    
    $employeeId = $request->employeeId;
    $hometown = $request->hometown;
    $gender = $request->gender;
    $level= $request->level;
   
    // $birthcert = $request->file('birthcert');
    // $passportpic = $request->file('passportpic');
    $birth_date = $request->birth_date;
    $nationality = $request->nationality;
     $surname = $request->surname;
     $middlename = $request->middlename;
     $othername = $request->othername;
     $ssnit = $request->ssnit;
    $ghcard_id = $request->ghcard_id;
    $ghcard_id_expire = $request->ghcard_id_expire;
    $email = $request->email;
    $fixednum = $request->fixednum;
    $mobilenum = $request->mobilenum;
    $address = $request->address;
    $maritalStatus1 = $request->maritalStatus1;
    $marriageDate = $request->marriageDate;
    $comment = $request->comment;
    $edu = $request->input('edu');
    $honours = $request->input('honours');
    $languages = $request->input('languages');
    $previousEmployee = $request->input('previousEmployee');
    $physDisabilities = $request->input('physDisabilities');
$courses = $request->input('courses');
$coursesyear = $request->input('coursesyear');
$leavefrom = $request->input('leavefrom');
$leaveto = $request->input('leaveto');
$childrensName = $request->input('childrensName');
$childrensbirthday = $request->input('childrensbirthday');
$effectiveDate = $request->input('effectiveDate');
$grade = $request->input('grade');
$status = $request->input('status');
$salaryscale = $request->input('salaryscale');
$incrementalDate = $request->input('incrementalDate');
$department = $request->department;
$adddocs = $request->adddocs;
$adddocsDate = $request->adddocsDate;

// $passportpicName = time() . '_' . $passportpic->getClientOriginalName();
// $proficpicpath = $passportpic->storePubliclyAs('/public/employeePassport', $passportpicName);
// $birthcertName = time() . '_' . $birthcert->getClientOriginalName();
// $birthcertpath = $birthcert->storePubliclyAs('/public/employeeBirthCert', $birthcertName);
// dd($coursesyear);
// exit();
DB::beginTransaction();
try{
    $employees = Employee::where('email', '=',$request->email)->first();
    // 
    $departmenthead = department::where("department", last($department))->first();
    // dd($departmenthead->departmenthead);
if(isset($departmenthead) && !empty($departmenthead)){
    $departmentheadd=  $departmenthead->departmenthead;
}else{
    $departmentheadd = Null;
}



    if ($employees === null)
    {
    $dt       = Carbon::now();
    $todayDate = $dt->toDayDateTimeString();
    $profilepic = time().'.'.$request->passportpic->extension();  
    $request->passportpic->move(public_path('assets/images/employeePassport'), $profilepic);
    $user = new User;
    $user->name         = $surname.' '.$middlename. ' '.$othername;
    $user->employeeId      = $employeeId;
    $user->email        = $email;
    $user->join_date    = $todayDate;
    $user->phone_number = $mobilenum;
    $user->role_name    = 'Employee';
    $user->position     = last($grade);
    $user->department   = last($department);
    $user->status       = 'Inactive';
    $user->avatar       = $profilepic;
    $user->password     = Hash::make($employeeId);
    $user->verifiedprofile     = 'Pending';
    $user->save();
    // ProfileInformation
    $profileInfo = new ProfileInformation;
    $profileInfo->name =  $surname.' '.$middlename. ' '.$othername;
    $profileInfo->user_id      = $employeeId;
    $profileInfo->email      = $email;
    $profileInfo->birth_date      = $birth_date;
    $profileInfo->gender      = $gender;
    $profileInfo->state      = 'Accra';
    $profileInfo->address      = $address;
    $profileInfo->country      = 'Ghana';
    $profileInfo->pin_code      = '00233';
    $profileInfo->phone_number      = $mobilenum;
    $profileInfo->department      = last($department);
    $profileInfo->designation      = last($grade);
    $profileInfo->reports_to      =  $departmentheadd;
    $profileInfo->save();
    //  personalInfo 
    $birthcert = time().'.'.$request->birthcert->extension();  
    $request->birthcert->move(public_path('assets/images/employeeBirthCert'), $birthcert);
    $personalInfo = new PersonalInformation;
    $personalInfo->user_id      = $employeeId;
    $personalInfo->passport_expiry_date     = $ghcard_id_expire;
    $personalInfo->passport_no      = $ghcard_id;
    $personalInfo->tel              = $fixednum;
    $personalInfo->nationality      = $nationality;
    $personalInfo->marital_status      = $maritalStatus1;
    $personalInfo->children      = count($childrensName);
    $personalInfo->hometown           = $hometown;
    $personalInfo->birthcert	      = $birthcert;
    $personalInfo->ssnit              = $ssnit;
    $personalInfo->maritalDate	      = $marriageDate;
    $personalInfo->comment	      = $comment; 
    $personalInfo->save();
// EMPLOYEE TABLE
$employees = new Employee;
$employees->name = $surname.' '.$middlename. ' '.$othername;;
$employees->email = $email;
$employees->birth_date = $birth_date;
$employees->gender = $gender;
$employees->employee_id = $employeeId;;
$employees->company = 'GMet';
$employees->level = $level;
$employees->save();

// edu

foreach ($edu as $key => $value) {
    $educationback = new EmployeeEducationalBackground;
    $educationback->user_id      = $employeeId;
    $educationback->educationalbackground = $value;
    $educationback->save();
}

// honours
foreach ($honours as $key => $value) {
    $employeehonours = new EmployeeHonours;
    $employeehonours->user_id      = $employeeId;
    $employeehonours->honours =  $value;
    $employeehonours->save();
    
}

// language
foreach ($languages as $key => $value) {
    $employeelang = new Employeelanguages;
$employeelang->user_id      = $employeeId;
$employeelang->language =  $value;
$employeelang->save();
}

//  previousEmployee 
foreach ($previousEmployee as $key => $value) {
    $employeePreviousEmployee = new EmployeePreviousEmployee;
    $employeePreviousEmployee->user_id      = $employeeId;
    $employeePreviousEmployee->previousEmployee =  $value;
    $employeePreviousEmployee->save();
}

//  physDisabilities
foreach ($physDisabilities as $key => $value) {
    $employeePhysDisabilities = new EmployeePhysDisabilities;
    $employeePhysDisabilities->user_id      = $employeeId;
    $employeePhysDisabilities->physDisabilities =  $value;
    $employeePhysDisabilities->save();
}

//  courses/ qualifications
foreach ($courses as $key => $value) {
    $employeeCourse = new EmployeeCourses();
    $employeeCourse->user_id      = $employeeId;
    $employeeCourse->courses =  $value;
    $employeeCourse->courseyear =  $coursesyear[$key];
    $employeeCourse->save();
}

//  leave
foreach ($leavefrom as $key => $value) {
    $leave = new EmployeeLeave();
    $leave->user_id      = $employeeId;
    $leave->leavefrom =  $value;
    $leave->leaveto =  $leaveto[$key];
    $leave->leavetype =  'nonEstablishedWithoutPay';
    $leave->signedbySupervisor =  'false';
    $leave->save();
}

//  children
foreach ($childrensName as $key => $value) {
    $child = new EmployeeChildren();
    $child->user_id      = $employeeId;
    $child->childrensName =  $value;
    $child->childrensbirthday =  $childrensbirthday[$key];
    $child->save();
}

//  record of service
foreach ($effectiveDate as $key => $value) {
    $recordOfServ = new EmployeeRecordOfService();
    $recordOfServ->user_id      = $employeeId;
    $recordOfServ->effectiveDate =  $value;
    $recordOfServ->grade =  $grade[$key];
    $recordOfServ->status =  $status[$key];
    $recordOfServ->salaryscale =  $salaryscale[$key];
    $recordOfServ->incrementalDate =  $incrementalDate[$key];
    $recordOfServ->department =  $department[$key];
    $recordOfServ->save();
}

// ATTACH DOC
foreach ($adddocs as $key => $value) {
    $values = time().'.'.$value->extension();  
    $value->move(public_path('assets/images/employeeAttachFile'), $values);
    $doc = new AttachemployeeFile();
    $doc->user_id      = $employeeId;
    $doc->filename =  $values;
    $doc->fileuploadDate =  $adddocsDate[$key];
    $doc->save();
}


// activity_logs
$activityLog = ['name'=> Session::get('name'),'email'=> Session::get('email'),'description' => 'Has added a new employee','date_time'=> $todayDate,];
DB::table('activity_logs')->insert($activityLog);

$activityLog = [
    'user_name'=> Session::get('name'),
    'email'=> Session::get('email'),
    'status'=> 'Pending',
    'modify_user' => $request->fullname,
    'modify_userId'=>$request->employeeId,
    'tablename' => 'allTables',
    'columnchanged' => json_encode(['description' => 'Has added a new employee']),
'date_time'=> $todayDate,];

DB::table('user_activity_logs')->insert($activityLog);




DB::commit();
Toastr::success('Add new employee successfully :)','Success');
return redirect()->route('all/employee/card');
} else {
DB::rollback();
Toastr::error('Employee Already Exits :)','Error');
return redirect()->back();
}
}catch(\Exception $e){
    Log::info($e);
    // dd($e);
DB::rollback();

Toastr::error('Add new employee fail :)','Error');
return redirect()->back();
}


    // dd($request->input("gender"));
    // if(!empty($passportpic)){
    //         $image = new User();
            
    //        $image->avatar =  $imageName;
           
    //        $image->save(); 
    //     // Log::info('Your log message', ['image1' =>  $image1], $imageName);
    //     }

    // if(!empty($image1)){
    //     $image = new ModelsAddrainTempUpload();
    //     $imageName = time() . '_' . $image1->getClientOriginalName();
    //    $path = $image1->storePubliclyAs('/public/rainimages', $imageName);
    //    $image->url = $path;
    //    $image->filename =  $imageName;
    //    $image->forecaster =   Auth::user()->name;
    //    $image->imagId = $randomId;
    //    $image->imageType = 'rain';
    //    $image->save(); 
    // // Log::info('Your log message', ['image1' =>  $image1], $imageName);
    // }
    //  $permission = DB::table('employees')
    //      ->join('module_permissions', 'employees.employee_id', '=', 'module_permissions.employee_id')
    //      ->select('employees.*', 'module_permissions.*')
    //      ->where('employees.employee_id','=',$employee_id)
    //      ->get();
    //  $employees = DB::table('employees')->where('employee_id',$employee_id)->get();
    //  return view('form.edit.editemployee');
 }


 
    // all employee card view
    public function cardAllEmployee(Request $request)
    {
        $users = DB::table('users')
                    ->join('employees', 'users.employeeId', '=', 'employees.employee_id')
                    ->select('users.*', 'employees.birth_date', 'employees.gender', 'employees.company')
                    ->get(); 
        $userList = DB::table('users')->get();
        $permission_lists = DB::table('permission_lists')->get();
        $myrole = Auth::user()->role_name;
        return view('form.allemployeecard',compact('users','userList','permission_lists', 'myrole'));
    }

 // awaitingApprovalView
    public function awaitingApprovalView(Request $request)
    {
        $users = DB::table('users')
                    ->join('employees', 'users.employeeId', '=', 'employees.employee_id')
                    ->select('users.*', 'employees.birth_date', 'employees.gender', 'employees.company')
                    ->where('users.verifiedprofile',  'Awaiting Approval')
                    ->get(); 
        $userList = DB::table('users')->get();
        $permission_lists = DB::table('permission_lists')->get();
        $myrole = Auth::user()->role_name;
        return view('form.awaitingApprovalView',compact('users','userList','permission_lists', 'myrole'));
    }


    
    // all employee list
    public function listAllEmployee()
    {
        $users = DB::table('users')
                    ->join('employees', 'users.employeeId', '=', 'employees.employee_id')
                    ->select('users.*', 'employees.birth_date', 'employees.gender', 'employees.company')
                    ->get();
        $userList = DB::table('users')->get();
        $permission_lists = DB::table('permission_lists')->get();
        return view('form.employeelist',compact('users','userList','permission_lists'));
    }

  //postApprove
    public function postApprove(Request $request)
    {
        // dd($request->employeeId);
        // exit();
        if(Auth::user()->role_name == "Super Admin"){
            $verifiedprofile= [
                   'verifiedprofile'=> 'Approved',
                   'status' => 'Active'
               ];
               User::where('employeeId',$request->employeeId)->update($verifiedprofile);
               Toastr::success('Employee Approved successfully :)','Success');
               return redirect()->route('all/employee/awaitingApproval');
           }else{
            Toastr::error('Employee Approval fail :)','Error');
return redirect()->route('all/employee/awaitingApproval');
           }
           
    }

    // save data employee
    public function saveRecord(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'email'       => 'required|string|email',
            'birthDate'   => 'required|string|max:255',
            'gender'      => 'required|string|max:255',
            'employee_id' => 'required|string|max:255',
            'company'     => 'required|string|max:255',
        ]);

        DB::beginTransaction();
        try{

            $employees = Employee::where('email', '=',$request->email)->first();
            if ($employees === null)
            {

                $employee = new Employee;
                $employee->name         = $request->name;
                $employee->email        = $request->email;
                $employee->birth_date   = $request->birthDate;
                $employee->gender       = $request->gender;
                $employee->employee_id  = $request->employee_id;
                $employee->company      = $request->company;
                $employee->save();
    
                for($i=0;$i<count($request->id_count);$i++)
                {
                    $module_permissions = [
                        'employee_id' => $request->employee_id,
                        'module_permission' => $request->permission[$i],
                        'id_count'          => $request->id_count[$i],
                        'read'              => $request->read[$i],
                        'write'             => $request->write[$i],
                        'create'            => $request->create[$i],
                        'delete'            => $request->delete[$i],
                        'import'            => $request->import[$i],
                        'export'            => $request->export[$i],
                    ];
                    DB::table('module_permissions')->insert($module_permissions);
                }
                
                DB::commit();
                Toastr::success('Add new employee successfully :)','Success');
                return redirect()->route('all/employee/card');
            } else {
                DB::rollback();
                Toastr::error('Add new employee exits :)','Error');
                return redirect()->back();
            }
        }catch(\Exception $e){
            DB::rollback();
            Toastr::error('Add new employee fail :)','Error');
            return redirect()->back();
        }
    }
    // view edit record
    public function viewRecord($employee_id)
    {
        $edu = DB::table('employee_educational_backgrounds')->where('employee_educational_backgrounds.user_id',$employee_id)->get();
        $hon =  DB::table('employee_honours')->where('employee_honours.user_id',$employee_id)->get();
        $lang =  DB::table('employeelanguages')->where('employeelanguages.user_id',$employee_id)->get();
        $previousEmployee = DB::table('employee_previous_employees')->where('employee_previous_employees.user_id',$employee_id)->get();
        $physDisabilities = DB::table('employee_phys_disabilities')->where('employee_phys_disabilities.user_id',$employee_id)->get();
        $courses = DB::table('employee_courses')->where('employee_courses.user_id',$employee_id)->get();
        $leaves = DB::table('employee_leaves')->where('employee_leaves.user_id',$employee_id)->get();
        $child = DB::table('employee_childrens')->where('employee_childrens.user_id',$employee_id)->get();
        $record = DB::table('employee_record_of_services')->where('employee_record_of_services.user_id',$employee_id)->get();
        $departments = DB::table('departments')->get();
        $position    = DB::table('position_types')->get();
        $employees = DB::table('users')
        ->leftJoin('employees','employees.employee_id','users.employeeId')
        ->leftJoin('personal_information','personal_information.user_id','users.employeeId')
        ->leftJoin('profile_information','profile_information.user_id','users.employeeId')
        ->where('users.employeeId',$employee_id)
        ->get(); 
// dd($employees);
        return view('form.edit.editemployee',compact('employees','edu','hon', 'lang', 'previousEmployee', 'physDisabilities', 'courses', 'leaves', 'child', 'record', 'departments', 'position'));
    }

 public function viewChanges($employee_id)
    {
       

        $employees = DB::table('users')
        ->leftJoin('employees','employees.employee_id','users.employeeId')
        ->where('users.employeeId',$employee_id)
        ->get(); 
        $activityLog = DB::table('activity_logs')->get();

        return view('form.viewchanges',compact('employees','activityLog'));
    }



    
  
   public function updateTable($tableName, $id, $newData, $idytype)
    {
        // Get the current data
        if($idytype == 'employee_id'){
 $currentData = DB::table($tableName)->where('employee_id', $id)->first();
        }else if($idytype == 'employeeId'){
$currentData = DB::table($tableName)->where('employeeId', $id)->first();
        }else if($idytype == 'user_id'){
$currentData = DB::table($tableName)->where('user_id', $id)->first();
        }
    
        // Prepare an array to hold the updated columns
        $updatedColumns = [];
    
        // Loop through the new data
        foreach ($newData as $column => $value) {
            // If the column exists in the current data and the value is different
            if (isset($currentData->$column) && $currentData->$column != $value) {
                // Add the column to the updated columns array
                $updatedColumns[] = [ $column => $value ];
            }
        }
    
        // If there are any updated columns
        if (!empty($updatedColumns)) {
            // Update the table
            if($idytype == 'employee_id'){
                DB::table($tableName)->where('employee_id', $id)->update($newData);
            }else if($idytype == 'employeeId') {
                DB::table($tableName)->where('employeeId', $id)->update($newData);
            }else if($idytype == 'user_id') {
                DB::table($tableName)->where('user_id', $id)->update($newData);
            }
           
    
            // Return the updated columns
            return $updatedColumns;
        }
    
        // If there are no updated columns, return false
        return null;
    }
    

   public function updateMultipleInputs($userId, $newLanguages, $tableName, $column)
    {
       
        // Get the current languages
    $currentLanguages = DB::table($tableName)->where('user_id', $userId)->pluck($column)->toArray();

    // Prepare an array to hold the languages to be deleted
    $languagesToDelete = [];

    // Loop through the current languages
    foreach ($currentLanguages as $key => $language) {
        // If the current language is not in the new languages
        if (!in_array($language, $newLanguages)) {
            // Add the language to the languagesToDelete array
            $languagesToDelete[] = $language;

            // Delete the current language record
            DB::table($tableName)->where([
                'user_id' => $userId,
                $column => $language,
            ])->delete();
        }
    }

    // Loop through the new languages
    foreach ($newLanguages as $language) {
        // If the language is not in the current languages
        if (!in_array($language, $currentLanguages)) {
            // Insert the new language
            DB::table($tableName)->insert([
                'user_id' => $userId,
                $column => $language,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    // Return the languages that were deleted
    return $languagesToDelete;
    }

// ======multiple courses update ==============
public function updateMultipleCourses($userId, $newLanguages, $tableName, $languageColumns, $majorcolumn)
{
    // Get the current languages
    $currentLanguages = DB::table($tableName)->where('user_id', $userId)->get();

    // Prepare an array to hold the languages to be deleted
    $languagesToDelete = [];

    foreach ($currentLanguages as $currentLanguage) {
        $languageExists = false;

        foreach ($newLanguages as $newLanguage) {
            if ($currentLanguage->courses === $newLanguage[$majorcolumn]) {
                $languageExists = true;

                // Check if any column values need to be updated
                $updates = [];
                foreach ($languageColumns as $column) {
                    if ($currentLanguage->$column !== $newLanguage[$column]) {
                        $updates[$column] = $newLanguage[$column];
                    }
                }

                if (!empty($updates)) {
                    DB::table($tableName)
                        ->where([
                            'user_id' => $userId,
                            $majorcolumn => $currentLanguage->courses,
                            'courseyear' => $currentLanguage->courseyear,
                            'created_at' => now(),
                            'updated_at' => now(),

                        ])
                        ->update($updates);
                }
                break;
            }
        }

        if (!$languageExists) {
            $languagesToDelete[] = $currentLanguage->courses;

            DB::table($tableName)
                ->where([
                    'user_id' => $userId,
                    $majorcolumn => $currentLanguage->courses,
                    'courseyear' => $currentLanguage->courseyear,
                    
                ])
                ->delete();
        }
    }

    foreach ($newLanguages as $newLanguage) {
        $languageExists = false;

        foreach ($currentLanguages as $currentLanguage) {
            if ($currentLanguage->courses === $newLanguage[$majorcolumn]) {
                $languageExists = true;
                break;
            }
        }

        if (!$languageExists) {
            $insertData = [
                'user_id' => $userId,
                $majorcolumn => $newLanguage[$majorcolumn],
                'courseyear' => $newLanguage['courseyear'],
                            'created_at' => now(),
                            'updated_at' => now(),
            ];

            foreach ($languageColumns as $column) {
                $insertData[$column] = $newLanguage[$column];
            }

            DB::table($tableName)->insert($insertData);
        }
    }

    return $languagesToDelete;
}

// ======multiple children update ==============
public function updateMultipleChild($userId, $newLanguages, $tableName, $languageColumns, $majorcolumn)
{
    // Get the current languages
    $currentLanguages = DB::table($tableName)->where('user_id', $userId)->get();

    // Prepare an array to hold the languages to be deleted
    $languagesToDelete = [];

    foreach ($currentLanguages as $currentLanguage) {
        $languageExists = false;

        foreach ($newLanguages as $newLanguage) {
            if ($currentLanguage->childrensName === $newLanguage[$majorcolumn]) {
                $languageExists = true;

                // Check if any column values need to be updated
                $updates = [];
                foreach ($languageColumns as $column) {
                    if ($currentLanguage->$column !== $newLanguage[$column]) {
                        $updates[$column] = $newLanguage[$column];
                    }
                }

                if (!empty($updates)) {
                    DB::table($tableName)
                        ->where([
                            'user_id' => $userId,
                            $majorcolumn => $currentLanguage->childrensName,
                            'childrensbirthday' => $currentLanguage->childrensbirthday,
                            'created_at' => now(),
                            'updated_at' => now(),

                        ])
                        ->update($updates);
                }
                break;
            }
        }

        if (!$languageExists) {
            $languagesToDelete[] = $currentLanguage->childrensName;

            DB::table($tableName)
                ->where([
                    'user_id' => $userId,
                    $majorcolumn => $currentLanguage->childrensName,
                    'childrensbirthday' => $currentLanguage->childrensbirthday,
                    
                ])
                ->delete();
        }
    }

    foreach ($newLanguages as $newLanguage) {
        $languageExists = false;

        foreach ($currentLanguages as $currentLanguage) {
            if ($currentLanguage->childrensName === $newLanguage[$majorcolumn]) {
                $languageExists = true;
                break;
            }
        }

        if (!$languageExists) {
            $insertData = [
                'user_id' => $userId,
                $majorcolumn => $newLanguage[$majorcolumn],
                'childrensbirthday' => $newLanguage['childrensbirthday'],
                'created_at' => now(),
                'updated_at' => now(),
            ];

            foreach ($languageColumns as $column) {
                $insertData[$column] = $newLanguage[$column];
            }

            DB::table($tableName)->insert($insertData);
        }
    }

    return $languagesToDelete;
}


// ======multiple record of service update ==============
public function updateMultipleRec($userId, $newLanguages, $tableName, $languageColumns, $majorcolumn)
{
    // Get the current languages
    $currentLanguages = DB::table($tableName)->where('user_id', $userId)->get();

    // Prepare an array to hold the languages to be deleted
    $languagesToDelete = [];

    foreach ($currentLanguages as $currentLanguage) {
        $languageExists = false;

        foreach ($newLanguages as $newLanguage) {
            if ($currentLanguage->effectiveDate === $newLanguage[$majorcolumn]) {
                $languageExists = true;

                // Check if any column values need to be updated
                $updates = [];
                foreach ($languageColumns as $column) {
                    if ($currentLanguage->$column !== $newLanguage[$column]) {
                        $updates[$column] = $newLanguage[$column];
                    }
                }

                if (!empty($updates)) {
                    DB::table($tableName)
                        ->where([
                            'user_id' => $userId,
                            $majorcolumn => $currentLanguage->effectiveDate,
                            'grade' => $currentLanguage->grade,
                            'status' => $currentLanguage->status,
                            'salaryscale' => $currentLanguage->salaryscale,
                            'incrementalDate' => $currentLanguage->incrementalDate,
                            'department' => $currentLanguage->department,
                            'created_at' => now(),
                            'updated_at' => now(),

                        ])
                        ->update($updates);
                }
                break;
            }
        }

        if (!$languageExists) {
            $languagesToDelete[] = $currentLanguage->effectiveDate;

            DB::table($tableName)
                ->where([
                    'user_id' => $userId,
                    $majorcolumn => $currentLanguage->effectiveDate,
                ])
                ->delete();
        }
    }

    foreach ($newLanguages as $newLanguage) {
        $languageExists = false;

        foreach ($currentLanguages as $currentLanguage) {
            if ($currentLanguage->effectiveDate === $newLanguage[$majorcolumn]) {
                $languageExists = true;
                break;
            }
        }

        if (!$languageExists) {
            $insertData = [
                'user_id' => $userId,
                $majorcolumn => $newLanguage[$majorcolumn],
                'grade' => $newLanguage['grade'],
                'status' => $newLanguage['status'],
                'salaryscale' => $newLanguage['salaryscale'],
                'incrementalDate' => $newLanguage['incrementalDate'],
                'department' => $newLanguage['department'],
                'created_at' => now(),
                'updated_at' => now(),
            ];

            foreach ($languageColumns as $column) {
                $insertData[$column] = $newLanguage[$column];
            }

            DB::table($tableName)->insert($insertData);
        }
    }

    return $languagesToDelete;
}


// ====== Non Establishment Leave Without Pay ==============
public function updateMultipleNonEstbLeave($userId, $newLanguages, $tableName, $languageColumns, $majorcolumn)
{
    // Get the current languages
    $currentLanguages = DB::table($tableName)->where('user_id', $userId)->get();

    // Prepare an array to hold the languages to be deleted
    $languagesToDelete = [];

    foreach ($currentLanguages as $currentLanguage) {
        $languageExists = false;

        foreach ($newLanguages as $newLanguage) {
            if ($currentLanguage->leavefrom === $newLanguage[$majorcolumn]) {
                $languageExists = true;

                // Check if any column values need to be updated
                $updates = [];
                foreach ($languageColumns as $column) {
                    if ($currentLanguage->$column !== $newLanguage[$column]) {
                        $updates[$column] = $newLanguage[$column];
                    }
                }

                if (!empty($updates)) {
                    DB::table($tableName)
                        ->where([
                            'user_id' => $userId,
                            $majorcolumn => $currentLanguage->leavefrom,
                            'leaveto' => $currentLanguage->leaveto,
                            'leavetype' => 'nonEstablishedWithoutPay',
                            'signedbySupervisor' => 'false',
                            'created_at' => now(),
                            'updated_at' => now(),

                        ])
                        ->update($updates);
                }
                break;
            }
        }

        if (!$languageExists) {
            $languagesToDelete[] = $currentLanguage->leavefrom;

            DB::table($tableName)
                ->where([
                    'user_id' => $userId,
                    $majorcolumn => $currentLanguage->leavefrom,
                    'leaveto' => $currentLanguage->leaveto,
                    'leavetype' => 'nonEstablishedWithoutPay',
                    
                ])
                ->delete();
        }
    }

    foreach ($newLanguages as $newLanguage) {
        $languageExists = false;

        foreach ($currentLanguages as $currentLanguage) {
            if ($currentLanguage->leavefrom === $newLanguage[$majorcolumn]) {
                $languageExists = true;
                break;
            }
        }

        if (!$languageExists) {
            $insertData = [
                'user_id' => $userId,
                $majorcolumn => $newLanguage[$majorcolumn],
                'leaveto' => $newLanguage['leaveto'],
                'leavetype' => 'nonEstablishedWithoutPay',
                'signedbySupervisor' => 'false',
                'created_at' => now(),
                'updated_at' => now(),
            ];

            foreach ($languageColumns as $column) {
                $insertData[$column] = $newLanguage[$column];
            }

            DB::table($tableName)->insert($insertData);
        }
    }

    return $languagesToDelete;
}

    // update record employee
    public function updateRecord( Request $request)
    {
        DB::beginTransaction();
        try{
          
            //================== update employee table=====================================
              // update table Employee
              $employeetableName = 'employees';
              $updateEmployee = [
                  'employee_id'=>$request->employeeId,
                  'name'=>$request->fullname,
                  'email'=>$request->email,
                  'gender'=>$request->gender
              ];
  
            $employeeupdatedColumns = $this->updateTable($employeetableName,$request->employeeId, $updateEmployee, 'employee_id');
            if (!empty($employeeupdatedColumns)) {
            // activity_logs
$dt       = Carbon::now();
$todayDate = $dt->toDayDateTimeString();
$activityLog = [
    'user_name'=> Session::get('name'),
    'email'=> Session::get('email'),
    'status'=> 'Pending',
    'modify_user' => $request->fullname,
    'modify_userId'=>$request->employeeId,
    'tablename' => $employeetableName,
    'columnchanged' => json_encode($employeeupdatedColumns),
'date_time'=> $todayDate,];

DB::table('user_activity_logs')->insert($activityLog);
 
            Log::info(json_encode($employeeupdatedColumns));
            } else {
                Log::info("No columns were updated.");
            }

 //================== update the user table=====================================
   // update table user
   $updateUser = [
    'employeeId'=>$request->employeeId,
    'name'=>$request->fullname,
    'email'=>$request->email,
    'phone_number'=>$request->mobilenum,
    'position'=> last($request->input('grade')),
    'department'=> last($request->input('department')),
     ];
     $usertableName = 'users';

 $userupdatedColumns = $this->updateTable($usertableName,$request->employeeId, $updateUser, 'employeeId');
 if (!empty($userupdatedColumns)) {
 // activity_logs
$dt       = Carbon::now();
$todayDate = $dt->toDayDateTimeString();
 

$activityLog = [
    'user_name'=> Session::get('name'),
    'email'=> Session::get('email'),
    'status'=> 'Pending',
    'modify_user' => $request->fullname,
    'modify_userId'=>$request->employeeId,
    'tablename' => $usertableName,
    'columnchanged' => json_encode($userupdatedColumns),
'date_time'=> $todayDate,];

DB::table('user_activity_logs')->insert($activityLog);
 Log::info(json_encode($userupdatedColumns));
 } else {
     Log::info("No columns were updated.");
 }


  //================== update the profileinfo table=====================================
   // update table profileinfo
   $updateProfileinfo = [
    'user_id'=>$request->employeeId,
    'name'=>$request->fullname,
    'email'=>$request->email,
    'gender'=>$request->gender,
    'address'=>$request->address,
    'phone_number'=>$request->mobilenum,
    'department'=> last($request->input('department')),
    'designation'=> last($request->input('grade'))
];
     $profileinfotableName = 'profile_information';

 $profileinfoupdatedColumns = $this->updateTable($profileinfotableName,$request->employeeId, $updateProfileinfo, 'user_id');
 if (!empty($profileinfoupdatedColumns)) {
 // activity_logs
$dt       = Carbon::now();
$todayDate = $dt->toDayDateTimeString();
 
$activityLog = [
    'user_name'=> Session::get('name'),
    'email'=> Session::get('email'),
    'status'=> 'Pending',
    'modify_user' => $request->fullname,
    'modify_userId'=>$request->employeeId,
    'tablename' => $profileinfotableName,
    'columnchanged' => json_encode($profileinfoupdatedColumns),
'date_time'=> $todayDate,];

DB::table('user_activity_logs')->insert($activityLog);

 Log::info(json_encode($profileinfoupdatedColumns));
 } else {
     Log::info("No columns were updated.");
 }

 //================== update the personal_information table=====================================
   // update table personal_information
   $updatePersonalinfo = [
    'user_id'=>$request->employeeId,
    'passport_no'=>$request->ghcard_id,
    'passport_expiry_date'=>$request->ghcard_id_expire,
    'tel'=>$request->fixednum,
    'nationality'=>$request->nationality,
    'marital_status'=>$request->maritalStatus1,
    'children'=> count($request->input('childrensName')),
    'hometown'=> $request->hometown,
    'ssnit'=> $request->ssnit,
    'maritalDate'=> $request->marriageDate,
    'comment'=> $request->comment,

];
     $personalinfotableName = 'personal_information';

$personalinfoupdatedColumns = $this->updateTable($personalinfotableName,$request->employeeId, $updatePersonalinfo, 'user_id');
 if (!empty($personalinfoupdatedColumns)) {
 // activity_logs
$dt       = Carbon::now();
$todayDate = $dt->toDayDateTimeString();
 
$activityLog = [
    'user_name'=> Session::get('name'),
    'email'=> Session::get('email'),
    'status'=> 'Pending',
    'modify_user' => $request->fullname,
    'modify_userId'=>$request->employeeId,
    'tablename' => $personalinfotableName,
    'columnchanged' => json_encode($personalinfoupdatedColumns),
'date_time'=> $todayDate,];

DB::table('user_activity_logs')->insert($activityLog);
 

 Log::info(json_encode($personalinfoupdatedColumns));
 } else {
     Log::info("No columns were updated.");
 }

 //================== update the employeelanguages table=====================================
$employeelanguagestableName = 'employeelanguages';
$employeelanguagesupdatedColumns = $this->updateMultipleInputs($request->employeeId,$request->input('languages'),  $employeelanguagestableName,'language');
 
 if (!empty($employeelanguagesupdatedColumns)) {
 // activity_logs
$dt       = Carbon::now();
$todayDate = $dt->toDayDateTimeString();
 
$activityLog = [
    'user_name'=> Session::get('name'),
    'email'=> Session::get('email'),
    'status'=> 'Pending',
    'modify_user' => $request->fullname,
    'modify_userId'=>$request->employeeId,
    'tablename' => $employeelanguagestableName,
    'columnchanged' => json_encode($employeelanguagesupdatedColumns),
'date_time'=> $todayDate,];

DB::table('user_activity_logs')->insert($activityLog);
 



 Log::info(json_encode($employeelanguagesupdatedColumns));
 } else {
   
     Log::info("No columns were updated.");
 }


 //================== update the employee_educational_backgrounds table=====================================
 $employeeedutableName = 'employee_educational_backgrounds';
 $employeeeduupdatedColumns = $this->updateMultipleInputs($request->employeeId,$request->input('edu'),  $employeeedutableName,'educationalbackground');
  
  if (!empty($employeeeduupdatedColumns)) {
  // activity_logs
 $dt       = Carbon::now();
 $todayDate = $dt->toDayDateTimeString();
 
 $activityLog = [
    'user_name'=> Session::get('name'),
    'email'=> Session::get('email'),
    'status'=> 'Pending',
    'modify_user' => $request->fullname,
    'modify_userId'=>$request->employeeId,
    'tablename' => $employeeedutableName,
    'columnchanged' => json_encode($employeeeduupdatedColumns),
'date_time'=> $todayDate,];

DB::table('user_activity_logs')->insert($activityLog);
 


  Log::info(json_encode($employeeeduupdatedColumns));
  } else {
    
      Log::info("No columns were updated.");
  }

//================== update the employee_honours table=====================================
$employeehontableName = 'employee_honours';
$employeehonupdatedColumns = $this->updateMultipleInputs($request->employeeId,$request->input('honours'),  $employeehontableName,'honours');
 
 if (!empty($employeehonupdatedColumns)) {
 // activity_logs
$dt       = Carbon::now();
$todayDate = $dt->toDayDateTimeString();
 
$activityLog = [
    'user_name'=> Session::get('name'),
    'email'=> Session::get('email'),
    'status'=> 'Pending',
    'modify_user' => $request->fullname,
    'modify_userId'=>$request->employeeId,
    'tablename' => $employeehontableName,
    'columnchanged' => json_encode($employeehonupdatedColumns),
'date_time'=> $todayDate,];

DB::table('user_activity_logs')->insert($activityLog);
 


 Log::info(json_encode($employeehonupdatedColumns));
 } else {
   
     Log::info("No columns were updated.");
 }

//================== update the employee_previous_employees table=====================================
$preemployeetableName = 'employee_previous_employees';
$preemployeeupdatedColumns = $this->updateMultipleInputs($request->employeeId,$request->input('previousEmployee'),  $preemployeetableName,'previousEmployee');
 
 if (!empty($preemployeeupdatedColumns)) {
 // activity_logs
$dt       = Carbon::now();
$todayDate = $dt->toDayDateTimeString();
 
$activityLog = [
    'user_name'=> Session::get('name'),
    'email'=> Session::get('email'),
    'status'=> 'Pending',
    'modify_user' => $request->fullname,
    'modify_userId'=>$request->employeeId,
    'tablename' => $preemployeetableName,
    'columnchanged' => json_encode($preemployeeupdatedColumns),
'date_time'=> $todayDate,];

DB::table('user_activity_logs')->insert($activityLog);
 

 Log::info(json_encode($preemployeeupdatedColumns));
 } else {
   
     Log::info("No columns were updated.");
 }
//================== update the employee_phys_disabilities table=====================================
$phyemployeetableName = 'employee_phys_disabilities';
$phyemployeeupdatedColumns = $this->updateMultipleInputs($request->employeeId,$request->input('physDisabilities'),  $phyemployeetableName,'physDisabilities');
 
 if (!empty($phyemployeeupdatedColumns)) {
 // activity_logs
$dt       = Carbon::now();
$todayDate = $dt->toDayDateTimeString();
 
$activityLog = [
    'user_name'=> Session::get('name'),
    'email'=> Session::get('email'),
    'status'=> 'Pending',
    'modify_user' => $request->fullname,
    'modify_userId'=>$request->employeeId,
    'tablename' => $phyemployeetableName,
    'columnchanged' => json_encode($phyemployeeupdatedColumns),
'date_time'=> $todayDate,];

DB::table('user_activity_logs')->insert($activityLog);



 Log::info(json_encode($phyemployeeupdatedColumns));
 } else {
   
     Log::info("No columns were updated.");
 }

 //================== update the employee_courses table=====================================
 $newCourses = [];
$courses = $request->input('courses');
$coursesyear = $request->input('coursesyear');
for ($i = 0; $i < count($courses); $i++) {
    $newCourse  = [
        'courses' => $courses[$i],
        'courseyear' =>$coursesyear[$i],  // Use the corresponding value from $year array
        // Add more columns as needed
    ];
    $newCourses[] = $newCourse;
}

$courseemployeetableName = 'employee_courses';
$courseemployeeupdatedColumns = $this->updateMultipleCourses($request->employeeId,$newCourses, $courseemployeetableName,['courses'], 'courses');
 
 if (!empty($courseemployeeupdatedColumns)) {
 // activity_logs
$dt       = Carbon::now();
$todayDate = $dt->toDayDateTimeString();

$activityLog = [
    'user_name'=> Session::get('name'),
    'email'=> Session::get('email'),
    'status'=> 'Pending',
    'modify_user' => $request->fullname,
    'modify_userId'=>$request->employeeId,
    'tablename' => $courseemployeetableName,
    'columnchanged' => json_encode($courseemployeeupdatedColumns),
'date_time'=> $todayDate,];

DB::table('user_activity_logs')->insert($activityLog);


 Log::info(json_encode($courseemployeeupdatedColumns));
 } else {
   
     Log::info("No columns were updated.");
 }
 

//================== update the Non Establishment Leave Without Pay table=====================================
 $newleave = [];
$leavefrom = $request->input('leavefrom');
$leaveto = $request->input('leaveto');
for ($i = 0; $i < count($leavefrom); $i++) {
    $newlev  = [
        'leavefrom' => $leavefrom[$i],
        'leaveto' =>$leaveto[$i],  // Use the corresponding value from $year array
        // Add more columns as needed
    ];
    $newleave[] =  $newlev;
}

$levemployeetableName = 'employee_leaves';
$levemployeeupdatedColumns = $this->updateMultipleNonEstbLeave($request->employeeId,$newleave, $levemployeetableName,['leavefrom'], 'leavefrom');
 
 if (!empty($levemployeeupdatedColumns)) {
 // activity_logs
$dt       = Carbon::now();
$todayDate = $dt->toDayDateTimeString();

$activityLog = [
    'user_name'=> Session::get('name'),
    'email'=> Session::get('email'),
    'status'=> 'Pending',
    'modify_user' => $request->fullname,
    'modify_userId'=>$request->employeeId,
    'tablename' => $levemployeetableName,
    'columnchanged' => json_encode($levemployeeupdatedColumns),
'date_time'=> $todayDate,];

DB::table('user_activity_logs')->insert($activityLog);

 Log::info(json_encode($levemployeeupdatedColumns));
 } else {
   
     Log::info("No columns were updated.");
 }


//================== update the Name(s) of Children table=====================================
$newchild = [];
$childrensNamee = $request->input('childrensName');
$childbirthe = $request->input('childrensbirthday');
for ($i = 0; $i < count($childrensNamee); $i++) {
    $newchilds  = [
        'childrensName' => $childrensNamee[$i],
        'childrensbirthday' =>$childbirthe[$i], 
        // Add more columns as needed
    ];
    $newchild[] =  $newchilds;
}

$childemployeetableName = 'employee_childrens';
$childemployeeupdatedColumns = $this->updateMultipleChild($request->employeeId,$newchild, $childemployeetableName,['childrensbirthday'], 'childrensName');
 
 if (!empty($childemployeeupdatedColumns)) {
 // activity_logs
$dt       = Carbon::now();
$todayDate = $dt->toDayDateTimeString();
 
$activityLog = [
    'user_name'=> Session::get('name'),
    'email'=> Session::get('email'),
    'status'=> 'Pending',
    'modify_user' => $request->fullname,
    'modify_userId'=>$request->employeeId,
    'tablename' => $childemployeetableName,
    'columnchanged' => json_encode($childemployeeupdatedColumns),
'date_time'=> $todayDate,];

DB::table('user_activity_logs')->insert($activityLog);



 Log::info(json_encode($childemployeeupdatedColumns));
 } else {
     Log::info("No columns were updated.");
 }



//================== update the Record Of Service table=====================================
$newrec = [];
$effectiveDatee = $request->input('effectiveDate');
$gradee = $request->input('grade');
$statuss = $request->input('status');
$salaryscalee = $request->input('salaryscale');
$incrementalDatee = $request->input('incrementalDate');
$departmente = $request->input('department');

for ($i = 0; $i < count($effectiveDatee); $i++) {
    $newrecs  = [
        'effectiveDate' => $effectiveDatee[$i],
        'grade' => $gradee[$i], 
        'status' => $statuss[$i], 
        'salaryscale' => $salaryscalee[$i], 
        'incrementalDate' => $incrementalDatee[$i], 
        'department' => $departmente[$i], 

        // Add more columns as needed
    ];
    $newrec[] =  $newrecs;
}

// dd($newrec);
// exit();

$recemployeetableName = 'employee_record_of_services';
$recemployeeupdatedColumns = $this->updateMultipleRec($request->employeeId,$newrec, $recemployeetableName,['grade', 'status', 'salaryscale', 'incrementalDate', 'department'], 'effectiveDate');
 
 if (!empty($recemployeeupdatedColumns)) {
 // activity_logs
$dt       = Carbon::now();
$todayDate = $dt->toDayDateTimeString();
 
$activityLog = [
    'user_name'=> Session::get('name'),
    'email'=> Session::get('email'),
    'status'=> 'Pending',
    'modify_user' => $request->fullname,
    'modify_userId'=>$request->employeeId,
    'tablename' => $recemployeetableName,
    'columnchanged' => json_encode($recemployeeupdatedColumns),
'date_time'=> $todayDate,];

DB::table('user_activity_logs')->insert($activityLog);


 Log::info(json_encode($recemployeeupdatedColumns));
 } else {
   
     Log::info("No columns were updated.");
 }

// if(Auth::user()->role_name != "Super Admin"){
 $verifiedprofile= [
        'verifiedprofile'=> 'Awaiting Approval',
    ];
    User::where('employeeId',$request->employeeId)->update($verifiedprofile);

// }


            DB::commit();
            Toastr::success('updated record successfully :)','Success');
            return redirect()->route('all/employee/card');
        }catch(\Exception $e){
            DB::rollback();
            Log::info(json_encode($e));
            Toastr::error('updated record fail :)','Error');
            return redirect()->back();
        }
    }
    // delete record
    public function deleteRecord($employee_id)
    {
        DB::beginTransaction();
        try{
            $dt       = Carbon::now();
            $todayDate = $dt->toDayDateTimeString();
            $verifiedprofile= [
                'verifiedprofile'=> 'Deleted',
                'status' => 'Inactive'
            ];
            User::where('employeeId',$employee_id)->update($verifiedprofile);
            // Employee::where('employee_id',$employee_id)->delete();
            $activityLog = ['name'=> Session::get('name'),'email'=> Session::get('email'),'description' => 'Deleted employee profile: with id: '.$employee_id.'  ','date_time'=> $todayDate,];
            DB::table('activity_logs')->insert($activityLog);

            DB::commit();
            Toastr::success('Delete record successfully :)','Success');
            return redirect()->route('all/employee/card');

        }catch(\Exception $e){
            DB::rollback();
            Toastr::error('Delete record fail :)','Error');
            return redirect()->back();
        }
    }
    // employee search
    public function employeeSearch(Request $request)
    {
        $users = DB::table('users')
                    ->join('employees', 'users.employeeId', '=', 'employees.employee_id')
                    ->select('users.*', 'employees.birth_date', 'employees.gender')
                    ->get();
        // $permission_lists = DB::table('permission_lists')->get();
        $userList = DB::table('users')->get();

        // search by id
        if($request->employee_id)
        {
            $users = DB::table('users')
                        ->join('employees', 'users.employeeId', '=', 'employees.employee_id')
                        ->select('users.*', 'employees.birth_date', 'employees.gender' )
                        ->where('employee_id','LIKE','%'.$request->employee_id.'%')
                        ->get();
        }
        // search by name
        if($request->name)
        {
            $users = DB::table('users')
                        ->join('employees', 'users.employeeId', '=', 'employees.employee_id')
                        ->select('users.*', 'employees.birth_date', 'employees.gender')
                        ->where('users.name','LIKE','%'.$request->name.'%')
                        ->get();
        }
        // search by name
        if($request->position)
        {
            $users = DB::table('users')
                        ->join('employees', 'users.employeeId', '=', 'employees.employee_id')
                        ->select('users.*', 'employees.birth_date', 'employees.gender')
                        ->where('users.position','LIKE','%'.$request->position.'%')
                        ->get();
        }

        // search by name and id
        if($request->employee_id && $request->name)
        {
            $users = DB::table('users')
                        ->join('employees', 'users.employeeId', '=', 'employees.employee_id')
                        ->select('users.*', 'employees.birth_date', 'employees.gender')
                        ->where('employee_id','LIKE','%'.$request->employee_id.'%')
                        ->where('users.name','LIKE','%'.$request->name.'%')
                        ->get();
        }
        // search by position and id
        if($request->employee_id && $request->position)
        {
            $users = DB::table('users')
                        ->join('employees', 'users.employeeId', '=', 'employees.employee_id')
                        ->select('users.*', 'employees.birth_date', 'employees.gender')
                        ->where('employee_id','LIKE','%'.$request->employee_id.'%')
                        ->where('users.position','LIKE','%'.$request->position.'%')
                        ->get();
        }
        // search by name and position
        if($request->name && $request->position)
        {
            $users = DB::table('users')
                        ->join('employees', 'users.employeeId', '=', 'employees.employee_id')
                        ->select('users.*', 'employees.birth_date', 'employees.gender')
                        ->where('users.name','LIKE','%'.$request->name.'%')
                        ->where('users.position','LIKE','%'.$request->position.'%')
                        ->get();
        }
         // search by name and position and id
         if($request->employee_id && $request->name && $request->position)
         {
            $myrole = Auth::user()->role_name;
             $users = DB::table('users')
                         ->join('employees', 'users.employeeId', '=', 'employees.employee_id')
                         ->select('users.*', 'employees.birth_date', 'employees.gender')
                         ->where('employee_id','LIKE','%'.$request->employee_id.'%')
                         ->where('users.name','LIKE','%'.$request->name.'%')
                         ->where('users.position','LIKE','%'.$request->position.'%')
                         ->get();
         }
        return view('form.allemployeecard',compact('users','userList', 'myrole'));
    }
    public function employeeListSearch(Request $request)
    {
        $users = DB::table('users')
                    ->join('employees', 'users.employeeId', '=', 'employees.employee_id')
                    ->select('users.*', 'employees.birth_date', 'employees.gender')
                    ->get(); 
        // $permission_lists = DB::table('permission_lists')->get();
        $userList = DB::table('users')->get();

        // search by id
        if($request->employee_id)
        {
            $users = DB::table('users')
                        ->join('employees', 'users.employeeId', '=', 'employees.employee_id')
                        ->select('users.*', 'employees.birth_date', 'employees.gender')
                        ->where('employee_id','LIKE','%'.$request->employee_id.'%')
                        ->get();
        }
        // search by name
        if($request->name)
        {
            $users = DB::table('users')
                        ->join('employees', 'users.employeeId', '=', 'employees.employee_id')
                        ->select('users.*', 'employees.birth_date', 'employees.gender')
                        ->where('users.name','LIKE','%'.$request->name.'%')
                        ->get();
        }
        // search by name
        if($request->position)
        {
            $users = DB::table('users')
                        ->join('employees', 'users.employeeId', '=', 'employees.employee_id')
                        ->select('users.*', 'employees.birth_date', 'employees.gender')
                        ->where('users.position','LIKE','%'.$request->position.'%')
                        ->get();
        }

        // search by name and id
        if($request->employee_id && $request->name)
        {
            $users = DB::table('users')
                        ->join('employees', 'users.employeeId', '=', 'employees.employee_id')
                        ->select('users.*', 'employees.birth_date', 'employees.gender')
                        ->where('employee_id','LIKE','%'.$request->employee_id.'%')
                        ->where('users.name','LIKE','%'.$request->name.'%')
                        ->get();
        }
        // search by position and id
        if($request->employee_id && $request->position)
        {
            $users = DB::table('users')
                        ->join('employees', 'users.employeeId', '=', 'employees.employee_id')
                        ->select('users.*', 'employees.birth_date', 'employees.gender')
                        ->where('employee_id','LIKE','%'.$request->employee_id.'%')
                        ->where('users.position','LIKE','%'.$request->position.'%')
                        ->get();
        }
        // search by name and position
        if($request->name && $request->position)
        {
            $users = DB::table('users')
                        ->join('employees', 'users.employeeId', '=', 'employees.employee_id')
                        ->select('users.*', 'employees.birth_date', 'employees.gender')
                        ->where('users.name','LIKE','%'.$request->name.'%')
                        ->where('users.position','LIKE','%'.$request->position.'%')
                        ->get();
        }
        // search by name and position and id
        if($request->employee_id && $request->name && $request->position)
        {
            $users = DB::table('users')
                        ->join('employees', 'users.employeeId', '=', 'employees.employee_id')
                        ->select('users.*', 'employees.birth_date', 'employees.gender')
                        ->where('employee_id','LIKE','%'.$request->employee_id.'%')
                        ->where('users.name','LIKE','%'.$request->name.'%')
                        ->where('users.position','LIKE','%'.$request->position.'%')
                        ->get();
        }
        return view('form.employeelist',compact('users','userList'));
    }

    // employee profile with all controller user
    public function profileEmployee($user_id)
    {
        $departments = DB::table('departments')->get();
        $designations = DB::table('designations')->get();
        $allusers = DB::table('users')->select('name')->get();
        $users = DB::table('users')
        ->leftJoin('personal_information','personal_information.user_id','users.employeeId')
        ->leftJoin('profile_information','profile_information.user_id','users.employeeId')
        ->leftJoin('employee_childrens','employee_childrens.user_id','users.employeeId')
        ->leftJoin('employee_courses','employee_courses.user_id','users.employeeId')
        ->leftJoin('employee_educational_backgrounds','employee_educational_backgrounds.user_id','users.employeeId')
        ->leftJoin('employee_honours','employee_honours.user_id','users.employeeId')
        ->leftJoin('employee_leaves','employee_leaves.user_id','users.employeeId')
        ->leftJoin('employee_phys_disabilities','employee_phys_disabilities.user_id','users.employeeId')
        ->leftJoin('employee_previous_employees','employee_previous_employees.user_id','users.employeeId')
        ->leftJoin('employee_record_of_services','employee_record_of_services.user_id','users.employeeId')
        ->where('users.employeeId',$user_id)
        ->first();
        $user = DB::table('users')
                ->leftJoin('personal_information','personal_information.user_id','users.employeeId')
                ->leftJoin('profile_information','profile_information.user_id','users.employeeId')
                ->leftJoin('employee_childrens','employee_childrens.user_id','users.employeeId')
                ->leftJoin('employee_courses','employee_courses.user_id','users.employeeId')
                ->leftJoin('employee_educational_backgrounds','employee_educational_backgrounds.user_id','users.employeeId')
                ->leftJoin('employee_honours','employee_honours.user_id','users.employeeId')
                ->leftJoin('employee_leaves','employee_leaves.user_id','users.employeeId')
                ->leftJoin('employee_phys_disabilities','employee_phys_disabilities.user_id','users.employeeId')
                ->leftJoin('employee_previous_employees','employee_previous_employees.user_id','users.employeeId')
                ->leftJoin('employee_record_of_services','employee_record_of_services.user_id','users.employeeId')
                ->where('users.employeeId',$user_id)
                ->get(); 
        return view('form.employeeprofile',compact('user','users','departments', 'designations','allusers'));
    }

    /** page departments */
    public function index()
    {
        $departments = DB::table('departments')->get();
        $employees = DB::table('employees')->get();
// dd( $employees);
        return view('form.departments',compact('departments', 'employees'));
    }

    /** save record department */
    public function saveRecordDepartment(Request $request)
    {
        $request->validate([
            'department'        => 'required|string|max:255',
            
        ]);

        DB::beginTransaction();
        try{

            $department = department::where('department',$request->department)->first();
            if ($department === null)
            {
                $department = new department;
                $department->department = $request->department;
                $department->departmenthead = $request->departmenthead;
                $department->save();
    
                DB::commit();
                Toastr::success('Add new department successfully :)','Success');
                return redirect()->route('form/departments/page');
            } else {
                DB::rollback();
                Toastr::error('Add new department exits :)','Error');
                return redirect()->back();
            }
        }catch(\Exception $e){
            DB::rollback();
            Toastr::error('Add new department fail :)','Error');
            return redirect()->back();
        }
    }

    /** update record department */
    public function updateRecordDepartment(Request $request)
    {
        DB::beginTransaction();
        try{
            // update table departments
            $department = [
                'id'=>$request->id,
                'department'=>$request->department,
               'departmenthead' => $request->departmenthead
            ];
            department::where('id',$request->id)->update($department);
        
            DB::commit();
            Toastr::success('updated record successfully :)','Success');
            return redirect()->route('form/departments/page');
        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('updated record fail :)','Error');
            return redirect()->back();
        }
    }

    /** delete record department */
    public function deleteRecordDepartment(Request $request) 
    {
        try {

            department::destroy($request->id);
            Toastr::success('Department deleted successfully :)','Success');
            return redirect()->back();
        
        } catch(\Exception $e) {

            DB::rollback();
            Toastr::error('Department delete fail :)','Error');
            return redirect()->back();
        }
    }

    /** page designations */
    public function designationsIndex()
    {
        $departments = DB::table('departments')->get();
        $designations = DB::table('designations')->get();
        return view('form.designations',compact('departments', 'designations'));
    }

  public function designmentsave(Request $request)
    {
        $request->validate([
            'designation'        => 'required|string|max:255',
        ]);

        DB::beginTransaction();
        try{

            $designation = Designation::where('designation',$request->designation)->first();
            if ($designation === null)
            {
                $designation = new Designation;
                $designation->designation = $request->designation;
                $designation->department = $request->department;
                $designation->save();
    
                DB::commit();
                Toastr::success('Add new designation successfully :)','Success');
                return redirect()->route('form/designations/page');
            } else {
                DB::rollback();
                Toastr::error('Add new designation exits :)','Error');
                return redirect()->back();
            }
        }catch(\Exception $e){
            DB::rollback();
            Toastr::error('Add new designation fail :)','Error');
            return redirect()->back();
        }
    }

    /** page time sheet */
    public function taskIndex()
    {
        return view('form.task');
    }

    /** page overtime */
    public function overTimeIndex()
    {
        return view('form.overtime');
    }


// =================================update employee details========================

 public function editemployeeApproval($employee_id, Request $request)
    {
        // DB::beginTransaction();
 try {
        //code...  
         if($request->updatetype == "updatepassport"){
            $profilepic = time().'.'.$request->passportpic->extension();  
            $request->passportpic->move(public_path('assets/images/awaitingEmployeePassport'), $profilepic);
   $awaitingApproval = new AwaitingApproval;
            $awaitingApproval->employee_id = $employee_id;
             $awaitingApproval->modifiername = Auth::user()->name;
            $awaitingApproval->areaChanged = 'passportpic';
            $awaitingApproval->areaChangedValue =  $profilepic;
            $awaitingApproval->oldvalue = $request->oldvalue;
            $awaitingApproval->descriptionOfAction = ''.Auth::user()->name.' Changed User\'s Profile Picture';
            $awaitingApproval->status = 'Pending';
            $awaitingApproval->save();
            Toastr::success('Profile Updated successfully, Awaiting Approval Now!! :)','Success');
              return redirect()->back();

  }
  elseif($request->updatetype == "employeeID"){
    $employeeId = $request->employeeId;
 $awaitingApproval = new AwaitingApproval;
            $awaitingApproval->employee_id = $employee_id;
             $awaitingApproval->modifiername = Auth::user()->name;
            $awaitingApproval->areaChanged = 'employeeID';
            $awaitingApproval->areaChangedValue =  $employeeId;
            $awaitingApproval->oldvalue = $request->oldvalue;
            $awaitingApproval->descriptionOfAction = ''.Auth::user()->name.' Changed  Employee\'s ID';
            $awaitingApproval->status = 'Pending';
            $awaitingApproval->save();
            Toastr::success('EmployeeId Updated successfully, Awaiting Approval Now!! :)','Success');
              return redirect()->back();
  }
  elseif($request->updatetype == "hometown"){
    $hometown = $request->hometown;
 $awaitingApproval = new AwaitingApproval;
            $awaitingApproval->employee_id = $employee_id;
             $awaitingApproval->modifiername = Auth::user()->name;
            $awaitingApproval->areaChanged = 'hometown';
            $awaitingApproval->areaChangedValue =  $hometown;
            $awaitingApproval->oldvalue = $request->oldvalue;
            $awaitingApproval->descriptionOfAction = ''.Auth::user()->name.' Changed User\'s Hometown';
            $awaitingApproval->status = 'Pending';
            $awaitingApproval->save();
            Toastr::success('Hometown Updated successfully, Awaiting Approval Now!! :)','Success');
              return redirect()->back();
  }
  elseif($request->updatetype == "gender"){
    $gender = $request->gender;
 $awaitingApproval = new AwaitingApproval;
            $awaitingApproval->employee_id = $employee_id;
             $awaitingApproval->modifiername = Auth::user()->name;
            $awaitingApproval->areaChanged = 'gender';
            $awaitingApproval->areaChangedValue =  $gender;
            $awaitingApproval->oldvalue = $request->oldvalue;
            $awaitingApproval->descriptionOfAction = ''.Auth::user()->name.' Changed User\'s Gender';
            $awaitingApproval->status = 'Pending';
            $awaitingApproval->save();
            Toastr::success('Gender Updated successfully, Awaiting Approval Now!! :)','Success');
              return redirect()->back();
  } 
    elseif($request->updatetype == "birthcert"){
   
    $birthcert = time().'.'.$request->birthcert->extension();  
    $request->birthcert->move(public_path('assets/images/awaitingBirthcert'), $birthcert);
 $awaitingApproval = new AwaitingApproval;
            $awaitingApproval->employee_id = $employee_id;
             $awaitingApproval->modifiername = Auth::user()->name;
            $awaitingApproval->areaChanged = 'birthcert';
            $awaitingApproval->areaChangedValue =  $birthcert;
            $awaitingApproval->oldvalue = 'empty';
            $awaitingApproval->descriptionOfAction = ''.Auth::user()->name.' Added new Birthcert';
            $awaitingApproval->status = 'Pending';
            $awaitingApproval->save();

            $awaitingApprovalB = new AwaitingApproval;
            $awaitingApprovalB->employee_id = $employee_id;
             $awaitingApprovalB->modifiername = Auth::user()->name;
            $awaitingApprovalB->areaChanged = 'birth_date';
            $awaitingApprovalB->areaChangedValue =  $request->birth_date;
            $awaitingApprovalB->oldvalue = 'empty';
            $awaitingApprovalB->descriptionOfAction = ''.Auth::user()->name.' Added new Birth Date';
            $awaitingApprovalB->status = 'Pending';
            $awaitingApprovalB->save();

            Toastr::success('Birth Details Updated successfully, Awaiting Approval Now!! :)','Success');
              return redirect()->back();
  } 
  elseif($request->updatetype == "nationality"){
    $nationality = $request->nationality;
 $awaitingApproval = new AwaitingApproval;
            $awaitingApproval->employee_id = $employee_id;
             $awaitingApproval->modifiername = Auth::user()->name;
            $awaitingApproval->areaChanged = 'nationality';
            $awaitingApproval->areaChangedValue =  $nationality;
            $awaitingApproval->oldvalue = $request->oldvalue;
            $awaitingApproval->descriptionOfAction = ''.Auth::user()->name.' Changed User\'s Nationality';
            $awaitingApproval->status = 'Pending';
            $awaitingApproval->save();
            Toastr::success('Nationality Updated successfully, Awaiting Approval Now!! :)','Success');
              return redirect()->back();
  }  elseif($request->updatetype == "fullname"){
    $fullname = $request->fullname;
 $awaitingApproval = new AwaitingApproval;
            $awaitingApproval->employee_id = $employee_id;
             $awaitingApproval->modifiername = Auth::user()->name;
            $awaitingApproval->areaChanged = 'fullname';
            $awaitingApproval->areaChangedValue =  $fullname;
            $awaitingApproval->oldvalue = $request->oldvalue;
            $awaitingApproval->descriptionOfAction = ''.Auth::user()->name.' Changed User\'s Fullname';
            $awaitingApproval->status = 'Pending';
            $awaitingApproval->save();
            Toastr::success('Fullname Updated successfully, Awaiting Approval Now!! :)','Success');
              return redirect()->back();
  } 
  elseif($request->updatetype == "ssnit"){
    $ssnit = $request->ssnit;
 $awaitingApproval = new AwaitingApproval;
            $awaitingApproval->employee_id = $employee_id;
             $awaitingApproval->modifiername = Auth::user()->name;
            $awaitingApproval->areaChanged = 'ssnit';
            $awaitingApproval->areaChangedValue =  $ssnit;
            $awaitingApproval->oldvalue = $request->oldvalue;
            $awaitingApproval->descriptionOfAction = ''.Auth::user()->name.' Changed User\'s  SSNIT';
            $awaitingApproval->status = 'Pending';
            $awaitingApproval->save();
            Toastr::success('SSNIT Updated successfully, Awaiting Approval Now!! :)','Success');
              return redirect()->back();
  }  elseif($request->updatetype == "ghcard_id"){
    $ghcard_id = $request->ghcard_id;
 $awaitingApproval = new AwaitingApproval;
            $awaitingApproval->employee_id = $employee_id;
             $awaitingApproval->modifiername = Auth::user()->name;
            $awaitingApproval->areaChanged = 'ghcard_id';
            $awaitingApproval->areaChangedValue =  $ghcard_id;
            $awaitingApproval->oldvalue = $request->oldvalue;
            $awaitingApproval->descriptionOfAction = ''.Auth::user()->name.' Changed User\'s  Ghcard_id';
            $awaitingApproval->status = 'Pending';
            $awaitingApproval->save();
            Toastr::success('Ghcard_id Updated successfully, Awaiting Approval Now!! :)','Success');
              return redirect()->back();
  }  
  elseif($request->updatetype == "ghcard_id_expire"){
    $ghcard_id_expire = $request->ghcard_id_expire;
 $awaitingApproval = new AwaitingApproval;
            $awaitingApproval->employee_id = $employee_id;
             $awaitingApproval->modifiername = Auth::user()->name;
            $awaitingApproval->areaChanged = 'ghcard_id_expire';
            $awaitingApproval->areaChangedValue =  $ghcard_id_expire;
            $awaitingApproval->oldvalue = $request->oldvalue;
            $awaitingApproval->descriptionOfAction = ''.Auth::user()->name.' Changed User\'s  Ghcard_id_expire';
            $awaitingApproval->status = 'Pending';
            $awaitingApproval->save();
            Toastr::success('Ghcard_id_expire Updated successfully, Awaiting Approval Now!! :)','Success');
              return redirect()->back();
  }  
 elseif($request->updatetype == "email"){
    $email = $request->email;
 $awaitingApproval = new AwaitingApproval;
            $awaitingApproval->employee_id = $employee_id;
             $awaitingApproval->modifiername = Auth::user()->name;
            $awaitingApproval->areaChanged = 'email';
            $awaitingApproval->areaChangedValue =  $email;
            $awaitingApproval->oldvalue = $request->oldvalue;
            $awaitingApproval->descriptionOfAction = ''.Auth::user()->name.' Changed User\'s  Email';
            $awaitingApproval->status = 'Pending';
            $awaitingApproval->save();
            Toastr::success('Email Updated successfully, Awaiting Approval Now!! :)','Success');
              return redirect()->back();
  }    
  elseif($request->updatetype == "fixednum"){
    $fixednum = $request->fixednum;
 $awaitingApproval = new AwaitingApproval;
            $awaitingApproval->employee_id = $employee_id;
             $awaitingApproval->modifiername = Auth::user()->name;
            $awaitingApproval->areaChanged = 'fixednum';
            $awaitingApproval->areaChangedValue =  $fixednum;
            $awaitingApproval->oldvalue = $request->oldvalue;
            $awaitingApproval->descriptionOfAction = ''.Auth::user()->name.' Changed User\'s Fixed Number';
            $awaitingApproval->status = 'Pending';
            $awaitingApproval->save();
            Toastr::success('Fixed Number Updated successfully, Awaiting Approval Now!! :)','Success');
              return redirect()->back();
  }    
  elseif($request->updatetype == "mobilenum"){
    $mobilenum = $request->mobilenum;
 $awaitingApproval = new AwaitingApproval;
            $awaitingApproval->employee_id = $employee_id;
             $awaitingApproval->modifiername = Auth::user()->name;
            $awaitingApproval->areaChanged = 'mobilenum';
            $awaitingApproval->areaChangedValue =  $mobilenum;
            $awaitingApproval->oldvalue = $request->oldvalue;
            $awaitingApproval->descriptionOfAction = ''.Auth::user()->name.' Changed User\'s  Mobile Number';
            $awaitingApproval->status = 'Pending';
            $awaitingApproval->save();
            Toastr::success(' Mobile Number Updated successfully, Awaiting Approval Now!! :)','Success');
              return redirect()->back();
  }   
   elseif($request->updatetype == "address"){
    $address = $request->address;
 $awaitingApproval = new AwaitingApproval;
            $awaitingApproval->employee_id = $employee_id;
             $awaitingApproval->modifiername = Auth::user()->name;
            $awaitingApproval->areaChanged = 'address';
            $awaitingApproval->areaChangedValue =  $address;
            $awaitingApproval->oldvalue = $request->oldvalue;
            $awaitingApproval->descriptionOfAction = ''.Auth::user()->name.' Changed User\'s Address';
            $awaitingApproval->status = 'Pending';
            $awaitingApproval->save();
            Toastr::success(' Address Updated successfully, Awaiting Approval Now!! :)','Success');
              return redirect()->back();
  }  
    elseif($request->updatetype == "edu"){
    $edu = $request->edu;
 $awaitingApproval = new AwaitingApproval;
            $awaitingApproval->employee_id = $employee_id;
             $awaitingApproval->modifiername = Auth::user()->name;
            $awaitingApproval->areaChanged = 'edu';
            $awaitingApproval->areaChangedValue =  json_encode($edu) ;
            $awaitingApproval->oldvalue = json_encode($request->oldvalue);
            $awaitingApproval->descriptionOfAction = ''.Auth::user()->name.' Modified User\'s Education Background/ Qualification';
            $awaitingApproval->status = 'Pending';
            $awaitingApproval->save();
            Toastr::success('Education Background/Qualification Updated successfully, Awaiting Approval Now!! :)','Success');
              return redirect()->back();
  } 
   elseif($request->updatetype == "honours"){
    $honours = $request->honours;
 $awaitingApproval = new AwaitingApproval;
            $awaitingApproval->employee_id = $employee_id;
             $awaitingApproval->modifiername = Auth::user()->name;
            $awaitingApproval->areaChanged = 'honours';
            $awaitingApproval->areaChangedValue =  json_encode($honours) ;
            $awaitingApproval->oldvalue = json_encode($request->oldvalue);
            $awaitingApproval->descriptionOfAction = ''.Auth::user()->name.' Modified User\'s Honours & Decorations';
            $awaitingApproval->status = 'Pending';
            $awaitingApproval->save();
            Toastr::success('Honours & Decorations Updated successfully, Awaiting Approval Now!! :)','Success');
              return redirect()->back();
  } 
     elseif($request->updatetype == "languages"){
    $languages = $request->languages;
 $awaitingApproval = new AwaitingApproval;
            $awaitingApproval->employee_id = $employee_id;
             $awaitingApproval->modifiername = Auth::user()->name;
            $awaitingApproval->areaChanged = 'languages';
            $awaitingApproval->areaChangedValue =  json_encode($languages) ;
            $awaitingApproval->oldvalue = json_encode($request->oldvalue);
            $awaitingApproval->descriptionOfAction = ''.Auth::user()->name.' Modified User\'s Languages Spoken';
            $awaitingApproval->status = 'Pending';
            $awaitingApproval->save();
            Toastr::success('Languages Spoken Updated successfully, Awaiting Approval Now!! :)','Success');
              return redirect()->back();
  } 
     elseif($request->updatetype == "maritalStatus1"){
    $maritalStatus1 =[ $request->maritalStatus1, $request->marriageDate];
    $oldvaluess = [$request->oldvalue, $request->oldvalue1];
 $awaitingApproval = new AwaitingApproval;
            $awaitingApproval->employee_id = $employee_id;
             $awaitingApproval->modifiername = Auth::user()->name;
            $awaitingApproval->areaChanged = 'languages';
            $awaitingApproval->areaChangedValue =  json_encode($maritalStatus1) ;
            $awaitingApproval->oldvalue = json_encode($oldvaluess);
            $awaitingApproval->descriptionOfAction = ''.Auth::user()->name.' Modified User\'s Marital Status';
            $awaitingApproval->status = 'Pending';
            $awaitingApproval->save();
            Toastr::success('Marital Status Updated successfully, Awaiting Approval Now!! :)','Success');
              return redirect()->back();
  } 
   elseif($request->updatetype == "previousEmployee"){
    $previousEmployee = $request->previousEmployee;
 $awaitingApproval = new AwaitingApproval;
            $awaitingApproval->employee_id = $employee_id;
             $awaitingApproval->modifiername = Auth::user()->name;
            $awaitingApproval->areaChanged = 'previousEmployee';
            $awaitingApproval->areaChangedValue =  json_encode($previousEmployee) ;
            $awaitingApproval->oldvalue = json_encode($request->oldvalue);
            $awaitingApproval->descriptionOfAction = ''.Auth::user()->name.' Modified User\'s Previous Employee';
            $awaitingApproval->status = 'Pending';
            $awaitingApproval->save();
            Toastr::success('Previous Employee Updated successfully, Awaiting Approval Now!! :)','Success');
              return redirect()->back();
  } 
  
   else{
    dd("noooooooooo");
  }

//   DB::commit();
} catch (\Throwable $th) {
        //throw $th;
        Log::info($th);
        // DB::rollback();
        Toastr::error('Edit failed :)','Error');
        return redirect()->back();
    }
      


        // dd([$employee_id, $request->passportpic()]);
        // return view('form.overtime');
    }


}
