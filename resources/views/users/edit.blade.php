@extends('layouts.app')

@section('content')
<h1>Edit User: {{ $user->name }}</h1>

<form method="POST" action="{{ route('users.update', $user) }}" class="form-card">
    @csrf
    @method('PUT')

    <label for="name">Full Name</label>
    <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>

    <p class="muted">Employee ID: {{ $user->employee_id }} (not editable) &mdash; Email: {{ $user->email }}</p>

    <label for="role">Role</label>
    <select id="role" name="role" required>
        @foreach(['staff','manager','auditor','admin'] as $role)
            <option value="{{ $role }}" @selected(old('role', $user->role) === $role)>{{ ucfirst($role) }}</option>
        @endforeach
    </select>

    <label for="status">Status</label>
    <select id="status" name="status" required>
        @foreach(['active','pending','inactive'] as $status)
            <option value="{{ $status }}" @selected(old('status', $user->status) === $status)>{{ ucfirst($status) }}</option>
        @endforeach
    </select>

    <button type="submit" class="btn btn-primary">Save Changes</button>
</form>
@endsection
