@extends('dashboard.layouts.app')

@section('content')
    <div class="container mt-5 col-lg-8 col-xl-8 col-md-12 col-sm-12">
        <div class="card m-2 p-2">
            <div class="card-header d-flex justify-content-between">
                <h4>Change Email Address</h4>
                <a href="{{route('dashboard.user.account.settings')}}" class="btn btn-primary">Go back to settings</a>
            </div>
            @include('notifications.flash_messages')
            <div>
                <form action="{{route('dashboard.user.update-email', $user->id)}}" method="post">
                    @csrf @method('PUT')
                    <div class="form-group">
                        <label for="">Password <span class="">*</span></label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Email <span class="">*</span></label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{old('email') ?? $user->email}}">
                        @error('email')
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
