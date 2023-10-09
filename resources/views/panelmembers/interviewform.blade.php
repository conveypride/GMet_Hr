@extends('layouts.app')
@section('content')
    <!-- Page Wrapper -->
    

    <div class="container-fluid bg-white">
        <nav class="navbar  fixed-top  navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Interview Dashboard</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('panel/dashboard') }}">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">All Applicants</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                  </li>
                  
                </ul>
              </div>
            </div>
          </nav>
    <br>
    <br>
        <!-- Page Content -->
        <div class="mx-2 my-5 p-2">
<div class="container ">
    <h3>PART A: GENERAL PARTICULARS</h3>
 <div class="d-flex">
<div class="col">
  <label for="post" class="form-label">POST</label>
  <input type="text"
    class="form-control" name="post"  aria-describedby="helpposition" placeholder="Enter candidate post">
  <small id="helpposition" class="form-text text-muted">Please specify the position the cadidate is seeking</small>
</div>
<div class="col">
    <label for="name" class="form-label">NAME</label>
    <input type="text"
      class="form-control" name="name" readonly aria-describedby="helpname" placeholder="Enter candidate name" value="John Doe">
    <small id="helpname" class="form-text text-muted">Please specify the name of the candidate</small>
  </div>
  <div class="col">
        <label for="sex" class="form-label">SEX</label>
        <select class="form-control form-control-lg" name="sex" >
            <option selected>---Select one---</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
  </div>
  </div>

  <div class="d-flex">
    <div class="col">
      <label for="db" class="form-label">DATE OF BIRTH</label>
      <input type="text"
        class="form-control" name="db"  aria-describedby="helpdb" placeholder="Enter candidate date of birth">
      <small id="helpdb" class="form-text text-muted">Please specify the date of birth the cadidate</small>
    </div>
    <div class="col">
        <label for="age" class="form-label">AGE</label>
        <input type="text"
          class="form-control" name="age"  aria-describedby="helpage" placeholder="Enter candidate age" value="John Doe">
        <small id="helpage" class="form-text text-muted">Please specify the age of the candidate</small>
      </div>

  </div>

</div>


            <div class="container mt-5">
                <h3>PART B: APPRAISAL CRITERIA AND SCORING</h3>
                <table class="table table-striped table-bordered " id="scoreTable">
                    <thead>
                        <tr>
                            <th>What to Look For</th>
                            <th>Maximum Score</th>
                            <th>Actual Score</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>A. Appearance(10)</th>
                            <th></th>
                             <th></th>
                        </tr>
                        <tr class="tt">
                            <td>1.Dress Code</td>
                            <td class="mm">2</td>
                            <td>
                                <select class="form-control selectme" onchange="updateTotal()">
                                    <!-- Populate actual score options dynamically based on maximum score -->
                                </select>
                            </td>
                        </tr>
                        <tr class="tt">
                            <td>2.Speech</td>
                            <td class="mm">1</td>
                            <td>
                                <select class="form-control selectme" onchange="updateTotal()">
                                    <!-- Populate actual score options dynamically based on maximum score -->
                                </select>
                            </td>
                        </tr>

                        <tr class="tt">
                            <td>3.Manner(politeness, mannerisms, comportment)</td>
                            <td class="mm">3</td>
                            <td>
                                <select class="form-control selectme" onchange="updateTotal()">
                                    <!-- Populate actual score options dynamically based on maximum score -->
                                </select>
                            </td>
                        </tr>

                         <tr class="tt">
                            <td>4.Responsiveness</td>
                            <td class="mm">2</td>
                            <td>
                                <select class="form-control selectme" onchange="updateTotal()">
                                    <!-- Populate actual score options dynamically based on maximum score -->
                                </select>
                            </td>
                        </tr>
                        <tr class="tt">
                            <td>5.Self-Confidence & Temperament</td>
                            <td class="mm">2</td>
                            <td>
                                <select class="form-control selectme" onchange="updateTotal()">
                                    <!-- Populate actual score options dynamically based on maximum score -->
                                </select>
                            </td>
                        </tr>

                          <tr>
                            <th>B. Background (20)</th>
                            <th></th>
                             <th></th>
                        </tr>
                        <tr class="tt">
                            <td>1.Education</td>
                            <td class="mm">10</td>
                            <td>
                                <select class="form-control selectme" onchange="updateTotal()">
                                    <!-- Populate actual score options dynamically based on maximum score -->
                                </select>
                            </td>
                        </tr>
                        <tr class="tt">
                            <td>2.Relevant Additional Professional Education</td>
                            <td class="mm">4</td>
                            <td>
                                <select class="form-control selectme" onchange="updateTotal()">
                                    <!-- Populate actual score options dynamically based on maximum score -->
                                </select>
                            </td>
                        </tr>

                        <tr class="tt">
                            <td>3.Relevant Training (Workshops, Seminars etc)</td>
                            <td class="mm">4</td>
                            <td>
                                <select class="form-control selectme" onchange="updateTotal()">
                                    <!-- Populate actual score options dynamically based on maximum score -->
                                </select>
                            </td>
                        </tr>

                        <tr class="tt">
                            <td>4.Social Orientation (hobbies, interest etc)</td>
                            <td class="mm">2</td>
                            <td>
                                <select class="form-control selectme" onchange="updateTotal()">
                                    <!-- Populate actual score options dynamically based on maximum score -->
                                </select>
                            </td>
                        </tr>
                         <tr>
                            <th>C. Experience (30)</th>
                            <th></th>
                             <th></th>
                        </tr>

                        <tr class="tt">
                            <td>1. Relevant Work Experience</td>
                            <td class="mm">10</td>
                            <td>
                                <select class="form-control selectme" onchange="updateTotal()">
                                    <!-- Populate actual score options dynamically based on maximum score -->
                                </select>
                            </td>
                        </tr>
                        <tr class="tt">
                            <td>2.Special Knowledge Relating To Position</td>
                            <td class="mm">6</td>
                            <td>
                                <select class="form-control selectme" onchange="updateTotal()">
                                    <!-- Populate actual score options dynamically based on maximum score -->
                                </select>
                            </td>
                        </tr>
                        <tr class="tt">
                            <td>3.Attitude to work</td>
                            <td class="mm">5</td>
                            <td>
                                <select class="form-control selectme" onchange="updateTotal()">
                                    <!-- Populate actual score options dynamically based on maximum score -->
                                </select>
                            </td>
                        </tr>
                        <tr class="tt">
                            <td>4.Career Interest and Prospect</td>
                            <td class="mm">3</td>
                            <td>
                                <select class="form-control selectme" onchange="updateTotal()">
                                    <!-- Populate actual score options dynamically based on maximum score -->
                                </select>
                            </td>
                        </tr>

                        <tr class="tt">
                            <td>5.Leadership Capacity</td>
                            <td class="mm">4</td>
                            <td>
                                <select class="form-control selectme" onchange="updateTotal()">
                                    <!-- Populate actual score options dynamically based on maximum score -->
                                </select>
                            </td>
                        </tr>

                         <tr class="tt">
                            <td>6.Emotional Stability and Stamina</td>
                            <td class="mm">2</td>
                            <td>
                                <select class="form-control selectme" onchange="updateTotal()">
                                    <!-- Populate actual score options dynamically based on maximum score -->
                                </select>
                            </td>
                        </tr>

                            <tr>
                            <th>D. Intellect (30)</th>
                            <th></th>
                             <th></th>
                        </tr>
                        <tr class="tt">
                            <td>1.Conceptual Ability</td>
                            <td class="mm">5</td>
                            <td>
                                <select class="form-control selectme" onchange="updateTotal()">
                                    <!-- Populate actual score options dynamically based on maximum score -->
                                </select>
                            </td>
                        </tr>
                        <tr class="tt">
                            <td>2.Clarity of thought (logical thinking)</td>
                            <td class="mm">5</td>
                            <td>
                                <select class="form-control selectme" onchange="updateTotal()">
                                    <!-- Populate actual score options dynamically based on maximum score -->
                                </select>
                            </td>
                        </tr>
                         <tr class="tt">
                            <td>3.Power of Comprehension</td>
                            <td class="mm">5</td>
                            <td>
                                <select class="form-control selectme" onchange="updateTotal()">
                                    <!-- Populate actual score options dynamically based on maximum score -->
                                </select>
                            </td>
                        </tr>
                              <tr class="tt">
                            <td>4.Analytical Ability</td>
                            <td class="mm">5</td>
                            <td>
                                <select class="form-control selectme" onchange="updateTotal()">
                                    <!-- Populate actual score options dynamically based on maximum score -->
                                </select>
                            </td>
                        </tr>
                        <tr class="tt">
                            <td>5.Originality and Creativity / Innovation</td>
                            <td class="mm">5</td>
                            <td>
                                <select class="form-control selectme" onchange="updateTotal()">
                                    <!-- Populate actual score options dynamically based on maximum score -->
                                </select>
                            </td>
                        </tr>
                        <tr class="tt">
                            <td>6.Intellectual Capacity (Conceptual Ability/ Technical)</td>
                            <td class="mm">5</td>
                            <td>
                                <select class="form-control selectme" onchange="updateTotal()">
                                    <!-- Populate actual score options dynamically based on maximum score -->
                                </select>
                            </td>
                        </tr>
                            <tr>
                            <th>E. Current Affairs (10)</th>
                            <th></th>
                             <th></th>
                        </tr>

                        <tr class="tt">
                            <td>1.Understanding of Current Events in National and International Scene</td>
                            <td class="mm">5</td>
                            <td>
                                <select class="form-control selectme" onchange="updateTotal()">
                                    <!-- Populate actual score options dynamically based on maximum score -->
                                </select>
                            </td>
                        </tr>
                        <tr class="tt">
                            <td>2.Ability to Appreciate their significance and Implications</td>
                            <td class="mm">5</td>
                            <td>
                                <select class="form-control selectme" onchange="updateTotal()">
                                    <!-- Populate actual score options dynamically based on maximum score -->
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Total Score</th>
                            <th>100</th>
                            <th id="totalScore">0</th>
                        </tr>
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>

<div class="col my-3">
      <label for="comment" class="form-label">IMPRESSION/COMMENTS</label>
      <textarea name="comment" id="comment" cols="30" rows="10"  class="form-control"  ></textarea>
       
    </div>
<div class="d-flex">
<div class="col">
    <label for="" class="form-label">RECOMMENDATION FOR POST</label>
    <select class="form-control form-control-lg" name="" id="">
        <option selected>---Select one---</option>
        <option value="yes">Yes</option>
        <option value="no">No</option> 
    </select>
</div>
<div class="col">
    <label for="interviewername" class="form-label">INTERVIEWER'S NAME</label>
    <input type="text"
      class="form-control" name="interviewername" readonly aria-describedby="helpinterviewername" placeholder="Enter interviewer name" value="Gifty Ofori">
    <small id="helpinterviewername" class="form-text text-muted">Please specify the name of the interviewer</small>
  </div>
</div>
<div class="d-flex">
    <div class="col">
        <label for="sign" class="form-label">SIGNATURE</label>
        <input type="text" name="sign" id="sign" aria-describedby="helpsign" class="form-control">
        <small id="helpsign" class="form-text text-muted">Please type your initials of your name as a signature</small>
    </div>
    <div class="col">
        <label for="date" class="form-label">DATE</label>
        <input type="date" class="form-control" name="date"  aria-describedby="helpdate" >
        <small id="helpdate" class="form-text text-muted">Please select date</small>
      </div>
    </div>

<button type="submit" class="btn btn-primary btn-block my-4 py-3">Submit</button>



            </div>
        

        </div>
        <!-- /Page Content -->


		<!-- Add Leave Modal -->
        <div id="review" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Awaiting Final Approval</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="#" method="POST">
                        @csrf
                            <div class="form-group">
                                <div class="dash-info-list">
                                    <a href="#" class="dash-card text-danger">
                                        <div class="dash-card-container">
                                            <div class="dash-card-icon">
                                                <h5 class="text-success"> Points: <span> 71% </span></h5>
                                            </div>
                                            <div class="dash-card-content">
                                                <p>John Kwofie </p> 
                                               
                                            </div>
                                            <div class="dash-card-avatars">
                                                <div class="e-avatar"><img src="{{ asset('assets/img/Circle-icons-profile.png')}}" alt=""></div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="dash-info-list">
                                    <a href="#" class="dash-card text-danger">
                                        <div class="dash-card-container">
                                            <div class="dash-card-icon">
                                                <h5 class="text-success"> Points: <span> 80% </span></h5>
                                            </div>
                                            <div class="dash-card-content">
                                                <p>Prince Kwofie </p>
                                            </div>
                                            <div class="dash-card-avatars">
                                                <div class="e-avatar"><img src="{{ asset('assets/img/Circle-icons-profile.png')}}" alt=""></div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="dash-info-list">
                                    <a href="#" class="dash-card text-danger">
                                        <div class="dash-card-container">
                                            <div class="dash-card-icon">
                                                <h5 class="text-success"> Points: <span> 55% </span></h5>
                                            </div>
                                            <div class="dash-card-content">
                                                <p>Jen Kwofie </p>
                                            </div>
                                            <div class="dash-card-avatars">
                                                <div class="e-avatar"><img src="{{ asset('assets/img/Circle-icons-profile.png')}}" alt=""></div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            {{-- <div class="form-group">
                                <label>Number of days <span class="text-danger">*</span></label>
                                <input class="form-control" readonly type="text">
                            </div> --}}
                            {{-- <div class="form-group">
                                <label>Remaining Leaves <span class="text-danger">*</span></label>
                                <input class="form-control" readonly value="12" type="text">
                            </div> --}}
                            {{-- <div class="form-group">
                                <label>Leave Reason <span class="text-danger">*</span></label>
                                <textarea name="leavereason" rows="4" class="form-control"></textarea>
                            </div> --}}
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Add Leave Modal -->
         

@section('script')
<script>
    // Function to populate select options
    function populateOptions() {
        const table = document.getElementById('scoreTable');
        const rows = table.querySelectorAll('tbody .tt');

        rows.forEach(row => {
            const maxScore = parseInt(row.querySelector('.mm').textContent);
            const select = row.querySelector('select');

            // Clear existing options
            select.innerHTML = '';

            // Populate options from 0 to maxScore
            for (let i = 0; i <= maxScore; i++) {
                const option = document.createElement('option');
                option.value = i;
                option.textContent = i;
                select.appendChild(option);
            }
        });
    }


 // Function to update the total score
 function updateTotal() {
            const selects = document.querySelectorAll('.selectme');
            let total = 0;

            selects.forEach(select => {
                total += parseInt(select.value);
            });

            // Update the total score in the last row
            const totalScoreElement = document.getElementById('totalScore');
            totalScoreElement.textContent = total;
        }


    // Call the function to populate options
    populateOptions();



    
</script>
@endsection

    </div>
    <!-- /Page Wrapper -->  
@endsection