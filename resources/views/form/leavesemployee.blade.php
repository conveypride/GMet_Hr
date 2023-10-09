
@extends('layouts.master')
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Leaves <span id="year"></span></h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Leaves</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_leave"><i class="fa fa-plus"></i> Add Leave</a>
                    </div>
                </div>
            </div>
            
            <!-- Leave Statistics -->
            <div class="row">
                <div class="col-md-3">
                    <div class="stats-info">
                        <h6> Leave Approved </h6>
                        <h4>{{ $totalleave }} Days</h4>
                    </div>
                </div>
                {{-- <div class="col-md-3">
                    <div class="stats-info">
                        <h6> Rejected </h6>
                        <h4>3</h4>
                    </div>
                </div> --}}
                {{-- <div class="col-md-3">
                    <div class="stats-info">
                        <h6>Carry-Forward Left</h6>
                        <h4>4</h4>
                    </div>
                </div> --}}
                <div class="col-md-3">
                    <div class="stats-info">
                        <h6>Remaining Leave</h6>
                        <h4>{{ $remainingleave }} Days</h4>
                    </div>
                </div>


            </div>

@if ($useperteue= "true")
<h4 class="text-danger">Pending Leaving Approval (Supervisor)</h4>
<div class="row my-3 py-2">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-striped custom-table mb-0 datatable">
                <thead>
                    <tr>
                        <th>Employee</th>
                        <th>Leave Type</th>
                        <th>From</th>
                        <th>To</th>
                        {{-- <th class="text-center">Status</th> --}}
                        <th>Reason</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($data))
                        
                    @foreach ($data as $datas)
                      <input type="hidden" id="idd" name="idd" value="{{  $datas->id }}">
                    <tr>
                        <td>{{  $datas->user_id }} </td>
                        <td>
                            @if ($datas->leavetype == "annualleave")
                            {{ "Annual Leave"  }}
                        @elseif ($datas->leavetype == "sickleave")
                            {{ "Sick Leave" }}
                        @elseif ($datas->leavetype == "hospitalisationleave")
                            {{ "Hospitalisation Leave" }}
                            @elseif ($datas->leavetype == "maternityleave")
                            {{ "Maternity Leave" }}
                            @elseif ($datas->leavetype == "paternityleave")
                            {{ "Paternity Leave" }}
                            @else 
                            {{ "Other Leave" }}
                        @endif
                        </td>
                        <td>{{ $datas->leavefrom }}</td>
                        <td>{{ $datas->leaveto }}</td>
                       
                        <td>{{ $datas->leavereason }}</td>
                       
                        <td class="text-right">
                            <div class="dropdown dropdown-action">
                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <div class="getme"> <a class="dropdown-item getme" href="#" data-toggle="modal" data-target="#reject_leave"><i class="fa fa-close m-r-5"></i> Reject</a></div>
                                    <div class="getme">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#approve_approve"><i class="fa fa-check m-r-5"></i> Approve</a></div>
                                </div>
                            </div> 
                       </td>
                    </tr>
                    @endforeach
                    @else
                    {{ "<tr> No Leave Requested </tr>" }}
                    @endif
                   
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif

            <!-- /Leave Statistics -->
            <h4 class="text-success">Your Leave Request</h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0 datatable">
                            <thead>
                                <tr>
                                    <th>Leave Type</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th class="text-center">Status</th>
                                    <th>Reason</th>
                                    <th>Supervisor</th>
                                    {{-- <th class="text-right">Actions</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($leaaves))
                                    
                                @foreach ($leaaves as $leaave)
                                    
                                <tr>
                                    <td>
                                        @if ($leaave->leavetype == "annualleave")
                                        {{ "Annual Leave"  }}
                                    @elseif ($leaave->leavetype == "sickleave")
                                        {{ "Sick Leave" }}
                                    @elseif ($leaave->leavetype == "hospitalisationleave")
                                        {{ "Hospitalisation Leave" }}
                                        @elseif ($leaave->leavetype == "maternityleave")
                                        {{ "Maternity Leave" }}
                                        @elseif ($leaave->leavetype == "paternityleave")
                                        {{ "Paternity Leave" }}
                                        @else 
                                        {{ "Other Leave" }}
                                    @endif
                                    </td>
                                    <td>{{ $leaave->leavefrom }}</td>
                                    <td>{{ $leaave->leaveto }}</td>
                                    <td class="text-center">
                                        <div class="action-label">
                                            <a class="btn btn-white btn-sm btn-rounded" href="javascript:void(0);">
                                                @if ($leaave->status == NULL)
                                                <i class="fa fa-dot-circle-o text-secondary"></i> Awaiting Supervisor Approval
                                                @elseif ($leaave->status == 'supervisorApproved')
                                                <i class="fa fa-dot-circle-o text-waring"></i> Awaiting HR Approval
                                                @elseif ($leaave->status == 'hrApproved')
                                                <i class="fa fa-dot-circle-o text-purple"></i> Awaiting DG Approval
                                                 @elseif ($leaave->status == 'dgApproved')
                                                <i class="fa fa-dot-circle-o text-success"></i> 
                                                 Approved
                                                 @elseif ($leaave->status == 'rejected')
                                                <i class="fa fa-dot-circle-o text-danger"></i> 
                                                 Rejected
                                                @endif
                                               
                                            </a>
                                        </div>
                                    </td>
                                    <td>{{ $leaave->leavereason }}</td>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="profile.html" class="avatar avatar-xs"><img src="{{ asset('assets/img/Circle-icons-profile.png')}}" alt=""></a>
                                            <a href="#">{{ $leaave->supervisorname }}</a>
                                        </h2>
                                    </td>
                                    {{-- <td class="text-right"> --}}
                                        {{-- <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_leave"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_approve"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                            </div>
                                        </div> --}}
                                    {{-- </td> --}}
                                </tr>
                                @endforeach
                                @else
                                {{ "<tr> No Leave Requested </tr>" }}
                                @endif
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
              
        </div>
        <!-- /Page Content -->
       
		<!-- Add Leave Modal -->
        <div id="add_leave" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Leave</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('form/leaves/save') }}" method="POST">
                        @csrf
                            <div class="form-group">
                                <label>Leave Type <span class="text-danger">*</span></label>
                                <select class="select" name="leavetype">
                                    <option value="annualleave">Annual Leave</option>
                                    <option value="sickleave">Sick Leave</option>
                                    <option value="hospitalisationleave">Hospitalisation Leave</option>
                                    <option value="maternityleave"> Maternity Leave</option>
                                    <option value="paternityleave"> Paternity Leave</option>
                                    <option value="otherleave"> Other Leave</option>
                                </select>
                            </div>
                            {{-- <div class="form-group">
                                <label>From <span class="text-danger">*</span></label>
                                <div class="cal-icon">
                                    <input name="leavefrom" class="form-control datetimepicker" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>To <span class="text-danger">*</span></label>
                                <div class="cal-icon">
                                    <input name="leaveto" class="form-control datetimepicker" type="text">
                                </div>
                            </div> --}}
                            {{-- <div class="form-group">
                                <label>Number of days <span class="text-danger">*</span></label>
                                <input class="form-control" readonly type="text">
                            </div> --}}
                            {{-- <div class="form-group">
                                <label>Remaining Leaves <span class="text-danger">*</span></label>
                                <input class="form-control" readonly value="12" type="text">
                            </div> --}}
                            <div class="form-group">
                                <label>Leave Reason <span class="text-danger">*</span></label>
                                <textarea name="leavereason" rows="4" class="form-control"></textarea>
                            </div>
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Add Leave Modal -->
         
        <!-- Approve Leave Modal -->
        <div class="modal custom-modal fade" id="approve_approve" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-header">
                            <h3>Approve Leave</h3>
                            <p>Are you sure want to Approve this leave?</p>
                        </div>
                        <div class="modal-btn approve-action">
                            <div class="row">
                                <div class="col-6">
                                    <form action="supervisorApproved" method="post">
                                        @csrf
                                        <input type="hidden" name="approverej" class="approvereject" value="" >
                                    <button type="submit" class="btn btn-primary continue-btn">Approve</button>
                                </form>
                                </div>
                                <div class="col-6">
                                    <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /approve Leave Modal -->



         <!--Reject Leave Modal -->
         <div class="modal custom-modal fade" id="reject_leave" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-header">
                            <h3>Reject Leave</h3>
                            <p>Are you sure want to Reject this leave?</p>
                        </div>
                        <div class="modal-btn reject-action">
                            <div class="row">
                                <div class="col-6">
                                    <form action="rejected" method="post">
                                        @csrf
                                        <input type="hidden" name="approverej" class="approvereject" value="" >
                                    <button  type="submit" class="btn btn-primary continue-btn">Reject</button></form>
                                </div>
                                <div class="col-6">
                                    <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Go Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /reject Leave Modal -->

    </div>
    <!-- /Page Wrapper -->
    @section('script')
<script>
  
   
var continuebtn = document.getElementsByClassName('getme')
var valueid = document.getElementById('idd').value;
  
    for (let i = 0; i < continuebtn.length; i++) {
        continuebtn[i].addEventListener('click', function(e) {
      var approvereject = document.getElementsByClassName('approvereject');
    
    for (let u = 0; u < approvereject.length; u++) {
        approvereject[u].value = valueid;
       
    }
  
       
//   alert(valueid)
        
    });
        
    }
 

</script>
@endsection
@endsection
