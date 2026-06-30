@extends('layouts.app')

@section('content')
<h1>Audit Logs</h1>

<div class="instruction-panel">
    <button class="instruction-panel-toggle" aria-expanded="false" aria-controls="help-audit">
        <span>ℹ️ How to use this page</span>
        <span class="instruction-chevron">▼</span>
    </button>
    <div class="instruction-panel-body" id="help-audit">
        <p><strong>The Audit Log records every action taken in the portal</strong> for security monitoring and compliance tracking.</p>
        <ul>
            <li><strong>Date / Time:</strong> When the action occurred (server time).</li>
            <li><strong>User:</strong> Which staff member performed the action.</li>
            <li><strong>Action:</strong> The type of activity — e.g. <em>document_download</em>, <em>user_create</em>, <em>login</em>.</li>
            <li><strong>Description:</strong> A detailed summary of what was done, including which document or user was affected.</li>
            <li><strong>IP Address:</strong> The network address from which the action was performed — useful for identifying unauthorized access.</li>
            <li>Logs are <strong>read-only</strong> — they cannot be edited or deleted by anyone.</li>
            <li>Use your browser's built-in search (<strong>Ctrl + F</strong> / <strong>Cmd + F</strong>) to quickly find entries by user name, action, or description.</li>
        </ul>
    </div>
</div>

<table class="data-table">
    <thead>
        <tr>
            <th>Date / Time</th>
            <th>User</th>
            <th>Action</th>
            <th>Description</th>
            <th>IP Address</th>
        </tr>
    </thead>
    <tbody>
    @foreach($logs as $log)
        <tr>
            <td>{{ $log->created_at->format('Y-m-d H:i:s') }}</td>
            <td>{{ $log->user?->name ?? 'Unknown' }}</td>
            <td><span class="badge">{{ str_replace('_', ' ', $log->action) }}</span></td>
            <td>{{ $log->description }}</td>
            <td>{{ $log->ip_address }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

{{ $logs->links() }}
@endsection
