@extends('layouts.app')

@section('content')
<h1>Add Team Member</h1>

<form method="POST" action="{{ route('admin.team.store') }}" enctype="multipart/form-data" class="form-card">
    @csrf

    <label for="name">Name</label>
    <input type="text" id="name" name="name" value="{{ old('name') }}" required placeholder="e.g. Jane Mumba">

    <label for="position">Position</label>
    <input type="text" id="position" name="position" value="{{ old('position') }}" required placeholder="e.g. Operations Manager">

    <label for="initials">Initials <span class="muted">(fallback shown if photo fails to load)</span></label>
    <input type="text" id="initials" name="initials" value="{{ old('initials') }}" maxlength="5" placeholder="e.g. JM">

    <label for="bio">Bio</label>
    <textarea id="bio" name="bio" rows="4" placeholder="Short description of their role">{{ old('bio') }}</textarea>

    <label for="sort_order">Display Order <span class="muted">(lower numbers appear first)</span></label>
    <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', 0) }}" min="0">

    <label for="status">Status</label>
    <select id="status" name="status" required>
        <option value="active"   @selected(old('status', 'active') === 'active')>Active — visible on the public page</option>
        <option value="inactive" @selected(old('status') === 'inactive')>Inactive — hidden</option>
    </select>

    <label for="photo">Photo <span class="muted">(JPG, PNG, WebP, or GIF — max 5 MB)</span></label>
    <input type="file" id="photo" name="photo" accept=".jpg,.jpeg,.png,.webp,.gif">

    <button type="submit" class="btn btn-primary btn-lg" style="margin-top:6px;"><x-icon name="check-circle" class="icon-sm" /> Add Team Member</button>
</form>
@endsection
