<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'My Portfolio') - Laravel Portfolio</title>
    
    <!-- ✅ FAVICON -->
    <link rel="icon" type="image/png" href="{{ asset('logos.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('logos.png') }}">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    {{-- Font dari Google (opsional) --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800" rel="stylesheet" />
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-white text-gray-900 antialiased">
    {{-- Navigasi --}}
    <nav class="fixed top-0 left-0 w-full bg-white/90 backdrop-blur-md border-b border-gray-100 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                {{-- Logo --}}
                <a href="{{ route('home') }}" class="flex items-center gap-2 text-2xl font-extrabold text-indigo-600 tracking-tight">
                    <img src="{{ asset('logos.png') }}" alt="Logo" class="h-8 w-8 object-contain">
                    <span>&lt;Portfolio /&gt;</span>
                </a>

                {{-- Menu --}}
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#hero" class="text-gray-600 hover:text-indigo-600 font-medium transition">Beranda</a>
                    <a href="#skills" class="text-gray-600 hover:text-indigo-600 font-medium transition">Keahlian</a>
                    <a href="#projects" class="text-gray-600 hover:text-indigo-600 font-medium transition">Proyek</a>
                    <a href="#contact" class="text-gray-600 hover:text-indigo-600 font-medium transition">Kontak</a>
                    <a href="{{ route('login') }}" class="text-indigo-600 border border-indigo-600 px-4 py-2 rounded-lg font-medium hover:bg-indigo-600 hover:text-white transition">
                        Login Admin
                    </a>
                </div>

                {{-- Mobile Menu Button --}}
                <button class="md:hidden text-gray-600 hover:text-indigo-600" onclick="toggleMobileMenu()">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

            {{-- Mobile Menu --}}
            <div id="mobile-menu" class="md:hidden hidden pb-4">
                <a href="#hero" class="block py-2 text-gray-600 hover:text-indigo-600">Beranda</a>
                <a href="#skills" class="block py-2 text-gray-600 hover:text-indigo-600">Keahlian</a>
                <a href="#projects" class="block py-2 text-gray-600 hover:text-indigo-600">Proyek</a>
                <a href="#contact" class="block py-2 text-gray-600 hover:text-indigo-600">Kontak</a>
                <a href="{{ route('login') }}" class="block py-2 text-indigo-600 font-medium">Login Admin</a>
            </div>
        </div>
    </nav>

    {{-- Konten Utama (diberi padding atas agar tidak tertutup navbar fixed) --}}
    <main class="pt-16">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-gray-900 text-gray-300 py-12 mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-4 md:mb-0">
                    <div class="flex items-center gap-2">
                        <img src="{{ asset('logos.png') }}" alt="Logo" class="h-8 w-8 object-contain">
                        <h3 class="text-2xl font-bold text-white">&lt;Portfolio /&gt;</h3>
                    </div>
                    <p class="text-sm mt-2">Dibuat dengan Laravel & Tailwind CSS</p>
                </div>
                <div class="flex space-x-6">
                    <a href="https://github.com/SaripNv" class="text-gray-400 hover:text-white transition">
                        <span class="sr-only">GitHub</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                    </a>
                    <a href="https://www.linkedin.com/in/saripudin" class="text-gray-400 hover:text-white transition">
                        <span class="sr-only">LinkedIn</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                    </a>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-sm">
                <p>&copy; {{ date('Y') }} Saripudin. All rights reserved.</p>
            </div>
        </div>
    </footer>

    {{-- Script untuk mobile menu --}}
    <script>
        function toggleMobileMenu() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        }

        // Smooth scroll untuk anchor link
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });
    </script>
</body>
</html>