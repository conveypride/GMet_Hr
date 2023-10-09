@extends('layouts.job')
@section('content')

@section('csss')
   
     <!-- Template Stylesheet -->
     <link href="{{ URL::to('assets/js/lib/css/style.css') }}" rel="stylesheet">
       <link rel="stylesheet" href="{{ URL::to('assets/css/lib/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/css/lib/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/css/lib/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/css/lib/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/css/lib/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/css/lib/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/css/lib/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/css/lib/css/gijgo.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/css/lib/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/css/lib/css/slicknav.css') }}">

    <link rel="stylesheet" href="{{ URL::to('assets/css/lib/css/style.css') }}">
@endsection
    
    <!-- header-start -->
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid ">
                    <div class="header_bottom_border">
                        <div class="row align-items-center">
                            <div class="col-xl-3 col-lg-2">
                                <div class="logo">
                                    <a href="{{ route('home') }}">
                                        <!-- <img src="img/logo.png" alt=""> -->
                                        <h3 class="text-white">GMet</h3>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-7">
                                <div class="main-menu  d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a href="{{ route('home') }}">Home</a></li>
                                            <li><a href="{{ route('form/job/list') }}"> Apply Job</a></li>
                                            <li><a href="#">Job Details </a></li> 
                                            <li><a href="#">Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                                <div class="Appointment">
                                    <div class="phone_num d-none d-xl-block">
                                        <a href="{{ route('login') }}">Log in</a>
                                    </div>
                                    <!-- <div class="d-none d-lg-block">
                                        <a class="boxed-btn3" href="#">Post a Job</a>
                                    </div> -->
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->

    <!-- slider_area_start -->
    <div class="slider_area">
        <div class="single_slider  d-flex align-items-center slider_bg_1">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-6">
                        <div class="slider_text">
                            <h5 class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".2s">Ready To Build Your Career?</h5>
                            <h3 class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".3s">Work With GMet</h3>
                            <p class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".4s">We provide the best working environment for you to grow.</p>
                            <div class="sldier_btn wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".5s">
                                <a href="{{ route('form/job/list') }}" class="boxed-btn3">Apply Now!!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ilstration_img wow fadeInRight d-none d-lg-block text-right" data-wow-duration="1s" data-wow-delay=".2s">
            <img src="{{ asset('assets/img/img/banner/illustration.png')}}" alt="">
        </div>
    </div>
    <!-- slider_area_end -->

    <!-- catagory_area -->
    {{-- <div class="catagory_area">
        <div class="container">
            <div class="row cat_search">
                <div class="col-lg-3 col-md-4">
                    <div class="single_input">
                        <input type="text" placeholder="Search keyword">
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="single_input">
                        <select class="wide" >
                            <option data-display="Location">Location</option>
                            <option value="1">East Legon(Head Office)</option>
                            <option value="2">Airport Residential Area(KIAMO)</option>
                            <option value="4">Sylet</option>
                          </select>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="single_input">
                        <select class="wide">
                            <option data-display="Category">Category</option>
                            <option value="1">Adminstration</option>
                            <option value="2">Meteorology</option>
                            <option value="4">Technician</option>
                          </select>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="job_btn">
                        <a href="#" class="boxed-btn3">Find Job</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="popular_search d-flex align-items-center">
                        <span>Popular Search:</span>
                        <ul>
                            <li><a href="#">Design & Creative</a></li>
                            <li><a href="#">Marketing</a></li>
                            <li><a href="#">Administration</a></li>
                            <li><a href="#">Training & Education</a></li>
                            <li><a href="#">Engineering</a></li>
                            <li><a href="#">Software & Web</a></li>
                            <li><a href="#">Meteorology</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!--/ catagory_area -->

    <!-- popular_catagory_area_start  -->
    {{-- <div class="popular_catagory_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title mb-40">
                        <h3>Popolar Categories</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="single_catagory">
                        <a href="jobs.html"><h4>Meteorology</h4></a>
                        <p> <span>5</span> Available position</p>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="single_catagory">
                        <a href="jobs.html"><h4>Marketing</h4></a>
                        <p> <span>6</span> Available position</p>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="single_catagory">
                        <a href="jobs.html"><h4>Cleaning</h4></a>
                        <p> <span>15</span> Available position</p>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="single_catagory">
                        <a href="jobs.html"><h4>Software & Web</h4></a>
                        <p> <span>10</span> Available position</p>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="single_catagory">
                        <a href="jobs.html"><h4>Administration</h4></a>
                        <p> <span>12</span> Available position</p>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="single_catagory">
                        <a href="jobs.html"><h4>Training & Education</h4></a>
                        <p> <span>8</span> Available position</p>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="single_catagory">
                        <a href="jobs.html"><h4>Engineering</h4></a>
                        <p> <span>5</span> Available position</p>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="single_catagory">
                        <a href="jobs.html"><h4> Security Personnel</h4></a>
                        <p> <span>4</span> Available position</p>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- popular_catagory_area_end  -->

    <!-- job_listing_area_start  -->
    <div class="job_listing_area">
        <div class="container my-3 py-2">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="section_title">
                        <h3>Job Listing</h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="brouse_job text-right">
                        <a href="{{ route('form/job/list') }}" class="boxed-btn4">Browse More Job</a>
                    </div>
                </div>
            </div>
            <div class="job_lists">
                <div class="row">
                    @if (!empty($job_list))
                        
                   
                    @foreach ($job_list as $list)
                      @php
                        $date = $list->created_at;
                        $date = Carbon\Carbon::parse($date);
                        $elapsed =  $date->diffForHumans();
                    @endphp
                    <div class="col-lg-12 col-md-12">
                        <div class="single_jobs white-bg d-flex justify-content-between">
                            <div class="jobs_left d-flex align-items-center">
                                <div class="thumb">
                                    <img src="{{ asset('assets/img/favicon.jpg')}}" alt="">
                                </div>
                                <div class="jobs_conetent">
                                    <a href="job_details.html"><h4>{{ $list->job_title }}</h4></a>
                                    <div class="links_locat d-flex align-items-center">
                                        <div class="location">
                                            <p> <i class="fa fa-map-marker"></i>{{ $list->job_location }}</p>
                                        </div>
                                        <div class="location">
                                            <p> <i class="fa fa-clock-o"></i>{{ $list->job_type }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="jobs_right">
                                <div class="apply_now">
                                    <a class="heart_mark" href="#"> <i class="ti-heart"></i> </a>
                                    <a href="{{ url('form/job/view/'.$list->id) }}" class="boxed-btn3">Apply Now</a>
                                </div>
                                <div class="date">
                                    <p> Posted: {{ $elapsed }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                       @endforeach
                       @else
                       <div class="col-lg-12 col-md-12">
                        No Jobs Available...😢
                       </div>
                       @endif
                     
                
                </div>
            </div>
        </div>
    </div>
    <!-- job_listing_area_end  -->

    <!-- featured_candidates_area_start  -->
    <div class="featured_candidates_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title text-center mb-40">
                        <h3>Panel Memebers</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="candidate_active owl-carousel">
                        <div class="single_candidates text-center">
                            <div class="thumb">
                                <img src="{{ asset('assets/img/img/candiateds/1.jpg')}}" alt="">
                            </div>
                            <a href="#"><h4>Eric Asuman</h4></a>
                            <p>Director General</p>
                        </div>
                        <div class="single_candidates text-center">
                            <div class="thumb">
                                <img src="{{ asset('assets/img/img/candiateds/2.jpg')}}" alt="">
                            </div>
                            <a href="#"><h4>Mrs Gifty S.Dua</h4></a>
                            <p>Human Resource</p>
                        </div>
                        <div class="single_candidates text-center">
                            <div class="thumb">
                                <img src="{{ asset('assets/img/img/candiateds/3.jpg')}}" alt="">
                            </div>
                            <a href="#"><h4>Mr George Isaac Amoo</h4></a>
                            <p>Chairman</p>
                        </div>
                        <div class="single_candidates text-center">
                            <div class="thumb">
                                <img src="{{ asset('assets/img/img/candiateds/4.jpg')}}" alt="">
                            </div>
                            <a href="#"><h4>Mrs Magdalene Ewuraesi Apenteng</h4></a>
                            <p>Member</p>
                        </div>
                        <div class="single_candidates text-center">
                            <div class="thumb">
                                <img src="{{ asset('assets/img/Circle-icons-profile.png')}}" alt="">
                            </div>
                            <a href="#"><h4>Madam Cecilia Sheitu Nyadia</h4></a>
                            <p>Member</p>
                        </div>
                        <div class="single_candidates text-center">
                            <div class="thumb">
                                <img src="{{ asset('assets/img/img/candiateds/5.jpg')}}" alt="">
                            </div>
                            <a href="#"><h4>Mr Ben Yaw Ampomah</h4></a>
                            <p>Member</p>
                        </div>
                          
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- featured_candidates_area_end  -->

    <!-- <div class="top_companies_area">
        <div class="container">
            <div class="row align-items-center mb-40">
                <div class="col-lg-6 col-md-6">
                    <div class="section_title">
                        <h3>Top Companies</h3>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="brouse_job text-right">
                        <a href="jobs.html" class="boxed-btn4">Browse More Job</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="single_company">
                        <div class="thumb">
                            <img src="img/svg_icon/5.svg" alt="">
                        </div>
                        <a href="jobs.html"><h3>Snack Studio</h3></a>
                        <p> <span>50</span> Available position</p>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="single_company">
                        <div class="thumb">
                            <img src="img/svg_icon/4.svg" alt="">
                        </div>
                        <a href="jobs.html"><h3>Snack Studio</h3></a>
                        <p> <span>50</span> Available position</p>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="single_company">
                        <div class="thumb">
                            <img src="img/svg_icon/3.svg" alt="">
                        </div>
                        <a href="jobs.html"><h3>Snack Studio</h3></a>
                        <p> <span>50</span> Available position</p>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="single_company">
                        <div class="thumb">
                            <img src="img/svg_icon/1.svg" alt="">
                        </div>
                        <a href="jobs.html"><h3>Snack Studio</h3></a>
                        <p> <span>50</span> Available position</p>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <!-- job_searcing_wrap  -->
    {{-- <div class="job_searcing_wrap overlay">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 offset-lg-1 col-md-6">
                    <div class="searching_text">
                        <h3>Looking for a Job?</h3>
                        <p>We provide online instant cash loans with quick approval </p>
                        <a href="#" class="boxed-btn3">Browse Job</a>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1 col-md-6">
                    <div class="searching_text">
                        <h3>Looking for a Expert?</h3>
                        <p>We provide online instant cash loans with quick approval </p>
                        <a href="#" class="boxed-btn3">Post a Job</a>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- job_searcing_wrap end  -->

    <!-- testimonial_area  -->
    <div class="testimonial_area  ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title text-center mb-40">
                        <h3>Testimonial</h3>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="testmonial_active owl-carousel">
                        <div class="single_carousel">
                            <div class="row">
                                <div class="col-lg-11">
                                    <div class="single_testmonial d-flex align-items-center">
                                        <div class="thumb">
                                            <img src="{{ asset('assets/img/img/testmonial/author2.jpg')}}" alt="">
                                            <div class="quote_icon">
                                                <i class="Flaticon flaticon-quote"></i>
                                            </div>
                                        </div>
                                        <div class="info">
                                            <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering through public weather forecast and warning.</p>
                                            <span>- Stanley</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_carousel">
                            <div class="row">
                                <div class="col-lg-11">
                                    <div class="single_testmonial d-flex align-items-center">
                                        <div class="thumb">
                                            <img src="{{ asset('assets/img/img/testmonial/author2.jp')}}g" alt="">
                                            <div class="quote_icon">
                                                <i class=" Flaticon flaticon-quote"></i>
                                            </div>
                                        </div>
                                        <div class="info">
                                            <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering through public weather forecast and warning.</p>
                                            <span>- Stanley</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_carousel">
                            <div class="row">
                                <div class="col-lg-11">
                                    <div class="single_testmonial d-flex align-items-center">
                                        <div class="thumb">
                                            <img src="{{ asset('assets/img/img/testmonial/author2.jpg')}}" alt="">
                                            <div class="quote_icon">
                                                <i class="Flaticon flaticon-quote"></i>
                                            </div>
                                        </div>
                                        <div class="info">
                                            <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering through public weather forecast and warning.</p>
                                            <span>- Stanley</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /testimonial_area  -->


    <!-- footer start -->
    <footer class="footer">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                            <div class="footer_logo">
                                <a href="#">
                                    <!-- <img src="img/logo.png" alt=""> -->
                                    <h3 class="text-white">GMet</h3>
                                </a>
                            </div>
                            <p>
                                Gmet@gmail.com <br>
                                +233 873 672 6782 <br>
                                600/D, East Legon, Ghana
                            </p>
                            <div class="socail_links">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="ti-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-google-plus"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-lg-2">
                        <div class="footer_widget wow fadeInUp" data-wow-duration="1.1s" data-wow-delay=".4s">
                            <h3 class="footer_title">
                                Company
                            </h3>
                            <ul>
                                <li><a href="#">About </a></li>
                                <li><a href="#">Jobs</a></li>
                                <li><a href="#">Carrier Tips</a></li>
                                <li><a href="#">FAQ</a></li>
                            </ul>

                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget wow fadeInUp" data-wow-duration="1.2s" data-wow-delay=".5s">
                            <h3 class="footer_title">
                                Category
                            </h3>
                            <ul>
                                <li><a href="#">Design & Art</a></li>
                                <li><a href="#">Meteorology</a></li>
                                <li><a href="#">Marketing</a></li>
                                <li><a href="#">Finance</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="footer_widget wow fadeInUp" data-wow-duration="1.3s" data-wow-delay=".6s">
                            <h3 class="footer_title">
                                Subscribe
                            </h3>
                            <form action="#" class="newsletter_form">
                                <input type="text" placeholder="Enter your mail">
                                <button type="submit">Subscribe</button>
                            </form>
                            <p class="newsletter_text">Esteem spirit temper too say adieus who direct esteem esteems
                                luckily.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right_text wow fadeInUp" data-wow-duration="1.4s" data-wow-delay=".3s">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row">
                    <div class="col-xl-12">
                        <p class="copy_right text-center">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | GMet <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#" target="_blank"> TheoPortfolio</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--/ footer end  -->

    @section('script')
    {{-- {{ URL::to('assets/js/chart.js') }} --}}
    
  
    <script src="{{ URL::to('assets/js/lib/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/lib/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/lib/js/popper.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/lib/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/lib/js/owl.carousel.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/lib/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/lib/js/ajax-form.js') }}"></script>
    <script src="{{ URL::to('assets/js/lib/js/waypoints.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/lib/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/lib/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/lib/js/scrollIt.js') }}"></script>
    <script src="{{ URL::to('assets/js/lib/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/lib/js/wow.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/lib/js/nice-select.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/lib/js/jquery.slicknav.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/lib/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/lib/js/plugins.js') }}"></script>
    <script src="{{ URL::to('assets/js/lib/js/gijgo.min.js') }}"></script>
    <!--contact js-->
    <script src="{{ URL::to('assets/js/lib/js/contact.js') }}"></script>
    <script src="{{ URL::to('assets/js/lib/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/lib/js/jquery.form.js') }}"></script>
    <script src="{{ URL::to('assets/js/lib/js/jquery.validate.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/lib/js/mail-script.js') }}"></script>


    <script src="{{ URL::to('assets/js/lib/js/main.js') }}"></script>
    @endsection

@endsection
