@extends('dashboard.layouts.app')

@section('content')
    <div class="container mt-5">
        <!-- Content -->
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-2">
                <div class="card">
                    <h5 class="card-header">Reset Password</h5>
                    <div class="card-body d-flex justify-content-between">
                        Change Password Here!
                        <a href="{{route('dashboard.user.change-password')}}" class="btn btn-primary">Proceed</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-2">
                <div class="card">
                    <h5 class="card-header">Delete Account</h5>
                    <div class="card-body d-flex justify-content-between">
                        Remove your account
                        <a href="{{route('dashboard.user.fetch-account')}}" class="btn btn-danger">Proceed</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
    </div>
@endsection
