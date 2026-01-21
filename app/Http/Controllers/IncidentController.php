<?php

namespace App\Http\Controllers;

use App\Models\Incident;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IncidentController extends Controller
{
    public function create(): View
    {
        return view('incidents.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'type' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'incident_date' => ['required', 'date'],
            'location' => ['required', 'string', 'max:255'],
            'is_anonymous' => ['nullable', 'boolean'],
            'people_involved_names' => ['nullable', 'string', 'max:500'],
            'people_involved_type' => ['nullable', 'string', 'in:student,teacher,staff,unknown'],
            'evidence_type' => ['required', 'string', 'in:photo,video,screenshot,none'],
            'evidence_file' => ['nullable', 'file', 'max:10240', 'mimes:jpeg,jpg,png,gif,mp4,mov,avi'],
        ]);

        // Handle file upload
        $evidencePath = null;
        if ($request->hasFile('evidence_file') && $data['evidence_type'] !== 'none') {
            $file = $request->file('evidence_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('evidence', $filename, 'public');
            $evidencePath = 'evidence/' . $filename;
        }

        Incident::create([
            'reported_by' => $request->boolean('is_anonymous') ? null : optional($request->user())->id,
            'is_anonymous' => $request->boolean('is_anonymous'),
            'type' => $data['type'],
            'description' => $data['description'],
            'incident_date' => $data['incident_date'],
            'location' => $data['location'],
            'status' => 'pending',
            'people_involved_names' => $data['people_involved_names'],
            'people_involved_type' => $data['people_involved_type'],
            'evidence_type' => $data['evidence_type'],
            'evidence_path' => $evidencePath,
        ]);

        return redirect()
            ->route('dashboard')
            ->with('status', 'Incident reported successfully.');
    }

    public function index(): View
    {
        $incidents = Incident::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('incidents.index', compact('incidents'));
    }

    public function show(Incident $incident): View
    {
        $incident->load('user');
        
        return view('incidents.show', compact('incident'));
    }

    public function update(Request $request, Incident $incident): RedirectResponse
    {
        $data = $request->validate([
            'status' => ['required', 'string', 'in:pending,investigating,resolved'],
        ]);

        $incident->update($data);

        return redirect()
            ->route('incidents.show', $incident)
            ->with('status', 'Incident status updated successfully.');
    }
}
