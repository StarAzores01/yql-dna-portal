@extends('layouts.app')

@section('content')
<h1>Create User</h1>

<form method="POST" action="{{ route('users.store') }}" class="form-card">
    @csrf

    <label for="name">Full Name</label>
    <input type="text" id="name" name="name" value="{{ old('name') }}" required>

    <label for="employee_id">Employee ID</label>
    <input type="text" id="employee_id" name="employee_id" value="{{ old('employee_id') }}" required>

    <label for="email">Email</label>
    <input type="email" id="email" name="email" value="{{ old('email') }}" required>

    <label for="role">Role</label>
    <select id="role" name="role" required>
        @foreach(['staff','manager','auditor','admin'] as $role)
            <option value="{{ $role }}">{{ ucfirst($role) }}</option>
        @endforeach
    </select>

    <label for="status">Status</label>
    <select id="status" name="status" required>
        <option value="active">Active</option>
        <option value="pending">Pending</option>
        <option value="inactive">Inactive</option>
    </select>

    <p class="muted">A temporary password will be generated automatically and shown after creation.</p>

    <button type="submit" class="btn btn-primary">Create User</button>
</form>
@endsection
