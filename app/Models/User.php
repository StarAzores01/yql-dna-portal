<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'employee_id',
        'email',
        'password',
        'role',
        'status',
        'last_login_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'last_login_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function documents()
    {
        return $this->hasMany(Document::class, 'uploaded_by');
    }

    public function auditLogs()
    {
        return $this->hasMany(AuditLog::class);
    }

    public function otpCodes()
    {
        return $this->hasMany(OtpCode::class);
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    // Roles ranked from lowest to highest access level
    public const ROLE_RANK = [
        'staff' => 1,
        'manager' => 2,
        'auditor' => 3,
        'admin' => 4,
    ];

    /**
     * Returns the list of access_level values this user is allowed to view,
     * based on the rule: a user can see documents tagged for their role
     * or any role ranked at or below theirs, plus "all".
     */
    public function viewableAccessLevels(): array
    {
        if ($this->role === 'admin') {
            return ['all', 'staff', 'manager', 'auditor', 'admin'];
        }

        $myRank = self::ROLE_RANK[$this->role] ?? 1;
        $levels = ['all'];
        foreach (self::ROLE_RANK as $role => $rank) {
            if ($rank <= $myRank) {
                $levels[] = $role;
            }
        }

        return $levels;
    }
}
