<?php

namespace App\Http\Controllers;

use App\Models\OtpCode;
use App\Services\AuditLogService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'login' => ['required', 'string'], // employee_id OR email
            'password' => ['required', 'string'],
        ]);

        // Allow login with either employee_id or email in the same field.
        $field = filter_var($credentials['login'], FILTER_VALIDATE_EMAIL) ? 'email' : 'employee_id';

        $user = \App\Models\User::where($field, $credentials['login'])->first();

        if (! $user || ! Hash::check($credentials['password'], $user->password)) {
            AuditLogService::log($user?->id, 'login_failed', 'Failed login attempt for "' . $credentials['login'] . '"', $request);

            throw ValidationException::withMessages([
                'login' => 'The provided credentials are incorrect.',
            ]);
        }

        if ($user->status !== 'active') {
            AuditLogService::log($user->id, 'login_blocked', 'Login blocked: account status is ' . $user->status, $request);

            throw ValidationException::withMessages([
                'login' => 'Your account is ' . $user->status . '. Please contact the administrator.',
            ]);
        }

        Auth::login($user, $request->boolean('remember'));
        $request->session()->regenerate();

        $user->forceFill(['last_login_at' => now()])->save();
        AuditLogService::log($user->id, 'login_success', 'User logged in successfully.', $request);

        if (config('app.enable_otp')) {
            $request->session()->forget('otp_verified');
            $this->issueOtp($user);

            return redirect()->route('otp.show');
        }

        return redirect()->intended(route('dashboard'));
    }

    protected function issueOtp(\App\Models\User $user): void
    {
        $code = (string) random_int(100000, 999999);

        OtpCode::create([
            'user_id' => $user->id,
            'otp_code' => $code,
            'expires_at' => now()->addMinutes(10),
        ]);

        // In production, send via SMS/email. For now we log it for the admin to retrieve.
        AuditLogService::log($user->id, 'otp_issued', 'OTP generated (delivery channel not yet configured).');
    }

    public function logout(Request $request)
    {
        $userId = $request->user()?->id;
        AuditLogService::log($userId, 'logout', 'User logged out.', $request);

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('landing');
    }
}
