@extends('layouts.app')

@section('content')
<h1>Audit Logs</h1>

<table class="data-table">
    <thead>
        <tr><th>Date/Time</th><th>User</th><th>Action</th><th>Description</th><th>IP Address</th></tr>
    </thead>
    <tbody>
    @foreach($logs as $log)
        <tr>
            <td>{{ $log->created_at->format('Y-m-d H:i:s') }}</td>
            <td>{{ $log->user?->name ?? 'Unknown' }}</td>
            <td><span class="badge">{{ $log->action }}</span></td>
            <td>{{ $log->description }}</td>
            <td>{{ $log->ip_address }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

{{ $logs->links() }}
@endsection
