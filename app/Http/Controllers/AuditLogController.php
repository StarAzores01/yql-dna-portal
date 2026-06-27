<?php

namespace App\Http\Controllers;

use App\Models\AuditLog;
use Illuminate\Http\Request;

class AuditLogController extends Controller
{
    public function index(Request $request)
    {
        $query = AuditLog::with('user')->latest();

        if ($action = $request->query('action')) {
            $query->where('action', $action);
        }

        $logs = $query->paginate(25)->withQueryString();

        return view('audit-logs.index', compact('logs'));
    }
}
