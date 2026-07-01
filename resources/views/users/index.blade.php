@extends('layouts.app')

@section('content')
<h1>Manage Users</h1>

{{-- Password reveal panel — shown after user creation or password reset --}}
@if(session('temp_password'))
<div class="pw-panel">
    <div class="pw-panel-title"><x-icon name="key" class="icon-sm" /> Temporary Password — Share Securely</div>
    <div class="pw-panel-body">
        This temporary password has been assigned to <strong>{{ session('new_user_info', 'the user') }}</strong>.
        Share it with them privately (e.g. in person or via a secure message) and ask them to change it on first login.
    </div>
    <div class="pw-panel-value" id="temp-password-value">{{ session('temp_password') }}</div>
    <button class="pw-copy-btn" data-copy-target="temp-password-value"><x-icon name="clipboard" class="icon-sm" /> Copy Password</button>
    <div class="pw-panel-note"><x-icon name="alert-triangle" class="icon-sm" /> This password will not be shown again once you leave this page. Copy it now.</div>
</div>
@endif

<div class="instruction-panel">
    <button class="instruction-panel-toggle" aria-expanded="false" aria-controls="help-users">
        <span><x-icon name="info" class="icon-sm" /> How to use this page</span>
        <span class="instruction-chevron">▼</span>
    </button>
    <div class="instruction-panel-body" id="help-users">
        <p><strong>Manage portal user accounts</strong> — create new staff logins, update roles, and reset passwords.</p>
        <ul>
            <li><strong>Create User:</strong> Click the green button above the table to register a new staff member. A temporary password is generated automatically and shown on this page after creation — copy it and share it securely.</li>
            <li><strong>Edit:</strong> Change a user's display name, role, or account status without affecting their password.</li>
            <li><strong>Reset Password:</strong> Generates a brand-new temporary password and displays it here. The user's old password stops working immediately. Share the new one privately.</li>
            <li><strong>Resend Invitation:</strong> Generates a new temporary password and emails it to the user along with the login link — useful if they lost the original invitation or never received it.</li>
            <li><strong>Delete:</strong> Permanently removes a user account. You cannot delete your own account or the last remaining admin, and users who have uploaded documents must be deactivated instead of deleted.</li>
            <li><strong>Roles:</strong> Staff = basic document access &nbsp;·&nbsp; Manager / Auditor = expanded access &nbsp;·&nbsp; Admin = full portal control.</li>
            <li><strong>Status:</strong> Active = can log in &nbsp;·&nbsp; Pending = account awaiting activation &nbsp;·&nbsp; Inactive = login blocked.</li>
        </ul>
        <p class="muted"><x-icon name="mail" class="icon-sm" /> Email delivery depends on SMTP settings. If testing mode is enabled (<code>MAIL_MAILER=log</code>), emails are written to the system log instead of being sent.</p>
    </div>
</div>

<a href="{{ route('users.create') }}" class="btn btn-primary" style="margin-bottom:14px;">+ Create New User</a>

<table class="data-table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Employee ID</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Last Login</th>
            <th>Actions</th>
        </tr>
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
                <div class="action-btn-group">
                    <a href="{{ route('users.edit', $user) }}" class="btn-action btn-edit-user"><x-icon name="edit" class="icon-sm" /> Edit</a>
                    <form method="POST" action="{{ route('users.reset-password', $user) }}" style="display:inline"
                          data-confirm="A new temporary password will be generated and shown on screen. The user's current password will stop working immediately."
                          data-confirm-title="Reset password for {{ $user->name }}?">
                        @csrf
                        <button type="submit" class="btn-action btn-reset-pw"><x-icon name="key" class="icon-sm" /> Reset Password</button>
                    </form>
                    <form method="POST" action="{{ route('users.resend-invitation', $user) }}" style="display:inline"
                          data-confirm="This will generate a new temporary password and send a new invitation email to this user."
                          data-confirm-title="Resend invitation email?"
                          data-confirm-ok-label="Send Invitation">
                        @csrf
                        <button type="submit" class="btn-action btn-resend-invite"><x-icon name="mail" class="icon-sm" /> Resend Invitation</button>
                    </form>
                    @if($user->id !== auth()->id())
                        <form method="POST" action="{{ route('users.destroy', $user) }}" style="display:inline"
                              data-confirm="This action will remove this user account from the platform. This cannot be undone."
                              data-confirm-title="Delete user account?"
                              data-confirm-ok-label="Delete User">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn-action btn-delete"><x-icon name="trash" class="icon-sm" /> Delete</button>
                        </form>
                    @endif
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{{ $users->links() }}
@endsection
