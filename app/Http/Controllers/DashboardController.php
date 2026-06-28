<?php

namespace App\Http\Controllers;

use App\Models\AuditLog;
use App\Models\Category;
use App\Models\Document;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        // ---- Documents panel snippet ----
        $documentsQuery = Document::viewableBy($user)->active();
        $documentsTotal = $documentsQuery->count();
        $categoriesCount = Category::withCount('documents')->get();
        $recentDocuments = Document::viewableBy($user)->active()
            ->latest()
            ->limit(3)
            ->get();

        // ---- Users panel snippet (admin only) ----
        $usersTotal = null;
        $usersActive = null;
        $usersPending = null;
        if ($user->isAdmin()) {
            $usersTotal = User::count();
            $usersActive = User::where('status', 'active')->count();
            $usersPending = User::where('status', 'pending')->count();
        }

        // ---- Audit Logs panel snippet (admin only) ----
        $auditLogsTotal = null;
        $latestAuditLog = null;
        if ($user->isAdmin()) {
            $auditLogsTotal = AuditLog::count();
            $latestAuditLog = AuditLog::with('user')->latest()->first();
        }

        return view('dashboard.index', [
            'categories' => $categoriesCount,
            'recentDocuments' => $recentDocuments,
            'documentsTotal' => $documentsTotal,
            'usersTotal' => $usersTotal,
            'usersActive' => $usersActive,
            'usersPending' => $usersPending,
            'auditLogsTotal' => $auditLogsTotal,
            'latestAuditLog' => $latestAuditLog,
        ]);
    }
}
