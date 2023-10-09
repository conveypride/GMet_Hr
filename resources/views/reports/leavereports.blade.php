
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
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Leave Report </h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Leave Report</li>
                        </ul>
                    </div>
                    <div class="col-auto">
                        <a href="#" class="btn btn-primary">PDF</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            
            <!-- Search Filter -->
            <div class="row filter-row mb-4">
                <div class="col-sm-6 col-md-3">  
                    <div class="form-group form-focus">
                        <input class="form-control floating" type="text">
                        <label class="focus-label">Employee</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">  
                    <div class="form-group form-focus">
                        <div class="cal-icon">
                            <input class="form-control floating datetimepicker" type="text">
                        </div>
                        <label class="focus-label">From</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">  
                    <div class="form-group form-focus">
                        <div class="cal-icon">
                            <input class="form-control floating datetimepicker" type="text">
                        </div>
                        <label class="focus-label">To</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">  
                    <a href="#" class="btn btn-success btn-block"> Search </a>  
                </div>     
            </div>
            <!-- /Search Filter -->
            <h4 class="text-danger">Awaiting Approval</h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0 datatable">
                            <thead>
                                <tr>
                                    <th>Employee</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Department</th>
                                    <th>Leave Type</th>
                                    <th>Reason</th>
                                    <th>Action</th>
                                    {{-- <th>Remaining Leave</th>
                                    <th>Total Leaves</th>
                                    <th>Total Leave Taken</th>
                                    <th>Leave Carry Forward</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($leaves as $items)
                                  <input type="hidden" id="idd" name="idd" value="{{  $items->id }}">
                                    <tr>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="profile.html" class="avatar"><img alt="{{ $items->avatar }}" src="{{ URL::to('/assets/images/employeePassport/'. $items->avatar) }}"></a>
                                                <a href="{{ url('employee/profile/'.$items->employeeId) }}">{{ $items->name }} <span>{{ $items->employeeId }}</span></a>
                                            </h2>
                                        </td>
                                        <td>{{ $items->leavefrom }}</td>
                                        <td>{{ $items->leaveto }}</td>
                                        <td>{{ $items->department }}</td>
                                        <td class="text-center">
                                         @if ($items->leavetype == 'annualleave')
                                            <button class="btn btn-outline-info btn-sm"> Annual Leave</button>
                                            @elseif ($items->leavetype=='sickleave')
                                            <button class="btn btn-outline-danger btn-sm">Sick Leave</button>
                                            @elseif ($items->leavetype=='hospitalisationleave')
                                            <button class="btn btn-outline-warning btn-sm"> Hospitalisation Leave</button>
                                           @elseif ($items->leavetype=='maternityleave')
                                            <button class="btn btn-outline-success btn-sm"> Maternity Leave</button>
                                            @elseif ($items->leavetype=='paternityleave')
                                            <button class="btn btn-outline-secondary btn-sm"> Paternity Leave</button>
                                            @else 
                                            <button class="btn btn-outline-primary btn-sm"> Other Leave</button>
                                            @endif
                                        </td>
                                        <td>{{ $items->leavereason }}</td>
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
<br>
            <h4 class="text-success">All Leaves</h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0 datatable">
                            <thead>
                                <tr>
                                    <th>Employee</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Department</th>
                                    <th>Leave Type</th>
                                    <th>Reason</th>
                                    <th>Status</th>
                                    {{-- <th>Remaining Leave</th>
                                    <th>Total Leaves</th>
                                    <th>Total Leave Taken</th>
                                    <th>Leave Carry Forward</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($keavess as $itemm)
                                    <tr>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="profile.html" class="avatar"><img alt="{{ $itemm->avatar }}" src="{{ URL::to('/assets/images/employeePassport/'. $itemm->avatar) }}"></a>
                                                <a href="{{ url('employee/profile/'.$itemm->employeeId) }}">{{ $itemm->name }} <span>{{ $itemm->employeeId }}</span></a>
                                            </h2>
                                        </td>
                                        <td>{{ $itemm->leavefrom }}</td>
                                        <td>{{ $itemm->leaveto }}</td>
                                        <td>{{ $itemm->department }}</td>
                                        <td class="text-center">
                                         @if ($itemm->leavetype == 'annualleave')
                                            <button class="btn btn-outline-info btn-sm"> Annual Leave</button>
                                            @elseif ($itemm->leavetype=='sickleave')
                                            <button class="btn btn-outline-danger btn-sm">Sick Leave</button>
                                            @elseif ($itemm->leavetype=='hospitalisationleave')
                                            <button class="btn btn-outline-warning btn-sm"> Hospitalisation Leave</button>
                                           @elseif ($itemm->leavetype=='maternityleave')
                                            <button class="btn btn-outline-success btn-sm"> Maternity Leave</button>
                                            @elseif ($itemm->leavetype=='paternityleave')
                                            <button class="btn btn-outline-secondary btn-sm"> Paternity Leave</button>
                                            @else 
                                            <button class="btn btn-outline-primary btn-sm"> Other Leave</button>
                                            @endif
                                        </td>
                                        <td>{{ $itemm->leavereason }}</td>
                                        <td class="text-center">
                                            <div class="action-label">
                                                <a class="btn btn-white btn-sm btn-rounded" href="javascript:void(0);">
                                                    @if ($itemm->status == NULL)
                                                    <i class="fa fa-dot-circle-o text-secondary"></i> Awaiting Supervisor Approval
                                                    @elseif ($itemm->status == 'supervisorApproved')
                                                    <i class="fa fa-dot-circle-o text-waring"></i> Awaiting HR Approval
                                                    @elseif ($itemm->status == 'hrApproved')
                                                    <i class="fa fa-dot-circle-o text-purple"></i> Awaiting DG Approval
                                                     @elseif ($itemm->status == 'dgApproved')
                                                    <i class="fa fa-dot-circle-o text-success"></i> 
                                                     Approved
                                                     @elseif ($itemm->status == 'rejected')
                                                    <i class="fa fa-dot-circle-o text-danger"></i> 
                                                     Rejected
                                                    @endif
                                                   
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /Page Content -->



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
                                    <form action="hrApproved" method="post">
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