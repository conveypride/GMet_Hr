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
                        <h3 class="page-title">Panel Members</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Panel Members</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_panel"><i class="fa fa-plus"></i> Add Panel Member</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            {!! Toastr::message() !!}
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0 datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                     <th>ID</th>
                                     <th>Password</th>
                                     <th>Expiration DateTime</th>
                                    <th class="text-center">Status</th>
                                     <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allpanelmembers as $key=>$panel )
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $panel->name }}</td>
                                    <td>{{ $panel->uniqueid }}</td>
                                    <td>{{ $panel->password }}</td>
                                    <td>{{ date('d F, Y, H:i',strtotime($panel->expirinDate)) }}</td>
                                    <td class="text-center">
                                        <div class="dropdown action-label">
                                            <a class="btn btn-white btn-sm btn-rounded" href="#" data-status="{{ $panel->status }}" id="dropdown-toggle">
                                                @if ($panel->status == 'Active')
                                                     <i class="fa fa-dot-circle-o text-info" id="status-icon"></i> {{ $panel->status }}
                                                @elseif ($panel->status == 'Expired')
                                              <i class="fa fa-dot-circle-o text-danger"  id="status-icon"></i> {{ $panel->status }}
                                                    @elseif ($panel->status == 'Registered')
                                                    <i class="fa fa-dot-circle-o text-success"></i> {{ $panel->status }}
                                                       @endif
                                               
                                            </a>
                                           
                                        </div>
                                    </td>
                                    <td><a href="#" data-toggle="modal" data-target="#generatenewpass" class="btn btn-sm btn-primary generateid" data="{{ $panel->id }}" ><i class="fa fa-download"></i> Generate New ID</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->

 <!-- Add panel  Modal -->
 <div id="add_panel" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Panel Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('job/interview/panels') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Name</label>
                                <input required class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}">
                            </div>
                        </div>
                       
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Expiring Date</label>
                                <input required type="datetime-local" class="form-control @error('expirinDate') is-invalid @enderror" name="expirinDate" style="height: 44px;" value="{{ old('expirinDate') }}">
                            </div>
                        </div>
                        
                    </div>
                   
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary submit-btn">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


 <!-- Add panel  Modal -->
 <div id="generatenewpass" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Generate New Passcode</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('generatenewpass') }}" method="POST">
                    @csrf
                    <input required class="form-control @error('id') is-invalid @enderror" type="hidden" name="id"  id="generateid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Expiring Date</label>
                                <input required type="datetime-local" class="form-control @error('expirinDate') is-invalid @enderror" name="expirinDate" style="height: 44px;" value="{{ old('expirinDate') }}">
                            </div>
                        </div>
                        
                    </div>
                   
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary submit-btn">Generate</button>
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
    $(document).on('click','.generateid',function()
            {
            var $id =   $(this).attr('data');
$('#generateid').val($id);


            });


    </script>

@endsection

@endsection