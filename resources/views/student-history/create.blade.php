<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Add Student History - SVS</title>
  <script src="https://cdn.tailwindcss.com"></script>
  @csrf
</head>
<body class="bg-gradient-to-br from-slate-900 to-slate-800 text-slate-100">
  <div class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-slate-950 border-r border-slate-800 flex flex-col fixed h-screen">
      <div class="p-6 text-xl font-bold tracking-wide text-indigo-400">SVS</div>
      <nav class="flex-1 px-4 space-y-2">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-slate-800">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
          </svg>
          Dashboard
        </a>
        <a href="{{ route('incidents.create') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-slate-800">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
          </svg>
          Report Incident
        </a>
        @if(auth()->user()->role === 'admin')
        <a href="{{ route('incidents.index') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-slate-800">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
          </svg>
          Incidents
        </a>
        <a href="{{ route('student-history.index') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg bg-indigo-500/20 text-indigo-300">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
          </svg>
          Student History
        </a>
        @endif
        <a href="{{ route('handbook') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-slate-800">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
          </svg>
          PUP Handbook
        </a>
      </nav>
      <div class="px-4 pb-6 space-y-2">
        <a href="{{ route('profile.index') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-slate-800">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
          </svg>
          Profile
        </a>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="flex items-center gap-3 px-4 py-2 rounded-lg text-red-400 hover:bg-red-500/10 w-full text-left">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
            </svg>
            Logout
          </button>
        </form>
      </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-8 ml-64">
      <!-- Header -->
      <div class="mb-8">
        <div class="flex items-center gap-4 mb-4">
          <a href="{{ route('student-history.index') }}" class="text-slate-400 hover:text-slate-300 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
          </a>
          <div>
            <h1 class="text-2xl font-semibold">Add Student History Record</h1>
            <p class="text-slate-400">Create a new disciplinary record for a student</p>
          </div>
        </div>
      </div>

      <!-- Form -->
      <div class="bg-slate-900 rounded-2xl p-8 shadow-lg border border-slate-800">
        <form method="POST" action="{{ route('student-history.store') }}" class="space-y-6">
          @csrf
          
          <!-- Student Information -->
          <div class="border-b border-slate-700 pb-6">
            <h3 class="text-lg font-semibold text-indigo-300 mb-4">Student Information</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Student Name *</label>
                <input type="text" 
                       name="student_name" 
                       value="{{ old('student_name') }}"
                       class="w-full px-4 py-2 bg-slate-800 border border-slate-700 rounded-lg text-slate-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                       required>
                @error('student_name')
                  <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
              </div>
              
              <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Student ID Number *</label>
                <input type="text" 
                       name="student_id_number" 
                       value="{{ old('student_id_number') }}"
                       class="w-full px-4 py-2 bg-slate-800 border border-slate-700 rounded-lg text-slate-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                       required>
                @error('student_id_number')
                  <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
              </div>
            </div>
          </div>

          <!-- Incident Details -->
          <div class="border-b border-slate-700 pb-6">
            <h3 class="text-lg font-semibold text-indigo-300 mb-4">Incident Details</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Violation Type *</label>
                <select name="violation_type" 
                        class="w-full px-4 py-2 bg-slate-800 border border-slate-700 rounded-lg text-slate-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                        required>
                  <option value="">Select violation type</option>
                  <option value="Identification and Access" {{ old('violation_type') == 'Identification and Access' ? 'selected' : '' }}>Identification and Access</option>
                  <option value="Conduct and Behavior" {{ old('violation_type') == 'Conduct and Behavior' ? 'selected' : '' }}>Conduct and Behavior</option>
                  <option value="Academic Integrity" {{ old('violation_type') == 'Academic Integrity' ? 'selected' : '' }}>Academic Integrity</option>
                  <option value="University Property" {{ old('violation_type') == 'University Property' ? 'selected' : '' }}>University Property</option>
                  <option value="Prohibited Items" {{ old('violation_type') == 'Prohibited Items' ? 'selected' : '' }}>Prohibited Items</option>
                  <option value="Harassment and Abuse" {{ old('violation_type') == 'Harassment and Abuse' ? 'selected' : '' }}>Harassment and Abuse</option>
                </select>
                @error('violation_type')
                  <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
              </div>
              
              <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Location *</label>
                <input type="text" 
                       name="location" 
                       value="{{ old('location') }}"
                       class="w-full px-4 py-2 bg-slate-800 border border-slate-700 rounded-lg text-slate-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                       required>
                @error('location')
                  <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
              </div>
              
              <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Incident Date *</label>
                <input type="date" 
                       name="incident_date" 
                       value="{{ old('incident_date') }}"
                       class="w-full px-4 py-2 bg-slate-800 border border-slate-700 rounded-lg text-slate-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                       required>
                @error('incident_date')
                  <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
              </div>
              
              <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Severity *</label>
                <select name="severity" 
                        class="w-full px-4 py-2 bg-slate-800 border border-slate-700 rounded-lg text-slate-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                        required>
                  <option value="">Select severity</option>
                  <option value="minor" {{ old('severity') == 'minor' ? 'selected' : '' }}>Minor</option>
                  <option value="major" {{ old('severity') == 'major' ? 'selected' : '' }}>Major</option>
                  <option value="critical" {{ old('severity') == 'critical' ? 'selected' : '' }}>Critical</option>
                </select>
                @error('severity')
                  <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
              </div>
            </div>
            
            <div class="mt-6">
              <label class="block text-sm font-medium text-slate-300 mb-2">Description *</label>
              <textarea name="description" 
                        rows="4" 
                        class="w-full px-4 py-2 bg-slate-800 border border-slate-700 rounded-lg text-slate-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                        required>{{ old('description') }}</textarea>
              @error('description')
                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
              @enderror
            </div>
          </div>

          <!-- Resolution Details -->
          <div class="pb-6">
            <h3 class="text-lg font-semibold text-indigo-300 mb-4">Resolution Details</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Status *</label>
                <select name="status" 
                        class="w-full px-4 py-2 bg-slate-800 border border-slate-700 rounded-lg text-slate-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                        required>
                  <option value="">Select status</option>
                  <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                  <option value="investigating" {{ old('status') == 'investigating' ? 'selected' : '' }}>Investigating</option>
                  <option value="resolved" {{ old('status') == 'resolved' ? 'selected' : '' }}>Resolved</option>
                  <option value="dismissed" {{ old('status') == 'dismissed' ? 'selected' : '' }}>Dismissed</option>
                </select>
                @error('status')
                  <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
              </div>
              
              <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Resolved Date</label>
                <input type="date" 
                       name="resolved_date" 
                       value="{{ old('resolved_date') }}"
                       class="w-full px-4 py-2 bg-slate-800 border border-slate-700 rounded-lg text-slate-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                @error('resolved_date')
                  <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
              </div>
            </div>
            
            <div class="mt-6">
              <label class="block text-sm font-medium text-slate-300 mb-2">Sanctions</label>
              <textarea name="sanctions" 
                        rows="3" 
                        class="w-full px-4 py-2 bg-slate-800 border border-slate-700 rounded-lg text-slate-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">{{ old('sanctions') }}</textarea>
              @error('sanctions')
                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
              @enderror
            </div>
            
            <div class="mt-6">
              <label class="block text-sm font-medium text-slate-300 mb-2">Additional Notes</label>
              <textarea name="notes" 
                        rows="3" 
                        class="w-full px-4 py-2 bg-slate-800 border border-slate-700 rounded-lg text-slate-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">{{ old('notes') }}</textarea>
              @error('notes')
                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
              @enderror
            </div>
          </div>

          <!-- Form Actions -->
          <div class="flex justify-end gap-4 pt-6 border-t border-slate-700">
            <a href="{{ route('student-history.index') }}" 
               class="px-6 py-2 bg-slate-700 hover:bg-slate-600 text-white font-medium rounded-lg transition-colors">
              Cancel
            </a>
            <button type="submit" 
                    class="px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg shadow-lg transition-all duration-200 hover:shadow-xl hover:scale-105">
              Create Record
            </button>
          </div>
        </form>
      </div>
    </main>
  </div>
</body>
</html>
