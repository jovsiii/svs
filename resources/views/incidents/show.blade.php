<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Incident Details - SVS</title>
  <script src="https://cdn.tailwindcss.com"></script>
  @csrf
</head>
<body class="bg-gradient-to-br from-slate-900 to-slate-800 text-slate-100">
  <div class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-slate-950 border-r border-slate-800 flex flex-col">
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
        <a href="{{ route('incidents.index') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg bg-indigo-500/20 text-indigo-300">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
          </svg>
          Incidents
        </a>
        @endif
        @if(auth()->user()->role === 'admin')
        <a href="{{ route('student-history.index') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg {{ request()->routeIs('student-history.*') ? 'bg-indigo-500/20 text-indigo-300' : 'hover:bg-slate-800' }}">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
          </svg>
          Student History
        </a>
        @endif
        <a href="{{ route('handbook') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg {{ request()->routeIs('handbook') ? 'bg-indigo-500/20 text-indigo-300' : 'hover:bg-slate-800' }}">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
          </svg>
          PUP Handbook
        </a>
      </nav>
      <div class="px-4 pb-6 space-y-2">
        <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-slate-800">
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
    <main class="flex-1 p-8">
      <!-- Header -->
      <div class="mb-8">
        <h1 class="text-2xl font-semibold">Incident Details</h1>
        <p class="text-slate-400">View and manage incident information</p>
      </div>

      <!-- Incident Details Card -->
      <div class="max-w-4xl mx-auto">
        <div class="bg-slate-900 rounded-2xl shadow-lg border border-slate-800 overflow-hidden">
          <!-- Incident Header -->
          <div class="px-6 py-4 border-b border-slate-700 flex items-center justify-between">
            <h3 class="text-lg font-semibold text-white">Incident #{{ str_pad($incident->id, 3, '0', STR_PAD_LEFT) }}</h3>
            <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full border
              {{ $incident->status === 'resolved' 
                ? 'bg-green-500/20 text-green-400 border-green-500/30' 
                : ($incident->status === 'investigating' 
                  ? 'bg-blue-500/20 text-blue-400 border-blue-500/30' 
                  : 'bg-yellow-500/20 text-yellow-400 border-yellow-500/30') }}">
              <div class="w-2 h-2 rounded-full mr-2 
                {{ $incident->status === 'resolved' 
                  ? 'bg-green-400' 
                  : ($incident->status === 'investigating' 
                    ? 'bg-blue-400 animate-spin' 
                    : 'bg-yellow-400 animate-pulse') }}"></div>
              {{ ucfirst($incident->status) }}
            </span>
          </div>

          <div class="p-6">
            <!-- Information Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
              <!-- Incident Information -->
              <div>
                <h4 class="text-sm font-medium text-slate-400 mb-4 flex items-center">
                  <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                  </svg>
                  Incident Information
                </h4>
                <dl class="space-y-4">
                  <div class="flex items-start">
                    <dt class="text-sm font-medium text-slate-300 w-24">Type</dt>
                    <dd class="mt-1 text-sm text-slate-100 flex-1">{{ ucfirst($incident->type) }}</dd>
                  </div>
                  <div class="flex items-start">
                    <dt class="text-sm font-medium text-slate-300 w-24">Location</dt>
                    <dd class="mt-1 text-sm text-slate-100 flex-1 flex items-center">
                      <svg class="w-4 h-4 mr-2 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                      </svg>
                      {{ $incident->location }}
                    </dd>
                  </div>
                  <div class="flex items-start">
                    <dt class="text-sm font-medium text-slate-300 w-24">Date</dt>
                    <dd class="mt-1 text-sm text-slate-100 flex-1">{{ $incident->incident_date->format('F d, Y') }}</dd>
                  </div>
                  <div class="flex items-start">
                    <dt class="text-sm font-medium text-slate-300 w-24">Reported</dt>
                    <dd class="mt-1 text-sm text-slate-100 flex-1">{{ $incident->created_at->format('F d, Y \a\t g:i A') }}</dd>
                  </div>
                </dl>
              </div>
              
              <!-- People Involved -->
              <div>
                <h4 class="text-sm font-medium text-slate-400 mb-4 flex items-center">
                  <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                  </svg>
                  People Involved
                </h4>
                <dl class="space-y-4">
                  <div class="flex items-start">
                    <dt class="text-sm font-medium text-slate-300 w-24">Type</dt>
                    <dd class="mt-1 text-sm text-slate-100 flex-1">
                      @if($incident->people_involved_type)
                        <span class="px-2 py-1 text-xs rounded-full font-medium
                          {{ $incident->people_involved_type === 'student' 
                            ? 'bg-blue-500/20 text-blue-400 border border-blue-500/30' 
                            : ($incident->people_involved_type === 'teacher' 
                              ? 'bg-green-500/20 text-green-400 border border-green-500/30'
                              : ($incident->people_involved_type === 'staff'
                                ? 'bg-purple-500/20 text-purple-400 border border-purple-500/30'
                                : 'bg-gray-500/20 text-gray-400 border border-gray-500/30')) }}">
                          {{ ucfirst($incident->people_involved_type) }}
                        </span>
                      @else
                        <span class="text-slate-400">Not specified</span>
                      @endif
                    </dd>
                  </div>
                  @if($incident->people_involved_names)
                  <div class="flex items-start">
                    <dt class="text-sm font-medium text-slate-300 w-24">Name(s)</dt>
                    <dd class="mt-1 text-sm text-slate-100 flex-1">{{ $incident->people_involved_names }}</dd>
                  </div>
                  @endif
                </dl>
              </div>
              
              <!-- Evidence -->
              <div>
                <h4 class="text-sm font-medium text-slate-400 mb-4 flex items-center">
                  <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                  </svg>
                  Evidence
                </h4>
                <dl class="space-y-4">
                  <div class="flex items-start">
                    <dt class="text-sm font-medium text-slate-300 w-24">Type</dt>
                    <dd class="mt-1 text-sm text-slate-100 flex-1">
                      @if($incident->evidence_type && $incident->evidence_type !== 'none')
                        <span class="px-2 py-1 text-xs rounded-full font-medium
                          {{ $incident->evidence_type === 'photo' 
                            ? 'bg-indigo-500/20 text-indigo-400 border border-indigo-500/30' 
                            : ($incident->evidence_type === 'video' 
                              ? 'bg-red-500/20 text-red-400 border border-red-500/30'
                              : 'bg-yellow-500/20 text-yellow-400 border border-yellow-500/30') }}">
                          {{ ucfirst($incident->evidence_type) }}
                        </span>
                      @else
                        <span class="text-slate-400">No evidence</span>
                      @endif
                    </dd>
                  </div>
                  @if($incident->evidence_path)
                  <div class="flex items-start">
                    <dt class="text-sm font-medium text-slate-300 w-24">File</dt>
                    <dd class="mt-1 text-sm text-slate-100 flex-1">
                      @if(str_contains($incident->evidence_path, ['.jpg', '.jpeg', '.png', '.gif']))
                        <a href="{{ asset('storage/' . $incident->evidence_path) }}" 
                           target="_blank" 
                           class="inline-flex items-center text-indigo-400 hover:text-indigo-300 transition-colors">
                          <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                          </svg>
                          View Image
                        </a>
                      @else
                        <a href="{{ asset('storage/' . $incident->evidence_path) }}" 
                           target="_blank" 
                           class="inline-flex items-center text-indigo-400 hover:text-indigo-300 transition-colors">
                          <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                          </svg>
                          Play Video
                        </a>
                      @endif
                    </dd>
                  </div>
                  @endif
                </dl>
              </div>
              
              <!-- Report Details -->
              <div>
                <h4 class="text-sm font-medium text-slate-400 mb-4 flex items-center">
                  <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                  </svg>
                  Report Details
                </h4>
                <dl class="space-y-4">
                  <div class="flex items-start">
                    <dt class="text-sm font-medium text-slate-300 w-24">Anonymous</dt>
                    <dd class="mt-1 text-sm text-slate-100 flex-1">
                      <span class="px-2 py-1 text-xs rounded-full 
                        {{ $incident->is_anonymous 
                          ? 'bg-yellow-500/20 text-yellow-400 border border-yellow-500/30' 
                          : 'bg-blue-500/20 text-blue-400 border border-blue-500/30' }}">
                        {{ $incident->is_anonymous ? 'Yes' : 'No' }}
                      </span>
                    </dd>
                  </div>
                  @if (!$incident->is_anonymous && $incident->user)
                    <div class="flex items-start">
                      <dt class="text-sm font-medium text-slate-300 w-24">Reporter</dt>
                      <dd class="mt-1 text-sm text-slate-100 flex-1 flex items-center">
                        <svg class="w-4 h-4 mr-2 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        {{ $incident->user->name }}
                      </dd>
                    </div>
                  @endif
                  <div class="flex items-start">
                    <dt class="text-sm font-medium text-slate-300 w-24">Status</dt>
                    <dd class="mt-1 text-sm text-slate-100 flex-1">{{ ucfirst($incident->status) }}</dd>
                  </div>
                </dl>
              </div>
            </div>
            
            <!-- Description -->
            <div class="mb-6">
              <h4 class="text-sm font-medium text-slate-400 mb-3 flex items-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path>
                </svg>
                Description
              </h4>
              <div class="bg-slate-800/50 rounded-lg p-4 border border-slate-700">
                <p class="text-sm text-slate-200 whitespace-pre-wrap leading-relaxed">{{ $incident->description }}</p>
              </div>
            </div>
          </div>

          <!-- Action Buttons -->
          <div class="px-6 py-4 border-t border-slate-700 bg-slate-800/30">
            <div class="flex items-center justify-between">
              <div class="flex space-x-3">
                @if ($incident->status === 'pending')
                  <form method="POST" action="{{ route('incidents.update', $incident->id) }}" class="inline">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="status" value="investigating">
                    <button type="submit" 
                            class="inline-flex items-center px-4 py-2 bg-yellow-600 hover:bg-yellow-700 text-white text-sm font-medium rounded-lg shadow-lg transition-all duration-200 hover:shadow-xl hover:scale-105">
                      <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                      </svg>
                      Start Investigation
                    </button>
                  </form>
                @endif
                
                @if ($incident->status === 'investigating')
                  <form method="POST" action="{{ route('incidents.update', $incident->id) }}" class="inline">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="status" value="resolved">
                    <button type="submit" 
                            class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-lg shadow-lg transition-all duration-200 hover:shadow-xl hover:scale-105">
                      <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                      </svg>
                      Mark Resolved
                    </button>
                  </form>
                @endif
                
                @if ($incident->status === 'resolved')
                  <form method="POST" action="{{ route('incidents.update', $incident->id) }}" class="inline">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="status" value="investigating">
                    <button type="submit" 
                            class="inline-flex items-center px-4 py-2 bg-slate-600 hover:bg-slate-700 text-white text-sm font-medium rounded-lg shadow-lg transition-all duration-200 hover:shadow-xl hover:scale-105">
                      <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                      </svg>
                      Reopen Investigation
                    </button>
                  </form>
                @endif
              </div>
              
              <div class="flex space-x-3">
                <a href="{{ route('incidents.index') }}" 
                   class="inline-flex items-center px-4 py-2 border border-slate-600 hover:bg-slate-800 text-slate-300 text-sm font-medium rounded-lg transition-all duration-200">
                  <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                  </svg>
                  Back to List
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</body>
</html>
