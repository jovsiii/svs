<?php

namespace App\Http\Controllers;

use App\Models\StudentHistory;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class StudentHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $histories = StudentHistory::with(['user', 'handler'])
            ->latest()
            ->paginate(10);
        
        return view('student-history.index', compact('histories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('student-history.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'student_name' => 'required|string|max:255',
            'student_id_number' => 'required|string|max:50',
            'violation_type' => 'required|string|max:255',
            'description' => 'required|string',
            'incident_date' => 'required|date',
            'location' => 'required|string|max:255',
            'severity' => 'required|in:minor,major,critical',
            'status' => 'required|in:pending,investigating,resolved,dismissed',
            'sanctions' => 'nullable|string',
            'resolved_date' => 'nullable|date|after_or_equal:incident_date',
            'notes' => 'nullable|string',
        ]);

        StudentHistory::create($validated);

        return redirect()->route('student-history.index')
            ->with('status', 'Student history record created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentHistory $studentHistory): View
    {
        $studentHistory->load(['user', 'handler']);
        return view('student-history.show', compact('studentHistory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentHistory $studentHistory): View
    {
        return view('student-history.edit', compact('studentHistory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudentHistory $studentHistory): RedirectResponse
    {
        $validated = $request->validate([
            'student_name' => 'required|string|max:255',
            'student_id_number' => 'required|string|max:50',
            'violation_type' => 'required|string|max:255',
            'description' => 'required|string',
            'incident_date' => 'required|date',
            'location' => 'required|string|max:255',
            'severity' => 'required|in:minor,major,critical',
            'status' => 'required|in:pending,investigating,resolved,dismissed',
            'sanctions' => 'nullable|string',
            'resolved_date' => 'nullable|date|after_or_equal:incident_date',
            'notes' => 'nullable|string',
        ]);

        if ($validated['status'] === 'resolved' && !$studentHistory->resolved_date) {
            $validated['resolved_date'] = now();
        }

        $studentHistory->update($validated);

        return redirect()->route('student-history.index')
            ->with('status', 'Student history record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentHistory $studentHistory): RedirectResponse
    {
        $studentHistory->delete();

        return redirect()->route('student-history.index')
            ->with('status', 'Student history record deleted successfully.');
    }
}
