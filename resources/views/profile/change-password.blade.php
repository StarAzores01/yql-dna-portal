@extends('layouts.app')

@section('content')
<h1>Change Password</h1>

<div class="instruction-panel">
    <button class="instruction-panel-toggle" aria-expanded="false" aria-controls="help-change-password">
        <span><x-icon name="info" class="icon-sm" /> How to use this page</span>
        <span class="instruction-chevron">▼</span>
    </button>
    <div class="instruction-panel-body" id="help-change-password">
        <p><strong>Update the password for your own account.</strong></p>
        <ul>
            <li>Enter your current password to confirm it's you.</li>
            <li>Choose a new password that's at least 8 characters and different from your current one.</li>
            <li>You'll need to use the new password the next time you log in.</li>
        </ul>
    </div>
</div>

<form method="POST" action="{{ route('password.update') }}" class="form-card">
    @csrf
    @method('PUT')

    <label for="current_password">Current Password</label>
    <div class="password-field">
        <input type="password" id="current_password" name="current_password" required>
        <button type="button" class="password-toggle-btn" data-target="current_password" aria-label="Show password" aria-pressed="false">
            <x-icon name="eye" class="icon-sm password-toggle-icon-show" />
            <x-icon name="eye-off" class="icon-sm password-toggle-icon-hide" style="display:none;" />
        </button>
    </div>

    <label for="new_password">New Password</label>
    <div class="password-field">
        <input type="password" id="new_password" name="new_password" required minlength="8">
        <button type="button" class="password-toggle-btn" data-target="new_password" aria-label="Show password" aria-pressed="false">
            <x-icon name="eye" class="icon-sm password-toggle-icon-show" />
            <x-icon name="eye-off" class="icon-sm password-toggle-icon-hide" style="display:none;" />
        </button>
    </div>

    <label for="new_password_confirmation">Confirm New Password</label>
    <div class="password-field">
        <input type="password" id="new_password_confirmation" name="new_password_confirmation" required minlength="8">
        <button type="button" class="password-toggle-btn" data-target="new_password_confirmation" aria-label="Show password" aria-pressed="false">
            <x-icon name="eye" class="icon-sm password-toggle-icon-show" />
            <x-icon name="eye-off" class="icon-sm password-toggle-icon-hide" style="display:none;" />
        </button>
    </div>

    <button type="submit" class="btn btn-primary btn-lg" style="margin-top:6px;"><x-icon name="save" class="icon-sm" /> Update Password</button>
</form>
@endsection

@section('scripts')
    <script src="{{ asset('js/password-toggle.js') }}"></script>
@endsection
