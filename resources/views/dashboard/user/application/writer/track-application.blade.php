@extends('dashboard.layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="head d-flex justify-content-between p-3">
                <h4>Manage Application</h4>
                <div class="d-flex justify-content-around">
                    <a href="" class="btn btn-primary btn-sm pb-0">Edit</a>
                    <a href="" class="btn btn-danger btn-sm pb-0">Delete</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                        <b>Niche</b>: <span>{{ $application->niche->name }}</span>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                        <b>Years Of Expirience</b>: <span>{{ $application->yrs_of_expirience . 'years' }}</span>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                        <b>Salary Expectation</b>: <span>{{ '$' . $application->salary }}</span>
                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 mt-5">
                        <embed src="{{ asset($application->resume) }}"  style="width:100%; height: 80vh">
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
