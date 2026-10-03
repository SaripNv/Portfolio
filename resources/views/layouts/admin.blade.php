<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard') - Admin Panel</title>
    
    <!-- ✅ FAVICON -->
    <link rel="icon" type="image/png" href="{{ asset('logos.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('logos.png') }}">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />
    <style>
        body { font-family: 'Inter', sans-serif; }
        .active-sidebar { background-color: rgb(79, 70, 229); }
    </style>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen overflow-hidden">
        {{-- Sidebar --}}
        <aside class="w-64 bg-gray-900 text-white flex-shrink-0 hidden md:block">
            <div class="p-6">
                <h2 class="text-2xl font-bold text-indigo-400 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Admin Panel
                </h2>
            </div>

            <nav class="mt-6 px-4">
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-4 px-4">Menu Utama</p>
                
                <a href="{{ route('admin.dashboard') }}" 
                   class="flex items-center gap-3 py-3 px-4 rounded-lg mb-1 text-gray-300 hover:bg-gray-800 hover:text-white transition {{ request()->routeIs('admin.dashboard') ? 'active-sidebar' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Dashboard
                </a>

                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-4 mt-8 px-4">Data Portofolio</p>

                <a href="{{ route('admin.skills.index') }}" 
                   class="flex items-center gap-3 py-3 px-4 rounded-lg mb-1 text-gray-300 hover:bg-gray-800 hover:text-white transition {{ request()->routeIs('admin.skills.*') ? 'active-sidebar' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                    </svg>
                    Keahlian
                </a>

                <a href="{{ route('admin.projects.index') }}" 
                   class="flex items-center gap-3 py-3 px-4 rounded-lg mb-1 text-gray-300 hover:bg-gray-800 hover:text-white transition {{ request()->routeIs('admin.projects.*') ? 'active-sidebar' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    Proyek
                </a>

                <a href="{{ route('admin.contacts.index') }}" 
                   class="flex items-center gap-3 py-3 px-4 rounded-lg mb-1 text-gray-300 hover:bg-gray-800 hover:text-white transition {{ request()->routeIs('admin.contacts.*') ? 'active-sidebar' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    Pesan
                    @php
                        $unreadCount = \App\Models\Contact::where('is_read', false)->count();
                    @endphp
                    @if($unreadCount > 0)
                        <span class="ml-auto bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">
                            {{ $unreadCount }}
                        </span>
                    @endif
                </a>

                <div class="border-t border-gray-800 mt-8 pt-6 px-4">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="flex items-center gap-3 w-full py-3 px-4 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            Logout
                        </button>
                    </form>
                </div>
            </nav>
        </aside>

        {{-- Mobile Sidebar Overlay --}}
        <div id="mobile-sidebar" class="fixed inset-0 z-50 hidden md:hidden">
            <div class="fixed inset-0 bg-black opacity-50" onclick="toggleMobileSidebar()"></div>
            <div class="fixed inset-y-0 left-0 w-64 bg-gray-900 text-white p-6 overflow-y-auto">
                {{-- Sama seperti sidebar desktop (bisa di-extract sebagian) --}}
                <h2 class="text-2xl font-bold text-indigo-400 mb-8">Admin Panel</h2>
                <nav class="space-y-2">
                    <a href="{{ route('admin.dashboard') }}" class="block py-3 px-4 rounded-lg text-gray-300 hover:bg-gray-800 hover:text-white">Dashboard</a>
                    <a href="{{ route('admin.skills.index') }}" class="block py-3 px-4 rounded-lg text-gray-300 hover:bg-gray-800 hover:text-white">Keahlian</a>
                    <a href="{{ route('admin.projects.index') }}" class="block py-3 px-4 rounded-lg text-gray-300 hover:bg-gray-800 hover:text-white">Proyek</a>
                    <a href="{{ route('admin.contacts.index') }}" class="block py-3 px-4 rounded-lg text-gray-300 hover:bg-gray-800 hover:text-white">Pesan</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="block w-full text-left py-3 px-4 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white mt-4">Logout</button>
                    </form>
                </nav>
            </div>
        </div>

        {{-- Main Content Area --}}
        <div class="flex-1 flex flex-col overflow-hidden">
            {{-- Top Navbar --}}
            <header class="bg-white shadow-sm flex-shrink-0">
                <div class="flex justify-between items-center px-6 py-4">
                    <div class="flex items-center gap-4">
                        {{-- Hamburger menu untuk mobile --}}
                        <button class="md:hidden text-gray-600 hover:text-gray-900" onclick="toggleMobileSidebar()">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                        <h1 class="text-xl font-bold text-gray-800">@yield('title', 'Dashboard')</h1>
                    </div>
                    <div class="flex items-center gap-4">
                        <span class="text-sm text-gray-500 hidden sm:block">
                            {{ Auth::user()->name }}
                        </span>
                        <div class="w-8 h-8 bg-indigo-600 rounded-full flex items-center justify-center text-white text-sm font-semibold">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                    </div>
                </div>
            </header>

            {{-- Main Content --}}
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
                {{-- Alert Success --}}
                @if(session('success'))
                <div id="alert" class="mb-6 bg-green-50 border border-green-200 text-green-700 px-6 py-4 rounded-xl flex items-center justify-between animate-fade-in">
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{ session('success') }}</span>
                    </div>
                    <button onclick="this.parentElement.remove()" class="text-green-500 hover:text-green-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <script>
        function toggleMobileSidebar() {
            document.getElementById('mobile-sidebar').classList.toggle('hidden');
        }
    </script>
    
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in {
            animation: fadeIn 0.3s ease-out;
        }
    </style>
</body>
</html>