<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Profile - SVS</title>
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
        <a href="{{ route('incidents.index') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg {{ request()->routeIs('incidents.index') ? 'bg-indigo-500/20 text-indigo-300' : 'hover:bg-slate-800' }}">
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
        <a href="{{ route('profile.index') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg bg-indigo-500/20 text-indigo-300">
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
        <h1 class="text-2xl font-semibold">Profile</h1>
        <p class="text-slate-400">Manage your account settings and information</p>
        
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

      <!-- Profile Content -->
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Profile Card -->
        <div class="lg:col-span-1">
          <div class="bg-slate-900 rounded-2xl p-6 shadow-lg border border-slate-800">
            <div class="text-center">
              <div class="w-24 h-24 bg-indigo-500/20 rounded-full mx-auto mb-4 flex items-center justify-center">
                <svg class="w-12 h-12 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
              </div>
              <h3 class="text-xl font-semibold mb-2">{{ auth()->user()->name }}</h3>
              <p class="text-slate-400 mb-4">{{ auth()->user()->email }}</p>
              <div class="flex items-center justify-center space-x-2">
                <span class="px-3 py-1 text-xs rounded-full bg-indigo-500/20 text-indigo-300 border border-indigo-500/30">
                  {{ ucfirst(auth()->user()->role) }}
                </span>
                <span class="px-3 py-1 text-xs rounded-full bg-green-500/20 text-green-300 border border-green-500/30">
                  Active
                </span>
              </div>
            </div>
            
            <div class="mt-6 pt-6 border-t border-slate-700">
              <div class="space-y-3">
                <div class="flex items-center justify-between text-sm">
                  <span class="text-slate-400">Member Since</span>
                  <span class="text-slate-200">{{ auth()->user()->created_at->format('M d, Y') }}</span>
                </div>
                <div class="flex items-center justify-between text-sm">
                  <span class="text-slate-400">Last Updated</span>
                  <span class="text-slate-200">{{ auth()->user()->updated_at->diffForHumans() }}</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Forms Section -->
        <div class="lg:col-span-2 space-y-6">
          <!-- Update Profile Information -->
          <div class="bg-slate-900 rounded-2xl p-6 shadow-lg border border-slate-800">
            <h3 class="text-lg font-semibold mb-4">Profile Information</h3>
            <form method="POST" action="{{ route('profile.update') }}" class="space-y-4">
              @csrf
              @method('PATCH')
              
              <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                  <label class="block text-sm font-medium text-slate-300 mb-2">Name</label>
                  <input type="text" 
                         name="name" 
                         value="{{ auth()->user()->name }}" 
                         class="w-full px-4 py-2 bg-slate-800 border border-slate-700 rounded-lg text-slate-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                         required>
                  @error('name')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                  @enderror
                </div>
                
                <div>
                  <label class="block text-sm font-medium text-slate-300 mb-2">Email</label>
                  <input type="email" 
                         name="email" 
                         value="{{ auth()->user()->email }}" 
                         class="w-full px-4 py-2 bg-slate-800 border border-slate-700 rounded-lg text-slate-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                         required>
                  @error('email')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                  @enderror
                </div>
              </div>
              
              <div class="flex justify-end">
                <button type="submit" 
                        class="px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg shadow-lg transition-all duration-200 hover:shadow-xl hover:scale-105">
                  Update Profile
                </button>
              </div>
            </form>
          </div>

          <!-- Update Password -->
          <div class="bg-slate-900 rounded-2xl p-6 shadow-lg border border-slate-800">
            <h3 class="text-lg font-semibold mb-4">Change Password</h3>
            <form method="POST" action="{{ route('password.update') }}" class="space-y-4">
              @csrf
              
              <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Current Password</label>
                <input type="password" 
                       name="current_password" 
                       class="w-full px-4 py-2 bg-slate-800 border border-slate-700 rounded-lg text-slate-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                       required>
                @error('current_password')
                  <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
              </div>
              
              <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                  <label class="block text-sm font-medium text-slate-300 mb-2">New Password</label>
                  <input type="password" 
                         name="password" 
                         class="w-full px-4 py-2 bg-slate-800 border border-slate-700 rounded-lg text-slate-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                         required>
                  @error('password')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                  @enderror
                </div>
                
                <div>
                  <label class="block text-sm font-medium text-slate-300 mb-2">Confirm Password</label>
                  <input type="password" 
                         name="password_confirmation" 
                         class="w-full px-4 py-2 bg-slate-800 border border-slate-700 rounded-lg text-slate-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                         required>
                </div>
              </div>
              
              <div class="flex justify-end">
                <button type="submit" 
                        class="px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg shadow-lg transition-all duration-200 hover:shadow-xl hover:scale-105">
                  Update Password
                </button>
              </div>
            </form>
          </div>

          <!-- Delete Account -->
          <div class="bg-slate-900 rounded-2xl p-6 shadow-lg border border-red-500/20">
            <h3 class="text-lg font-semibold mb-2 text-red-400">Delete Account</h3>
            <p class="text-slate-400 text-sm mb-4">Once your account is deleted, all of its resources and data will be permanently deleted. This action cannot be undone.</p>
            
            <form method="POST" action="{{ route('profile.destroy') }}" onsubmit="return confirm('Are you sure you want to delete your account? This action cannot be undone.')">
              @csrf
              @method('DELETE')
              <button type="submit" 
                      class="px-6 py-2 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg shadow-lg transition-all duration-200 hover:shadow-xl hover:scale-105">
                Delete Account
              </button>
            </form>
          </div>
        </div>
      </div>
    </main>
  </div>
</body>
</html>
