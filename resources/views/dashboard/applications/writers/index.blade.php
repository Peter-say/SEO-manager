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
                                    $approveAuthor = 'is_author';
                                    $removeAsAuthor = 'is_user';
                                    //status
                                    $ApprovedStatus = 'Approved';
                                    $PendingStatus = 'Pending';
                                    $RejectedStatus = 'Rejected';
                                    
                                @endphp
                                <td>{{ $application->id }}</td>
                                <td>{{ $application->user->email }}</td>
                                <td>{{ $application->niche->name }}</td>
                                <td>{{ $application->yrs_of_expirience . 'years' }}</td>
                                <td>{{ '$' . $application->salary }}</td>
                                <td><iframe src="{{ asset($application->resume) }}" class="img-fluid" frameborder="0"></iframe>
                                </td>
                                <td>
                                    @if ($application->user->role == 'is_user')
                                        <div>
                                            <a onclick="return  confirm ('Are you sure of the action?')"
                                                href="{{ route('dashboard.application.writer.approve', ['id' => $application->user->id, 'role' => $approveAuthor]) }}"
                                                class="btn btn-success">Approve</a>
                                            <a href="" class="btn btn-danger">Disapprove</a>
                                        </div>
                                    @elseif ($application->status == 'Pending')
                                        <a onclick="return  confirm ('Are you sure of the action?')"
                                            href="{{ route('dashboard.application.writer.update.status', ['id' => $application->id, 'status' => $ApprovedStatus]) }}"
                                            class="btn btn-success">Mark As Approve</a>
                                    @elseif($application->user->role == 'is_author')
                                        <a onclick="return  confirm ('Are you sure of the action?')"
                                            href="{{ route('dashboard.application.writer.remove.author', ['id' => $application->user->id, 'role' => $removeAsAuthor]) }}"
                                            class="btn btn-danger">Remove as Author</a>
                                    @else
                                        <a onclick="return  confirm ('Are you sure of the action?')"
                                            href="{{ route('dashboard.application.writer.mark.as.pending', ['id' => $application->id, 'status' => $PendingStatus]) }}"
                                            class="btn btn-warning">Mark as pending</a>
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                    </tbody>`
                </table>

            </div>

        </div>
    </div>
@endsection
