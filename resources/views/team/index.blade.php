@extends('layouts.app')

@section('content')
<h1>Management Team</h1>

<div class="instruction-panel">
    <button class="instruction-panel-toggle" aria-expanded="false" aria-controls="help-team">
        <span>ℹ️ How to use this page</span>
        <span class="instruction-chevron">▼</span>
    </button>
    <div class="instruction-panel-body" id="help-team">
        <p><strong>Manage the Management Team page</strong> shown publicly at <code>/management-team</code>.</p>
        <ul>
            <li><strong>Order:</strong> Members are listed by the Order number, lowest first, then by name.</li>
            <li><strong>Status:</strong> <em>Inactive</em> members are hidden from the public page but kept here.</li>
            <li>Deleting a member removes their profile and photo permanently.</li>
        </ul>
    </div>
</div>

<a href="{{ route('admin.team.create') }}" class="btn btn-primary" style="margin-bottom:14px;">+ Add Team Member</a>

<table class="data-table">
    <thead>
        <tr>
            <th>Photo</th>
            <th>Name</th>
            <th>Position</th>
            <th>Order</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @forelse($teamMembers as $member)
        <tr>
            <td>
                @if($member->photo_path)
                    <img src="{{ asset('storage/' . $member->photo_path) }}" alt="{{ $member->name }}" style="width:44px;height:44px;object-fit:cover;border-radius:50%;">
                @else
                    <span class="muted">No photo</span>
                @endif
            </td>
            <td>{{ $member->name }}</td>
            <td>{{ $member->position }}</td>
            <td>{{ $member->sort_order }}</td>
            <td>{{ ucfirst($member->status) }}</td>
            <td>
                <div class="action-btn-group">
                    <a href="{{ route('admin.team.edit', $member) }}" class="btn-action btn-edit-user">✏️ Edit</a>
                    <form method="POST" action="{{ route('admin.team.destroy', $member) }}" style="display:inline"
                          data-confirm="This will permanently remove this team member and their photo."
                          data-confirm-title="Delete {{ $member->name }}?">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn-action btn-delete">🗑 Delete</button>
                    </form>
                </div>
            </td>
        </tr>
    @empty
        <tr><td colspan="6">No team members yet.</td></tr>
    @endforelse
    </tbody>
</table>

{{ $teamMembers->links() }}
@endsection
