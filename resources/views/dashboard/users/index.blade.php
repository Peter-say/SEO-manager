@extends('dashboard.layouts.app')

@section('content')
    <div class="container mt-5">
        <!-- Responsive Table -->
        <div class="card">
            @include('notifications.flash_messages')
            <div class="d-flex justify-content-between">
                <h5 class="">App Users</h5>
                <a href="" class="btn btn-primary btn-sm m-0">Add User</a>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr class="text-nowrap">
                            <th>#</th>
                            <th>Name</th>
                            <th>Profile Picture</th>
                            <th>Email</th>
                            <th>Phone No.</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Joined</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td class="{{ $user->role === 'is_admin' ? 'admin' : '' }}">{{ $user->name }}</td>
                                <td><img class="img-fluid w-50 h-50"
                                        src="{{ asset($user->picture ?? 'assets/img/avatars/avatar.jpeg') }}"
                                        alt="profile"></td>
                                <td>{{ $user->email ?? 'N/A' }}</td>
                                <td>{{ $user->phone_number ?? 'N/A' }}</td>
                                <td>{{ $user->address ?? 'N/A' }}</td>
                                <td>{{ $user->status ?? 'N/A' }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <form class="dropdown-item"
                                                action="{{ route('dashboard.users.delete.user', $user->id) }}" method="POST">
                                                @method("DELETE") @csrf
                                                <button class="btn btn-danger" type="submit"> Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

        </div>
        <!--/ Responsive Table -->
    </div>
@endsection
