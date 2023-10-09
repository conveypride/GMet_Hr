
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
                        <h3 class="page-title"> {{ $type }}  Leave Settings</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Leave Settings</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-md-12 mb-3">
 <label for="selectemployeetype"> Select Employee Type</label>
  <select class="form-control" name="selectemployeetype" id="selectemployeetype">
    <a href="{{ route('form/leavesettings/page/',  ['id' => 'junior']) }}"><option value="Junior"> Junior Employee Leave Setting </option> </a>
<option value="Medium"> 
    <a href="{{ route('form/leavesettings/page/',  ['id' => 'medium']) }}">Medium Employee Leave Setting</a>
</option>
<option value="Senior">
    <a href="{{ route('form/leavesettings/page/', ['id' => 'senior']) }}">Senior Employee Leave Setting</a></option>
</select>
</form>
 </div>
                {{-- alert --}}
                @if (count($leavesett) > 0 )
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                   <strong> Leave Setting was last updated: </strong>
                    @foreach ($leavesett as $leavesetts) 
                    {{ $leavesetts->updated_at }}
                    @endforeach
                    
                  </div>  
                                @else
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                   <strong>Please Modify Your {{ $type }} Leave Settings</strong> 
                                  </div>    
                                @endif
               <input type="hidden" id="emplooyetype" name="emplooyetype" value="{{ $type }}">
                
                
                
                <div class="col-md-12">
                    <!-- Junior Employees Annual Leave -->
                    <div class="card leave-box" id="leave_annual">
                        <div class="card-body">
                            <div class="h3 card-title with-switch">
                               
                                {{ $type }} Employees(0-12) Annual Leave
                               
                           											
                                <div class="onoffswitch">
                                    @if (count($leavesett) > 0)
                                    <input type="checkbox" name= "annualleaveStatus" class="onoffswitch-checkbox" id="switch_annual"  {{ $leavesett[0]->annualleaveStatus == "on" ? 'checked' : '' }} value="on">
                                    @else
                                    <input type="checkbox" name="annualleaveStatus" class="onoffswitch-checkbox" id="switch_annual" value="off">
                                    @endif
                                     <label class="onoffswitch-label" for="switch_annual">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="leave-item">
                            
                                <!-- Annual Days Leave -->
                                <div class="leave-row">
                                    <div class="leave-left">
                                        <div class="input-box">
                                            <div class="form-group">
                                                <label>Days</label>
                                                @if (count($leavesett) > 0 )
                                                <input name="annualleaveMaxDays" type="text" class="form-control" disabled  value="{{ $leavesett[0]->annualleaveMaxDays }}">
                                                @else
                                                <input name="annualleaveMaxDays"  type="text" class="form-control" disabled>
                                                @endif
                                               
                                            </div>
                                        </div>
                                    </div>
                                    <div class="leave-right">
                                        <button class="leave-edit-btn">Edit</button>
                                    </div>
                                </div>
                                <!-- /Annual Days Leave -->
                                
                                <!-- Carry Forward -->
                                <div class="leave-row">
                                    <div class="leave-left">
                                        @if (count($leavesett) > 0 )
                                        <div class="input-box">
                                            <label class="d-block">Carry forward</label>
                                            <div class="leave-inline-form" >
                                                <div id="idradio">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="annualleaveCarryForwardStatus" id="carry_no" value="no" disabled   {{ $leavesett[0]->annualleaveCarryForwardStatus == "no" ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="carry_no">No</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="annualleaveCarryForwardStatus" id="carry_yes" value="yes" disabled {{ $leavesett[0]->annualleaveCarryForwardStatus == "yes" ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="carry_yes">Yes</label>
                                                </div>
                                            </div>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Max</span>
                                                    </div>
                                                    <input type="text" class="form-control" disabled  name="annualleaveCarryForwardMaxDays" value="{{ $leavesett[0]->annualleaveCarryForwardMaxDays }}" id="annualleaveCarryForwardMaxDays">
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                        <div class="input-box">
                                            <label class="d-block">Carry forward</label>
                                            <div class="leave-inline-form">
                                                <div id="idradio">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="annualleaveCarryForwardStatus" id="carry_no" value="no" disabled>
                                                    <label class="form-check-label" for="carry_no">No</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="annualleaveCarryForwardStatus" id="carry_yes" value="yes" disabled>
                                                    <label class="form-check-label" for="carry_yes">Yes</label>
                                                </div>
                                            </div>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Max</span>
                                                    </div>
                                                    <input type="text" class="form-control" disabled  name="annualleaveCarryForwardMaxDays" id="annualleaveCarryForwardMaxDays">
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                       
                                    </div>
                                    <div class="leave-right">
                                        <button class="leave-edit-btn">
                                            Edit
                                        </button>
                                    </div>
                                </div>
                                <!-- /Carry Forward -->
                                 
                            </div>
                            
                        </div>
                    </div>
                    <!-- /Annual Leave -->
                    
                    <!-- Sick Leave -->
                    <div class="card leave-box" id="leave_sick">
                        <div class="card-body">
                            <div class="h3 card-title with-switch">
                               {{ $type }} Employee Sick Leave										
                                <div class="onoffswitch">
                                    @if (count($leavesett) > 0 )
                                    <input type="checkbox" name="sickleaveStatus" class="onoffswitch-checkbox" id="switch_sick" {{ $leavesett[0]->sickleaveStatus == "on" ? 'checked' : '' }}>
                                    @else
                                    <input type="checkbox" name="sickleaveStatus" class="onoffswitch-checkbox" id="switch_sick">
                                    @endif
                                    <label class="onoffswitch-label" for="switch_sick">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="leave-item">
                                <div class="leave-row">
                                    <div class="leave-left">
                                        <div class="input-box">
                                            <div class="form-group">
                                                <label>Days</label>
                                                @if (count($leavesett) > 0 )
                                                <input type="text"  value="{{ $leavesett[0]->sickleaveMaxDays }}" name="sickleaveMaxDays" class="form-control" {{ $leavesett[0]->sickleaveStatus == "on" ? '' : 'disabled' }}>
                                                @else
                                                <input type="text" name="sickleaveMaxDays" class="form-control" disabled>
                                                @endif
                                            
                                            </div>
                                        </div>
                                    </div>
                                    <div class="leave-right">
                                        <button class="leave-edit-btn">
                                            Edit
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Sick Leave -->
                    
                    <!-- Hospitalisation Leave -->
                    <div class="card leave-box" id="leave_hospitalisation">
                        <div class="card-body">
                            <div class="h3 card-title with-switch">
                                {{ $type }}  Employee  Hospitalisation Leave										
                                <div class="onoffswitch">
                                    
                                    @if (count($leavesett) > 0 )
                                    <input type="checkbox" name="hospitalisationleaveStatus" class="onoffswitch-checkbox" id="switch_hospitalisation" {{ $leavesett[0]->hospitalisationleaveStatus == "on" ? 'checked' : '' }} >
                                    @else
                                    <input type="checkbox" name="hospitalisationleaveStatus" class="onoffswitch-checkbox" id="switch_hospitalisation">
                                    @endif


                                    <label class="onoffswitch-label" for="switch_hospitalisation">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="leave-item">
                            
                                <!-- Annual Days Leave -->
                                <div class="leave-row">
                                    <div class="leave-left">
                                        <div class="input-box">
                                            <div class="form-group">
                                                <label>Days</label>
                                                 @if (count($leavesett) > 0 )
                                                <input type="text"  value="{{ $leavesett[0]->hospitalisationleaveMaxDays  }}"  name="hospitalisationleaveMaxDays" class="form-control" {{ $leavesett[0]->hospitalisationleaveStatus == "on" ? '' : 'disabled' }}>
                                                @else
                                                <input type="text" name="hospitalisationleaveMaxDays" class="form-control" disabled>
                                                @endif
                                               
                                            </div>
                                        </div>
                                    </div>
                                    <div class="leave-right">
                                        <button class="leave-edit-btn">
                                            Edit
                                        </button>
                                    </div>
                                </div>
                                <!-- /Annual Days Leave -->
                            </div>
                            
                           
                        </div>
                    </div>
                    <!-- /Hospitalisation Leave -->
                    
                    <!-- Maternity Leave -->
                    <div class="card leave-box" id="leave_maternity">
                        <div class="card-body">
                            <div class="h3 card-title with-switch">
                                {{ $type }}  Employee Maternity  Leave<span class="subtitle">Assigned to female only</span>
                                <div class="onoffswitch">
                                    @if (count($leavesett) > 0 )
                                    <input type="checkbox" name="maternityleaveStatus" class="onoffswitch-checkbox" id="switch_maternity" {{ $leavesett[0]->maternityleaveStatus == "on" ? 'checked' : '' }}>
                                    @else
                                    <input type="checkbox" name="maternityleaveStatus" class="onoffswitch-checkbox" id="switch_maternity">
                                    @endif
                                    <label class="onoffswitch-label" for="switch_maternity">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="leave-item">
                                <div class="leave-row">
                                    <div class="leave-left">
                                        <div class="input-box">
                                            <div class="form-group">
                                                <label>Days</label>
                                                @if (count($leavesett) > 0 )
                                                <input type="text"  value="{{ $leavesett[0]->maternityleaveMaxDays }}" name="maternityleaveMaxDays" class="form-control" {{ $leavesett[0]->maternityleaveStatus == "on" ? '' : 'disabled' }}>
                                                @else
                                                <input type="text" name="maternityleaveMaxDays" class="form-control" disabled>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="leave-right">
                                        <button class="leave-edit-btn">
                                            Edit
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Maternity Leave -->
                    
                    <!-- Paternity Leave -->
                    <div class="card leave-box" id="leave_paternity">
                        <div class="card-body">
                            <div class="h3 card-title with-switch">
                                {{$type}}  Employee   Paternity  Leave <span class="subtitle">Assigned to male only</span>
                                <div class="onoffswitch">
                                     @if (count($leavesett) > 0 )
                                    <input type="checkbox" name="paternityleaveStatus" class="onoffswitch-checkbox" id="switch_paternity" {{ $leavesett[0]->paternityleaveStatus == "on" ? 'checked' : '' }}>
                                    @else
                                    <input type="checkbox" name="paternityleaveStatus" class="onoffswitch-checkbox" id="switch_paternity">
                                    @endif
                                    <label class="onoffswitch-label" for="switch_paternity">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="leave-item">
                                <div class="leave-row">
                                    <div class="leave-left">
                                        <div class="input-box">
                                            <div class="form-group">
                                                <label>Days</label>
                                                @if (count($leavesett) > 0 )
                                                <input type="text"  value="{{ $leavesett[0]->paternityleaveMaxDays }}" name="paternityleaveMaxDays" class="form-control" {{ $leavesett[0]->paternityleaveStatus == "on" ? '' : 'disabled' }}>
                                                @else
                                                <input type="text" name="paternityleaveMaxDays" class="form-control" disabled>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="leave-right">
                                        <button class="leave-edit-btn">
                                            Edit
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Paternity Leave -->
                    
                   
                </div>
            </div>

        </div>
        <!-- /Page Content -->

        
    </div>
    <!-- /Page Wrapper -->
    @section('script')

    {{-- <script>




    </script> --}}
    @endsection
@endsection
