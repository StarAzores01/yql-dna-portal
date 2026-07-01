@extends('layouts.app')

@section('content')
<h1>Edit Team Member</h1>

<form method="POST" action="{{ route('admin.team.update', $teamMember) }}" enctype="multipart/form-data" class="form-card">
    @csrf
    @method('PUT')

    <label for="name">Name</label>
    <input type="text" id="name" name="name" value="{{ old('name', $teamMember->name) }}" required>

    <label for="position">Position</label>
    <input type="text" id="position" name="position" value="{{ old('position', $teamMember->position) }}" required>

    <label for="initials">Initials <span class="muted">(fallback shown if photo fails to load)</span></label>
    <input type="text" id="initials" name="initials" value="{{ old('initials', $teamMember->initials) }}" maxlength="5">

    <label for="bio">Bio</label>
    <textarea id="bio" name="bio" rows="4">{{ old('bio', $teamMember->bio) }}</textarea>

    <label for="sort_order">Display Order <span class="muted">(lower numbers appear first)</span></label>
    <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', $teamMember->sort_order) }}" min="0">

    <label for="status">Status</label>
    <select id="status" name="status" required>
        <option value="active"   @selected(old('status', $teamMember->status) === 'active')>Active — visible on the public page</option>
        <option value="inactive" @selected(old('status', $teamMember->status) === 'inactive')>Inactive — hidden</option>
    </select>

    @if($teamMember->photo_path)
        <p><img src="{{ asset('storage/' . $teamMember->photo_path) }}" alt="{{ $teamMember->name }}" style="width:80px;height:80px;object-fit:cover;border-radius:50%;"></p>
    @endif
    <label for="photo">Replace Photo <span class="muted">(JPG, PNG, WebP, or GIF — max 5 MB; leave empty to keep current)</span></label>
    <input type="file" id="photo" name="photo" accept=".jpg,.jpeg,.png,.webp,.gif">

    <button type="submit" class="btn btn-primary btn-lg" style="margin-top:6px;"><x-icon name="save" class="icon-sm" /> Save Changes</button>
</form>
@endsection
