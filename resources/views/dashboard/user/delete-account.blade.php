@extends('dashboard.layouts.app')

@section('content')
    <div class="container mt-5">
        <!-- Content -->

        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h5>Delete Account</h5>
            <a href="{{route('dashboard.user.account.settings')}}" class="btn btn-primary">Go back to settings</a>
            </div>

            <div class="card-body">
                @include('notifications.flash_messages')
                <div class="mb-3 col-12 mb-0">
                    <div class="alert alert-warning">
                        <h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete your account?</h6>
                        <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
                    </div>
                </div>
                <form action="{{ route('dashboard.user.delete-account', $id) }}" enctype="multipart/form-data" method="post">
                    @csrf @method('DELETE')
                    <div class="form-check mb-3 ">
                       <div class="form-group">
                        <label for="password" class="">Enter password to delete account:</label>
                        <input type="password" name="password" class="form-control" id="">
                       </div>
                        <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation" />
                        <label class="form-check-label" for="accountActivation">I confirm my account deactivation</label>
                    </div>
                    <button type="submit" class="btn btn-danger deactivate-account">Deactivate Account</button>
                </form>
            </div>
        </div>

        <!-- / Content -->
    </div>
@endsection
