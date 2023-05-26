@extends('dashboard.layouts.app')

@section('content')
    <div class="container mt-5 ">
        <div class="card p-5">
            @include('notifications.flash_messages')
            <div class="d-flex justify-content-between">
                <h5 class="">Writers Applications</h5>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr class="text-nowrap">
                            <th>#</th>
                            <th>User Email</th>
                            <th>Blog Niche</th>
                            <th>Expirience</th>
                            <th>Salary</th>
                            <th>Resume</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($applications as $application)
                            <tr>
                                @php
                                    $role = 'is_author';
                                @endphp
                                <td>{{ $application->id }}</td>
                                <td>{{ $application->user->email }}</td>
                                <td>{{ $application->niche->name }}</td>
                                <td>{{ $application->yrs_of_expirience }}</td>
                                <td>{{ $application->salary }}</td>
                                <td><iframe src="{{ asset($application->resume) }}" class="img-fluid" frameborder="0"></iframe>
                                </td>
                                <td>
                                    <div>
                                        <a onclick="return  confirm ('Are you sure of the action?')"
                                            href="{{ route('dashboard.application.writer.approve', ['id' => $application->user->id, 'role' => $role]) }}"
                                            class="btn btn-success">Approve</a>
                                        <a href="" class="btn btn-danger">Disapprove</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

        </div>
    </div>
@endsection
