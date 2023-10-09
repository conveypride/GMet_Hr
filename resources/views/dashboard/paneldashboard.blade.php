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
        <div class="mx-2 mt-5 p-2">
            <div class="row">
                <div class="col-md-12">
                    <div class="welcome-box">
                        <div class="welcome-img">
                            <img src="{{ asset('assets/img/Circle-icons-profile.png')}}" alt="#">
                        </div>
                        <div class="welcome-det">
                            <h3>Welcome, Gifty</h3>
                            <p>09/08/2023</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col">
                    <section class="dash-section">
                        <h1 class="dash-sec-title">Today You Will Interview</h1>
                        <div class="dash-sec-content">
                            <div class="dash-info-list">
                                <a href="{{ route('panel/interviewform') }}" class="dash-card text-danger">
                                    <div class="dash-card-container">
                                        <div class="dash-card-icon">
                                            <i class="fa fa-hourglass-o"></i>
                                        </div>
                                        <div class="dash-card-content">
                                            <p>Richard Miles </p>
                                        </div>
                                        <div class="dash-card-content">
                                            <div class="row p-2">
                                                <div class="col-6">
                                                    <button class="btn btn-danger btn-sm">Cover.L</button>
                                                </div>
                                                <div class="col-6">
                                                    <button class="btn btn-danger btn-sm ">Cv</button>
                                                </div>
                                            </div>  </div>
                                        <div class="dash-card-avatars">
                                            <div class="e-avatar"><img src="{{ asset('assets/img/Circle-icons-profile.png')}}" alt=""></div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="dash-info-list">
                                <a href="{{ route('panel/interviewform') }}" class="dash-card text-danger">
                                    <div class="dash-card-container">
                                        <div class="dash-card-icon">
                                            <i class="fa fa-hourglass-o"></i>
                                        </div>
                                        <div class="dash-card-content">
                                            <p>Samuella Feko </p>
                                        </div>
                                        <div class="dash-card-content">
                                            <div class="row p-2">
                                                <div class="col-6">
                                                    <button class="btn btn-danger btn-sm">Cover.L</button>
                                                </div>
                                                <div class="col-6">
                                                    <button class="btn btn-danger btn-sm ">Cv</button>
                                                </div>
                                            </div>  </div>
                                        <div class="dash-card-avatars">
                                            <div class="e-avatar"><img src="{{ asset('assets/img/Circle-icons-profile.png')}}" alt=""></div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="dash-info-list">
                                <a href="{{ route('panel/interviewform') }}" class="dash-card text-danger">
                                    <div class="dash-card-container">
                                        <div class="dash-card-icon">
                                            <i class="fa fa-hourglass-o"></i>
                                        </div>
                                        <div class="dash-card-content">
                                            <p>Mensah Jopin </p>
                                        </div>
                                        <div class="dash-card-content">
                                            <div class="row p-2">
                                                <div class="col-6">
                                                    <button class="btn btn-danger btn-sm">Cover.L</button>
                                                </div>
                                                <div class="col-6">
                                                    <button class="btn btn-danger btn-sm ">Cv</button>
                                                </div>
                                            </div>  </div>
                                        <div class="dash-card-avatars">
                                            <div class="e-avatar"><img src="{{ asset('assets/img/Circle-icons-profile.png')}}" alt=""></div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="dash-info-list">
                                <a href="{{ route('panel/interviewform') }}" class="dash-card text-danger">
                                    <div class="dash-card-container">
                                        <div class="dash-card-icon">
                                            <i class="fa fa-hourglass-o"></i>
                                        </div>
                                        <div class="dash-card-content">
                                            <p>Karen Kwofie </p>
                                        </div>
                                        <div class="dash-card-content">
                                            <div class="row p-2">
                                                <div class="col-6">
                                                    <button class="btn btn-danger btn-sm">Cover.L</button>
                                                </div>
                                                <div class="col-6">
                                                    <button class="btn btn-danger btn-sm ">Cv</button>
                                                </div>
                                            </div>  </div>
                                        <div class="dash-card-avatars">
                                            <div class="e-avatar"><img src="{{ asset('assets/img/Circle-icons-profile.png')}}" alt=""></div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                        </div>
                    </section>

                    <section class="dash-section">
                        <h1 class="dash-sec-title">Tomorrow</h1>
                        <div class="dash-sec-content">
                            <div class="dash-info-list">
                                <div class="dash-card">
                                    <div class="dash-card-container">
                                        <div class="dash-card-icon">
                                            <i class="fa fa-suitcase"></i>
                                        </div>
                                        <div class="dash-card-content">
                                            <p>6 people will interviewed tomorrow</p>
                                        </div>
                                        <div class="dash-card-avatars">
                                            <a href="#" class="e-avatar"><img src="{{ asset('assets/img/Circle-icons-profile.png')}}" alt=""></a>
                                            <a href="#" class="e-avatar"><img  src="{{ asset('assets/img/Circle-icons-profile.png')}}" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="dash-section">
                        <h1 class="dash-sec-title">Next seven days</h1>
                        <div class="dash-sec-content">
                            <div class="dash-info-list">
                                <div class="dash-card">
                                    <div class="dash-card-container">
                                        <div class="dash-card-icon">
                                            <i class="fa fa-suitcase"></i>
                                        </div>
                                        <div class="dash-card-content">
                                            <p>15 people will be interviewed</p>
                                        </div>
                                        <div class="dash-card-avatars">
                                            <a href="#" class="e-avatar"><img src="{{ asset('assets/img/Circle-icons-profile.png')}}" alt=""></a>
                                            <a href="#" class="e-avatar"><img src="{{ asset('assets/img/Circle-icons-profile.png')}}" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="dash-info-list">
                                <div class="dash-card">
                                    <div class="dash-card-container">
                                        <div class="dash-card-icon">
                                            <i class="fa fa-user-plus"></i>
                                        </div>
                                        <div class="dash-card-content">
                                            <p>Your first day is going to be  on Thursday</p>
                                        </div>
                                        <div class="dash-card-avatars">
                                            <div class="e-avatar"><img src="{{ asset('assets/img/Circle-icons-profile.png')}}" alt=""></div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            {{-- <div class="dash-info-list">
                                <a href="" class="dash-card">
                                    <div class="dash-card-container">
                                        <div class="dash-card-icon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <div class="dash-card-content">
                                            <p>It's Spring Bank Holiday  on Monday</p>
                                        </div>
                                    </div>
                                </a>
                            </div> --}}
                        </div>
                    </section>
                </div>

                <div class="col-lg-4 col-md-4">
                    <div class="dash-sidebar">
                        <section>
                            <h5 class="dash-title">People Interviewed</h5>
                            <div class="card">
                                <div class="card-body">
                                    <div class="time-list">
                                        <div class="dash-stats-list">
                                            <h4>71</h4>
                                            <p>Total Interviewed</p>
                                        </div>
                                        <div class="dash-stats-list">
                                            <h4>4</h4>
                                            <p>Upcoming Interview</p>
                                        </div>
                                    </div>
                                    <div class="request-btn">
                                        <div class="dash-stats-list">
                                            <h4>50</h4>
                                            <p>Total Suggested Hired</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section>
                            <h5 class="dash-title">Review Interview</h5>
                            <div class="card">
                                <div class="card-body">
                                    <div class="time-list">
                                        <div class="dash-stats-list">
                                            <h6 class="text-danger">
                                                <div id="countdown">
                                                <span id="days"></span> Days
                                                <span id="hours"></span> Hrs
                                                <span id="minutes"></span>:
                                                <span id="seconds"></span> 
                                            </div></h6>
                                            <p>Time Left</p>
                                        </div>
                                        <div class="dash-stats-list">
                                            <h4>12</h4>
                                            <p>Interview(s) Awaiting Final Submission</p>
                                        </div>
                                    </div>
                                    <div class="request-btn">
                                        <a href="#" class="btn add-btn btn-primary" data-toggle="modal" data-target="#review"><i class="fa fa-plus"></i>Review</a>
                                         
                                    </div>
                                </div>
                            </div>
                        </section>
                        {{-- <section>
                            <h5 class="dash-title">Your time off allowance</h5>
                            <div class="card">
                                <div class="card-body">
                                    <div class="time-list">
                                        <div class="dash-stats-list">
                                            <h4>5.0 Hours</h4>
                                            <p>Approved</p>
                                        </div>
                                        <div class="dash-stats-list">
                                            <h4>15 Hours</h4>
                                            <p>Remaining</p>
                                        </div>
                                    </div>
                                    <div class="request-btn">
                                        <a class="btn btn-primary" href="#">Apply Time Off</a>
                                    </div>
                                </div>
                            </div>
                        </section> --}}

                        <section>
                            <h5 class="dash-title">Pass Mark For Interview Today</h5>
                            <div class="card">
                                <div class="card-body text-center">
                                    <h4 class="holiday-title mb-0">60%</h4>
                                </div>
                            </div>
                        </section>

                        <section>
                            <h5 class="dash-title">Upcoming Panel Meeting</h5>
                            <div class="card">
                                <div class="card-body text-center">
                                    <h4 class="holiday-title mb-0">Mon 1 Oct 2023 </h4>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
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
    // Set the target date and time for the countdown (year, month (0-11), day, hour, minute, second)
    const targetDate = new Date(2023, 08, 18, 23, 59, 59);

    function updateCountdown() {
        const currentDate = new Date();
        const timeLeft = targetDate - currentDate;

        if (timeLeft < 0) {
            // Countdown has ended
            document.getElementById("countdown").innerHTML = "Countdown has ended!";
            return;
        }

        const days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
        const hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

document.getElementById("days").textContent = days;
document.getElementById("hours").textContent = hours;
document.getElementById("minutes").textContent = minutes;
document.getElementById("seconds").textContent = seconds;
    }

    // Update the countdown every second
    setInterval(updateCountdown, 1000);

    // Initial call to set up the initial countdown values
    updateCountdown();
</script>
@endsection

    </div>
    <!-- /Page Wrapper -->  
@endsection