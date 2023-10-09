@extends('layouts.app')
@section('content')
    <div class="main-wrapper">
        <div class="account-content">
           
            <div class="container">
                <!-- Account Logo -->
                <div class="account-logo">
                    <a href="index.html"><img src="{{ URL::to('assets/img/logo2.jpg') }}" alt="#"></a>
                </div>
                {{-- message --}}
                {!! Toastr::message() !!}
                <!-- /Account Logo -->
                <div class="account-box">
                    <div class="account-wrapper">
                        <h3 class="account-title">Panel Sign-In</h3>
                        <p class="account-subtitle">Access to our dashboard</p>
                        <!-- Account Form -->
                        <form action="{{ route('panel/dashboard') }}" method="get">
                            @csrf
                            <div class="form-group">
                                <label>User-ID</label>
                                <input type="text" class="form-control @error('paneluserid') is-invalid @enderror" name="paneluserid" value="{{ old('paneluserid') }}" placeholder="Enter user-id">
                                @error('paneluserid')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label>Password</label>
                                    </div>
                                </div>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="form-group text-center">
                                <button class="btn btn-primary account-btn" type="submit"> Sign In</button>
                            </div>
                            
                        </form>
                        <!-- /Account Form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
