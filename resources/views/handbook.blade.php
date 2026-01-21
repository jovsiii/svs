<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PUP Handbook - SVS</title>
  <script src="https://cdn.tailwindcss.com"></script>
  @csrf
</head>
<body class="bg-gradient-to-br from-slate-900 to-slate-800 text-slate-100">
  <div class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-slate-950 border-r border-slate-800 flex flex-col fixed h-screen">
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
        <a href="{{ route('handbook') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg bg-indigo-500/20 text-indigo-300">
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
    <main class="flex-1 p-8 ml-64">
      <!-- Header -->
      <div class="mb-8">
        <h1 class="text-2xl font-semibold">PUP Handbook</h1>
        <p class="text-slate-400">University Code of Discipline</p>
      </div>

      <!-- Content -->
      <div class="bg-slate-900 rounded-2xl p-8 shadow-lg border border-slate-800">
        <div class="mb-8">
          <h2 class="text-3xl font-bold text-center text-indigo-400 mb-2">CODE OF DISCIPLINE</h2>
          <div class="w-24 h-1 bg-gradient-to-r from-indigo-500 to-purple-500 mx-auto rounded-full"></div>
        </div>
        
        <div class="space-y-8">
          <!-- Section 1 -->
          <section class="relative">
            <div class="flex items-start gap-4">
              <div class="flex-shrink-0 w-10 h-10 bg-indigo-500/20 rounded-full flex items-center justify-center border-2 border-indigo-500/50">
                <span class="text-indigo-400 font-bold text-sm">1</span>
              </div>
              <div class="flex-1 bg-slate-800/50 rounded-xl p-6 border border-slate-700/50 hover:border-indigo-500/30 transition-all duration-300">
                <h3 class="text-lg font-semibold text-indigo-300 mb-3">Student offenses shall be subjected to disciplinary measures by the University.</h3>
                <p class="text-slate-300 leading-relaxed">If the sanction imposed is suspension or dismissal, the student shall not be allowed to enter the University premises.</p>
              </div>
            </div>
          </section>

          <!-- Section 2 -->
          <section class="relative">
            <div class="flex items-start gap-4">
              <div class="flex-shrink-0 w-10 h-10 bg-indigo-500/20 rounded-full flex items-center justify-center border-2 border-indigo-500/50">
                <span class="text-indigo-400 font-bold text-sm">2</span>
              </div>
              <div class="flex-1 bg-slate-800/50 rounded-xl p-6 border border-slate-700/50 hover:border-indigo-500/30 transition-all duration-300">
                <h3 class="text-lg font-semibold text-indigo-300 mb-3">Complaint Referral</h3>
                <p class="text-slate-300 leading-relaxed">All complaints involving students shall be referred to the Office of the Student Services.</p>
              </div>
            </div>
          </section>

          <!-- Section 3 - Grounds for Disciplinary Action -->
          <section class="relative">
            <div class="flex items-start gap-4 mb-6">
              <div class="flex-shrink-0 w-10 h-10 bg-indigo-500/20 rounded-full flex items-center justify-center border-2 border-indigo-500/50">
                <span class="text-indigo-400 font-bold text-sm">3</span>
              </div>
              <div class="flex-1">
                <h3 class="text-xl font-semibold text-indigo-300 mb-2">Grounds for Disciplinary Action</h3>
                <div class="w-16 h-0.5 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-full"></div>
              </div>
            </div>
            
            <div class="ml-14 grid grid-cols-1 md:grid-cols-2 gap-4">
              <div class="bg-gradient-to-br from-red-500/10 to-orange-500/10 rounded-xl p-5 border border-red-500/20 hover:border-red-500/40 transition-all duration-300 group">
                <div class="flex items-center gap-3 mb-3">
                  <div class="w-8 h-8 bg-red-500/20 rounded-lg flex items-center justify-center group-hover:bg-red-500/30 transition-colors">
                    <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 9H6a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2V6a2 2 0 00-2-2h-4m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2"></path>
                    </svg>
                  </div>
                  <h4 class="font-semibold text-red-300">3.1 Identification and Access</h4>
                </div>
                <p class="text-slate-300 text-sm leading-relaxed">Failure to carry or properly use a valid student ID or unauthorized campus access.</p>
              </div>

              <div class="bg-gradient-to-br from-yellow-500/10 to-amber-500/10 rounded-xl p-5 border border-yellow-500/20 hover:border-yellow-500/40 transition-all duration-300 group">
                <div class="flex items-center gap-3 mb-3">
                  <div class="w-8 h-8 bg-yellow-500/20 rounded-lg flex items-center justify-center group-hover:bg-yellow-500/30 transition-colors">
                    <svg class="w-4 h-4 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                  </div>
                  <h4 class="font-semibold text-yellow-300">3.2 Conduct and Behavior</h4>
                </div>
                <p class="text-slate-300 text-sm leading-relaxed">Disruptive, disrespectful, violent, or unsafe behavior within University premises or during University-related activities.</p>
              </div>

              <div class="bg-gradient-to-br from-blue-500/10 to-cyan-500/10 rounded-xl p-5 border border-blue-500/20 hover:border-blue-500/40 transition-all duration-300 group">
                <div class="flex items-center gap-3 mb-3">
                  <div class="w-8 h-8 bg-blue-500/20 rounded-lg flex items-center justify-center group-hover:bg-blue-500/30 transition-colors">
                    <svg class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                  </div>
                  <h4 class="font-semibold text-blue-300">3.3 Academic Integrity</h4>
                </div>
                <p class="text-slate-300 text-sm leading-relaxed">Cheating, plagiarism, falsification of documents, or any form of academic dishonesty.</p>
              </div>

              <div class="bg-gradient-to-br from-purple-500/10 to-pink-500/10 rounded-xl p-5 border border-purple-500/20 hover:border-purple-500/40 transition-all duration-300 group">
                <div class="flex items-center gap-3 mb-3">
                  <div class="w-8 h-8 bg-purple-500/20 rounded-lg flex items-center justify-center group-hover:bg-purple-500/30 transition-colors">
                    <svg class="w-4 h-4 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                  </div>
                  <h4 class="font-semibold text-purple-300">3.4 University Property</h4>
                </div>
                <p class="text-slate-300 text-sm leading-relaxed">Unauthorized use, damage, vandalism, or misuse of University property, facilities, or official identifiers.</p>
              </div>

              <div class="bg-gradient-to-br from-green-500/10 to-emerald-500/10 rounded-xl p-5 border border-green-500/20 hover:border-green-500/40 transition-all duration-300 group">
                <div class="flex items-center gap-3 mb-3">
                  <div class="w-8 h-8 bg-green-500/20 rounded-lg flex items-center justify-center group-hover:bg-green-500/30 transition-colors">
                    <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path>
                    </svg>
                  </div>
                  <h4 class="font-semibold text-green-300">3.5 Prohibited Items</h4>
                </div>
                <p class="text-slate-300 text-sm leading-relaxed">Possession or use of illegal drugs, deadly weapons, alcohol, or engagement in gambling while on campus.</p>
              </div>

              <div class="bg-gradient-to-br from-pink-500/10 to-rose-500/10 rounded-xl p-5 border border-pink-500/20 hover:border-pink-500/40 transition-all duration-300 group">
                <div class="flex items-center gap-3 mb-3">
                  <div class="w-8 h-8 bg-pink-500/20 rounded-lg flex items-center justify-center group-hover:bg-pink-500/30 transition-colors">
                    <svg class="w-4 h-4 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                    </svg>
                  </div>
                  <h4 class="font-semibold text-pink-300">3.6 Harassment and Abuse</h4>
                </div>
                <p class="text-slate-300 text-sm leading-relaxed">Bullying, harassment, sexual harassment, intimidation, hazing, or any act that harms the dignity or safety of others.</p>
              </div>
            </div>
          </section>

          <!-- Section 4 -->
          <section class="relative">
            <div class="flex items-start gap-4">
              <div class="flex-shrink-0 w-10 h-10 bg-indigo-500/20 rounded-full flex items-center justify-center border-2 border-indigo-500/50">
                <span class="text-indigo-400 font-bold text-sm">4</span>
              </div>
              <div class="flex-1 bg-slate-800/50 rounded-xl p-6 border border-slate-700/50 hover:border-indigo-500/30 transition-all duration-300">
                <h3 class="text-lg font-semibold text-indigo-300 mb-3">Disciplinary Authorities</h3>
                <p class="text-slate-300 leading-relaxed">The Office of the Director of Student Services (ODSS) handles minor offenses. Serious cases are referred to the Student Disciplinary Board or the University Legal Counsel, as appropriate.</p>
              </div>
            </div>
          </section>

          <!-- Section 5 -->
          <section class="relative">
            <div class="flex items-start gap-4">
              <div class="flex-shrink-0 w-10 h-10 bg-indigo-500/20 rounded-full flex items-center justify-center border-2 border-indigo-500/50">
                <span class="text-indigo-400 font-bold text-sm">5</span>
              </div>
              <div class="flex-1 bg-slate-800/50 rounded-xl p-6 border border-slate-700/50 hover:border-indigo-500/30 transition-all duration-300">
                <h3 class="text-lg font-semibold text-indigo-300 mb-3">Record Management</h3>
                <p class="text-slate-300 leading-relaxed">The ODSS maintains official records of student disciplinary cases, except those handled by designated investigative or legal offices.</p>
              </div>
            </div>
          </section>

          <!-- Section 6 -->
          <section class="relative">
            <div class="flex items-start gap-4">
              <div class="flex-shrink-0 w-10 h-10 bg-indigo-500/20 rounded-full flex items-center justify-center border-2 border-indigo-500/50">
                <span class="text-indigo-400 font-bold text-sm">6</span>
              </div>
              <div class="flex-1 bg-slate-800/50 rounded-xl p-6 border border-slate-700/50 hover:border-indigo-500/30 transition-all duration-300">
                <h3 class="text-lg font-semibold text-indigo-300 mb-3">Parental Notification</h3>
                <p class="text-slate-300 leading-relaxed">All offenses shall be reported to the parent/s or guardian/s of the offender through the Guidance, Counseling and Testing Services Office. Due process shall be observed by the University through its authorized representative/s.</p>
              </div>
            </div>
          </section>

          <!-- Section 7 -->
          <section class="relative">
            <div class="flex items-start gap-4">
              <div class="flex-shrink-0 w-10 h-10 bg-indigo-500/20 rounded-full flex items-center justify-center border-2 border-indigo-500/50">
                <span class="text-indigo-400 font-bold text-sm">7</span>
              </div>
              <div class="flex-1 bg-slate-800/50 rounded-xl p-6 border border-slate-700/50 hover:border-indigo-500/30 transition-all duration-300">
                <h3 class="text-lg font-semibold text-indigo-300 mb-3">Additional Violations</h3>
                <p class="text-slate-300 leading-relaxed">Violations not covered under this Code are reviewed by the Student Disciplinary Board and elevated to University authorities for final action.</p>
              </div>
            </div>
          </section>
        </div>
      </div>
    </main>
  </div>
</body>
</html>
