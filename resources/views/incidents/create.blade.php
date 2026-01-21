<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Report Incident - SVS</title>
  <script src="https://cdn.tailwindcss.com"></script>
  @csrf
</head>
<body class="bg-gradient-to-br from-slate-900 to-slate-800 text-slate-100">
  <div class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-slate-950 border-r border-slate-800 flex flex-col fixed h-screen">
      <div class="p-6 text-xl font-bold tracking-wide text-indigo-400">SVS</div>
      <nav class="flex-1 px-4 space-y-2">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg transition-all duration-200 hover:bg-slate-800 hover:shadow-lg hover:shadow-slate-900/50 {{ request()->routeIs('dashboard') ? 'bg-indigo-500/20 text-indigo-300 shadow-lg shadow-indigo-500/25' : '' }}">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
          </svg>
          Dashboard
        </a>
        <a href="{{ route('incidents.create') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg transition-all duration-200 hover:bg-slate-800 hover:shadow-lg hover:shadow-slate-900/50 {{ request()->routeIs('incidents.create') ? 'bg-indigo-500/20 text-indigo-300 shadow-lg shadow-indigo-500/25' : 'bg-indigo-500/20 text-indigo-300 shadow-lg shadow-indigo-500/25' }}">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
          </svg>
          Report Incident
        </a>
        @if(auth()->user()->role === 'admin')
        <a href="{{ route('incidents.index') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg transition-all duration-200 hover:bg-slate-800 hover:shadow-lg hover:shadow-slate-900/50 {{ request()->routeIs('incidents.index') ? 'bg-indigo-500/20 text-indigo-300 shadow-lg shadow-indigo-500/25' : '' }}">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
          </svg>
          Incidents
        </a>
        @endif
        @if(auth()->user()->role === 'admin')
        <a href="{{ route('student-history.index') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg transition-all duration-200 hover:bg-slate-800 hover:shadow-lg hover:shadow-slate-900/50 {{ request()->routeIs('student-history.*') ? 'bg-indigo-500/20 text-indigo-300 shadow-lg shadow-indigo-500/25' : '' }}">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
          </svg>
          Student History
        </a>
        @endif
        <a href="{{ route('handbook') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg transition-all duration-200 hover:bg-slate-800 hover:shadow-lg hover:shadow-slate-900/50 {{ request()->routeIs('handbook') ? 'bg-indigo-500/20 text-indigo-300 shadow-lg shadow-indigo-500/25' : '' }}">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
          </svg>
          PUP Handbook
        </a>
      </nav>
      <div class="px-4 pb-6 space-y-2">
        <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg transition-all duration-200 hover:bg-slate-800 hover:shadow-lg hover:shadow-slate-900/50 {{ request()->routeIs('profile.*') ? 'bg-indigo-500/20 text-indigo-300 shadow-lg shadow-indigo-500/25' : '' }}">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
          </svg>
          Profile
        </a>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="flex items-center gap-3 px-4 py-2 rounded-lg text-red-400 hover:bg-red-500/10 w-full text-left transition-all duration-200 hover:shadow-lg hover:shadow-red-500/25">
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
        <h1 class="text-2xl font-semibold">Report Incident</h1>
        <p class="text-slate-400">Report a school violence incident safely and anonymously</p>
        
        {{-- Success Message --}}
        @if (session('status'))
          <div class="mt-4 rounded-lg bg-green-500/10 border border-green-500/30 p-4 text-green-400 text-sm animate-pulse">
            <div class="flex items-center">
              <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
              {{ session('status') }}
            </div>
          </div>
        @endif
      </div>

      <!-- Report Form -->
      <div class="max-w-3xl mx-auto">
        <div class="bg-slate-900 rounded-2xl p-8 shadow-lg border border-slate-800">
          <form method="POST" action="{{ route('incidents.store') }}" class="space-y-6">
            @csrf

            <!-- Incident Type -->
            <div>
              <label for="type" class="block text-sm font-medium text-slate-300 mb-2">
                Incident Type
              </label>
              <div class="relative">
                <select id="type" name="type" required 
                        class="mt-1 block w-full rounded-lg border-slate-700 bg-slate-800 text-slate-100 focus:border-indigo-500 focus:ring-indigo-500 px-4 py-3 appearance-none cursor-pointer">
                  <option value="">Select incident type...</option>
                  <option value="theft">Theft</option>
                  <option value="vandalism">Vandalism</option>
                  <option value="assault">Assault</option>
                  <option value="harassment">Harassment</option>
                  <option value="bullying">Bullying</option>
                  <option value="suspicious">Suspicious Activity</option>
                  <option value="accident">Accident</option>
                  <option value="other">Other</option>
                </select>
                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                  <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                  </svg>
                </div>
              </div>
              @error('type')
                <p class="mt-2 text-sm text-red-400 flex items-center">
                  <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                  </svg>
                  {{ $message }}
                </p>
              @enderror
            </div>

            <!-- Description -->
            <div>
              <label for="description" class="block text-sm font-medium text-slate-300 mb-2">
                Description
              </label>
              <textarea id="description" name="description" rows="4" required
                        class="mt-1 block w-full rounded-lg border-slate-700 bg-slate-800 text-slate-100 focus:border-indigo-500 focus:ring-indigo-500 px-4 py-3 resize-none"
                        placeholder="Please provide a detailed description of the incident...">{{ old('description') }}</textarea>
              @error('description')
                <p class="mt-2 text-sm text-red-400 flex items-center">
                  <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                  </svg>
                  {{ $message }}
                </p>
              @enderror
            </div>

            <!-- Date and Location -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div>
                <label for="incident_date" class="block text-sm font-medium text-slate-300 mb-2">
                  Date of Incident
                </label>
                <input id="incident_date" name="incident_date" type="date" required
                       class="mt-1 block w-full rounded-lg border-slate-700 bg-slate-800 text-slate-100 focus:border-indigo-500 focus:ring-indigo-500 px-4 py-3"
                       value="{{ old('incident_date') }}">
                @error('incident_date')
                  <p class="mt-2 text-sm text-red-400 flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    {{ $message }}
                  </p>
                @enderror
              </div>

              <div>
                <label for="location" class="block text-sm font-medium text-slate-300 mb-2">
                  Location
                </label>
                <input id="location" name="location" type="text" required
                       class="mt-1 block w-full rounded-lg border-slate-700 bg-slate-800 text-slate-100 focus:border-indigo-500 focus:ring-indigo-500 px-4 py-3"
                       placeholder="e.g., Library, Cafeteria, Building A"
                       value="{{ old('location') }}">
                @error('location')
                  <p class="mt-2 text-sm text-red-400 flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    {{ $message }}
                  </p>
                @enderror
              </div>
            </div>

            <!-- People Involved -->
            <div>
              <label class="block text-sm font-medium text-slate-300 mb-2">
                People Involved
              </label>
              <p class="text-sm text-slate-400 mb-4">Who was involved in the incident?</p>
              
              <!-- People Type -->
              <div class="mb-4">
                <label for="people_involved_type" class="block text-sm font-medium text-slate-300 mb-2">Type of Person</label>
                <div class="relative">
                  <select id="people_involved_type" name="people_involved_type" 
                          class="mt-1 block w-full rounded-lg border-slate-700 bg-slate-800 text-slate-100 focus:border-indigo-500 focus:ring-indigo-500 px-4 py-3 appearance-none cursor-pointer">
                    <option value="">Select person type...</option>
                    <option value="student">Student</option>
                    <option value="teacher">Teacher</option>
                    <option value="staff">Staff</option>
                    <option value="unknown">Unknown</option>
                  </select>
                  <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                  </div>
                </div>
                @error('people_involved_type')
                  <p class="mt-2 text-sm text-red-400 flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    {{ $message }}
                  </p>
                @enderror
              </div>

              <!-- Names (if known) -->
              <div>
                <label for="people_involved_names" class="block text-sm font-medium text-slate-300 mb-2">
                  Name(s) (if known)
                </label>
                <input id="people_involved_names" name="people_involved_names" type="text"
                       class="mt-1 block w-full rounded-lg border-slate-700 bg-slate-800 text-slate-100 focus:border-indigo-500 focus:ring-indigo-500 px-4 py-3"
                       placeholder="Enter names of people involved (separate with commas)"
                       value="{{ old('people_involved_names') }}">
                @error('people_involved_names')
                  <p class="mt-2 text-sm text-red-400 flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    {{ $message }}
                  </p>
                @enderror
              </div>
            </div>

            <!-- Evidence Section -->
            <div>
              <label class="block text-sm font-medium text-slate-300 mb-2">
                Evidence (Optional)
              </label>
              <p class="text-sm text-slate-400 mb-4">Do you have any evidence?</p>
              
              <!-- Evidence Type -->
              <div class="mb-4">
                <label for="evidence_type" class="block text-sm font-medium text-slate-300 mb-2">Type of Evidence</label>
                <div class="relative">
                  <select id="evidence_type" name="evidence_type" 
                          class="mt-1 block w-full rounded-lg border-slate-700 bg-slate-800 text-slate-100 focus:border-indigo-500 focus:ring-indigo-500 px-4 py-3 appearance-none cursor-pointer"
                          onchange="toggleEvidenceUpload()">
                    <option value="none">None</option>
                    <option value="photo">Photo</option>
                    <option value="video">Video</option>
                    <option value="screenshot">Screenshot</option>
                  </select>
                  <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                  </div>
                </div>
                @error('evidence_type')
                  <p class="mt-2 text-sm text-red-400 flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    {{ $message }}
                  </p>
                @enderror
              </div>

              <!-- Evidence Upload (conditional) -->
              <div id="evidence-upload-section" class="hidden">
                <label for="evidence_file" class="block text-sm font-medium text-slate-300 mb-2">
                  Upload Evidence File
                </label>
                <div class="relative">
                  <input id="evidence_file" name="evidence_file" type="file" 
                         accept="image/*,video/*,.png,.jpg,.jpeg,.gif,.mp4,.mov,.avi"
                         class="mt-1 block w-full rounded-lg border-slate-700 bg-slate-800 text-slate-100 focus:border-indigo-500 focus:ring-indigo-500 px-4 py-3 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-indigo-600 file:text-white hover:file:bg-indigo-700">
                  <p class="mt-2 text-xs text-slate-400">Accepted formats: Images (JPG, PNG, GIF) and Videos (MP4, MOV, AVI). Max size: 10MB</p>
                  @error('evidence_file')
                    <p class="mt-2 text-sm text-red-400 flex items-center">
                      <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                      </svg>
                      {{ $message }}
                    </p>
                  @enderror
                </div>
              </div>
            </div>

            <!-- Anonymous Option -->
            <div class="flex items-center p-4 rounded-lg bg-slate-800/50 border border-slate-700">
              <input id="is_anonymous" name="is_anonymous" type="checkbox" value="1" 
                     class="rounded border-slate-600 bg-slate-800 text-indigo-600 shadow-sm focus:ring-indigo-500 focus:ring-offset-slate-900">
              <label for="is_anonymous" class="ml-3 text-sm text-slate-300 cursor-pointer">
                <span class="font-medium">Submit anonymously</span>
                <span class="text-slate-400 block text-xs mt-1">Your identity will be protected</span>
              </label>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center justify-between pt-4">
              <a href="{{ route('dashboard') }}" 
                 class="flex items-center text-slate-400 hover:text-slate-300 transition-colors">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Dashboard
              </a>
              <button type="submit" 
                      class="inline-flex items-center px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg shadow-lg transition-all duration-200 hover:shadow-xl hover:scale-105">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Submit Report
              </button>
            </div>
          </form>
        </div>
      </div>
    </main>
  </div>
</body>
</html>

<script>
// Show/hide evidence upload section based on evidence type
document.addEventListener('DOMContentLoaded', function() {
    const evidenceSelect = document.getElementById('evidence_type');
    const uploadSection = document.getElementById('evidence-upload-section');
    
    function toggleEvidenceUpload() {
        const selectedValue = evidenceSelect.value;
        if (selectedValue === 'none') {
            uploadSection.classList.add('hidden');
        } else {
            uploadSection.classList.remove('hidden');
        }
    }
    
    // Initial state
    toggleEvidenceUpload();
    
    // Listen for changes
    evidenceSelect.addEventListener('change', toggleEvidenceUpload);
});
</script>
