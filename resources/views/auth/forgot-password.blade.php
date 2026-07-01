@extends('layouts.guest')

@section('content')
<div class="auth-card">
    <img src="{{ asset('assets/images/brand/yql-logo.png') }}" alt="YellowQuip Zambia Limited" class="auth-logo">
    <h1 class="auth-title">Contact Administrator</h1>
    <p class="auth-subtitle">Password resets are handled by your administrator</p>

    <p class="security-reminder">
        For account security, passwords cannot be reset automatically. Fill in the
        details below exactly as registered in the portal &mdash; the same details
        used when your account was created &mdash; and your administrator will verify
        your identity and issue a new password.
    </p>

    <form id="contact-admin-form" onsubmit="return false;">
        <label for="ca-name">Full Name</label>
        <input type="text" id="ca-name" name="name" placeholder="Your full name as registered" required>

        <label for="ca-employee-id">Employee ID</label>
        <input type="text" id="ca-employee-id" name="employee_id" placeholder="Your employee ID" required>

        <label for="ca-email">Email</label>
        <input type="email" id="ca-email" name="email" placeholder="Your registered email address" required>

        <label for="ca-message">Reason for Request</label>
        <textarea id="ca-message" name="message" rows="3" placeholder="e.g. Forgot password and need it reset"></textarea>

        <button type="submit" id="contact-admin-submit" class="btn btn-accent btn-block">Send Request to Administrator</button>
    </form>

    <p class="muted" style="margin-top: 14px; font-size: 12px; text-align: center;">
        This opens an email to your administrator with the details above pre-filled.
        Alternatively, reach out directly using the contact details on the
        <a href="{{ route('public.contact') }}" style="color: var(--yql-gold);">Contact Us</a> page.
    </p>

    <a href="{{ route('login') }}" class="forgot-link"><x-icon name="arrow-left" class="icon-sm" /> Back to Login</a>
</div>
@endsection

@section('scripts')
    <script>
        (function () {
            var form = document.getElementById('contact-admin-form');
            form.addEventListener('submit', function (e) {
                e.preventDefault();

                var name = document.getElementById('ca-name').value.trim();
                var employeeId = document.getElementById('ca-employee-id').value.trim();
                var email = document.getElementById('ca-email').value.trim();
                var message = document.getElementById('ca-message').value.trim();

                var subject = 'YQL DNA Portal — Password Reset Request';
                var body =
                    'Full Name: ' + name + '\n' +
                    'Employee ID: ' + employeeId + '\n' +
                    'Registered Email: ' + email + '\n\n' +
                    'Reason for Request:\n' + (message || 'Forgot password and need it reset.');

                window.location.href = 'mailto:emmamuelg@yellowquip.com'
                    + '?subject=' + encodeURIComponent(subject)
                    + '&body=' + encodeURIComponent(body);
            });
        })();
    </script>
@endsection
