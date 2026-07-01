<?php

namespace App\Http\Controllers;

use App\Mail\UserInvitationMail;
use App\Models\User;
use App\Services\AuditLogService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UserManagementController extends Controller
{
    public function index()
    {
        $users = User::orderBy('name')->paginate(20);

        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'employee_id' => ['required', 'string', 'max:50', 'unique:users,employee_id'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'role' => ['required', Rule::in(['staff', 'manager', 'auditor', 'admin'])],
            'status' => ['required', Rule::in(['active', 'inactive', 'pending'])],
            'send_invitation' => ['nullable', 'boolean'],
        ]);

        $sendInvitation = $request->boolean('send_invitation');
        $temporaryPassword = $this->generateTemporaryPassword();

        $user = User::create([
            ...collect($validated)->except(['send_invitation'])->all(),
            'password' => Hash::make($temporaryPassword),
        ]);

        AuditLogService::log($request->user()->id, 'user_create', 'Created user #'.$user->id.' ('.$user->employee_id.')', $request);

        $redirect = redirect()->route('users.index')
            ->with('temp_password', $temporaryPassword)
            ->with('new_user_info', $user->name.' ('.$user->employee_id.')');

        if (! $sendInvitation) {
            return $redirect->with('success', 'User account created successfully.');
        }

        try {
            Mail::to($user->email)->send(new UserInvitationMail(
                $user->name,
                $user->email,
                $temporaryPassword,
                env('PORTAL_URL', 'https://portal.my-yql.org').'/login',
            ));

            return $redirect->with('success', 'User account created successfully and invitation email sent.');
        } catch (\Throwable $e) {
            Log::error('Failed to send user invitation email for user #'.$user->id.': '.$e->getMessage());

            return $redirect->with('warning', 'User was created, but the invitation email could not be sent.');
        }
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required', Rule::in(['staff', 'manager', 'auditor', 'admin'])],
            'status' => ['required', Rule::in(['active', 'inactive', 'pending'])],
        ]);

        $changes = array_diff_assoc($validated, $user->only(array_keys($validated)));
        $user->update($validated);

        if (! empty($changes)) {
            AuditLogService::log($request->user()->id, 'user_update', 'Updated user #'.$user->id.': '.json_encode($changes), $request);
        }

        return redirect()->route('users.index')->with('success', 'User updated.');
    }

    public function resetPassword(Request $request, User $user)
    {
        $temporaryPassword = $this->generateTemporaryPassword();
        $user->update(['password' => Hash::make($temporaryPassword)]);

        AuditLogService::log($request->user()->id, 'user_password_reset', 'Reset password for user #'.$user->id, $request);

        return redirect()->route('users.index')
            ->with('success', 'Password reset successfully.')
            ->with('temp_password', $temporaryPassword)
            ->with('new_user_info', $user->name.' ('.$user->employee_id.')');
    }

    public function resendInvitation(Request $request, User $user)
    {
        $temporaryPassword = $this->generateTemporaryPassword();
        $user->update(['password' => Hash::make($temporaryPassword)]);

        AuditLogService::log($request->user()->id, 'user_invitation_resend', 'Resent invitation email for user #'.$user->id, $request);

        $redirect = redirect()->route('users.index')
            ->with('temp_password', $temporaryPassword)
            ->with('new_user_info', $user->name.' ('.$user->employee_id.')');

        try {
            Mail::to($user->email)->send(new UserInvitationMail(
                $user->name,
                $user->email,
                $temporaryPassword,
                env('PORTAL_URL', 'https://portal.my-yql.org').'/login',
            ));

            return $redirect->with('success', 'Invitation email resent successfully.');
        } catch (\Throwable $e) {
            Log::error('Failed to resend invitation email for user #'.$user->id.': '.$e->getMessage());

            return $redirect->with('warning', 'Password was reset, but the invitation email could not be sent.');
        }
    }

    public function destroy(Request $request, User $user)
    {
        if ($user->id === $request->user()->id) {
            return redirect()->route('users.index')->with('error', 'You cannot delete your own account.');
        }

        if ($user->isAdmin() && User::where('role', 'admin')->count() <= 1) {
            return redirect()->route('users.index')->with('error', 'At least one admin account must remain.');
        }

        // documents.uploaded_by cascades on delete — block explicitly rather than
        // silently wiping out this user's uploaded documents.
        if ($user->documents()->exists()) {
            return redirect()->route('users.index')
                ->with('error', 'This user cannot be deleted because related records exist. Consider deactivating the account instead.');
        }

        try {
            $userId = $user->id;
            $employeeId = $user->employee_id;
            $user->delete();

            AuditLogService::log($request->user()->id, 'user_delete', 'Deleted user #'.$userId.' ('.$employeeId.')', $request);

            return redirect()->route('users.index')->with('success', 'User account deleted successfully.');
        } catch (\Throwable $e) {
            Log::error('Failed to delete user #'.$user->id.': '.$e->getMessage());

            return redirect()->route('users.index')
                ->with('error', 'This user cannot be deleted because related records exist. Consider deactivating the account instead.');
        }
    }

    private function generateTemporaryPassword(): string
    {
        return Str::random(10);
    }
}
