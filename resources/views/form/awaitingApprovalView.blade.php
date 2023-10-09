
@extends('layouts.master')
@section('content')
   
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-lists-center">
                    <div class="col">
                        <h3 class="page-title">Employee</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Employee</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        {{-- <a href="#" class="btn add-btn" data-toggle="modal" data-target="{#add_employee}"><i class="fa fa-plus"></i> Add Employee</a> --}}
                        <a href= "{{ route("all/employee/addnew") }}" class="btn add-btn"><i class="fa fa-plus"></i> Add Employee</a>
                        <div class="view-icons">
                            <a href="{{ route('all/employee/card') }}" class="grid-view btn btn-link active"><i class="fa fa-th"></i></a>
                            <a href="{{ route('all/employee/list') }}" class="list-view btn btn-link"><i class="fa fa-bars"></i></a>
                        </div>
                    </div>
                </div>
            </div>
			<!-- /Page Header -->

            <!-- Search Filter -->
            <form action="{{ route('all/employee/search') }}" method="POST">
                @csrf
                <div class="row filter-row">
                    <div class="col-sm-6 col-md-3">  
                        <div class="form-group form-focus">
                            <input type="text" class="form-control floating" name="employee_id">
                            <label class="focus-label">Employee ID</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">  
                        <div class="form-group form-focus">
                            <input type="text" class="form-control floating" name="name">
                            <label class="focus-label">Employee Name</label>
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
            {{-- message --}}
            {!! Toastr::message() !!}
            <div class="row staff-grid-row">
                @foreach ($users as $lists )
                <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                    <div class="profile-widget">
                        <div class="profile-img">
                            <a href="{{ url('employee/profile/'.$lists->employeeId) }}" class="avatar"><img src="{{ URL::to('/assets/images/employeePassport/'. $lists->avatar) }}"  alt="{{ $lists->avatar }}"   style ="
                                position: relative;
                                display: inline-block;
                                width: 60px;
                                height: 60px;
                                border-radius: 50%;
                                border: 2px solid #ccc;
                                overflow: hidden;"  ></a>
                        </div>
                        <div class="dropdown profile-action">
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{ url('all/employee/view/edit/'.$lists->employeeId) }}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                <a class="dropdown-item" href="{{url('all/employee/delete/'.$lists->employeeId)}}"onclick="return confirm('Are you sure to want to delete it?')"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                            </div>
                        </div>
                        <h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="profile.html">{{ $lists->name }}</a></h4>
                        <div class="small text-muted">{{ $lists->position }}</div>
                        @if ($lists->verifiedprofile == "Pending")
                        <div class="small badge badge-info">{{ $lists->verifiedprofile }}</div>
                        @elseif($lists->verifiedprofile == "Awaiting Approval")
                        <div class="small badge badge-warning">{{ $lists->verifiedprofile }}</div>
                        @elseif($lists->verifiedprofile == "Approved")
                        <div class="small badge badge-success">{{ $lists->verifiedprofile }}</div>
                         @elseif($lists->verifiedprofile == "Deleted")
                         <div class="small badge badge-danger">{{ $lists->verifiedprofile }}</div>
                        @endif
                      
                       <form action="{{ route('all/employee/postApprove') }}" method="post">
                        @csrf
                        <input type="hidden" name="employeeId" value="{{ $lists->employeeId }}">
                        <button type="submit" class="btn-sm btn-secondary mt-2"> Approve </button>
                    </form>
                      
                        
                    </div>
                </div>
                @endforeach
            </div>
        </div>
  
        
    </div>
    <!-- /Page Wrapper -->
    @section('script')
    <script>
        $("input:checkbox").on('click', function()
        {
            var $box = $(this);
            if ($box.is(":checked"))
            {
                var group = "input:checkbox[class='" + $box.attr("class") + "']";
                $(group).prop("checked", false);
                $box.prop("checked", true);
            }
            else
            {
                $box.prop("checked", false);
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.select2s-hidden-accessible').select2({
                closeOnSelect: false
            });
        });
    </script>
    <script>
        // select auto id and email
        $('#name').on('change',function()
        {
            $('#employee_id').val($(this).find(':selected').data('employee_id'));
            $('#email').val($(this).find(':selected').data('email'));
        });
    </script>
   
    @endsection

@endsection
