@extends('dashboard.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="">
            <h4 class="fw-bold py-3 mb-1"><a href="{{ route('dashboard.settings') }}" class="text-muted fw-light">Settings/
                </a> Users Role</h4>
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
                            @php
                                $rolebackground = '';
                                $role = $user->role;
                                if ($role == 'is_admin') {
                                    $rolebackground = 'bg-success';
                                }
                                if ($role == 'is_moderator') {
                                    $rolebackground = 'bg-primary';
                                }
                                if ($role == 'is_author') {
                                    $rolebackground = 'bg-secondary';
                                }

                                if (Auth::user()->role == 'is_admin') {
                                    $admin = true;
                                }

                            @endphp

                            <tr class="{{ $rolebackground }}" style="@disabled({{ $admin }})">
                                <th>{{ $user->name }}</th>
                                <th>{{ $user->email }}</th>
                                <th>{{ $user->role }}</th>
                                <td>

                                    @if ($user->role == 'is_admin')
                                        <p>You can't edit this</p>
                                    @else
                                        <div class="btn-group">
                                            <button type="button" class=" dropdown-toggle" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                Change Role
                                            </button>
                                            <ul class="dropdown-menu" @disabled(true)>
                                                @foreach (['is_admin', 'is_moderator', 'is_author', 'is_user'] as $role)
                                                    <li><a class="dropdown-item"
                                                            onclick="return  confirm ('Are you sure of the action?')"
                                                            href="{{ route('dashboard.users.role.update', ['id' => $user->id, 'role' => $role]) }}">
                                                            Change as {{ ucfirst($role) }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
