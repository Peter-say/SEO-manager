@extends('dashboard.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="">
            <h4 class="fw-bold py-3 mb-1"><span class="text-muted fw-light">Settings/ </span> Users Role</h4>
        </div>
        <div class="card">
            <h5 class="card-header">Responsive Table</h5>
            <div class="">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Change Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $user)
                            <tr>
                                <th>{{ $user->name }}</th>
                                <th>{{ $user->email }}</th>
                                <th>{{ $user->role }}</th>
                                <td>

                                    <div class="btn-group">
                                        <button type="button" class=" dropdown-toggle" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            Change Role
                                        </button>
                                        <ul class="dropdown-menu">
                                            @foreach (['is_admin', 'is_moderator', 'is_author', 'is_user'] as $role)
                                                <li><a class="dropdown-item"
                                                        onclick="return  confirm ('Are you sure of the action?')"
                                                        href="{{ route('dashboard.users.role.update', ['id' => $user->id, 'role' => $role]) }}">
                                                        Change as {{ ucfirst($role) }}</a>
                                                    </li>
                                            @endforeach
                                        </ul>
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
