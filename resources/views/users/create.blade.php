@extends('layouts.app')

@section('content')
<h1>Create New User</h1>

<div class="instruction-panel">
    <button class="instruction-panel-toggle" aria-expanded="false" aria-controls="help-create-user">
        <span><x-icon name="info" class="icon-sm" /> How to use this page</span>
        <span class="instruction-chevron">▼</span>
    </button>
    <div class="instruction-panel-body" id="help-create-user">
        <p><strong>Register a new staff member</strong> in the portal. A temporary password is generated automatically — you must share it with them after creation.</p>
        <ul>
            <li><strong>Full Name:</strong> Enter the employee's full name as it appears on their staff record.</li>
            <li><strong>Employee ID:</strong> Their unique company identifier (e.g. YQL-0042). Must not already exist in the system.</li>
            <li><strong>Email:</strong> Their work email address — used for login. Must be unique.</li>
            <li><strong>Role:</strong> Determines which documents and portal sections they can access. You can change this later.</li>
            <li><strong>Status:</strong> Set to <em>Active</em> so they can log in immediately, or <em>Pending</em> if the account needs approval first.</li>
            <li>After clicking <em>Create User</em>, the temporary password will appear on the next screen. Copy it and share it privately.</li>
            <li><strong>Send invitation email:</strong> Checked by default — emails the login link and temporary password to the address above. Uncheck if you'd rather share the credentials yourself.</li>
        </ul>
    </div>
</div>

<form method="POST" action="{{ route('users.store') }}" class="form-card">
    @csrf

    <label for="name">Full Name</label>
    <input type="text" id="name" name="name" value="{{ old('name') }}" required placeholder="e.g. John Banda">

    <label for="employee_id">Employee ID</label>
    <input type="text" id="employee_id" name="employee_id" value="{{ old('employee_id') }}" required placeholder="e.g. YQL-0042">

    <label for="email">Email Address</label>
    <input type="email" id="email" name="email" value="{{ old('email') }}" required placeholder="e.g. jbanda@yellowquip.com">

    <label for="role">Role</label>
    <select id="role" name="role" required>
        @foreach(['staff','manager','auditor','admin'] as $role)
            <option value="{{ $role }}" @selected(old('role') === $role)>{{ ucfirst($role) }}</option>
        @endforeach
    </select>

    <label for="status">Status</label>
    <select id="status" name="status" required>
        <option value="active"   @selected(old('status', 'active') === 'active')>Active — can log in immediately</option>
        <option value="pending"  @selected(old('status') === 'pending')>Pending — awaiting activation</option>
        <option value="inactive" @selected(old('status') === 'inactive')>Inactive — login blocked</option>
    </select>

    <label class="checkbox-row" for="send_invitation">
        <input type="checkbox" id="send_invitation" name="send_invitation" value="1" @checked(old('send_invitation', true))>
        Send invitation email to this user
    </label>

    <p class="muted"><x-icon name="key" class="icon-sm" /> A temporary password will be generated automatically and shown after you click Create User. Share it with the new user privately.</p>

    <button type="submit" class="btn btn-primary btn-lg" style="margin-top:6px;"><x-icon name="check-circle" class="icon-sm" /> Create User</button>
</form>
@endsection
