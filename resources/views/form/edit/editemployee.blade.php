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
                            <li class="breadcrumb-item active">Update Employee</li>
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
                            {{-- <form action="{{ route('all/employee/update') }}" method="POST" enctype="multipart/form-data"> --}}
                                {{-- @csrf --}}
                                <form action="{{ URL::to('all/employee/editemployeeApproval/'. $employees[0]->user_id ) }}" method="post"  enctype="multipart/form-data">
                                      @csrf
                                <div class="form-group row">
                                    {{-- <label class="col-form-label" for="upload"> Upload Passport Picture</label> --}} 
                                    <input type="hidden" name="updatetype" value="updatepassport">
                                    <input type="hidden" name="oldvalue" value="{{ $employees[0]->avatar }}">
                                    <div class="col-md-10">
                                        <h3 class="fw-bold text-center"> Change Passport Picture</h3>
                                       
                                        <div class="upload-container">
                                            <input required type="file" name="passportpic" id="upload"
                                                accept="image/*" onchange="previewImage(event)">
                                            <div class="preview">
                                                <img src="{{ URL::to('/assets/images/employeePassport/' . $employees[0]->avatar) }}" alt="" id="preview-image">
                                                <i class="la la-camera preview-icon"></i>
                                            </div>
                                        </div>
                                        <div class="d-flex"  style=" margin-top: 30px;
                                        display: flex;
                                       justify-content: center;
                                       align-items:center;
                                      align-self:center">

                                        <button type="submit" class="btn btn-primary" style="justify-content: center;
                                        align-items:center;
                                       align-self:center"> Update Passport Picture </button>
                                       </div>
                                    </div>
                                </div>
                            </form>
                                {{-- Number --}}
                                <form action="{{ URL::to('all/employee/editemployeeApproval/'. $employees[0]->user_id ) }}" method="post"  enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="updatetype" value="employeeID">
                                      <input type="hidden" name="oldvalue" value="{{ $employees[0]->user_id }}">
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">1.Employee ID Number</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="employeeId" name="employeeId"
                                            value="{{ $employees[0]->user_id }}">
                                    </div>
                                </div>
                                <div class="d-flex my-2"  style="
                                display: flex;
                               justify-content: center;
                               align-items:center;
                              align-self:center">

                                <button type="submit" class="btn btn-primary "> Update Employee Id </button>
                               </div>

                            </form>
                                {{-- Home town --}}
                                <form action="{{ URL::to('all/employee/editemployeeApproval/'. $employees[0]->user_id ) }}" method="post"  enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="updatetype" value="hometown">
                                      <input type="hidden" name="oldvalue" value="{{ $employees[0]->hometown }}">
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">2.Home Town</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="hometown" name="hometown"
                                            value="{{ $employees[0]->hometown }}">
                                    </div>
                                </div>
                                <div class="d-flex my-2"  style="
                                display: flex;
                               justify-content: center;
                               align-items:center;
                              align-self:center">

                                <button type="submit" class="btn btn-primary "> Update Hometown </button>
                               </div>

                            </form>
                                {{-- sex/gender --}}
                                 <form action="{{ URL::to('all/employee/editemployeeApproval/'. $employees[0]->user_id ) }}" method="post"  enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="updatetype" value="gender">
                                      <input type="hidden" name="oldvalue" value="{{ $employees[0]->gender }}">
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">3.Sex</label>
                                    <div class="col-md-10">
                                        <select class="select form-control" id="gender" name="gender">
                                            <option value="{{ $employees[0]->gender }}"
                                                {{ $employees[0]->gender == $employees[0]->gender ? 'selected' : '' }}>
                                                {{ $employees[0]->gender }} </option>
                                            <option value="Male" selected="selected">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                  <div class="d-flex my-2"  style="
                                display: flex;
                               justify-content: center;
                               align-items:center;
                              align-self:center">

                                <button type="submit" class="btn btn-primary "> Update Gender </button>
                               </div>

                            </form>
                                {{-- date of birt --}}
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">4.Date Of Birth <br> (Attach Copy Of Birth
                                        Certificate)</label>
                                    <div class="col-md-10">
                                        <div class="input-group">
                                            @if (!empty($employees[0]->birthcert))
                                            <a href="{{ URL::to('/assets/images/employeeBirthCert/' . $employees[0]->birthcert) }}" target="_blank" rel="noopener noreferrer" class="btn btn-primary">View Birth Cert.</a> 
                                                 <input type="text" class="form-control" id="birth_date" name="birth_date" value="{{ $employees[0]->birth_date }}" readonly>
                                                @else
                                                <form action="{{ URL::to('all/employee/editemployeeApproval/'. $employees[0]->user_id ) }}" method="post"  enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="updatetype" value="birthcert">
                                                      <input type="hidden" name="oldvalue" value="{{ $employees[0]->birthcert }}">
                                                      <input type="hidden" name="oldvalueA" value="{{ $employees[0]->birth_date }}">
                                               <div class="input-group-text">
                                              <input required class="form-input form-control mx-2" type="file" id="birthcert" name="birthcert" >
                                              <input required type="date" class="form-control mx-2" id="birth_date" name="birth_date">
                                            </div>
                                             <div class="d-flex my-2"  style="
                                display: flex;
                               justify-content: center;
                               align-items:center;
                              align-self:center">

                                <button type="submit" class="btn btn-primary"> Update Birth Cert. </button>
                               </div>

                            </form>
                                            @endif
                                         
                                           
                                        </div>
                                    </div>
                                </div>
                                {{-- nationaliy --}}
                                    <form action="{{ URL::to('all/employee/editemployeeApproval/'. $employees[0]->user_id ) }}" method="post"  enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="updatetype" value="nationality">
                                      <input type="hidden" name="oldvalue" value="{{ $employees[0]->nationality }}">
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">5.Nationality</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="nationality" name="nationality"
                                            value="{{ $employees[0]->nationality }}">
                                    </div>
                                </div>
                                <div class="d-flex my-2"  style="
                                display: flex;
                               justify-content: center;
                               align-items:center;
                              align-self:center">

                                <button type="submit" class="btn btn-primary"> Update Nationality </button>
                               </div>

                            </form>


                                {{-- full name --}}
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title mb-0">6.Full Name</h4>
                                    </div>
                                    <div class="card-body">
                                        {{-- surname --}}
                                         <form action="{{ URL::to('all/employee/editemployeeApproval/'. $employees[0]->user_id ) }}" method="post"  enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="updatetype" value="fullname">
                                      <input type="hidden" name="oldvalue" value="{{ $employees[0]->name }}">
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-2">Fullname</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" id="fullname" name="fullname"
                                                    value="{{ $employees[0]->name }}">
                                            </div>
                                        </div>
                                        <div class="d-flex my-2"  style="
                                        display: flex;
                                       justify-content: center;
                                       align-items:center;
                                      align-self:center">
        
                                        <button type="submit" class="btn btn-primary"> Update Fullname </button>
                                       </div>
        
                                    </form>
                                    </div>
                                </div>
                                {{-- SSNIT number --}}
                                <form action="{{ URL::to('all/employee/editemployeeApproval/'. $employees[0]->user_id ) }}" method="post"  enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="updatetype" value="ssnit">
                                      <input type="hidden" name="oldvalue" value="{{ $employees[0]->ssnit }}">
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">7.SSNIT Number</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="ssnit" name="ssnit"
                                            value="{{ $employees[0]->ssnit }}">
                                    </div>
                                </div>
                                <div class="d-flex my-2"  style="
                                display: flex;
                               justify-content: center;
                               align-items:center;
                              align-self:center">

                                <button type="submit" class="btn btn-primary"> Update SSNIT </button>
                               </div>

                            </form>
                                {{-- ghana card id --}}
                                <form action="{{ URL::to('all/employee/editemployeeApproval/'. $employees[0]->user_id ) }}" method="post"  enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="updatetype" value="ghcard_id">
                                      <input type="hidden" name="oldvalue" value="{{ $employees[0]->passport_no }}">
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2" for="ghcard_id">8.Ghana Card ID Number</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="ghcard_id" name="ghcard_id"
                                            value="{{ $employees[0]->passport_no }}">
                                    </div>

                                </div>
                                <div class="d-flex my-2"  style="
                                display: flex;
                               justify-content: center;
                               align-items:center;
                              align-self:center">

                                <button type="submit" class="btn btn-primary"> Update Ghana-Card-ID </button>
                               </div>

                            </form>
                                {{-- ghcard_id_expire --}}
                                <form action="{{ URL::to('all/employee/editemployeeApproval/'. $employees[0]->user_id ) }}" method="post"  enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="updatetype" value="ghcard_id_expire">
                                      <input type="hidden" name="oldvalue" value="{{ $employees[0]->passport_expiry_date }}">
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2" for="ghcard_id">9.Ghana-Card-ID Expiring
                                        Date</label>
                                    <div class="col-md-10">
                                        <input type="date" class="form-control" id="ghcard_id_expire"
                                            name="ghcard_id_expire" value="{{ $employees[0]->passport_expiry_date }}">
                                    </div>
                                </div>
                                <div class="d-flex my-2"  style="
                                display: flex;
                               justify-content: center;
                               align-items:center;
                              align-self:center">

                                <button type="submit" class="btn btn-primary"> Update Ghana-Card Expiring Date</button>
                               </div>
                            </form>
                                {{-- email address --}}
                                <form action="{{ URL::to('all/employee/editemployeeApproval/'. $employees[0]->user_id ) }}" method="post"  enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="updatetype" value="email">
                                      <input type="hidden" name="oldvalue" value="{{ $employees[0]->email }}">
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">10.Email Address</label>
                                    <div class="col-md-10">
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ $employees[0]->email }}">
                                    </div>
                                </div>
                                <div class="d-flex my-2"  style="
                                display: flex;
                               justify-content: center;
                               align-items:center;
                              align-self:center">

                                <button type="submit" class="btn btn-primary"> Update Email</button>
                               </div>
                            </form>
                                {{-- telephone number --}}
                                <div class="card">
                                    <div class="card-header">
                                        11.Telephone Number
                                    </div>
                                    <div class="card-body">
                                        {{-- fixed number --}}
                                        <form action="{{ URL::to('all/employee/editemployeeApproval/'. $employees[0]->user_id ) }}" method="post"  enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="updatetype" value="fixednum">
                                      <input type="hidden" name="oldvalue" value="{{ $employees[0]->phone_number }}">
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-2">Fixed Number</label>
                                            <div class="col-md-10">
                                                <input type="number" class="form-control" id="fixednum"
                                                    name="fixednum" value="{{ $employees[0]->phone_number }}">
                                            </div>
                                        </div>
                                           <div class="d-flex my-2"  style="
                                display: flex;
                               justify-content: center;
                               align-items:center;
                              align-self:center">

                                <button type="submit" class="btn btn-primary"> Update Fixed Number</button>
                               </div>
                            </form>
                                        {{-- mobile number --}}
                                        <form action="{{ URL::to('all/employee/editemployeeApproval/'. $employees[0]->user_id ) }}" method="post"  enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="updatetype" value="mobilenum">
                                              <input type="hidden" name="oldvalue" value="{{ $employees[0]->tel }}">
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-2">Mobile Number</label>
                                            <div class="col-md-10">
                                                <input type="number" class="form-control" id="mobilenum"
                                                    name="mobilenum" value="{{ $employees[0]->tel }}">
                                            </div>
                                        </div>
                                           <div class="d-flex my-2"  style="
                                display: flex;
                               justify-content: center;
                               align-items:center;
                              align-self:center">

                                <button type="submit" class="btn btn-primary"> Update Mobile Number</button>
                               </div>
                            </form>

                                    </div>
                                </div>
                                {{-- Address --}}
                                 <form action="{{ URL::to('all/employee/editemployeeApproval/'. $employees[0]->user_id ) }}" method="post"  enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="updatetype" value="address">
                                              <input type="hidden" name="oldvalue" value="{{ $employees[0]->address }}">
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">12.Address (Postal & Residential / Home
                                        Address)</label>
                                    <div class="col-md-10">

                                        <input type="text" class="form-control" id="address" name="address"
                                            value="{{ $employees[0]->address }}">
                                    </div>
                                </div>
                                        <div class="d-flex my-2"  style="
                                display: flex;
                               justify-content: center;
                               align-items:center;
                              align-self:center">

                                <button type="submit" class="btn btn-primary"> Update Address</button>
                               </div>
                            </form>
                                {{-- education background --}}
                                 <form action="{{ URL::to('all/employee/editemployeeApproval/'. $employees[0]->user_id ) }}" method="post"  enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="updatetype" value="edu">
                                              <input type="hidden" name="oldvalue" value="{{ !empty($edu) ? $edu : "empty" }}"> 
                                               <div class="card">
                                    <div class="card-header">
                                        13.Education Background/ Qualification
                                    </div>
                                    <div class="card-body" id="education">
                                       
                                        @foreach ($edu as $key => $employee)
                                            <div class="form-group row">
                                                <label class="col-form-label col-md-2">{{ $key + 1 }}</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="edu[]"
                                                        value="{{ $employee->educationalbackground }}">
                                                    
                                                </div>
                                             
                                            </div>
                                        @endforeach
                              

                                    </div>
                                    <p style=" text-align: center;">
                                        <button class="btn btn-success " style="width: 150px;" type="button"
                                            id="addButton">Add More</button>
                                    </p>

                                </div>
   <div class="d-flex my-2"  style=" display: flex; justify-content: center; align-items:center; align-self:center">
                                <button type="submit" class="btn btn-primary"> Update Education Background/ Qualification</button>
                               </div>
                            </form>
                                {{-- Honours & Decorations --}}
                                <form action="{{ URL::to('all/employee/editemployeeApproval/'. $employees[0]->user_id ) }}" method="post"  enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="updatetype" value="honours">
                                           <input type="hidden" name="oldvalue" value="{{ !empty($hon) ? $hon : "empty" }}"> 
                                <div class="card">
                                    <div class="card-header">
                                        14.Honours & Decorations
                                    </div>
                                    <div class="card-body" id="hon">
                                        @if (!empty($hon))
                                        @foreach ($hon as $key => $employee)
                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-2">{{ $key + 1 }}</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" id="honours"
                                                            name="honours[]" value="{{ $employee->honours }}">
                                                       
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="form-group row">
                                                <label class="col-form-label col-md-2">1.</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" id="honours"
                                                        name="honours[]" value="Empty">
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <p style=" text-align: center;">
                                        <button class="btn btn-success " style="width: 150px;" type="button"
                                            id="addButtonhonours">Add More</button>
                                    </p>
                                </div>
                                <div class="d-flex my-2"  style=" display: flex; justify-content: center; align-items:center; align-self:center">
                                    <button type="submit" class="btn btn-primary"> Update Honours & Decorations</button>
                                   </div>
                                </form>
                                {{-- Languages Spoken --}}
                                <form action="{{ URL::to('all/employee/editemployeeApproval/'. $employees[0]->user_id ) }}" method="post"  enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="updatetype" value="languages">
                                           <input type="hidden" name="oldvalue" value="{{ !empty($lang) ? $lang : "empty" }}"> 
                                <div class="card">
                                    <div class="card-header">
                                        15.Languages Spoken
                                    </div>
                                    <div class="card-body" id="lang">
                                        @if (!empty($lang))
                                            @foreach ($lang as $key => $employee)
                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-2">{{ $key + 1 }}</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" name="languages[]"
                                                            value="{{ $employee->language }}">
                                                        
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="form-group row">
                                                <label class="col-form-label col-md-2">1.</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" id="languages"
                                                        name="languages[]">
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <p style="text-align: center;">
                                        <button class="btn btn-success " style="width: 150px;" type="button"
                                            id="addButtonlanguages">Add More</button>
                                    </p>
                                </div>
                                 <div class="d-flex my-2"  style=" display: flex; justify-content: center; align-items:center; align-self:center">
                                    <button type="submit" class="btn btn-primary"> Update Languages Spoken</button>
                                   </div>
                                </form>
                                {{-- marital status --}}
                                <form action="{{ URL::to('all/employee/editemployeeApproval/'. $employees[0]->user_id ) }}" method="post"  enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="updatetype" value="maritalStatus1">
                                           <input type="hidden" name="oldvalue" value="{{ !empty($employees[0]->marital_status) ? $employees[0]->marital_status  : "empty" }}"> 
                                           <input type="hidden" name="oldvalue1" value="{{ !empty($employees[0]->maritalDate) ? $employees[0]->maritalDate : "empty" }}"> 
                                <div class="card">
                                    <div class="card-header">
                                        16.Marital Status
                                    </div>
                                    <div class="card-body">
                                        <label for="maritalStatus">Select marital status:</label>
                                        <select id="maritalStatus1" class="select form-control" name="maritalStatus1">
                                            <option value="{{ $employees[0]->marital_status }}"
                                                {{ $employees[0]->marital_status == $employees[0]->marital_status ? 'selected' : '' }}>
                                                {{ $employees[0]->marital_status }} </option>
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                            <option value="Divorced">Divorced</option>
                                            <option value="Widowed">Widowed</option>
                                        </select>
                                        <div id="dateInputContainer1">
                                            <label for="marriageDate">Date:</label>
                                            @if (!empty($employees[0]->maritalDate))
                                                <input class="form-control" type="text" id="marriageDate"
                                                    name="marriageDate" value="{{ $employees[0]->maritalDate }}">
                                            @else
                                                <input class="form-control" type="date" id="marriageDate"
                                                    name="marriageDate">
                                            @endif

                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex my-2"  style=" display: flex; justify-content: center; align-items:center; align-self:center">
                                    <button type="submit" class="btn btn-primary"> Update Marital Status</button>
                                   </div>
                                </form>

                                {{-- Previous Employee (If Any) --}}
                                  <form action="{{ URL::to('all/employee/editemployeeApproval/'. $employees[0]->user_id ) }}" method="post"  enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="updatetype" value="previousEmployee">
                                           <input type="hidden" name="oldvalue" value="{{ !empty($employees[0]->previousEmployee) ? $employees[0]->previousEmployee  : "empty" }}"> 
                                           
                                <div class="card">
                                    <div class="card-header">
                                        17.Previous Employee (If Any)
                                    </div>
                                    <div class="card-body" id="prevEmployee">
                                        @if (!empty($previousEmployee))
                                            @foreach ($previousEmployee as $key => $employee)
                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-2">{{ $key + 1 }}</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control"
                                                            name="previousEmployee[]"
                                                            value="{{ $employee->previousEmployee }}">
                                                        
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="form-group row">
                                                <label class="col-form-label col-md-2">1.</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" id="previousEmployee"
                                                        name="previousEmployee[]">
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <p style=" text-align: center;">
                                        <button class="btn btn-success " style="width: 150px;" type="button"
                                            id="addButtonpreviousEmployee">Add More</button>
                                    </p>
                                </div>
                                  <div class="d-flex my-2"  style=" display: flex; justify-content: center; align-items:center; align-self:center">
                                    <button type="submit" class="btn btn-primary"> Update Previous Employee</button>
                                   </div>
                                       </form>



                                {{-- Major Physical Disabilities --}}
                                <div class="card">
                                    <div class="card-header">
                                        18.Major Physical Disabilities
                                    </div>
                                    <div class="card-body" id="physDisability">
                                        @if (!empty($physDisabilities))
                                            @foreach ($physDisabilities as $key => $employee)
                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-2">{{ $key + 1 }}</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control"
                                                            name="physDisabilities[]"
                                                            value="{{ $employee->physDisabilities }}">
                                                       

                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="form-group row">
                                                <label class="col-form-label col-md-2">1.</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" id="physDisabilities"
                                                        name="physDisabilities[]">
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <p style=" text-align: center;">
                                        <button class="btn btn-success " style="width: 150px;" type="button"
                                            id="addButtonphysDisabilities">Add More</button>
                                    </p>
                                </div>

                                {{-- Approved Courses of Study & Training --}}
                                <div class="card">
                                    <div class="card-header">
                                        19.Approved Courses of Study & Training
                                    </div>
                                    <div class="card-body" id="course">
                                        @if (!empty($courses))
                                            @foreach ($courses as $key => $employee)
                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-2">{{ $key + 1 }}.</label>
                                                    <div class="col-md-8">
                                                        <div class="input-group">
                                                            <div class="input-group-text">
                                                                <input type="text" class="form-control" id="courses"
                                                                    name="courses[]" placeholder="Course"
                                                                    value="{{ $employee->courses }}">
                                                                
                                                                <input type="number" class="form-control"
                                                                    id="coursesyear" name="coursesyear[]"
                                                                    placeholder="Study Year"
                                                                    value="{{ $employee->courseyear }}">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="form-group row">
                                                <label class="col-form-label col-md-2">1.</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <div class="input-group-text">
                                                            <input type="text" class="form-control" id="courses"
                                                                name="courses[]" placeholder="Course">
                                                            <input type="number" class="form-control" id="coursesyear"
                                                                name="coursesyear[]" placeholder="Study Year">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    @endif
                                </div>
                                <p style=" text-align: center;">
                                    <button class="btn btn-success " style="width: 150px;" type="button"
                                        id="addButtocourse">Add More</button>
                                </p>
                        </div>

                        {{-- Non Establishment Leave Without Pay --}}
                        <div class="card">
                            <div class="card-header">
                                20.Non Establishment Leave Without Pay
                            </div>
                            <div class="card-body" id="leave">
                                @if (!empty($leaves))
                                    @foreach ($leaves as $key => $employee)
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-2"> {{ $key + 1 }} </label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <div class="input-group-text">
                                                        <input type="text" class="form-control" name="leavefrom[]"
                                                            placeholder="Leave From" value="{{ $employee->leavefrom }}">
                                                        <input type="text" class="form-control" name="leaveto[]"
                                                            placeholder="Leave To" value="{{ $employee->leaveto }}">
                                                        
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                         @endforeach
                            </div>
                           
                        @else
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">1.</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <div class="input-group-text">
                                            <input type="text" class="form-control" id="leavefrom" name="leavefrom[]"
                                                placeholder="Leave From">
                                            <input type="text" class="form-control" id="leaveto" name="leaveto[]"
                                                placeholder="Leave To" value="">
                                        </div>

                                    </div>
                                </div>
                            </div>
                        
                        @endif
                        <p style=" text-align: center;">
                            <button class="btn btn-success " style="width: 150px;" type="button"
                                id="addButtonleave">Add More</button>
                        </p>
                    </div>
                    {{-- Name(s) of Children --}}
                    <div class="card">
                        <div class="card-header">
                            21.Name(s) of Children
                        </div>
                        <div class="card-body" id="children">
                            @if (!empty($child))
                                @foreach ($child as $key => $employee)
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2"> {{ $key + 1 }}.</label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <div class="input-group-text">
                                                    <input type="text" class="form-control" name="childrensName[]"
                                                        placeholder="Name" value="{{ $employee->childrensName }}">
                                                    <input type="text" class="form-control "
                                                        name="childrensbirthday[]" placeholder="Birth Day"
                                                        value="{{ $employee->childrensbirthday }}">
                                                    {{--  --}}
                                                    
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">1.</label>
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <div class="input-group-text">
                                                <input type="text" class="form-control" id="childrensName"
                                                    name="childrensName[]" placeholder="Name">
                                                <input type="date" class="form-control " id="childrensbirthday"
                                                    name="childrensbirthday[]" placeholder="Birth Day">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <p style=" text-align: center;">
                            <button class="btn btn-success " style="width: 150px;" type="button"
                                id="addButtonchildrens">Add More</button>
                        </p>
                    </div>

                    {{-- rRECORD OF SERVICE --}}
                    <div class="card">
                        <div class="card-header">
                            22.Record Of Service
                        </div>
                        <div class="card-body" id="recordOfService">
                            @if (!empty($record))
                                @foreach ($record as $key => $employee)
                                    {{-- effective date --}}
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">1.Effective Date</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="effectiveDate[]"
                                                value="{{ $employee->effectiveDate }}"> 
                                        </div>
                                    </div>
                                    {{-- grade --}}
                                      <div class="form-group row">
                                        <label class="col-form-label col-md-2">2.Grade</label>
                                        <div class="col-md-10">
                                            <select required class="select form-control" name="grade[]"
                                                id="grade">
                                                <option selected>{{$employee->grade}}</option>
                                                @foreach ($position as $positions)
                                                    <option value="{{ $positions->position }}">
                                                        {{ $positions->position }}</option>
                                                @endforeach
                                            </select>
    
                                        </div>
                                    </div>

                                    {{-- status --}}
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">3.Status</label>
                                        <div class="col-md-10">
                                            <select class="select form-control"  name="status[]">
                                                <option value="{{ $employee->status }}"> {{ $employee->status }} </option>
                                                <option value="Active"> Active </option>
                                            <option value="Inactive"> Inactive </option>
                                            </select>
                                           
                                        </div>
                                    </div>

                                    {{-- salary scale --}}
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">4.Salary Scale</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="salaryscale[]"
                                                value="{{ $employee->salaryscale }}">
                                            
                                        </div>
                                    </div>
                                    {{-- incremental date --}}
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">5.Incremental Date</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="incrementalDate[]"
                                                value="{{ $employee->incrementalDate }}">
                                           
                                        </div>
                                    </div>
                                    {{-- Minstry/Department Division --}}
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">6.Minstry/Department Division</label>
                                        <div class="col-md-10">
                                            <select class="select form-control" id="department" name="department[]">
                                                    @if (!empty($employees[0]))
                                                        <option value="{{ $employees[0]->department }}"
                                                            {{ $employees[0]->department == $employees[0]->department ? 'selected' : '' }}>
                                                            {{ $employees[0]->department }} </option>
                                                        @foreach ($departments as $key => $items)
                                                            <option value="{{ $items->department }}">
                                                                {{ $items->department }}</option>
                                                        @endforeach
                                                    @else
                                                        @foreach ($departments as $key => $items)
                                                            <option value="{{ $items->department }}">
                                                                {{ $items->department }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                {{-- effective date --}}
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">1.Effective Date</label>
                                    <div class="col-md-10">
                                        <input type="date" class="form-control " id="effectiveDate"
                                            name="effectiveDate[]">
                                    </div>
                                </div>
                                {{-- grade --}}
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">2.Grade</label>
                                    <div class="col-md-10">
                                        <select required class="select form-control" name="grade[]"
                                            id="grade">
                                            <option selected disabled> --Select --</option>
                                            @foreach ($position as $positions)
                                                <option value="{{ $positions->position }}">
                                                    {{ $positions->position }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                                {{-- status --}}
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">3.Status</label>
                                    <div class="col-md-10">
                                        <select class="select form-control"  name="status[]">
                                            <option value="Active"> Active </option>
                                        <option value="Inactive"> Inactive </option>
                                        </select>
                                    </div>
                                </div>

                                {{-- salary scale --}}
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">4.Salary Scale</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="salaryscale"
                                            name="salaryscale[]">
                                    </div>
                                </div>
                                {{-- incremental date --}}
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">5.Incremental Date</label>
                                    <div class="col-md-10">
                                        <input type="date" class="form-control" id="incrementaleDate"
                                            name="incrementalDate[]">
                                    </div>
                                </div>
                                {{-- Minstry/Department Division --}}
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">6.Minstry/Department Division</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="department" name="department[]">
                                    </div>
                                </div>
                            @endif

                        </div>
                        <p style=" text-align: center;">
                            <button class="btn btn-success " style="width: 150px;" type="button"
                                id="addButtonRecordOfService">Add More</button>
                        </p>
                    </div>

    {{-- employee level --}}
    <div class="form-group row">
        <label class="col-form-label col-md-2">23. Employee Level</label>
        <div class="col-md-10">
            <select  class="select form-control" id="level" name="level">
                <option value="{{$employees[0]->level }}" selected="selected">{{  $employees[0]->level }}</option>
                  <option value="Junioremployee" >Junior Employee</option>
                <option value="Mediumemployee">Medium Employee</option>
                <option value="Senioremployee">Senior Employee</option>
            </select>
        </div>
    </div>
 
  {{-- .Attach Additional Documents --}}
  <div class="card">
    <div class="card-header">
        24.Attach Additional Documents
    </div>
    <div class="card-body" id="adddoc">
        <div class="form-group row">
            <label class="col-form-label col-md-2">1.</label> 
            <div class="col-md-8">
                <div class="input-group">
                    <div class="input-group-text"> 
                        <input type="file" class="form-control" id="adddocs" name="adddocs[]" placeholder="Add file">
                   <input type="date" class="form-control " id="adddocsDate" name="adddocsDate[]" placeholder="Date Uploaded" value="">
                 </div>
                    
                  </div></div>
           </div></div>
    <p style=" text-align: center;">
<button class="btn btn-success " style="width: 150px;" type="button" id="addButtonadddocs">Add More</button>
    </p>
    </div> 
                    <div class="card">
                        <div class="card-header">
                            Comment
                        </div>
                        <div class="card-body">
                            {{-- fixed number --}}
                            <div class="form-group row">
                                {{-- <label class="col-form-label col-md-2">Comment</label> --}}
                                <div class="col-md-10">
                                    <textarea class="form-control" name="comment" id="comment" cols="30" rows="10"
                                      >{{ $employees[0]->comment }}</textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                    {{-- <div class="form-group row">
                        <label class="col-form-label col-md-2"></label>
                        <div class="col-md-10">
                            <button type="submit" class="btn btn-primary submit-btn ">Save</button>
                        </div>
                    </div> --}}
                    {{-- </form> --}}
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
        // alert("hi")
        const maritalStatusSelect = document.getElementById('maritalStatus1');
        const dateInputContainer = document.getElementById('dateInputContainer1');

        maritalStatusSelect.addEventListener('change', () => {
            const selectedOption = maritalStatusSelect.value;
            alert(selectedOption);
            if (selectedOption == 'single') {

                dateInputContainer.style.display = 'none';
            } else {
                dateInputContainer.style.display = 'block';
            }
        });



        // Get the reference to the card body and the button
        const cardBody = document.getElementById('education');
        const addButton = document.getElementById('addButton');

        const cardBodyhon = document.getElementById('hon');
        const addButtonhon = document.getElementById('addButtonhonours');

        const cardBodylang = document.getElementById('lang');
        const addButtonlanguages = document.getElementById('addButtonlanguages');


        const addButtonpreviousEmployee = document.getElementById('addButtonpreviousEmployee');


        const addButtonphysDisabilities = document.getElementById('addButtonphysDisabilities');


        const addButtoncourse = document.getElementById('addButtocourse');

        const addButtonleave = document.getElementById('addButtonleave');
        const addButtonchildrens = document.getElementById('addButtonchildrens');
        const addButtonadddocs = document.getElementById('addButtonadddocs');
        const addButtonbond = document.getElementById('addButtonbond');
        const addButtonpublicservice = document.getElementById('addButtonpublicservice');
        const addButtonRecordOfService = document.getElementById('addButtonRecordOfService');

        // Counter to keep track of the number of elements added
        let counterr = 1;
        let counterhon = 1;
        let counterlang = 1;

        // Function to create a  new educational backgrond with remove button
        function createNewElement() {
            const newElement = document.createElement('div');
            newElement.className = 'form-group row';
            newElement.innerHTML = `
        <label class="col-form-label col-md-2">${++counterr}.</label>
        <div class="col-md-8">
            <input type="text" class="form-control edu-input" name="edu[]" >
        </div>
        <div class="col-md-2">
            <button class="btn btn-danger remove-button">Remove</button>
        </div>
    `;
            cardBody.appendChild(newElement);

            // Add event listener to the remove button of the newly added element
            const removeButton = newElement.querySelector('.remove-button');
            removeButton.addEventListener('click', () => {
                cardBody.removeChild(newElement);
                counterr--; // Decrement the counter when an element is removed
                updateLabels(); // Update the label numbers after removal
            });
        }

        // Function to create a new honours backgrond with remove button
        function createNewElementHon() {
            const newElement = document.createElement('div');
            newElement.className = 'form-group row';
            newElement.innerHTML = `
        <label class="col-form-label col-md-2">${++counterhon}.</label>
        <div class="col-md-8">
            <input type="text" class="form-control honours-input" name="honours[]" >
        </div>
        <div class="col-md-2">
            <button class="btn btn-danger remove-buttonhon">Remove</button>
        </div>
    `;
            cardBodyhon.appendChild(newElement);

            // Add event listener to the remove button of the newly added element
            const removeButton = newElement.querySelector('.remove-buttonhon');
            removeButton.addEventListener('click', () => {
                cardBodyhon.removeChild(newElement);
                counterhon--; // Decrement the counter when an element is removed
                const elements = cardBodyhon.querySelectorAll('.form-group');
                elements.forEach((element, index) => {
                    const label = element.querySelector('.col-form-label');
                    label.textContent = `${index + 1}.`;
                }); // Update the label numbers after removal
            });
        }


        // Function to create a new languages backgrond with remove button
        function createNewElementLang() {
            const newElement = document.createElement('div');
            newElement.className = 'form-group row';
            newElement.innerHTML = `
        <label class="col-form-label col-md-2">${++counterlang}.</label>
        <div class="col-md-8">
            <input type="text" class="form-control languages-input" name="languages[]" value="">
        </div>
        <div class="col-md-2">
            <button class="btn btn-danger remove-buttonlang">Remove</button>
        </div>
    `;
            cardBodylang.appendChild(newElement);

            // Add event listener to the remove button of the newly added element
            const removeButton = newElement.querySelector('.remove-buttonlang');
            removeButton.addEventListener('click', () => {
                cardBodylang.removeChild(newElement);
                counterlang--; // Decrement the counter when an element is removed
                const elements = cardBodylang.querySelectorAll('.form-group');
                elements.forEach((element, index) => {
                    const label = element.querySelector('.col-form-label');
                    label.textContent = `${index + 1}.`;
                }); // Update the label numbers after removal
            });
        }



        // Function to update the label numbers of all elements
        function updateLabels() {
            const elements = cardBody.querySelectorAll('.form-group');
            elements.forEach((element, index) => {
                const label = element.querySelector('.col-form-label');
                label.textContent = `${index + 1}.`;
            });
        }

        // Add event listener to the button edu
        addButton.addEventListener('click', createNewElement);
        // Add event listener to the button honour
        addButtonhon.addEventListener('click', createNewElementHon);
        // Add event listener to the button lang
        addButtonlanguages.addEventListener('click', createNewElementLang);
        // Add event listener to the button  previousEmployee
        addButtonpreviousEmployee.addEventListener('click', () => {
            addmoreFunction("previousEmployee", "prevEmployee", "any")
        });

        // Add event listener to the button  physDisabilities
        addButtonphysDisabilities.addEventListener('click', () => {
            addmoreFunction("physDisabilities", 'physDisability', "any")
        });

        // Add event listener to the button  courses
        addButtocourse.addEventListener('click', () => {
            addmoreFunction("courses", "course", "course")
        });


        // Add event listener to the button  leave
        addButtonleave.addEventListener('click', () => {
            addmoreFunction("leavefrom", "leave", "leave")
        });

        // Add event listener to the button  childrens
        addButtonchildrens.addEventListener('click', () => {
            addmoreFunction("childrensName", "children", "children")
        });

        // Add event listener to the button  record of service
        addButtonRecordOfService.addEventListener('click', () => {
            addmoreFunction("effectiveDate", "recordOfService", "recordofservice")
        });
        // Add event listener to the button  bond
        // addButtonbond.addEventListener('click',  () => {addmoreFunction("bond","bondfrom", "bond",1 )} );


        // Add event listener to the button  bond
        addButtonadddocs.addEventListener('click',  () => {addmoreFunction("adddocs","adddoc", "adddoc")} );


        // Add event listener to the button  publicservice
        // addButtonpublicservice.addEventListener('click',  () => {addmoreFunction("publicserviceEmployer","publicservice", "publicservice",1 )} );


        function addmoreFunction(inputname, cardid, optionalinput) {
            var inputname = inputname;
            // const cardid = cardid;
            //    let counter = count;
            const newElement = document.createElement('div');
            if (optionalinput == "recordofservice") {
                newElement.className = 'card-body';
            } else {
                newElement.className = 'form-group row';
            }



            if (optionalinput == "any") {
                newElement.innerHTML = `

        <div class="col-md-8">
            <input type="text" class="form-control ${inputname}-input" name="${inputname}[]">
        </div>
        <div class="col-md-2">
            <button class="btn btn-danger remove-button${inputname}">Remove</button>
        </div>
    `;
            } else if (optionalinput == "course") {
                newElement.innerHTML = `
        <div class="form-group row">
            
            <div class="col-md-8">
                <div class="input-group">
                    <div class="input-group-text"> 
                        <input type="text" class="form-control  ${inputname}-input"  name="${inputname}[]" placeholder="Course">
                        <input type="number" class="form-control"  name="coursesyear[]" placeholder="Study Year" value="">
                    </div>
                    
                  </div></div>
                  <div class="col-md-2">
            <button class="btn btn-danger remove-button${inputname}">Remove</button>
        </div>
           </div> `;
            } else if (optionalinput == "leave") {
                newElement.innerHTML = `
        <div class="form-group row">
          
            <div class="col-md-8">
                <div class="input-group">
                    <div class="input-group-text"> 
                        <input type="text" class="form-control  ${inputname}-input"  name="${inputname}[]" placeholder="Leave From">
                        <input type="text" class="form-control"  name="leaveto[]" placeholder="Leave To">
                    </div>
                    
                  </div></div>
                  <div class="col-md-2">
            <button class="btn btn-danger remove-button${inputname}">Remove</button>
        </div>
           </div> `;
            } else if (optionalinput == "children") {

                newElement.innerHTML = `
        <div class="form-group row">
          
            <div class="col-md-8">
                <div class="input-group">
                    <div class="input-group-text"> 
                        <input type="text" class="form-control  ${inputname}-input"  name="childrensName[]" placeholder="Name">
                        <input type="date" class="form-control" name="childrensbirthday[]" placeholder="Birth Day">
                    </div>
                    
                  </div></div>
                  <div class="col-md-2">
            <button class="btn btn-danger remove-button${inputname}">Remove</button>
        </div>
           </div> `;
            } else if (optionalinput == "recordofservice") {
                newElement.innerHTML = `
        <hr>
        <div class="form-group row">
     <div class="col-md-8">
       <div class="form-group row">
            <label class="col-form-label col-md-2">1.Effective Date</label>
            <div class="col-md-10">
                <input type="date" class="form-control ${inputname}-input"  name="${inputname}[]">
            </div>
        </div>
        {{-- grade --}}
        <div class="form-group row">
                                            <label class="col-form-label col-md-2">2.Grade</label>
                                            <div class="col-md-10">
                                                <select required class="select form-control" name="grade[]"
                                                   >
                                                    <option selected disabled> --Select --</option>
                                                    @foreach ($position as $positions)
                                                        <option value="{{ $positions->position }}">
                                                            {{ $positions->position }}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
        {{-- status --}}
        <div class="form-group row">
            <label class="col-form-label col-md-2">3.Status</label>
            <div class="col-md-10">
                <select class="select form-control"  name="status[]">
                                            <option value="Active"> Active </option>
                                        <option value="Inactive"> Inactive </option>
                                        </select>
            </div>
        </div>

        {{-- salary scale --}}
        <div class="form-group row">
            <label class="col-form-label col-md-2">4.Salary Scale</label>
            <div class="col-md-10">
                <input type="text" class="form-control"  name="salaryscale[]">
            </div>
        </div>
        {{-- incremental date --}}
        <div class="form-group row">
            <label class="col-form-label col-md-2">5.Incremental Date</label>
            <div class="col-md-10">
                <input type="date" class="form-control"  name="incrementalDate[]">
            </div>
        </div>
{{-- Minstry/Department Division --}}
        <div class="form-group row">
            <label class="col-form-label col-md-2">6.Minstry/Department Division</label>
            <div class="col-md-10">
                                            <select class="select form-control" id="department" name="department[]">
                                                    @if (!empty($employees[0]))
                                                        <option value="{{ $employees[0]->department }}"
                                                            {{ $employees[0]->department == $employees[0]->department ? 'selected' : '' }}>
                                                            {{ $employees[0]->department }} </option>
                                                        @foreach ($departments as $key => $items)
                                                            <option value="{{ $items->department }}">
                                                                {{ $items->department }}</option>
                                                        @endforeach
                                                    @else
                                                        @foreach ($departments as $key => $items)
                                                            <option value="{{ $items->department }}">
                                                                {{ $items->department }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            
                                        </div>
        </div>
        </div>
        <div class="col-md-2">
             <button class="btn btn-danger remove-button${inputname}">Remove</button>
        </div>
         </div>
        `;

            }  else if(optionalinput == "adddoc"){
                newElement.innerHTML = `
            <div class="form-group row">
                <div class="col-md-8">
                    <div class="input-group">
                        <div class="input-group-text"> 
                            <input type="file" class="form-control  ${inputname}-input"  name="${inputname}" placeholder="Add file">
                            <input type="date" class="form-control " name="adddocsDate" placeholder="Date Uploaded" value="">
                        </div>

                      </div></div>
                      <div class="col-md-2">
                <button class="btn btn-danger remove-button${inputname}">Remove</button>
            </div>
               </div> `;
            }
     
            const cardBody = document.getElementById(cardid);
            cardBody.appendChild(newElement);

            const btnrm = `.remove-button${inputname}`;
            // Add event listener to the remove button of the newly added element
            const removeButton = newElement.querySelector(btnrm);
            removeButton.addEventListener('click', () => {
                cardBody.removeChild(newElement);

                // const elements = cardBody.querySelectorAll('.form-group');
                // elements.forEach((element, index) => {
                //     const label = element.querySelector('.col-form-label');
                //     label.textContent = `${index + 1}.`;
                // });// Update the label numbers after removal
            });

        }

        function previewImage(event) {
            const fileInput = event.target;
            const previewImage = document.getElementById('preview-image');
            if (fileInput.files && fileInput.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                }
                reader.readAsDataURL(fileInput.files[0]);
            }

        }
    </script>
@endsection

@endsection
