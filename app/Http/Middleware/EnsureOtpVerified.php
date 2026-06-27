<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureOtpVerified
{
    /**
     * Only enforces OTP verification when ENABLE_OTP=true in .env.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! config('app.enable_otp')) {
            return $next($request);
        }

        if (! $request->session()->get('otp_verified')) {
            return redirect()->route('otp.show');
        }

        return $next($request);
    }
}
