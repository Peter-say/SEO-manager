@extends('dashboard.layouts.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-1">Settings</h4>
    </div>

    <div class="container-fluid mb-5">
        <div class="card mt-2">
            <div class="card-header">
                <h5>Permissions/Roles</h5>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between">
                        <span> View, Add or remove role from users</span>
                        <span><a href="{{ route('dashboard.role') }}" class="btn btn-primary">Proceed</a></span>
                </div>
            </div>
        </div>
        <div class="card mt-2">
            <div class="card-header">
                <h5>Permissions/Roles</h5>
            </div>
            <div class="card-body">
                Add or remove permission from users
            </div>
        </div>
        <div class="card mt-2">
            <div class="card-header">
                <h5>Permissions/Roles</h5>
            </div>
            <div class="card-body">
                Add or remove permission from users
            </div>
        </div>
    </div>
@endsection
