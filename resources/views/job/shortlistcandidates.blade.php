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
                        <h3 class="page-title">Shortlist Candidates</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item">Jobs</li>
                            <li class="breadcrumb-item active">Shortlist Candidates</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
          
   
            <!-- Search Filter -->
            <form action="{{ route('all/shortlistedapplicants/search') }}" method="POST">
                @csrf
                <div class="row filter-row">
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
                                    <th class="text-center">Schedule Interview</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($shortlistCandidates as $key=>$items)
                                    
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
                                                    <i class="fa fa-dot-circle-o text-success"></i> {{ 'Shortlisted'}}
                                                    @elseif($items->status == 'interviewsscheduled')
                                                    <i class="fa fa-dot-circle-o text-secondary"></i> {{ $items->status }}
    
                                                @endif
                                               
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="{{ route('changejobapplicantStatus', ['id' => $items->id, 'name' => 'pending']) }}"><i class="fa fa-dot-circle-o text-info"></i>pending</a>
                                                <a class="dropdown-item" href="{{ route('changejobapplicantStatus', ['id' => $items->id, 'name' => 'reject']) }}"><i class="fa fa-dot-circle-o text-danger"></i>reject</a>
                                                <a class="dropdown-item" href="{{ route('changejobapplicantStatus', ['id' => $items->id, 'name' => 'interview']) }}"><i class="fa fa-dot-circle-o text-success"></i>Shortlisted</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td><a href="{{ url('cv/download/'.$items->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-download"></i> Download Cv</a></td>
                                    <td><a href="{{ url('cover/download/'.$items->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-download"></i> Download Cover-Letter</a></td>
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item schedule" data-toggle="modal" data-target="#schedule_model" theid = "{{  $items->id }}" thename = "{{  $items->name }}"><i class="fa fa-pencil m-r-5"></i> Schedule Interview</a>
                                                 
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal custom-modal fade" id="schedule_model" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="form-header">
                                <h3>Schedule Interview</h3>
                                <p>Are you sure want to schedule interview?</p>
                            </div>
                            <div class="modal-btn delete-action">
                                <form action="{{ route('schduleinterview') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="nomineeid" id="nomineeid">
                                    <input type="hidden" name="nomineename" id="nomineename">
                                    <div class="row">
                                        <div class="col">  
                                            <div class="form-group">
                                                <label class="col-form-label">Interview Date: <span class="text-danger">*</span></label>
                                              <input required class="form-control" type="datetime-local" name="dateofinterview">
                                            </div>
                                        </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">  
                                                <div class="form-group">
                                                   <div class="mb-3">
                                                    <label  class="form-label">Interview Type:</label>
                                                    <select required class="form-control" name="inteviewtype">
                                                        <option value="Recruitment"> Recruitment</option>
                                                        <option value="Promotion">Promotion</option>
                                                    </select>
                                                   </div>
                                                </div>
                                            </div>
                                            </div>



<div class="row">
    <div class="dropdown">
        <div class="form-group">
        <label class="col-form-label" for="dropdownMenuButton">Panel Memebers: <span class="text-danger">*</span></label>
        <button required class="btn btn-primary btn-block dropdown-toggle form-control" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Select Panel Members
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
@if (!empty($allpanelmembers))
    @foreach ($allpanelmembers as $allpanelmember )
    <div class="dropdown-item">
        <input  type="checkbox" name="panelid[]" value={{ $allpanelmember->id }}> <label for="item1">{{ $allpanelmember->name }}</label>
      </div>
    @endforeach
@else
  {{ "No Panel Member Set" }}  
@endif

          
         
          <!-- Add more items as needed -->
       </div> 
    </div>
      </div>
</div>

                                        <div class="row">
                                            
                                            <div class="col">
                                                <div class="mb-3">
                                                  <label for="emailcontent" class="form-label">Email Content</label>
                                                  <textarea class="form-control" name="emailcontent" id="emailcontent" rows="5"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label class="col-form-label">Upload Attachment <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="file" name="interviewletter">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <button type="submit" class="btn btn-primary continue-btn submit-btn">Schedule</button>
                                            </div>
                                            <div class="col-6">
                                                <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                                            </div>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /Page Content -->
    </div>
    <!-- /Page Wrapper -->
    @section('script')
   
    <script>

$(document).on('click','.schedule',function()
            {
            var id =   $(this).attr('theid');
            var name =  $(this).attr('thename');
$('#nomineeid').val(id);
$('#nomineename').val(name);
// alert(name)

            });

  
    </script>
    
    @endsection

@endsection