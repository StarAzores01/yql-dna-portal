@extends('layouts.app')

@section('content')
<h1>Welcome, {{ auth()->user()->name }}</h1>
<p class="muted">Role: <strong>{{ ucfirst(auth()->user()->role) }}</strong></p>

<div class="instruction-panel">
    <button class="instruction-panel-toggle" aria-expanded="false" aria-controls="help-dashboard">
        <span>ℹ️ How to use this Dashboard</span>
        <span class="instruction-chevron">▼</span>
    </button>
    <div class="instruction-panel-body" id="help-dashboard">
        <p><strong>Welcome to the YQL DNA Portal.</strong> This is your home screen — a summary of everything available to you.</p>
        <ul>
            <li><strong>Documents:</strong> Click <em>Open Documents</em> to browse and download files you have access to, or <em>Upload Document</em> to add a new file to the library.</li>
            <li><strong>Categories:</strong> Click a category label under Documents to jump straight to filtered results.</li>
            @if(auth()->user()->isAdmin())
            <li><strong>Users (Admin):</strong> Manage staff accounts — create new users, edit roles, or reset passwords.</li>
            <li><strong>Audit Logs (Admin):</strong> Review a complete record of all portal activity for security and compliance.</li>
            @endif
            <li>Use the navigation bar at the top to move between sections at any time.</li>
            <li>Click the sun / moon icon in the top bar to switch between light and dark mode.</li>
        </ul>
    </div>
</div>

<div class="panel-grid">

    {{-- Documents panel --}}
    <div class="panel-card">
        <div class="panel-card-header">
            <x-icon name="folder" class="panel-icon" />
            <h3>Documents</h3>
        </div>
        <div class="panel-stat">
            <span class="panel-stat-number">{{ $documentsTotal }}</span>
            <span class="panel-stat-label">document(s) you can view</span>
        </div>
        <div class="panel-substats">
            @foreach ($categories as $category)
                <a href="{{ route('documents.index', ['category_id' => $category->id]) }}" class="panel-substat-link">
                    {{ $category->name }}: {{ $category->documents_count }}
                </a>
            @endforeach
        </div>

        @if ($recentDocuments->isEmpty())
            <p class="panel-empty">No documents available to your role yet.</p>
        @else
            <ul class="panel-mini-list">
                @foreach ($recentDocuments as $doc)
                    <li>
                        <span>{{ $doc->title }}</span>
                        <span class="muted-time">{{ $doc->created_at->diffForHumans() }}</span>
                    </li>
                @endforeach
            </ul>
        @endif

        <div class="panel-link-row">
            <a href="{{ route('documents.index') }}" class="panel-link">Open Documents &rsaquo;</a>
            <a href="{{ route('documents.create') }}" class="panel-link">+ Upload Document</a>
        </div>
    </div>

    {{-- Users panel (admin only) --}}
    @if (auth()->user()->isAdmin())
        <div class="panel-card">
            <div class="panel-card-header">
                <x-icon name="users" class="panel-icon" />
                <h3>Users</h3>
            </div>
            <div class="panel-stat">
                <span class="panel-stat-number">{{ $usersTotal }}</span>
                <span class="panel-stat-label">registered user(s)</span>
            </div>
            <div class="panel-substats">
                <span>Active: {{ $usersActive }}</span>
                <span>Pending: {{ $usersPending }}</span>
            </div>
            <div class="panel-link-row">
                <a href="{{ route('users.index') }}" class="panel-link">Manage Users &rsaquo;</a>
                <a href="{{ route('users.create') }}" class="panel-link">+ Add User</a>
            </div>
        </div>
    @endif

    {{-- Audit Logs panel (admin only) --}}
    @if (auth()->user()->isAdmin())
        <div class="panel-card">
            <div class="panel-card-header">
                <x-icon name="search" class="panel-icon" />
                <h3>Audit Logs</h3>
            </div>
            <div class="panel-stat">
                <span class="panel-stat-number">{{ $auditLogsTotal }}</span>
                <span class="panel-stat-label">log entr{{ $auditLogsTotal === 1 ? 'y' : 'ies' }} recorded</span>
            </div>

            @if ($latestAuditLog)
                <ul class="panel-mini-list">
                    <li>
                        <span>{{ $latestAuditLog->user->name ?? 'Unknown user' }} &mdash; {{ str_replace('_', ' ', $latestAuditLog->action) }}</span>
                        <span class="muted-time">{{ $latestAuditLog->created_at->diffForHumans() }}</span>
                    </li>
                </ul>
            @else
                <p class="panel-empty">No activity recorded yet.</p>
            @endif

            <div class="panel-link-row">
                <a href="{{ route('audit-logs.index') }}" class="panel-link">View Audit Logs &rsaquo;</a>
            </div>
        </div>
    @endif

</div>

<div class="security-reminder">
    <x-icon name="lock" class="icon-sm" /> Reminder: This portal contains confidential company information. Do not share your login credentials or downloaded documents outside authorized personnel.
</div>
@endsection
