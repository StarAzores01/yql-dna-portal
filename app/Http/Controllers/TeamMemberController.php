<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use App\Services\AuditLogService;
use App\Support\HandlesPublicImageUpload;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TeamMemberController extends Controller
{
    use HandlesPublicImageUpload;

    public function index()
    {
        $teamMembers = TeamMember::orderBy('sort_order')->orderBy('name')->paginate(20);

        return view('team.index', compact('teamMembers'));
    }

    public function create()
    {
        return view('team.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validated($request);

        if ($request->hasFile('photo')) {
            $validated['photo_path'] = $this->storePublicImage($request->file('photo'), 'team');
        }

        $teamMember = TeamMember::create($validated);

        AuditLogService::log($request->user()->id, 'team_member_create', 'Created team member #' . $teamMember->id . ' (' . $teamMember->name . ')', $request);

        return redirect()->route('admin.team.index')->with('success', 'Team member added.');
    }

    public function edit(TeamMember $team)
    {
        return view('team.edit', ['teamMember' => $team]);
    }

    public function update(Request $request, TeamMember $team)
    {
        $validated = $this->validated($request);

        if ($request->hasFile('photo')) {
            $this->deletePublicImage($team->photo_path);
            $validated['photo_path'] = $this->storePublicImage($request->file('photo'), 'team');
        }

        $team->update($validated);

        AuditLogService::log($request->user()->id, 'team_member_update', 'Updated team member #' . $team->id . ' (' . $team->name . ')', $request);

        return redirect()->route('admin.team.index')->with('success', 'Team member updated.');
    }

    public function destroy(Request $request, TeamMember $team)
    {
        $this->deletePublicImage($team->photo_path);

        AuditLogService::log($request->user()->id, 'team_member_delete', 'Deleted team member #' . $team->id . ' (' . $team->name . ')', $request);
        $team->delete();

        return redirect()->route('admin.team.index')->with('success', 'Team member deleted.');
    }

    private function validated(Request $request): array
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'position' => ['required', 'string', 'max:255'],
            'initials' => ['nullable', 'string', 'max:5'],
            'bio' => ['nullable', 'string', 'max:5000'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'status' => ['required', Rule::in(['active', 'inactive'])],
            'photo' => $this->imageUploadRules,
        ]);

        unset($validated['photo']);
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        return $validated;
    }
}
