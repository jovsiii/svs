<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Student History Details - SVS</title>
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
        <div class="flex items-center justify-between">
          <div class="flex items-center gap-4">
            <a href="{{ route('student-history.index') }}" class="text-slate-400 hover:text-slate-300 transition-colors">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
              </svg>
            </a>
            <div>
              <h1 class="text-2xl font-semibold">Student History Details</h1>
              <p class="text-slate-400">View complete disciplinary record information</p>
            </div>
          </div>
          <div class="flex items-center gap-3">
            <a href="{{ route('student-history.edit', $studentHistory) }}" 
               class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors">
              <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
              </svg>
              Edit
            </a>
          </div>
        </div>
      </div>

      <!-- Student Info Card -->
      <div class="bg-slate-900 rounded-2xl p-6 shadow-lg border border-slate-800 mb-6">
        <div class="flex items-center gap-6">
          <div class="w-16 h-16 bg-indigo-500/20 rounded-full flex items-center justify-center">
            <svg class="w-8 h-8 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
            </svg>
          </div>
          <div class="flex-1">
            <h2 class="text-xl font-semibold text-slate-100">{{ $studentHistory->student_name }}</h2>
            <p class="text-slate-400">ID: {{ $studentHistory->student_id_number }}</p>
          </div>
          <div class="text-right">
            <span class="px-3 py-1 text-xs rounded-full font-medium
              {{ $studentHistory->severity === 'critical' 
                ? 'bg-red-500/20 text-red-400 border border-red-500/30' 
                : ($studentHistory->severity === 'major' 
                  ? 'bg-orange-500/20 text-orange-400 border border-orange-500/30'
                  : 'bg-blue-500/20 text-blue-400 border border-blue-500/30') }}">
              {{ ucfirst($studentHistory->severity) }} Severity
            </span>
          </div>
        </div>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Incident Details -->
        <div class="lg:col-span-2 space-y-6">
          <div class="bg-slate-900 rounded-2xl p-6 shadow-lg border border-slate-800">
            <h3 class="text-lg font-semibold text-indigo-300 mb-4">Incident Details</h3>
            <div class="space-y-4">
              <div class="grid grid-cols-2 gap-4">
                <div>
                  <p class="text-sm text-slate-400 mb-1">Violation Type</p>
                  <p class="font-medium">{{ $studentHistory->violation_type }}</p>
                </div>
                <div>
                  <p class="text-sm text-slate-400 mb-1">Location</p>
                  <p class="font-medium">{{ $studentHistory->location }}</p>
                </div>
                <div>
                  <p class="text-sm text-slate-400 mb-1">Incident Date</p>
                  <p class="font-medium">{{ $studentHistory->incident_date->format('F d, Y') }}</p>
                </div>
                <div>
                  <p class="text-sm text-slate-400 mb-1">Status</p>
                  <span class="px-3 py-1 text-xs rounded-full font-medium
                    {{ $studentHistory->status === 'resolved' 
                      ? 'bg-green-500/20 text-green-400 border border-green-500/30'
                      : ($studentHistory->status === 'investigating'
                        ? 'bg-blue-500/20 text-blue-400 border border-blue-500/30'
                        : ($studentHistory->status === 'dismissed'
                          ? 'bg-gray-500/20 text-gray-400 border border-gray-500/30'
                          : 'bg-yellow-500/20 text-yellow-400 border border-yellow-500/30')) }}">
                    {{ ucfirst($studentHistory->status) }}
                  </span>
                </div>
              </div>
              
              <div>
                <p class="text-sm text-slate-400 mb-2">Description</p>
                <div class="bg-slate-800 rounded-lg p-4">
                  <p class="text-slate-300 leading-relaxed">{{ $studentHistory->description }}</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Resolution Details -->
          <div class="bg-slate-900 rounded-2xl p-6 shadow-lg border border-slate-800">
            <h3 class="text-lg font-semibold text-indigo-300 mb-4">Resolution Details</h3>
            <div class="space-y-4">
              @if($studentHistory->sanctions)
                <div>
                  <p class="text-sm text-slate-400 mb-2">Sanctions</p>
                  <div class="bg-slate-800 rounded-lg p-4">
                    <p class="text-slate-300 leading-relaxed">{{ $studentHistory->sanctions }}</p>
                  </div>
                </div>
              @endif
              
              @if($studentHistory->resolved_date)
                <div>
                  <p class="text-sm text-slate-400 mb-1">Resolved Date</p>
                  <p class="font-medium">{{ $studentHistory->resolved_date->format('F d, Y') }}</p>
                </div>
              @endif
              
              @if($studentHistory->notes)
                <div>
                  <p class="text-sm text-slate-400 mb-2">Additional Notes</p>
                  <div class="bg-slate-800 rounded-lg p-4">
                    <p class="text-slate-300 leading-relaxed">{{ $studentHistory->notes }}</p>
                  </div>
                </div>
              @endif
            </div>
          </div>
        </div>

        <!-- Sidebar Info -->
        <div class="space-y-6">
          <!-- Record Info -->
          <div class="bg-slate-900 rounded-2xl p-6 shadow-lg border border-slate-800">
            <h3 class="text-lg font-semibold text-indigo-300 mb-4">Record Information</h3>
            <div class="space-y-3">
              <div>
                <p class="text-sm text-slate-400 mb-1">Record Created</p>
                <p class="font-medium">{{ $studentHistory->created_at->format('M d, Y h:i A') }}</p>
              </div>
              <div>
                <p class="text-sm text-slate-400 mb-1">Last Updated</p>
                <p class="font-medium">{{ $studentHistory->updated_at->format('M d, Y h:i A') }}</p>
              </div>
              @if($studentHistory->handler)
                <div>
                  <p class="text-sm text-slate-400 mb-1">Handled By</p>
                  <p class="font-medium">{{ $studentHistory->handler->name }}</p>
                </div>
              @endif
            </div>
          </div>

          <!-- Quick Actions -->
          <div class="bg-slate-900 rounded-2xl p-6 shadow-lg border border-slate-800">
            <h3 class="text-lg font-semibold text-indigo-300 mb-4">Quick Actions</h3>
            <div class="space-y-3">
              <a href="{{ route('student-history.edit', $studentHistory) }}" 
                 class="w-full flex items-center justify-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
                Edit Record
              </a>
              
              <form method="POST" action="{{ route('student-history.destroy', $studentHistory) }}" onsubmit="return confirm('Are you sure you want to delete this record? This action cannot be undone.')">
                @csrf
                @method('DELETE')
                <button type="submit" 
                        class="w-full flex items-center justify-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg transition-colors">
                  <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                  </svg>
                  Delete Record
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</body>
</html>
