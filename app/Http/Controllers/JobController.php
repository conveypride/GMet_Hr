<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use DB;
use App\Models\AddJob;
use App\Models\ApplyForJob;
use App\Models\Category;
use App\Models\Interviews;
use App\Models\PanelMembers;
use App\Models\Question;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class JobController extends Controller
{
    public function jobIndex()
    {    
        $job_list = DB::table('add_jobs')->get();
        return view('job.index',compact('job_list'));
    } 
    // job List
    public function jobList()
    {    
        $job_list = DB::table('add_jobs')->where('status', 'Open')->get();
        return view('job.joblist',compact('job_list'));
    }
    
    // job view
    public function jobView($id)
    { 
        // if(Auth::check()){
              /** update count */
        $post = AddJob::find($id);
        $update = ['count' =>$post->count + 1,];
        AddJob::where('id',$post->id)->update($update);

        $job_view = DB::table('add_jobs')->where('id',$id)->get();
        return view('job.jobview',compact('job_view'));
        // }else{
        //     return  redirect()->route('registers');
        
        // }
      
    }

    /** users dashboard index */
    public function userDashboard()
    {
        $job_list   = DB::table('add_jobs')->get();
        return view('job.userdashboard',compact('job_list'));
    }

    /** jobs dashboard index */
    public function jobsDashboard() {
        $job_list   = DB::table('add_jobs')->where('status','Open')->count();
        $apply_for_jobs = DB::table('apply_for_jobs')->count();
        $employes = DB::table('employees')->count();
        $jobseck = DB::table('users')->where('role_name','Normal User')->count();
        $joblist = DB::table('apply_for_jobs')
                  ->join('add_jobs', 'apply_for_jobs.job_title', '=', 'add_jobs.job_title')
                    ->select('apply_for_jobs.*', 'add_jobs.*')
                    ->get();

        return view('job.jobsdashboard',compact('job_list', 'apply_for_jobs', 'employes','jobseck', 'joblist'));
    }
    /** user all job */
    public function userDashboardAll() 
    {
        return view('job.useralljobs');
    }

    /** save job */
    public function userDashboardSave()
    {
      return view('job.savedjobs');
    }

    /** applied job*/
    public function userDashboardApplied()
    {
        return view('job.appliedjobs');
    }

    /** interviewing job*/
    public function userDashboardInterviewing()
    {
        return view('job.interviewing');
    }

    /** interviewing job*/
    public function userDashboardOffered()
    {
        return view('job.offeredjobs');
    }

    /** visited job*/
    public function userDashboardVisited()
    {
        return view('job.visitedjobs');
    }

    /** archived job*/
    public function userDashboardArchived()
    {
        return view('job.visitedjobs');
    }

    /** jobs */
    public function Jobs()
    {
        $department = DB::table('departments')->get();
        $type_job   = DB::table('type_jobs')->get();
        $job_list   = DB::table('add_jobs')->get();
        return view('job.jobs',compact('department','type_job','job_list'));
    }

    /** job save record */
    public function JobsSaveRecord(Request $request)
    {
        $request->validate([
            'job_title'       => 'required|string|max:255',
            'department'      => 'required|string|max:255',
            'job_location'    => 'required|string|max:255',
            'no_of_vacancies' => 'required|string|max:255',
            'experience'      => 'required|string|max:255',
            'age'             => 'required',
            'salary_from'     => 'required|string|max:255',
            'salary_to'       => 'required|string|max:255',
            'job_type'        => 'required|string|max:255',
            'status'          => 'required|string|max:255',
            'start_date'      => 'required|string|max:255',
            'expired_date'    => 'required|string|max:255',
            'description'     => 'required',
        ]);

        DB::beginTransaction();
        try {
            
            $add_job = new AddJob;
            $add_job->job_title       = $request->job_title;
            $add_job->department      = $request->department;
            $add_job->job_location    = $request->job_location;
            $add_job->no_of_vacancies = $request->no_of_vacancies;
            $add_job->experience   = $request->experience;
            $add_job->age          = $request->age;
            $add_job->salary_from  = $request->salary_from;
            $add_job->salary_to    = $request->salary_to;
            $add_job->job_type     = $request->job_type;
            $add_job->status       = $request->status;
            $add_job->start_date   = $request->start_date;
            $add_job->expired_date = $request->expired_date;
            $add_job->description  = $request->description;
            $add_job->save();

            DB::commit();
            Toastr::success('Create add job successfully :)','Success');
            return redirect()->back();
            
        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('Add Job fail :)','Error');
            return redirect()->back();
        } 
    }
    
    /** job applicants */
    public function jobApplicants($job_title)
    {
        if(Auth::user()->role_name == "Super Admin"){
            $apply_for_jobs = DB::table('apply_for_jobs')->where('job_title',$job_title)->get();
        return view('job.jobapplicants',compact('apply_for_jobs'));
        }else{
            Toastr::error('You don\'t have permission to view :)','Error');
            return redirect()->back();
        }
       
    }

    public function getpanelmembers()
    {
        if(Auth::user()->role_name == "Super Admin"){
   
            $currentDatetime = Carbon::now();
            // dd($currentDatetime);
            // exit();
            $allpanels = DB::table('panel_members')->get();


if(isset($allpanels)){
    foreach ($allpanels as  $value) {
        // dd($value->expirinDate);
        // exit();
       $datetime = Carbon::parse($value->expirinDate);

      if($currentDatetime->gt($datetime)){
        // dd([$datetime,$currentDatetime]);
        // exit();
        DB::table('panel_members')->where('id', $value->id)->update([
            'status' => 'Expired'
        ]); 
     }
    }
  
    
}

$allpanelmembers = DB::table('panel_members')->get();
  return view('job.addpanelmemebers',compact('allpanelmembers'));
         
        }else{
            Toastr::error('You don\'t have permission to view :)','Error');
            return redirect()->back();
        }
 }


 public function generateIdNumber($length = 8) {
    $id = Str::random($length);
    
    while (strlen($id) < $length) {
        $id .= mt_rand(0, 9);
    }
    
    return $id;
}

  public function generatenewpass(Request $request) {
    $id = $request->id;
    $expirinDate = $request->expirinDate;
    $data = [
        'expirinDate' => $request->expirinDate,
        'status' => 'Active',
    ];
    DB::table('panel_members')->where('id', $id)->update($data);
    Toastr::success('Panel Member link activated successfully :)','Success');
    return redirect()->back();
  
}


  public function addpanelmembers(Request $request)
    {    
        if(Auth::user()->role_name == "Super Admin"){
            $data = [
                'name' => $request->name,
                'uniqueid' => time(),
                'password' => $this->generateIdNumber(),
                'expirinDate' => $request->expirinDate,
                'status' => 'Registered',
            ];
            DB::table('panel_members')->insert($data);

            $allpanelmembers = DB::table('panel_members')->get();
            return view('job.addpanelmemebers',compact('allpanelmembers'));
            Toastr::success('New Panel Member added successfully :)','Success');
            return redirect()->back();
        }else{
            Toastr::error('You don\'t have permission to view :)','Error');
            return redirect()->back();
        }
 }







    /** download */
    public function downloadCV($id) {
        $cv_uploads = DB::table('apply_for_jobs')->where('id',$id)->first();
        $pathToFile = public_path("assets/employeeCv/{$cv_uploads->cv_upload}");
        return \Response::download($pathToFile);
    }
 public function downloadcover($id) {
        $cover_uploads = DB::table('apply_for_jobs')->where('id',$id)->first();
        $pathToFile = public_path("assets/employeeCover/{$cover_uploads->cover_upload}");
        return \Response::download($pathToFile);
    }
    /** job details */
    public function jobDetails($id)
    {
        $job_view_detail = DB::table('add_jobs')->where('id',$id)->get();
        return view('job.jobdetails',compact('job_view_detail'));
    }
 public function changejobapplicantStatus($id, $name)
    {
        ApplyForJob::where('id',$id)->update(['status' => $name]);
        Toastr::success('Status Changed Successfully :)','Success');
        return redirect()->back();

        // $job_view_detail = DB::table('add_jobs')->where('id',$id)->get();
        // return view('job.jobdetails',compact('job_view_detail'));
    }
    /** apply Job SaveRecord */
    public function applyJobSaveRecord(Request $request) 
    { 
        $request->validate([
            'job_title' => 'required|string|max:255',
            'name'      => 'required|string|max:255',
            'phone'     => 'required|string|max:255',
            'email'     => 'required|string|email',
            'message'   => 'required|string|max:255',
            'cv_upload' => 'required',
            'cover_upload' => 'required',
        ]);

        DB::beginTransaction();
        try {

            /** upload file */
            $cv_uploads = time().'.'.$request->cv_upload->extension();  
            $request->cv_upload->move(public_path('assets/employeeCv'), $cv_uploads);
             /**cover_upload upload file */
            $cover_uploads = time().'.'.$request->cover_upload->extension();  
            $request->cover_upload->move(public_path('assets/employeeCover'), $cover_uploads);
            



            $apply_job = new ApplyForJob;
            $apply_job->job_title = $request->job_title;
            $apply_job->name      = $request->name;
            $apply_job->phone     = $request->phone;
            $apply_job->email     = $request->email;
            $apply_job->message   = $request->message;
            $apply_job->status   =  'pending';
            $apply_job->cv_upload = $cv_uploads;
             $apply_job->cover_upload = $cover_uploads;
            $apply_job->save();

            DB::commit();
            Toastr::success('Apply job successfully :)','Success');
            return redirect()->route('home');
            
        } catch(\Exception $e) {
            DB::rollback();
            Log::info($e);
            Toastr::error('Apply Job fail :)','Error');
            return redirect()->back();
        } 
//           }else{
//              Toastr::error('Please Register to apply for job :)','Error');
//        return redirect()->route('register');
//    }
    }

    /** applyJobUpdateRecord */
    public function applyJobUpdateRecord(Request $request)
    {

        DB::beginTransaction();
        try {
            $update = [
                'id'              => $request->id,
                'job_title'       => $request->job_title,
                'department'      => $request->department,
                'job_location'    => $request->job_location,
                'no_of_vacancies' => $request->no_of_vacancies,
                'experience'      => $request->experience,
                'age'             => $request->age,
                'salary_from'     => $request->salary_from,
                'salary_to'       => $request->salary_to,
                'job_type'        => $request->job_type,
                'status'          => $request->status,
                'start_date'      => $request->start_date,
                'expired_date'    => $request->expired_date,
                'description'     => $request->description,
            ];

            AddJob::where('id',$request->id)->update($update);
            DB::commit();
            Toastr::success('Updated Leaves successfully :)','Success');
            return redirect()->back();
        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('Update Leaves fail :)','Error');
            return redirect()->back();
        } 
       


    }

    /** manage Resumes */
    public function manageApplicants()
    {
        // $department = DB::table('departments')->get();
        // $type_job   = DB::table('type_jobs')->get();
        $manageResumes = DB::table('add_jobs')
                        ->join('apply_for_jobs', 'apply_for_jobs.job_title', 'add_jobs.job_title')
                        ->where('apply_for_jobs.status', 'pending')
                        ->select('add_jobs.department', 'add_jobs.job_type', 'apply_for_jobs.*')->get();
        return view('job.manageresumes',compact('manageResumes'));
    }

 // employee search
 public function applicantsSearch(Request $request)
 {
   
    $manageResumes = DB::table('add_jobs')
    ->join('apply_for_jobs', 'apply_for_jobs.job_title', 'add_jobs.job_title')
    ->where('apply_for_jobs.status', 'pending')
    ->select('add_jobs.department', 'add_jobs.job_type', 'apply_for_jobs.*')->get();
     // search by id
     if($request->status)
     {
         $manageResumes = DB::table('add_jobs')
                     ->join('apply_for_jobs', 'apply_for_jobs.job_title', 'add_jobs.job_title')
                     ->where('apply_for_jobs.status','LIKE','%'.$request->status.'%')
                     ->select('add_jobs.department', 'add_jobs.job_type', 'apply_for_jobs.*')
                     ->get();
     }
     // search by name
     if($request->name)
     {
         $manageResumes = DB::table('add_jobs')
                     ->join('apply_for_jobs', 'apply_for_jobs.job_title', 'add_jobs.job_title')
                     ->where('apply_for_jobs.name','LIKE','%'.$request->name.'%')
                     ->select('add_jobs.department', 'add_jobs.job_type', 'apply_for_jobs.*')
                     ->get();
     }
     // search by name
     if($request->position)
     {
         $manageResumes = DB::table('add_jobs')
                     ->join('apply_for_jobs', 'apply_for_jobs.job_title', 'add_jobs.job_title')
                     ->where('apply_for_jobs.job_title','LIKE','%'.$request->position.'%')
                     ->select('add_jobs.department','add_jobs.job_title', 'add_jobs.job_type', 'apply_for_jobs.*')
                     ->get();
     }

     // search by name and id
     if($request->status && $request->name)
     {
         $manageResumes = DB::table('add_jobs')
                     ->join('apply_for_jobs', 'apply_for_jobs.job_title', 'add_jobs.job_title')
                     ->where('apply_for_jobs.status','LIKE','%'.$request->status.'%')
                     ->where('apply_for_jobs.name','LIKE','%'.$request->name.'%')
                     ->select('add_jobs.department', 'add_jobs.job_type', 'apply_for_jobs.*')
                     ->get();
     }
     // search by position and id
     if($request->status && $request->position)
     {
         $manageResumes = DB::table('add_jobs')
                     ->join('apply_for_jobs', 'apply_for_jobs.job_title', 'add_jobs.job_title')
                     ->where('apply_for_jobs.status','LIKE','%'.$request->status.'%')
                     ->where('apply_for_jobs.job_title','LIKE','%'.$request->position.'%')
                     ->select('add_jobs.department', 'add_jobs.job_type', 'apply_for_jobs.*')
                     ->get();
     }
     // search by name and position
     if($request->name && $request->position)
     {
         $manageResumes = DB::table('add_jobs')
                     ->join('apply_for_jobs', 'apply_for_jobs.job_title', 'add_jobs.job_title')
                     ->where('apply_for_jobs.name','LIKE','%'.$request->name.'%')
                     ->where('apply_for_jobs.job_title','LIKE','%'.$request->position.'%')
                     ->select('add_jobs.department', 'add_jobs.job_type', 'apply_for_jobs.*')
                     ->get();
     }
      // search by name and position and id
      if($request->status && $request->name && $request->position)
      {
         $myrole = Auth::user()->role_name;
          $manageResumes = DB::table('add_jobs')
                     ->join('apply_for_jobs', 'apply_for_jobs.job_title', 'add_jobs.job_title')
                      ->where('apply_for_jobs.status','LIKE','%'.$request->status.'%')
                      ->where('apply_for_jobs.name','LIKE','%'.$request->name.'%')
                      ->where('apply_for_jobs.job_title','LIKE','%'.$request->position.'%')
                      ->select('add_jobs.department', 'add_jobs.job_type', 'apply_for_jobs.*')
                      ->get();
      }
     return view('job.manageresumes',compact('manageResumes'));
 }

public function shortlistapplicantsSearch(Request $request)
 {
   
    $shortlistCandidates = DB::table('add_jobs')
    ->join('apply_for_jobs', 'apply_for_jobs.job_title', 'add_jobs.job_title')
    ->where('apply_for_jobs.status', 'interview')
    ->select('add_jobs.department', 'add_jobs.job_type', 'apply_for_jobs.*')->get();
     
     // search by name
     if($request->name)
     {
         $shortlistCandidates = DB::table('add_jobs')
                     ->join('apply_for_jobs', 'apply_for_jobs.job_title', 'add_jobs.job_title')
                     ->where('apply_for_jobs.name','LIKE','%'.$request->name.'%')
                     ->where('apply_for_jobs.status', 'interview')
                     ->select('add_jobs.department', 'add_jobs.job_type', 'apply_for_jobs.*')
                     ->get();
     }
     // search by name
     if($request->position)
     {
         $shortlistCandidates = DB::table('add_jobs')
                     ->join('apply_for_jobs', 'apply_for_jobs.job_title', 'add_jobs.job_title')
                     ->where('apply_for_jobs.job_title','LIKE','%'.$request->position.'%')
                     ->where('apply_for_jobs.status', 'interview')
                     ->select('add_jobs.department','add_jobs.job_title', 'add_jobs.job_type', 'apply_for_jobs.*')
                     ->get();
     }
 
     // search by name and position
     if($request->name && $request->position)
     {
         $shortlistCandidates = DB::table('add_jobs')
                     ->join('apply_for_jobs', 'apply_for_jobs.job_title', 'add_jobs.job_title')
                     ->where('apply_for_jobs.name','LIKE','%'.$request->name.'%')
                     ->where('apply_for_jobs.job_title','LIKE','%'.$request->position.'%')
                     ->where('apply_for_jobs.status', 'interview')
                     ->select('add_jobs.department', 'add_jobs.job_type', 'apply_for_jobs.*')
                     ->get();
     }
      
     return view('job.shortlistcandidates',compact('shortlistCandidates'));
 }




    /** shortlist candidates */
    public function shortlistCandidatesIndex()
    {
        $shortlistCandidates = DB::table('add_jobs')
        ->join('apply_for_jobs', 'apply_for_jobs.job_title', 'add_jobs.job_title')
        ->where('apply_for_jobs.status', 'interview')
        ->select('add_jobs.department', 'add_jobs.job_type', 'apply_for_jobs.*')->get();

        $allpanelmembers = DB::table('panel_members')->get();
        
        return view('job.shortlistcandidates',compact('shortlistCandidates','allpanelmembers'));
    }

    /** interview questions */
    public function interviewQuestionsIndex()
    {
        $question    = DB::table('questions')->get();
        $category    = DB::table('categories')->get();
        $department  = DB::table('departments')->get();
        $answer      = DB::table('answers')->get();
        return view('job.interviewquestions',compact('category','department','answer','question'));
    }

 /** interview menu */
    public function interviewmenuIndex()
    {
        
        $interviewCandidates = DB::table('apply_for_jobs')
        ->join('interviews', 'apply_for_jobs.id', 'interviews.nomineeid')
        ->where('apply_for_jobs.status', 'interviewsscheduled')
        ->where('interviews.status', 'pending')
        ->select('interviews.*', 'apply_for_jobs.job_title', 'apply_for_jobs.phone', 'apply_for_jobs.email','apply_for_jobs.name')->get();



        return view('job.interviewmenu',compact('interviewCandidates'));
    }

    

    /** interviewQuestions Save */
    public function categorySave( Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:255',
        ]);

        DB::beginTransaction();
        try {

            $save = new Category;
            $save->category = $request->category;
            $save->save();
            
            DB::commit();
            Toastr::success('Create new Category successfully :)','Success');
            return redirect()->back();
        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('Add Category fail :)','Error');
            return redirect()->back();
        }
    }


 public function schduleinterview(Request $request)
    {
      
$nomineeid = $request->nomineeid;
$nomineename = $request->nomineename;
$dateofinterview = $request->dateofinterview;
$panelid = $request->panelid;
$inteviewtype = $request->inteviewtype;
$emailcontent = $request->emailcontent;
$interviewletter = $request->interviewletter;

// dd($nomineeid);
// exit();
DB::beginTransaction();
try {
    //code...
    if(isset($panelid)){
       DB::table('apply_for_jobs')->where('id', $nomineeid )->update(['status' => 'interviewsscheduled']);

       if(isset($interviewletter)){
 $interviewletterr = time().'.'.$interviewletter->extension();  
       $interviewletter->move(public_path('assets/interview/letterofinterviewappointment'), $interviewletterr);

       }else{
        $interviewletterr = Null;
       }
      

   foreach ($panelid as $key => $value) {
   $interviewtable =  new Interviews();
   $interviewtable->nomineeid = $nomineeid;
   $interviewtable->nomineename = $nomineename;
   $interviewtable->dateofinterview = $dateofinterview;
   $interviewtable->panelid = $value;
   $interviewtable->inteviewtype = $inteviewtype;
   $interviewtable->emailcontent = $emailcontent;
   $interviewtable->status = 'pending';
   $interviewtable->interviewletter = $interviewletterr;
   $interviewtable->save();
}     
   




DB::commit();
Toastr::success('Interview Scheduled successfully :)','Success');
return redirect()->back();
}else{
        Toastr::error('No panel memeber selected :)','Error');
        Toastr::success('Interview Scheduled successfully :)','Success');
        return redirect()->back();

    }








} catch (\Throwable $th) {
    //throw $th;
    dd($th);

}
  




    }
    /** save question */
    public function questionSave(Request $request)
    {
        $request->validate([
            'category'           => 'required|string|max:255',
            'department'         => 'required|string|max:255',
            'questions'          => 'required|string|max:255',
            'option_a'           => 'required|string|max:255',
            'option_b'           => 'required|string|max:255',
            'option_c'           => 'required|string|max:255',
            'option_d'           => 'required|string|max:255',
            'answer'             => 'required|string|max:255',
            'code_snippets'      => 'required|string|max:255',
            'answer_explanation' => 'required|string|max:255',
            'video_link'         => 'required|url',
            'image_to_question'  => 'required',
        ]);

        DB::beginTransaction();
        try {

            /** upload file */
            $image_to_questions = time().'.'.$request->image_to_question->extension();  
            $request->image_to_question->move(public_path('assets/images/question'), $image_to_questions);

            $save = new Question;
            $save->category   = $request->category;
            $save->department = $request->department;
            $save->questions  = $request->questions;
            $save->option_a = $request->option_a;
            $save->option_b = $request->option_b;
            $save->option_c = $request->option_c;
            $save->option_d = $request->option_d;
            $save->answer   = $request->answer;
            $save->code_snippets      = $request->code_snippets;
            $save->answer_explanation = $request->answer_explanation;
            $save->video_link         = $request->video_link;
            $save->image_to_question  = $image_to_questions;
            $save->save();
            
            DB::commit();
            Toastr::success('Create new Question successfully :)','Success');
            return redirect()->back();
        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('Add Question fail :)','Error');
            return redirect()->back();
        } 
    }

    /** question update */
    public function questionsUpdate(Request $request)
    {
        DB::beginTransaction();
        try {
            
            $update = [
                'id'            => $request->id,
                'category'      => $request->category,
                'department'    => $request->department,
                'questions'     => $request->questions,
                'option_a'      => $request->option_a,
                'option_b'      => $request->option_b,
                'option_c'      => $request->option_c,
                'option_d'      => $request->option_d,
                'answer'        => $request->answer,
                'code_snippets' => $request->code_snippets,
                'answer_explanation' => $request->answer_explanation,
                'video_link' => $request->video_link,
            ];

            Question::where('id',$request->id)->update($update);
            DB::commit();
            Toastr::success('Updated Questions successfully :)','Success');
            return redirect()->back();
        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('Update Questions fail :)','Error');
            return redirect()->back();
        }
    }

    /** delete question */
    public function questionsDelete(Request $request)
    {
        try {

            Question::destroy($request->id);
            Toastr::success('Question deleted successfully :)','Success');
            return redirect()->back();
        
        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('Question delete fail :)','Error');
            return redirect()->back();
        }
    }

    /** offer approvals */
    public function offerApprovalsIndex()
    {
        return view('job.offerapprovals');
    }

    /** experience level */
    public function experienceLevelIndex()
    {
        return view('job.experiencelevel');
    }

    /** candidates */
    public function candidatesIndex()
    {
        return view('job.candidates');
    }

    /** schedule timing */
    public function scheduleTimingIndex()
    {
        return view('job.scheduletiming');
    }
    /** aptitude result */

    public function aptituderesultIndex()
    {
        return view('job.aptituderesult');
    }
}
