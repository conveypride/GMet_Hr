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
                        <h3 class="page-title">Employee Personal Record Form</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('adm/home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Add New Employee</li>
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
                            <form action="{{ route('all/employee/addnew') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    {{-- <label class="col-form-label" for="upload"> Upload Passport Picture</label> --}}
                                    <div class="col-md-10">
                                        <h3 class="fw-bold text-center"> Upload Passport Picture</h3>
                                        <div class="upload-container">
                                            <input required type="file" name="passportpic" id="upload"
                                                accept="image/*" onchange="previewImage(event)">
                                            <div class="preview">
                                                <img src="" alt="" id="preview-image">
                                                <i class="la la-camera preview-icon"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Number --}}
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">1.Employee ID Number</label>
                                    <div class="col-md-10">
                                        <input required type="text" class="form-control" id="employeeId"
                                            name="employeeId">
                                    </div>
                                </div>
                                {{-- Home town --}}
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">2.Home Town</label>
                                    <div class="col-md-10">
                                        <input required type="text" class="form-control" id="hometown" name="hometown">
                                    </div>
                                </div>
                                {{-- sex/gender --}}
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">3.Sex</label>
                                    <div class="col-md-10">
                                        <select required class="select form-control" id="gender" name="gender">
                                            <option value="Male" selected="selected">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>



                                {{-- date of birt --}}
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">4.Date Of Birth <br> (Attach Copy Of Birth
                                        Certificate)</label>
                                    <div class="col-md-10">
                                        <div class="input-group">
                                            <div class="input-group-text">
                                                <input required class="form-input" type="file" id="birthcert"
                                                    name="birthcert">
                                            </div>
                                            <input required type="date" class="form-control" id="birth_date"
                                                name="birth_date">
                                        </div>
                                    </div>
                                </div>
                                {{-- nationaliy --}}
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">5.Nationality</label>
                                    <div class="col-md-10">
                                        <input required type="text" class="form-control" id="nationality"
                                            name="nationality">
                                    </div>
                                </div>


                                {{-- full name --}}
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title mb-0">6.Full Name</h4>
                                    </div>
                                    <div class="card-body">
                                        {{-- surname --}}
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-2">Surname</label>
                                            <div class="col-md-10">
                                                <input required type="text" class="form-control" id="surname"
                                                    name="surname">
                                            </div>
                                        </div>
                                        {{-- middle name --}}
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-2">Middle name</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" id="middlename"
                                                    name="middlename">
                                            </div>
                                        </div>
                                        {{-- other name --}}
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-2">Other Name(s)</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" id="othername" name="othername">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- SSNIT number --}}
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">7.SSNIT Number</label>
                                    <div class="col-md-10">
                                        <input required type="text" class="form-control" id="ssnit"
                                            name="ssnit">
                                    </div>
                                </div>
                                {{-- ghana card id --}}
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2" for="ghcard_id">8.Ghana Card ID Number</label>
                                    <div class="col-md-8">
                                        <input required type="text" class="form-control" id="ghcard_id"
                                            name="ghcard_id">
                                    </div>

                                </div>
                                {{-- ghcard_id_expire --}}
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2" for="ghcard_id">9.Ghana-Card-ID Expiring
                                        Date</label>
                                    <div class="col-md-10">
                                        <input required type="date" class="form-control" id="ghcard_id_expire"
                                            name="ghcard_id_expire">
                                    </div>
                                </div>


                                {{-- email address --}}
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">10.Email Address</label>
                                    <div class="col-md-10">
                                        <input required type="email" class="form-control" id="email"
                                            name="email">
                                    </div>
                                </div>

                                {{-- telephone number --}}
                                <div class="card">
                                    <div class="card-header">
                                        11.Telephone Number
                                    </div>
                                    <div class="card-body">
                                        {{-- fixed number --}}
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-2">Fixed Number</label>
                                            <div class="col-md-10">
                                                <input required type="number" class="form-control" id="fixednum"
                                                    name="fixednum">
                                            </div>
                                        </div>
                                        {{-- mobile number --}}
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-2">Mobile Number</label>
                                            <div class="col-md-10">
                                                <input required type="number" class="form-control" id="mobilenum"
                                                    name="mobilenum">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Address --}}
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">12.Address (Postal & Residential / Home
                                        Address)</label>
                                    <div class="col-md-10">
                                        <input required type="text" class="form-control" id="address"
                                            name="address">
                                    </div>
                                </div>
                                {{-- education background --}}
                                <div class="card">
                                    <div class="card-header">
                                        13.Education Background/ Qualification
                                    </div>
                                    <div class="card-body" id="education">
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-2">1.</label>
                                            <div class="col-md-8">
                                                <input required type="text" class="form-control" id="edu"
                                                    name="edu[]">
                                            </div>

                                        </div>
                                    </div>
                                    <p style=" text-align: center;">
                                        <button class="btn btn-success " style="width: 150px;" type="button"
                                            id="addButton">Add More</button>
                                    </p>

                                </div>

                                {{-- Honours & Decorations --}}
                                <div class="card">
                                    <div class="card-header">
                                        14.Honours & Decorations
                                    </div>
                                    <div class="card-body" id="hon">
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-2">1.</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" id="honours"
                                                    name="honours[]">
                                            </div>

                                        </div>
                                    </div>
                                    <p style=" text-align: center;">
                                        <button class="btn btn-success " style="width: 150px;" type="button"
                                            id="addButtonhonours">Add More</button>
                                    </p>
                                </div>

                                {{-- Languages Spoken --}}
                                <div class="card">
                                    <div class="card-header">
                                        15.Languages Spoken
                                    </div>
                                    <div class="card-body" id="lang">
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-2">1.</label>
                                            <div class="col-md-8">
                                                <input required type="text" class="form-control" id="languages"
                                                    name="languages[]" value="">
                                            </div>

                                        </div>
                                    </div>
                                    <p style=" text-align: center;">
                                        <button class="btn btn-success " style="width: 150px;" type="button"
                                            id="addButtonlanguages">Add More</button>
                                    </p>
                                </div>
                                {{-- marital status --}}
                                <div class="card">
                                    <div class="card-header">
                                        16.Marital Status
                                    </div>
                                    <div class="card-body">
                                        <label for="maritalStatus">Select marital status:</label>
                                        <select id="maritalStatus1" class="select form-control" name="maritalStatus1" onchange="togglemarriage()" style="">
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                            <option value="Divorced">Divorced</option>
                                            <option value="Widowed">Widowed</option>
                                        </select>
                                        <div id="dateInputContainer1">
                                            <label for="marriageDate">Date:</label>
                                            <input class="form-control" type="date" id="marriageDate"
                                                name="marriageDate" style="display:none">
                                        </div>
                                    </div>
                                </div>

                                {{-- Previous Employee (If Any) --}}
                                <div class="card">
                                    <div class="card-header">
                                        17.Previous Employee (If Any)
                                    </div>
                                    <div class="card-body" id="prevEmployee">
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-2">1.</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" id="previousEmployee"
                                                    name="previousEmployee[]">
                                            </div>

                                        </div>
                                    </div>
                                    <p style=" text-align: center;">
                                        <button class="btn btn-success " style="width: 150px;" type="button"
                                            id="addButtonpreviousEmployee">Add More</button>
                                    </p>
                                </div>
                                {{-- Major Physical Disabilities --}}
                                <div class="card">
                                    <div class="card-header">
                                        18.Major Physical Disabilities
                                    </div>
                                    <div class="card-body" id="physDisability">
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-2">1.</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" id="physDisabilities"
                                                    name="physDisabilities[]">
                                            </div>

                                        </div>
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
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-2">1.</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <div class="input-group-text">
                                                        <input type="text" class="form-control" id="leavefrom"
                                                            name="leavefrom[]" placeholder="Leave From">
                                                        <input type="text" class="form-control" id="leaveto"
                                                            name="leaveto[]" placeholder="Leave To" value="">
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-2">1.</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <div class="input-group-text">
                                                        <input type="text" class="form-control" id="childrensName"
                                                            name="childrensName[]" placeholder="Name">
                                                        <input type="date" class="form-control "
                                                            id="childrensbirthday" name="childrensbirthday[]"
                                                            placeholder="Birth Day" value="">
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
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
                                                <input type="text" class="form-control" id="status"
                                                    name="status[]">
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
                                                {{-- <input type="text" class="form-control" id="department" name="department[]"> --}}
                                                <select class="select form-control" id="department" name="department[]">
                                                    <option selected disabled> --Select --</option>
                                                    @foreach ($departments as $key => $items)
                                                        <option value="{{ $items->department }}">
                                                            {{ $items->department }}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
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
                                        <select required class="select form-control" id="level" name="level">
                                            <option value="Junioremployee" selected="selected">Junior Employee</option>
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
                                                <textarea class="form-control" name="comment" id="comment" cols="30" rows="10"></textarea>
                                            </div>
                                        </div>

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
@section('script')
    <script>
        // alert("hi")
        function togglemarriage() {
            
        var maritalStatusSelect = document.getElementById('maritalStatus1');
        var dateInputContainer = document.getElementById('dateInputContainer1');
var marriageDate = document.getElementById('marriageDate');
       
            var selectedOption = maritalStatusSelect.value;
            // alert(selectedOption);
            if (selectedOption == 'single') {

                dateInputContainer.style.display = 'none';
                marriageDate.style.display = 'none';
            } else {
                dateInputContainer.style.display = 'block';
                marriageDate.style.display = 'block';
            }
        }



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
        addButtonadddocs.addEventListener('click',  () => {addmoreFunction("adddocs","adddoc", "adddoc",1 )} );

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
                        <input type="text" class="form-control  ${inputname}-input"  name="${inputname}[]" placeholder="Name">
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
                <input type="date" class="form-control"  ${inputname}-input"  name="${inputname}[]">
            </div>
        </div>
        {{-- grade --}}
        <div class="form-group row">
            <label class="col-form-label col-md-2">2.Grade</label>
            <div class="col-md-10">
                <select required class="select form-control" name="grade[]" id="grade">
                    <option selected disabled> --Select --</option>
                    @foreach ($position as $positions)
                    <option value="{{ $positions->position }}">{{ $positions->position }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        {{-- status --}}
        <div class="form-group row">
            <label class="col-form-label col-md-2">3.Status</label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="status[]">
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
                     <option selected disabled> --Select --</option>
                   @foreach ($departments as $key => $items)
                            <option value="{{ $items->department }}">
                                {{ $items->department }}</option>
                        @endforeach
                   </select>
            </div>
        </div>
        </div>
        <div class="col-md-2">
             <button class="btn btn-danger remove-button${inputname}">Remove</button>
        </div>
         </div>
        `;

            }
            else if(optionalinput == "adddoc"){
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
            //  else if(optionalinput == "bond"){
            //         newElement.innerHTML = `
        //         <div class="form-group row">
        //             <div class="col-md-8">
        //                 <div class="input-group">
        //                     <div class="input-group-text">  
        //                         <p>From:</p>
        //                         <input type="date" class="form-control  ${inputname}-input " name="${inputname}"  placeholder="From">
        //                         <p>To:</p>
        //                        <input type="date" class="form-control " id="bondto" name="bondto" placeholder="To">
        //                     </div>

        //                   </div></div>
        //                   <div class="col-md-2">
        //             <button class="btn btn-danger remove-button${inputname}">Remove</button>
        //         </div>
        //            </div> `;
            //     }
            // else if(optionalinput == "publicservice"){
            //         newElement.innerHTML = `
        //         <div class="form-group row">
        //             <div class="col-md-8">
        //                 <div class="input-group">
        //                     <div class="input-group-text">  
        //                         <div> 
        //                             <p class="mt-1 pt-1 mb-0 pb-0p">Employer:</p>
        //                            <input type="text" class="form-control  ${inputname}-input"  name="${inputname}" placeholder="Employer">  <p class="mt-1 pt-1 mb-0 pb-0p">From:</p>
        //                             <input type="date" class="form-control " name="publicservicefrom" placeholder=" From">
        //                             <p class="mt-1 pt-1 mb-0 pb-0p">To:</p>
        //                        <input type="date" class="form-control " name="publicserviceto" placeholder="To">
        //                      </div> 
        //                     </div>

        //                   </div></div>
        //                   <div class="col-md-2">
        //             <button class="btn btn-danger remove-button${inputname}">Remove</button>
        //         </div>
        //            </div> `;
            //     }

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
