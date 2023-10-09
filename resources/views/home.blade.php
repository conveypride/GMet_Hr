@extends('layouts.app')

@section('content')
<div class="container">
    
    <a href="{{ route('form/job/list') }}" class="btn btn-primary apply-btn">Apply Job</a>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Welcome') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                            <h5> {{ __("Your account is being verified... This takes a maximum of 3days or less.") }}</h5>
                        </div>
                    @endif
                    <a class="btn btn-danger" href="{{ route('logoutt') }}">Logout</a>
                    {{ __('You are logged in!! Please hold tight. An admin will verify you soon') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
