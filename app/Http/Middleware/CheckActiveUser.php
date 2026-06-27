<?php

namespace App\Http\Middleware;

use App\Services\AuditLogService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckActiveUser
{
    /**
     * Blocks login session usage if the account was deactivated after login.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if ($user && $user->status !== 'active') {
            AuditLogService::log($user->id, 'blocked_inactive_access', 'Inactive/pending account attempted access.', $request);
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('login')->withErrors([
                'employee_id' => 'Your account is not active. Please contact the administrator.',
            ]);
        }

        return $next($request);
    }
}
