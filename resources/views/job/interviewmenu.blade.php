@extends('layouts.master')
@section('content')
    {{-- message --}}
    {!! Toastr::message() !!}
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Interview Menu</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item">Jobs</li>
                            <li class="breadcrumb-item active">Interview Menu</li>
                        </ul>
                    </div>
                    {{-- <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn mb-1" data-toggle="modal" data-target="#add_question"><i class="fa fa-plus"></i> Add Question</a>
                        <a href="#" class="btn add-btn mr-1 mb-1" data-toggle="modal" data-target="#add_category"><i class="fa fa-plus"></i> Add Category</a>
                    </div> --}}
                </div>
            </div>
            <!-- /Page Header -->
            <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                      <a href="{{ route('job/interview/panel') }}">
                    <div class="card dash-widget">
                        <div class="card-body"> <p class="dash-widget-icon"><i class="fa fa-users"></i></p>
                            <div class="dash-widget-info">
                                <h5>View Panel Members</h5>
                            </div>
                        </div>
                    </div>
                       </a>
                </div>
                {{-- <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3" >
                   <div class="card dash-widget">
                        <div class="card-body"> <p class="dash-widget-icon"><i class="fa fa-bar-chart"></i></p>
                            <div class="dash-widget-info">
                                <h5>View Interview Result</h5> 
                            </div>
                        </div>
                    </div>
                  </div> --}}
                {{-- <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="card dash-widget">
                        <div class="card-body"> <span class="dash-widget-icon"><i class="fa fa-bar-chart"></i></span>
                            <div class="dash-widget-info">
                                <h3>{{ $employeesRetirementDue }}</h3> <span>Employees Close to Retirement</span>
                            </div>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="card dash-widget">
                        <div class="card-body"> <span class="dash-widget-icon"><i class="fa fa-arrow-up"></i></span>
                            <div class="dash-widget-info">
                                <h3>0</h3> <span>Employees Due for Promotion</span>
                            </div>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="card dash-widget">
                        <div class="card-body"> <span class="dash-widget-icon"><i class="fa fa-user"></i></span>
                            <div class="dash-widget-info">
                                <h3>{{ $employeestotal }}</h3> <span>Total Employees</span>
                            </div>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="card dash-widget">
                        <div class="card-body"> <span class="dash-widget-icon"><i class="fa fa-birthday-cake"></i></span>
                            <div class="dash-widget-info">
                                <h3>{{ $birthday }}</h3> <span>Employees Birthday Today</span>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>


            <div class="row">
                <div class="col">
                    <div class="card card-table flex-fill">
                        <div class="card-header">
                            <h3 class="card-title mb-0">Promotion Interview Result</h3> </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-nowrap custom-table mb-0">
                                    <thead>
                                        <tr>
                                            <th>iD</th>
                                            <th>Name</th>
                                            <th>Total Marks</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                            <th>Panel Comment</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href="invoice-view.html">#0001</a></td>
                                            <td>
                                                <h2><a href="#">Williams Mensah</a></h2>
                                            </td>
                                            <td> 76%</td>
                                            <td class="text-center">
                                                <div class="dropdown action-label">
                                                    <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false" >
                                                        <i class="fa fa-dot-circle-o text-success" id="status-icon"></i> 
                                                        Passed
                                                    </a>
                                                    </div>
                                            </td>
                                            <td><a href="#" data-toggle="modal" data-target="#Promoactiontoapprove" class="btn btn-sm btn-success generateid"  ><i class="fa fa-download"></i> Action </a></td>
                                            <td> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nam sit cum temporibus deleniti. Cupiditate cum corrupti tempore, temporibus porro ea fuga, consectetur omnis laudantium magnam accusantium nam explicabo officia ab?</td>

                                            
                                        </tr>
                                        <tr>
                                            <td><a href="invoice-view.html">#0002</a></td>
                                            <td>
                                                <h2><a href="#">Mercy Lortel</a></h2>
                                            </td>
                                            <td>96%</td>
                                            <td class="text-center">
                                                <div class="dropdown action-label">
                                                    <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false" >
                                                        <i class="fa fa-dot-circle-o text-success" id="status-icon"></i> 
                                                        Passed
                                                    </a>
                                                    </div>
                                            </td>
                                            <td><a href="#" data-toggle="modal" data-target="#Promoactiontoapprove" class="btn btn-sm btn-success generateid"  ><i class="fa fa-download"></i> Action </a></td>
                                            <td>Empty</td>
                                        </tr>
                                        <tr>
                                            <td><a href="invoice-view.html">#0003</a></td>
                                            <td>
                                                <h2><a href="#">Animi Kwofie</a></h2>
                                            </td>
                                            <td> 36%</td>
                                            <td class="text-center">
                                                <div class="dropdown action-label">
                                                    <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false" >
                                                        <i class="fa fa-dot-circle-o text-danger" id="status-icon"></i> 
                                                       Failed
                                                    </a>
                                                    </div>
                                            </td>
                                            <td><a href="#" data-toggle="modal" data-target="#Promoactiontoapprove" class="btn btn-sm btn-success generateid"  ><i class="fa fa-download"></i> Action </a></td>
                                            <td> Empty </td>
                                        </tr>
                                        <tr>
                                            <td><a href="invoice-view.html">#0004</a></td>
                                            <td>
                                                <h2><a href="#"> John Atomic</a></h2>
                                            </td>
                                            <td> 88%</td>
                                            <td class="text-center">
                                                <div class="dropdown action-label">
                                                    <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false" >
                                                        <i class="fa fa-dot-circle-o text-success" id="status-icon"></i> 
                                                        Passed
                                                    </a>
                                                    </div>
                                            </td>
                                            <td><a href="#" data-toggle="modal" data-target="#Promoactiontoapprove" class="btn btn-sm btn-success generateid"  ><i class="fa fa-download"></i> Action </a></td>
                                            <td> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nam sit cum temporibus deleniti. Cupiditate cum corrupti tempore, temporibus porro ea fuga, consectetur omnis laudantium magnam accusantium nam explicabo officia ab?</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="#">View all results</a>
                        </div>
                    </div>
                </div>
            </div>

<hr>
<hr>




            <div class="row">
                <div class="col">
                    <div class="card card-table flex-fill">
                        <div class="card-header">
                            <h3 class="card-title mb-0">Recuritment Interview Result</h3> </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-nowrap custom-table mb-0">
                                    <thead>
                                        <tr>
                                            <th>iD</th>
                                            <th>Name</th>
                                            <th>Total Marks</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                            <th>Panel Comment</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href="invoice-view.html">#0001</a></td>
                                            <td>
                                                <h2><a href="#">Theophilus Mensah</a></h2>
                                            </td>
                                            <td> 76%</td>
                                            <td class="text-center">
                                                <div class="dropdown action-label">
                                                    <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false" >
                                                        <i class="fa fa-dot-circle-o text-success" id="status-icon"></i> 
                                                        Passed
                                                    </a>
                                                    </div>
                                            </td>
                                            <td><a href="#" data-toggle="modal" data-target="#actiontoapprove" class="btn btn-sm btn-info generateid"  ><i class="fa fa-download"></i> Action </a></td>
                                            <td> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nam sit cum temporibus deleniti. Cupiditate cum corrupti tempore, temporibus porro ea fuga, consectetur omnis laudantium magnam accusantium nam explicabo officia ab?</td>

                                            
                                        </tr>
                                        <tr>
                                            <td><a href="invoice-view.html">#0002</a></td>
                                            <td>
                                                <h2><a href="#">Gifty Lortel</a></h2>
                                            </td>
                                            <td>96%</td>
                                            <td class="text-center">
                                                <div class="dropdown action-label">
                                                    <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false" >
                                                        <i class="fa fa-dot-circle-o text-success" id="status-icon"></i> 
                                                        Passed
                                                    </a>
                                                    </div>
                                            </td>
                                            <td><a href="#" data-toggle="modal" data-target="#actiontoapprove" class="btn btn-sm btn-info generateid"  ><i class="fa fa-download"></i> Action </a></td>
                                            <td>Empty</td>
                                        </tr>
                                        <tr>
                                            <td><a href="invoice-view.html">#0003</a></td>
                                            <td>
                                                <h2><a href="#"> Aminsah Kwofie</a></h2>
                                            </td>
                                            <td> 36%</td>
                                            <td class="text-center">
                                                <div class="dropdown action-label">
                                                    <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false" >
                                                        <i class="fa fa-dot-circle-o text-danger" id="status-icon"></i> 
                                                       Failed
                                                    </a>
                                                    </div>
                                            </td>
                                            <td><a href="#" data-toggle="modal" data-target="#actiontoapprove" class="btn btn-sm btn-info generateid"  ><i class="fa fa-download"></i> Action </a></td>
                                            <td> Empty </td>
                                        </tr>
                                        <tr>
                                            <td><a href="invoice-view.html">#0004</a></td>
                                            <td>
                                                <h2><a href="#"> Samuel Atomic</a></h2>
                                            </td>
                                            <td> 88%</td>
                                            <td class="text-center">
                                                <div class="dropdown action-label">
                                                    <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false" >
                                                        <i class="fa fa-dot-circle-o text-success" id="status-icon"></i> 
                                                        Passed
                                                    </a>
                                                    </div>
                                            </td>
                                            <td><a href="#" data-toggle="modal" data-target="#actiontoapprove" class="btn btn-sm btn-info generateid"  ><i class="fa fa-download"></i> Action </a></td>
                                            <td> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nam sit cum temporibus deleniti. Cupiditate cum corrupti tempore, temporibus porro ea fuga, consectetur omnis laudantium magnam accusantium nam explicabo officia ab?</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="#">View all results</a>
                        </div>
                    </div>
                </div>
            </div>

{{-- charts  --}}
<div class="row">
    <div class="col-sm-6 col-sm-offset-3 text-center">
       <label class="label label-success">Candidates Overview</label>
      <div id="pie-chart" ></div>
    </div>
    <div class="col-sm-6 text-center">
      <label class="label label-success">Number Of Applicants Overview</label>
      <div id="area-chart" ></div>
    </div>
    <div class="col-sm-6 text-center">
       <label class="label label-success">Total Interviews Pending Vs Submited Interviews</label>
      <div id="line-chart"></div>
    </div>
    <div  class="col-sm-6 text-center">
       <label class="label label-success">Interview Passed Vs Failed Overview</label>
      <div id="bar-chart" ></div>
    </div>
    {{-- <div class="col-sm-6 text-center">
       <label class="label label-success">Bar stacked</label>
      <div id="stacked" ></div>
    </div> --}}
    
    
  </div>


            {{-- <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title"> Number Of Applicants Overview</h3>
                                    <div id="bar-charts"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-center">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title"> Pending Vs Submited Interviews</h3>
                                    <div id="line-charts"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
      
        <div class="row">
            <div class="col-md-12">
            <br>
            <h3 class="p-2">Pending Candidates Scheduled For Interviewed</h3>
                <div class="table-responsive">
                    <table class="table table-striped custom-table mb-0 datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Interview Type</th>
                                <th>Interview Date</th> 
                                <th class="text-center">Status</th>
                                <th>Email</th>
                                <th>Phone</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($interviewCandidates as $key=>$items)
                                
                            <tr>
                                <td>{{ ++$key }}</td>
                               
                                <td>
                                    <h2 class="table-avatar">
                                        <a href="#" class="avatar"><img alt="" src="{{ asset('assets/img/Circle-icons-profile.png')}}"></a>
                                        <a href="#">{{ $items->name }} <span>{{ $items->job_title }}</span></a>
                                    </h2>
                                </td>
                                <td class="text-center">
                                    <div class="dropdown action-label">
                                        <a class="btn btn-white btn-sm btn-rounded" href="#">
                                            <i class="fa fa-dot-circle-o text-danger"></i>{{ $items->inteviewtype }}
                                        </a>
                                        
                                    </div>
                                </td>
                                
                                <td>{{ date('d F, Y',strtotime($items->dateofinterview)) }}</td>
                              
                                <td class="text-center">
                                    <div class="dropdown action-label">
                                        <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false" data-status="{{ $items->status }}" id="dropdown-toggle">
                                            @if ($items->status == 'pending')
                                                 <i class="fa fa-dot-circle-o text-info" id="status-icon"></i> {{ $items->status }}
                                            @elseif ($items->status == 'reject')
                                          <i class="fa fa-dot-circle-o text-danger"  id="status-icon"></i> {{ $items->status }}
                                                @elseif ($items->status == 'interview')
                                                <i class="fa fa-dot-circle-o text-success"></i> {{ 'Shortlisted'}}
                                                @elseif($items->status == 'interviewsscheduled')
                                                <i class="fa fa-dot-circle-o text-secondary"></i> {{ 'Interview Scheduled' }}

                                            @endif
                                           
                                        </a>
                                        {{-- <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{ route('changejobapplicantStatus', ['id' => $items->id, 'name' => 'pending']) }}"><i class="fa fa-dot-circle-o text-info"></i>pending</a>
                                            <a class="dropdown-item" href="{{ route('changejobapplicantStatus', ['id' => $items->id, 'name' => 'reject']) }}"><i class="fa fa-dot-circle-o text-danger"></i>reject</a>
                                            <a class="dropdown-item" href="{{ route('changejobapplicantStatus', ['id' => $items->id, 'name' => 'interview']) }}"><i class="fa fa-dot-circle-o text-success"></i>Shortlisted</a>
                                        </div> --}}
                                    </div>
                                </td>
                                <td> {{ $items->email }} </td>
                                <td> {{ $items->phone }} </td>
                                
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /Page Content -->



        <!-- Add Category Modal -->
        <div id="add_category" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('save/category') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Add Category</label>
                                        <input class="form-control @error('category') is-invalid @enderror" type="text" name="category">
                                    </div>
                                </div>
                            </div>
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Cancel</button>
                                <button type="submit" class="btn btn-primary submit-btn">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Add Questions Modal -->
    
        <!-- Add Questions Modal -->
        <div id="add_question" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Questions</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('save/questions') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{-- <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Add Category</label>
                                        <select class="select  @error('category') is-invalid @enderror" name="category">
                                            <option selected disabled> --Select --</option>
                                            @foreach ($category as $categorys )
                                            <option value="{{ $categorys->category }}" {{ old('category') == $categorys->category ? "selected" :""}}>{{ $categorys->category }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Department</label>
                                        <select class="select @error('department') is-invalid @enderror" name="department">
                                            <option selected disabled> --Select --</option>
                                            @foreach ($department as $departments )
                                            <option value="{{ $departments->department }}" {{ old('department') == $departments->department ? "selected" :""}}>{{ $departments->department }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Add Questions</label>
                                        <textarea class="form-control @error('questions') is-invalid @enderror" name="questions">{{ old('questions') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Option A</label>
                                        <input class="form-control @error('option_a') is-invalid @enderror" type="text" name="option_a" value="{{ old('option_a') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Option B</label>
                                        <input class="form-control @error('option_b') is-invalid @enderror" type="text" name="option_b" value="{{ old('option_b') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Option C</label>
                                        <input class="form-control @error('option_c') is-invalid @enderror" type="text" name="option_c" value="{{ old('option_c') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Option D</label>
                                        <input class="form-control @error('option_d') is-invalid @enderror" type="text" name="option_d" value="{{ old('option_d') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Correct Answer</label>
                                        <select class="select @error('answer') is-invalid @enderror" name="answer">
                                            <option selected disabled> --Select --</option>
                                            {{-- @foreach ($answer as $answers )
                                            <option value="{{ $answers->answer }}" {{ old('answer') == $answers->answer ? "selected" :""}}>{{ $answers->answer }}</option>
                                            @endforeach --}}
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Code Snippets</label>
                                        <textarea class="form-control @error('code_snippets') is-invalid @enderror" name="code_snippets">{{ old('code_snippets') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Answer Explanation</label>
                                        <textarea class="form-control @error('answer_explanation') is-invalid @enderror" name="answer_explanation">{{ old('answer_explanation') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Add Video Link</label>
                                        <input class="form-control @error('video_link') is-invalid @enderror" type="text" name="video_link" value="{{ old('video_link') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Add Image To Question</label>
                                        <input class="form-control @error('image_to_question') is-invalid @enderror" type="file" name="image_to_question">
                                    </div>
                                </div>
                            </div>
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Cancel</button>
                                <button type="submit" class="btn btn-primary submit-btn">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Add Questions Modal -->

        <!-- Edit Job Modal -->
        <div id="edit_question" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Questions</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('questions/update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input class="form-control" type="hidden" id="e_id" name="id" value="">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Add Category</label>
                                        <select class="select" name="category" id="e_category">
                                            <option selected disabled> --Select --</option>
                                            {{-- @foreach ($category as $categorys )
                                            <option value="{{ $categorys->category }}" {{ old('category') == $categorys->category ? "selected" :""}}>{{ $categorys->category }}</option>
                                            @endforeach --}}
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Department</label>
                                        <select class="select" name="department" id="e_department">
                                            <option selected disabled> --Select --</option>
                                            {{-- @foreach ($department as $departments )
                                            <option value="{{ $departments->department }}" {{ old('department') == $departments->department ? "selected" :""}}>{{ $departments->department }}</option>
                                            @endforeach --}}
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Add Questions</label>
                                        <textarea class="form-control" name="questions" id="e_questions"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Option A</label>
                                        <input class="form-control" type="text" name="option_a" id="e_option_a" value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Option B</label>
                                        <input class="form-control" type="text" name="option_b" id="e_option_b" value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Option C</label>
                                        <input class="form-control" type="text" name="option_c" id="e_option_c" value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Option D</label>
                                        <input class="form-control" type="text" name="option_d" id="e_option_d" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Correct Answer</label>
                                        <select class="select" name="answer" id="e_answer">
                                            <option selected disabled> --Select --</option>
                                            {{-- @foreach ($answer as $answers )
                                            <option value="{{ $answers->answer }}" {{ old('answer') == $answers->answer ? "selected" :""}}>{{ $answers->answer }}</option>
                                            @endforeach --}}
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Code Snippets</label>
                                        <textarea class="form-control" name="code_snippets" id="e_code_snippets"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Answer Explanation</label>
                                        <textarea class="form-control" name="answer_explanation" id="e_answer_explanation"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Add Video Link</label>
                                        <input class="form-control" type="text" name="video_link" id="e_video_link" value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Add Image To Question</label>
                                        <input class="form-control" type="file" name="image_to_question">
                                    </div>
                                </div>
                            </div>
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Cancel</button>
                                <button type="submit" class="btn btn-primary submit-btn">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Edit Job Modal -->

        <!-- Delete Job Modal -->
        <div class="modal custom-modal fade" id="delete_job" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-header">
                            <h3>Delete</h3>
                            <p>Are you sure want to delete?</p>
                        </div>
                        <div class="modal-btn delete-action">
                            <form action="{{ route('questions/delete') }}" method="POST">
                                @csrf
                                <input type="hidden" class="e_id" name="id" value="">
                                <div class="row">
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-primary continue-btn submit-btn">Delete</button>
                                    </div>
                                    <div class="col-6">
                                        <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>z
        </div>
        <!-- /Delete Job Modal -->

{{-- action for promotion --}}
<div id="Promoactiontoapprove" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Approve Promotional-Candidate</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST">
                    @csrf
                    {{-- <input required class="form-control @error('id') is-invalid @enderror" type="hidden" name="id"  id="generateid"> --}}
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                               <div class="mb-3">
                                <label for="" class="form-control">Select Approval Type</label>
                                <select class="form-control " name="approvestatus" id="approvestatus">
                                    <option selected>Select Employment Type</option>
                                    <option value="#">Promote Candidate</option>
                                    <option value="#">Reject Candidate</option>
                                   <option value="#">On Probation</option>
                                </select>
                               </div>
                            </div>
                        </div>
                        
                    </div>
                   
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>






<!-- action for interview  Modal -->
<div id="actiontoapprove" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Approve Candidate</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST">
                    @csrf
                    {{-- <input required class="form-control @error('id') is-invalid @enderror" type="hidden" name="id"  id="generateid"> --}}
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                               <div class="mb-3">
                                <label for="" class="form-control">Select Approval Type</label>
                                <select class="form-control " name="approvestatus" id="approvestatus">
                                    <option selected>Select Employment Type</option>
                                    <option value="#">Employ Candidate</option>
                                    <option value="#">Reject Candidate</option>

                                    <option value="#">On Probation</option>
                                </select>
                               </div>
                            </div>
                        </div>
                        
                    </div>
                   
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



    </div>
    <!-- /Page Wrapper -->

    @section('script')

<script>
$(document).ready(function() {
    
    var data = [
      { y: '2014', a: 50, b: 90},
      { y: '2015', a: 65,  b: 75},
      { y: '2016', a: 50,  b: 50},
      { y: '2017', a: 75,  b: 60},
      { y: '2018', a: 80,  b: 65},
      { y: '2019', a: 90,  b: 70},
      { y: '2020', a: 100, b: 75},
      { y: '2021', a: 115, b: 75},
      { y: '2022', a: 120, b: 85},
      { y: '2023', a: 145, b: 85},
      { y: '2024', a: 160, b: 95}
    ],
    config = {
      data: data,
      xkey: 'y',
      ykeys: ['a', 'b'],
      labels: ['Total Income', 'Total Outcome'],
      fillOpacity: 0.6,
      hideHover: 'auto',
      behaveLikeLine: true,
      resize: true,
      pointFillColors:['#ffffff'],
      pointStrokeColors: ['black'],
      lineColors:['gray','red']
  };
  var data2 = [
      { yy: '2014', aa: 50, bb: 90},
      { yy: '2015', aa: 65,  bb: 75},
      { yy: '2016', aa: 50,  bb: 50},
      { yy: '2017', aa: 75,  bb: 60},
      { yy: '2018', aa: 80,  bb: 65},
      { yy: '2019', aa: 90,  bb: 70},
      { yy: '2020', aa: 100, bb: 75},
      { yy: '2021', aa: 115, bb: 75},
      { yy: '2022', aa: 120, bb: 85},
      { yy: '2023', aa: 145, bb: 85},
      { yy: '2024', aa: 160, bb: 95}
    ],
    config2 = {
      data: data2,
      xkey: 'yy',
      ykeys: ['aa', 'bb'],
      labels: ['Total Applicants', 'Total Employed'],
      fillOpacity: 0.6,
      hideHover: 'auto',
      behaveLikeLine: true,
      resize: true,
      pointFillColors:['#ffffff'],
      pointStrokeColors: ['black'],
      lineColors:['blue','green']
  };

  var data3 = [
      { yy: '2014', aa: 50, bb: 90},
      { yy: '2015', aa: 65,  bb: 75},
      { yy: '2016', aa: 50,  bb: 50},
      { yy: '2017', aa: 75,  bb: 60},
      { yy: '2018', aa: 80,  bb: 65},
      { yy: '2019', aa: 90,  bb: 70},
      { yy: '2020', aa: 100, bb: 75},
      { yy: '2021', aa: 115, bb: 75},
      { yy: '2022', aa: 120, bb: 85},
      { yy: '2023', aa: 145, bb: 85},
      { yy: '2024', aa: 160, bb: 95}
    ],
    config3 = {
      data: data3,
      xkey: 'yy',
      ykeys: ['aa', 'bb'],
      labels: ['Total Interviews Pending', 'Submit Interviews'],
      fillOpacity: 0.6,
      hideHover: 'auto',
      behaveLikeLine: true,
      resize: true,
      pointFillColors:['#ffffff'],
      pointStrokeColors: ['black'],
      lineColors:['blue','green']
  };
  var data4 = [
      { yy: '2014', aa: 50, bb: 90},
      { yy: '2015', aa: 65,  bb: 75},
      { yy: '2016', aa: 50,  bb: 50},
      { yy: '2017', aa: 75,  bb: 60},
      { yy: '2018', aa: 80,  bb: 65},
      { yy: '2019', aa: 90,  bb: 70},
      { yy: '2020', aa: 100, bb: 75},
      { yy: '2021', aa: 115, bb: 75},
      { yy: '2022', aa: 120, bb: 85},
      { yy: '2023', aa: 145, bb: 85},
      { yy: '2024', aa: 160, bb: 95}
    ],
    config4 = {
      data: data4,
      xkey: 'yy',
      ykeys: ['aa', 'bb'],
      labels: ['Failed', 'Passed'],
      fillOpacity: 0.6,
      hideHover: 'auto',
      behaveLikeLine: true,
      resize: true,
      pointFillColors:['#ffffff'],
      pointStrokeColors: ['black'],
      lineColors:['red','yellow']
  };


config2.element = 'area-chart';
Morris.Area(config2);
config3.element = 'line-chart';
Morris.Line(config3);
config4.element = 'bar-chart';
Morris.Bar(config4);
// config.element = 'stacked';
// config.stacked = true;
// Morris.Bar(config);

Morris.Donut({
  element: 'pie-chart',
  colors: ['#0a7800' , '#0a0078', '#fc0000', '#780064' ],
  data: [
    {label: "Passed Candidates", value: 30},
    {label: "Interviewed Candidates", value: 15},
    {label: "Rejected Candidates", value: 45},
    {label: "Employed Candidates", value: 10}
  ]
});

    });

</script>



        {{-- update --}}
        <script>
            $(document).on('click','.edit_question',function()
            {
                var _this = $(this).parents('tr');
                $('#e_id').val(_this.find('.id').text());
                $('#e_questions').val(_this.find('.questions').text());
                $('#e_option_a').val(_this.find('.option_a').text());
                $('#e_option_b').val(_this.find('.option_b').text());
                $('#e_option_c').val(_this.find('.option_c').text());
                $('#e_option_d').val(_this.find('.option_d').text());
                $('#e_code_snippets').val(_this.find('.code_snippets').text());
                $('#e_answer_explanation').val(_this.find('.answer_explanation').text());
                $('#e_video_link').val(_this.find('.video_link').text());
                
                // category
                var category = (_this.find(".category").text());
                var _option = '<option selected value="' +category+ '">' + _this.find('.category').text() + '</option>'
                $( _option).appendTo("#e_category");

                // department
                var department = (_this.find(".department").text());
                var _option = '<option selected value="' +department+ '">' + _this.find('.department').text() + '</option>'
                $( _option).appendTo("#e_department");

                // answer
                var answer = (_this.find(".answer").text());
                var _option = '<option selected value="' +answer+ '">' + _this.find('.answer').text() + '</option>'
                $( _option).appendTo("#e_answer");

            });
            
        </script>

        {{-- delete --}}
        <script>
            $(document).on('click','.delete_question',function() {
                var _this = $(this).parents('tr');
                $('.e_id').val(_this.find('.e_id').text());
            });
        </script>
        {{-- delete model --}}
    @endsection

@endsection