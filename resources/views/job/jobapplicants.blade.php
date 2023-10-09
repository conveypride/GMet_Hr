@extends('layouts.master')
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Job Applicants</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Job Applicants</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0 datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Apply Date</th>
                                    <th class="text-center">Status</th>
                                    <th>Resume</th>
                                    <th>Cover Letter</th>
                                    
                                    {{-- <th class="text-right">Actions</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($apply_for_jobs as $key=>$apply )
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $apply->name }}</td>
                                    <td>{{ $apply->email }}</td>
                                    <td>{{ $apply->phone }}</td>
                                    <td>{{ date('d F, Y',strtotime($apply->created_at)) }}</td>
                                    <td class="text-center">
                                        <div class="dropdown action-label">
                                            <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false" data-status="{{ $apply->status }}" id="dropdown-toggle">
                                                @if ($apply->status == 'pending')
                                                     <i class="fa fa-dot-circle-o text-info" id="status-icon"></i> {{ $apply->status }}
                                                @elseif ($apply->status == 'reject')
                                              <i class="fa fa-dot-circle-o text-danger"  id="status-icon"></i> {{ $apply->status }}
                                                    @elseif ($apply->status == 'interview')
                                                    <i class="fa fa-dot-circle-o text-success"></i> {{ $apply->status }}
    
                                                @endif
                                               
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="{{ url('changejobapplicantStatus/'.$apply->id.'/pending') }}"><i class="fa fa-dot-circle-o text-info"></i>pending</a>
                                                <a class="dropdown-item" href="{{ url('changejobapplicantStatus/'.$apply->id.'/reject') }}"><i class="fa fa-dot-circle-o text-danger"></i>reject</a>
                                                <a class="dropdown-item" href="{{ url('changejobapplicantStatus/'.$apply->id.'/interview') }}"><i class="fa fa-dot-circle-o text-success"></i>interview</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td><a href="{{ url('cv/download/'.$apply->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-download"></i> Download Cv</a></td>
                                    <td><a href="{{ url('cover/download/'.$apply->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-download"></i> Download Cover-Letter</a></td>

                                    {{-- <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="applicant/"><i class="fa fa-clock-o m-r-5"></i> Schedule Interview</a>
                                            </div>
                                        </div>
                                    </td> --}}
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

    @section('script')
    <script>
  
    </script>

@endsection

@endsection