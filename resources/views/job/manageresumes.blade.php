@extends('layouts.master')
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-12">
                        <h3 class="page-title">Manage Applicants</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item">Jobs</li>
                            <li class="breadcrumb-item active">Manage Applicants</li>
                        </ul>
                    </div>
                </div>
            </div>
           
            <!-- Search Filter -->
            <form action="{{ route('all/applicants/search') }}" method="POST">
                @csrf
                <div class="row filter-row">
                    <div class="col-sm-6 col-md-3"> 
                       <div class="form-group form-focus"> 
                           <select class="form-control" name="status">
                            <option value="" selected>----Select Status----</option>
                                    <option value="pending">Pending</option>
                                    <option value="reject">Reject</option>
                                    <option value="interview">Interview</option>
                                    <option value="employeed">Hired</option>
                                </select> 
                           </div> 
                    </div>
                    <div class="col-sm-6 col-md-3">  
                        <div class="form-group form-focus">
                            <input type="text" class="form-control floating" name="name">
                            <label class="focus-label">Applicant Name</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3"> 
                        <div class="form-group form-focus">
                            <input type="text" class="form-control floating" name="position">
                            <label class="focus-label">Position</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">  
                        <button type="sumit" class="btn btn-success btn-block"> Search </button>  
                    </div>
                </div>
            </form>
            <!-- Search Filter -->
            <div class="row">
                <div class="col-md-12">
                <br>
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0 datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Job Title</th>
                                    <th>Department</th>
                                    <th>Application Date</th>
                                    {{-- <th>Expire Date</th> --}}
                                    <th class="text-center">Job Type</th>
                                    <th class="text-center">Status</th>
                                    <th>Resume</th>
                                    <th>Cover Letter</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($manageResumes as $key=>$items)
                                    
                                <tr>
                                    <td>{{ ++$key }}</td>
                                   
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="#" class="avatar"><img alt="" src="{{ asset('assets/img/Circle-icons-profile.png')}}"></a>
                                            <a href="#">{{ $items->name }} <span>{{ $items->job_title }}</span></a>
                                        </h2>
                                    </td>
                                    <td><a href="#">{{ $items->job_title }}</a></td>
                                    <td>{{ $items->department }}</td>
                                    <td>{{ date('d F, Y',strtotime($items->created_at)) }}</td>
                                    {{-- <td>{{ date('d F, Y',strtotime($items->expired_date)) }}</td> --}}
                                    <td class="text-center">
                                        <div class="dropdown action-label">
                                            <a class="btn btn-white btn-sm btn-rounded" href="#">
                                                <i class="fa fa-dot-circle-o text-danger"></i>{{$items->job_type}}
                                            </a>
                                            
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="dropdown action-label">
                                            <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false" data-status="{{ $items->status }}" id="dropdown-toggle">
                                                @if ($items->status == 'pending')
                                                     <i class="fa fa-dot-circle-o text-info" id="status-icon"></i> {{ $items->status }}
                                                @elseif ($items->status == 'reject')
                                              <i class="fa fa-dot-circle-o text-danger"  id="status-icon"></i> {{ $items->status }}
                                                    @elseif ($items->status == 'interview')
                                                    <i class="fa fa-dot-circle-o text-success"></i> {{ $items->status }}
    
                                                @endif
                                               
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="{{ route('changejobapplicantStatus', ['id' => $items->id, 'name' => 'pending']) }}"><i class="fa fa-dot-circle-o text-info"></i>pending</a>
                                                <a class="dropdown-item" href="{{ route('changejobapplicantStatus', ['id' => $items->id, 'name' => 'reject']) }}"><i class="fa fa-dot-circle-o text-danger"></i>reject</a>
                                                <a class="dropdown-item" href="{{ route('changejobapplicantStatus', ['id' => $items->id, 'name' => 'interview']) }}"><i class="fa fa-dot-circle-o text-success"></i>interview</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td><a href="{{ url('cv/download/'.$items->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-download"></i> Download Cv</a></td>
                                    <td><a href="{{ url('cover/download/'.$items->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-download"></i> Download Cover-Letter</a></td>

                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->
   
 
        
    </div>
    <!-- /Page Wrapper -->

    {{-- update --}}
    <script>
       
    </script>
@endsection