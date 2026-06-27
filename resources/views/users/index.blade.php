@extends('layouts.app')

@section('content')
<h1>Manage Users</h1>
<a href="{{ route('users.create') }}" class="btn btn-primary">Create User</a>

<table class="data-table">
    <thead>
        <tr><th>Name</th><th>Employee ID</th><th>Email</th><th>Role</th><th>Status</th><th>Last Login</th><th>Actions</th></tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->employee_id }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ ucfirst($user->role) }}</td>
            <td>{{ ucfirst($user->status) }}</td>
            <td>{{ $user->last_login_at?->diffForHumans() ?? 'Never' }}</td>
            <td>
                <a href="{{ route('users.edit', $user) }}">Edit</a>
                | <form method="POST" action="{{ route('users.reset-password', $user) }}" style="display:inline" onsubmit="return confirm('Reset password for this user?')">
                    @csrf
                    <button type="submit" class="btn-link">Reset Password</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{{ $users->links() }}
@endsection
