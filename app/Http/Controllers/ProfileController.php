<?php

namespace App\Http\Controllers;

use App\Services\AuditLogService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function showChangePassword()
    {
        return view('profile.change-password');
    }

    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'new_password' => ['required', 'confirmed', 'min:8', 'different:current_password'],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['new_password']),
        ]);

        AuditLogService::log($request->user()->id, 'password_change', 'User changed their own password', $request);

        return redirect()->route('password.change')->with('success', 'Password updated successfully.');
    }
}
