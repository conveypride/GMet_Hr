@extends('layouts.master')
@section('content')
    <style>
        .upload-container {
            margin-top: 30px;
            position: relative;
            display: flex;
            justify-content: center;
        }

        #upload {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
            z-index: 20;
        }

        .preview {
            position: relative;
            display: inline-block;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 2px solid #ccc;
            overflow: hidden;
            margin-top: 10px;
            z-index: 10;
        }

        #preview-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .preview-icon {
            position: absolute;
            bottom: 10px;
            right: 10px;
            color: #fff;
            background-color: #000;
            border-radius: 50%;
            padding: 5px;
            font-size: 30px;
        }
    </style>
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Edit Employee Personal Record</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('adm/home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">View Employee Changes</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            {{-- message --}}
            {!! Toastr::message() !!}
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Employee Details</h4>
                        </div>
                        <div class="card-body">
                            <form action="#" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    {{-- <label class="col-form-label" for="upload"> Upload Passport Picture</label> --}}
                                    <div class="col-md-10">
                                        <h4 class="fw-bold text-center"> All Changes Made To: {{ $employees[0]->name }} ({{ $employees[0]->user_id }}) Account</h4>
                                        <div class="upload-container">

                                            <div class="preview">
                                                <img src="{{ URL::to('/assets/images/employeePassport/' . $employees[0]->avatar) }}"
                                                    alt="" id="preview-image">
                                                {{-- <i class="la la-camera preview-icon"></i> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 
  
 

                    <div class="card">
                        <div class="card-header">
                           Logs
                        </div>
                        <div class="card-body">
                            <table class="table  table-striped">
                                <thead>
                                  <tr>
                                    <th scope="col">Date</th>
                                    <th scope="col">Modifier Name</th>
                                    <th scope="col">Changes Made</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($activityLog as $key => $item)
                                    <tr>
                                        <td> {{ \Carbon\Carbon::parse($item->date_time)->format('F j, Y g:i A') }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->description }}</td>
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
                    <div class="form-group row">
                        <label class="col-form-label col-md-2"></label>
                        <div class="col-md-10">
                            <button type="submit" class="btn btn-primary submit-btn ">Save</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    </div>
    <!-- /Page Content -->

    </div>
    <!-- /Page Wrapper -->
 

@endsection
