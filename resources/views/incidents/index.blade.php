<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Incident Management - SVS</title>
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
        <h1 class="text-2xl font-semibold">Incident Management</h1>
        <p class="text-slate-400">Manage and monitor all reported incidents</p>
        
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

      <!-- Incident Table -->
      <div class="bg-slate-900 rounded-2xl shadow-lg border border-slate-800 overflow-hidden">
        <!-- Table Header -->
        <div class="px-6 py-4 border-b border-slate-700 flex items-center justify-between">
          <h3 class="text-lg font-semibold text-white">Incident List</h3>
          <a href="{{ route('incidents.create') }}" 
             class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg shadow-lg transition-all duration-200 hover:shadow-xl hover:scale-105">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Report New Incident
          </a>
        </div>

        <!-- Table Content -->
        <div class="overflow-x-auto">
          <table class="min-w-full">
            <thead class="bg-slate-800/50">
              <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-slate-400 uppercase tracking-wider">
                  ID
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-slate-400 uppercase tracking-wider">
                  Type
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-slate-400 uppercase tracking-wider">
                  Location
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-slate-400 uppercase tracking-wider">
                  Status
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-slate-400 uppercase tracking-wider">
                  Date
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-slate-400 uppercase tracking-wider">
                  Action
                </th>
              </tr>
            </thead>
            <tbody class="divide-y divide-slate-700/50">
              @forelse ($incidents as $incident)
                <tr class="hover:bg-slate-800/50 transition-colors">
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">
                    #{{ str_pad($incident->id, 3, '0', STR_PAD_LEFT) }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-300">
                    <div class="flex items-center">
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
                        mr-2"></div>
                      {{ ucfirst($incident->type) }}
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-300">
                    <div class="flex items-center">
                      <svg class="w-4 h-4 mr-2 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                      </svg>
                      {{ $incident->location }}
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full border
                      {{ $incident->status === 'resolved' 
                        ? 'bg-green-500/20 text-green-400 border-green-500/30' 
                        : ($incident->status === 'investigating' 
                          ? 'bg-blue-500/20 text-blue-400 border-blue-500/30' 
                          : 'bg-yellow-500/20 text-yellow-400 border-yellow-500/30') }}">
                      {{ ucfirst($incident->status) }}
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-400">
                    {{ $incident->incident_date->format('M d, Y') }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <a href="{{ route('incidents.show', $incident->id) }}" 
                       class="inline-flex items-center text-indigo-400 hover:text-indigo-300 transition-colors">
                      <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                      </svg>
                      View
                    </a>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="6" class="px-6 py-12 text-center">
                    <div class="flex flex-col items-center">
                      <div class="inline-flex items-center justify-center w-16 h-16 bg-slate-800 rounded-full mb-4">
                        <svg class="w-8 h-8 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                      </div>
                      <p class="text-slate-400 mb-4 text-lg">No incidents reported yet.</p>
                      <a href="{{ route('incidents.create') }}" 
                         class="inline-flex items-center px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg shadow-lg transition-all duration-200 hover:shadow-xl hover:scale-105">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Report First Incident
                      </a>
                    </div>
                  </td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>

        <!-- Pagination -->
        @if ($incidents->hasPages())
          <div class="px-6 py-4 border-t border-slate-700">
            {{ $incidents->links() }}
          </div>
        @endif
      </div>
    </main>
  </div>
</body>
</html>
