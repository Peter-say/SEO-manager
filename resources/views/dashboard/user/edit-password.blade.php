@extends('dashboard.layouts.app')

@section('content')
    <div class="container col-lg-8 col-xl-8 col-md-12 col-sm-12">
        <div class="card m-2 p-2">
            <div class="card-header text-center">
                <h4>Change Password</h4>
            </div>
            @include('notifications.flash_messages')
            <div>
                <form action="{{ route('dashboard.user.update-password') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Old Password <span class="">*</span></label>
                        <input type="password" class="form-control @error('old_password') is-invalid @enderror"
                            name="old_password">
                        @error('old_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">New Password <span class="">*</span></label>
                        <input type="password" class="form-control @error('new_password') is-invalid @enderror"
                            name="new_password">
                        @error('new_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Confirm Password <span class="">*</span></label>
                        <input type="password" class="form-control @error('new_password_confirmation') is-invalid @enderror"
                            name="new_password_confirmation">
                        @error('new_password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <button class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
