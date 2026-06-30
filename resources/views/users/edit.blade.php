@extends('layouts.app')

@section('content')
<h1>Edit User: {{ $user->name }}</h1>

<div class="instruction-panel">
    <button class="instruction-panel-toggle" aria-expanded="false" aria-controls="help-edit-user">
        <span>ℹ️ How to use this page</span>
        <span class="instruction-chevron">▼</span>
    </button>
    <div class="instruction-panel-body" id="help-edit-user">
        <p><strong>Update this user's account details.</strong> The Employee ID and Email address cannot be changed here.</p>
        <ul>
            <li><strong>Full Name:</strong> Update if the employee's name has changed.</li>
            <li><strong>Role:</strong> Changing the role takes effect immediately — it will update which documents and sections they can access on their next page load.</li>
            <li><strong>Status:</strong> <em>Active</em> = can log in &nbsp;·&nbsp; <em>Inactive</em> = blocks login without deleting the account &nbsp;·&nbsp; <em>Pending</em> = awaiting activation.</li>
            <li>Click <em>Save Changes</em> when done. To reset their password, go back to the Users list and use the 🔑 Reset Password button.</li>
        </ul>
    </div>
</div>

<form method="POST" action="{{ route('users.update', $user) }}" class="form-card">
    @csrf
    @method('PUT')

    <label for="name">Full Name</label>
    <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>

    <p class="muted">
        Employee ID: <strong>{{ $user->employee_id }}</strong> (cannot be changed)
        &nbsp;&mdash;&nbsp;
        Email: <strong>{{ $user->email }}</strong> (cannot be changed)
    </p>

    <label for="role">Role</label>
    <select id="role" name="role" required>
        @foreach(['staff','manager','auditor','admin'] as $role)
            <option value="{{ $role }}" @selected(old('role', $user->role) === $role)>{{ ucfirst($role) }}</option>
        @endforeach
    </select>

    <label for="status">Status</label>
    <select id="status" name="status" required>
        <option value="active"   @selected(old('status', $user->status) === 'active')>Active — can log in</option>
        <option value="pending"  @selected(old('status', $user->status) === 'pending')>Pending — awaiting activation</option>
        <option value="inactive" @selected(old('status', $user->status) === 'inactive')>Inactive — login blocked</option>
    </select>

    <div style="display:flex; gap:12px; flex-wrap:wrap; margin-top:8px;">
        <button type="submit" class="btn btn-primary btn-lg">💾 Save Changes</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary btn-lg">← Back to Users</a>
    </div>
</form>
@endsection
