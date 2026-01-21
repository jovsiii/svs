<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SVS Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  @csrf
</head>
<body class="bg-gradient-to-br from-slate-900 to-slate-800 text-slate-100">
  <div class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-slate-950 border-r border-slate-800 flex flex-col">
      <div class="p-6 text-xl font-bold tracking-wide text-indigo-400">SVS</div>
      <nav class="flex-1 px-4 space-y-2">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg {{ request()->routeIs('dashboard') ? 'bg-indigo-500/20 text-indigo-300' : 'hover:bg-slate-800' }}">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
          </svg>
          Dashboard
        </a>
        <a href="{{ route('incidents.create') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg {{ request()->routeIs('incidents.create') ? 'bg-indigo-500/20 text-indigo-300' : 'hover:bg-slate-800' }}">
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
        <a href="{{ route('profile.index') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg {{ request()->routeIs('profile.*') ? 'bg-indigo-500/20 text-indigo-300' : 'hover:bg-slate-800' }}">
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
        <h1 class="text-2xl font-semibold">Dashboard</h1>
        <p class="text-slate-400">School Violence Monitoring Overview</p>
        
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

      <!-- Stats Cards -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
        <div class="bg-slate-900 rounded-2xl p-6 shadow-lg border border-slate-800 hover:border-slate-700 transition-all duration-300 hover:scale-105">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-slate-400">Total Incidents</p>
              <h2 class="text-3xl font-bold mt-2 text-white">{{ $incidents->count() }}</h2>
            </div>
            <div class="p-3 bg-blue-500/20 rounded-lg">
              <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
              </svg>
            </div>
          </div>
        </div>
        
        <div class="bg-slate-900 rounded-2xl p-6 shadow-lg border border-slate-800 hover:border-slate-700 transition-all duration-300 hover:scale-105">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-slate-400">Pending</p>
              <h2 class="text-3xl font-bold text-yellow-400 mt-2">{{ $incidents->where('status', 'pending')->count() }}</h2>
            </div>
            <div class="p-3 bg-yellow-500/20 rounded-lg">
              <svg class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
            </div>
          </div>
        </div>
        
        <div class="bg-slate-900 rounded-2xl p-6 shadow-lg border border-slate-800 hover:border-slate-700 transition-all duration-300 hover:scale-105">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-slate-400">Resolved</p>
              <h2 class="text-3xl font-bold text-green-400 mt-2">{{ $incidents->where('status', 'resolved')->count() }}</h2>
            </div>
            <div class="p-3 bg-green-500/20 rounded-lg">
              <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
            </div>
          </div>
        </div>
      </div>

      <!-- Recent Incidents -->
      <div class="bg-slate-900 rounded-2xl p-6 shadow-lg border border-slate-800">
        <div class="flex items-center justify-between mb-4">
          <h3 class="text-lg font-semibold">Recent Incidents</h3>
          @if(auth()->user()->role === 'admin' && $incidents->count() > 0)
            <a href="{{ route('incidents.index') }}" class="text-sm text-indigo-400 hover:text-indigo-300 transition-colors">
              View All →
            </a>
          @endif
        </div>
        
        @if($incidents->count() > 0)
          <div class="space-y-3">
            @foreach($incidents->take(5) as $incident)
              <div class="flex items-center justify-between p-4 rounded-xl bg-slate-800 hover:bg-slate-700 transition-all duration-200 group">
                <div class="flex-1">
                  <div class="flex items-center space-x-3">
                    <div class="w-2 h-2 rounded-full 
                      @switch($incident->status)
                        @case('pending')
                          bg-yellow-400 animate-pulse
                        @case('investigating')
                          bg-blue-400 animate-spin
                        @case('resolved')
                          bg-green-400
                        @default
                          bg-gray-400
                      @endswitch
                    "></div>
                    <p class="font-medium group-hover:text-indigo-300 transition-colors">{{ $incident->type }}</p>
                  </div>
                  @if($incident->location)
                    <p class="text-sm text-slate-400 mt-1 ml-5">📍 {{ $incident->location }}</p>
                  @endif
                  <p class="text-xs text-slate-500 mt-1 ml-5">{{ $incident->created_at->diffForHumans() }}</p>
                </div>
                
                <div class="flex items-center space-x-3">
                  <span class="
                    px-3 py-1 rounded-full text-xs font-medium
                    {{ $incident->status === 'resolved'
                      ? 'bg-green-500/20 text-green-400 border border-green-500/30'
                      : ($incident->status === 'investigating'
                        ? 'bg-blue-500/20 text-blue-400 border border-blue-500/30'
                        : 'bg-yellow-500/20 text-yellow-400 border border-yellow-500/30') }}">
                    {{ ucfirst($incident->status) }}
                  </span>
                  <a href="{{ route('incidents.show', $incident) }}" 
                     class="text-indigo-400 hover:text-indigo-300 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                  </a>
                </div>
              </div>
            @endforeach
          </div>
        @else
          <div class="text-center py-12">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-slate-800 rounded-full mb-4">
              <svg class="w-8 h-8 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
              </svg>
            </div>
            <p class="text-slate-400 mb-6 text-lg">No incidents reported yet.</p>
            <a href="{{ route('incidents.create') }}" 
               class="inline-flex items-center px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg shadow-lg transition-all duration-200 hover:shadow-xl hover:scale-105">
              <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
              </svg>
              Report First Incident
            </a>
          </div>
        @endif
      </div>
    </main>
  </div>
</body>
</html>
