<?php

namespace App\Http\Controllers;

use App\Models\OtpCode;
use App\Services\AuditLogService;
use Illuminate\Http\Request;

class OtpController extends Controller
{
    public function show(Request $request)
    {
        if (! config('app.enable_otp')) {
            return redirect()->route('dashboard');
        }

        return view('otp.verify');
    }

    public function verify(Request $request)
    {
        $request->validate(['otp_code' => ['required', 'digits:6']]);

        $user = $request->user();

        $otp = OtpCode::where('user_id', $user->id)
            ->where('otp_code', $request->input('otp_code'))
            ->whereNull('used_at')
            ->latest()
            ->first();

        if (! $otp || $otp->isExpired()) {
            AuditLogService::log($user->id, 'otp_failed', 'Invalid or expired OTP attempt.', $request);

            return back()->withErrors(['otp_code' => 'Invalid or expired code.']);
        }

        $otp->update(['used_at' => now()]);
        $request->session()->put('otp_verified', true);

        AuditLogService::log($user->id, 'otp_verified', 'OTP verified successfully.', $request);

        return redirect()->intended(route('dashboard'));
    }

    public function resend(Request $request)
    {
        $user = $request->user();
        $code = (string) random_int(100000, 999999);

        OtpCode::create([
            'user_id' => $user->id,
            'otp_code' => $code,
            'expires_at' => now()->addMinutes(10),
        ]);

        AuditLogService::log($user->id, 'otp_resent', 'OTP resent.', $request);

        return back()->with('success', 'A new code has been generated.');
    }
}
