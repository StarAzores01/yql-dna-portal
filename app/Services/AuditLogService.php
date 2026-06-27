<?php

namespace App\Services;

use App\Models\AuditLog;
use Illuminate\Http\Request;

class AuditLogService
{
    /**
     * Write one audit log entry.
     *
     * @param int|null $userId   Null is allowed for failed-login attempts on unknown accounts.
     * @param string   $action   Short machine code, e.g. "login_success", "document_download".
     * @param string   $description Human readable detail.
     */
    public static function log(?int $userId, string $action, string $description = '', ?Request $request = null): AuditLog
    {
        $request = $request ?: request();

        return AuditLog::create([
            'user_id' => $userId,
            'action' => $action,
            'description' => $description,
            'ip_address' => $request?->ip(),
            'user_agent' => $request?->userAgent(),
        ]);
    }
}
