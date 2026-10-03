@extends('layouts.public')

@section('title', 'Beranda')

@section('content')
{{-- Hero Section --}}
<section id="hero" class="min-h-screen flex items-center bg-gradient-to-br from-indigo-50 via-white to-purple-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            {{-- Teks --}}
            <div class="order-2 md:order-1">
                <div class="inline-block bg-indigo-100 text-indigo-700 rounded-full px-4 py-1 text-sm font-medium mb-6">
                    👋 Halo, selamat datang!
                </div>
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-gray-900 leading-tight mb-6">
                    Saya <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600">Saripudin</span>
                </h1>
                <p class="text-lg sm:text-xl text-gray-600 mb-8 max-w-lg">
                Fresh graduate Sistem Informasi Universitas Subang (wisuda Mei 2026) dengan kemampuan membangun aplikasi web dari sisi frontend maupun backend. Berpengalaman menggunakan CodeIgniter 4, Laravel, React Native, dan Figma. Didukung kemampuan administrasi perkantoran menggunakan Microsoft Office dan Google Workspace. Memiliki portofolio proyek nyata termasuk sistem untuk klien langsung, proyek tim, dan skripsi berbasis web.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="#projects" class="bg-indigo-600 text-white px-8 py-3 rounded-full font-semibold hover:bg-indigo-700 transition shadow-lg shadow-indigo-200">
                        Lihat Karya Saya
                    </a>
                    <a href="#contact" class="border-2 border-indigo-600 text-indigo-600 px-8 py-3 rounded-full font-semibold hover:bg-indigo-600 hover:text-white transition">
                        Hubungi Saya
                    </a>
                </div>
                
                {{-- Statistik --}}
                <div class="flex gap-8 mt-12">
                    <div>
                        <span class="text-3xl font-bold text-gray-900">{{ $projects->count() }}+</span>
                        <p class="text-gray-500 text-sm">Proyek Selesai</p>
                    </div>
                    <div>
                        <span class="text-3xl font-bold text-gray-900">3+</span>
                        <p class="text-gray-500 text-sm">Tahun Pengalaman</p>
                    </div>
                    <div>
                       <span class="text-3xl font-bold text-gray-900">{{ ($technicalSkills->count() + $administrativeSkills->count()) }}+</span>
                        <p class="text-gray-500 text-sm">Keahlian</p>
                    </div>
                </div>
            </div>

            {{-- Foto/Ilustrasi --}}
            <div class="order-1 md:order-2 flex justify-center">
                <div class="relative w-72 h-72 sm:w-96 sm:h-96 bg-gradient-to-br from-indigo-400 to-purple-600 rounded-full flex items-center justify-center shadow-2xl">
                    <div class="w-64 h-64 sm:w-80 sm:h-80 bg-gray-200 rounded-full border-4 border-white overflow-hidden flex items-center justify-center text-6xl">
                        👨‍💻
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Technical Skills Section --}}
<section id="skills" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="text-indigo-600 font-semibold text-sm uppercase tracking-widest">Keahlian Teknis</span>
            <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mt-2">Teknologi & Programming</h2>
            <p class="text-gray-500 mt-4 max-w-2xl mx-auto">
                Tools dan teknologi modern yang saya kuasai untuk pengembangan aplikasi.
            </p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($technicalSkills as $skill)
            <div class="group bg-gray-50 hover:bg-white rounded-2xl p-6 shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 hover:border-indigo-100">
                {{-- Icon sama seperti sebelumnya --}}
                <div class="w-12 h-12 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition overflow-hidden">
                    @if($skill->icon_url)
                        <img src="{{ $skill->icon_url }}" alt="{{ $skill->name }}" class="w-full h-full object-contain">
                    @else
                        <div class="w-full h-full bg-indigo-100 text-indigo-600 flex items-center justify-center rounded-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                            </svg>
                        </div>
                    @endif
                </div>
                
                <h3 class="text-lg font-bold text-gray-900 mb-3 group-hover:text-indigo-600 transition">
                    {{ $skill->name }}
                </h3>
                
                <div class="w-full bg-gray-200 rounded-full h-2 mb-2">
                    <div class="bg-gradient-to-r from-indigo-500 to-purple-500 h-2 rounded-full transition-all duration-1000 ease-out" 
                         style="width: {{ $skill->percentage }}%"></div>
                </div>
                <span class="text-sm font-semibold text-indigo-600">{{ $skill->percentage }}%</span>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Administrative Skills Section --}}
<section id="administrative-skills" class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="text-emerald-600 font-semibold text-sm uppercase tracking-widest">Keahlian Administrasi</span>
            <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mt-2">Software Perkantoran</h2>
            <p class="text-gray-500 mt-4 max-w-2xl mx-auto">
                Kemampuan administratif dan software perkantoran untuk mendukung pekerjaan operasional.
            </p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($administrativeSkills as $skill)
            <div class="group bg-white hover:bg-emerald-50 rounded-2xl p-6 shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 hover:border-emerald-200">
                <div class="w-12 h-12 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition overflow-hidden">
                    @if($skill->icon_url)
                        <img src="{{ $skill->icon_url }}" alt="{{ $skill->name }}" class="w-full h-full object-contain">
                    @else
                        <div class="w-full h-full bg-emerald-100 text-emerald-600 flex items-center justify-center rounded-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                    @endif
                </div>
                
                <h3 class="text-lg font-bold text-gray-900 mb-3 group-hover:text-emerald-600 transition">
                    {{ $skill->name }}
                </h3>
                
                <div class="w-full bg-gray-200 rounded-full h-2 mb-2">
                    <div class="bg-gradient-to-r from-emerald-500 to-teal-500 h-2 rounded-full transition-all duration-1000 ease-out" 
                         style="width: {{ $skill->percentage }}%"></div>
                </div>
                <span class="text-sm font-semibold text-emerald-600">{{ $skill->percentage }}%</span>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Projects Section --}}
<section id="projects" class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Section Header --}}
        <div class="text-center mb-16">
            <span class="text-indigo-600 font-semibold text-sm uppercase tracking-widest">Portofolio</span>
            <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mt-2">Proyek Terbaru Saya</h2>
            <p class="text-gray-500 mt-4 max-w-2xl mx-auto">
                Berikut adalah beberapa proyek yang telah saya kerjakan. Klik untuk melihat detail lebih lanjut.
            </p>
        </div>

        {{-- Projects Grid --}}
        @if($projects->isEmpty())
            <div class="text-center py-20 text-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                </svg>
                <p class="text-xl">Belum ada proyek yang ditampilkan.</p>
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($projects as $project)
                <div class="group bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 hover:border-indigo-100">
                    {{-- Image --}}
                    <div class="relative h-48 bg-gradient-to-br from-indigo-100 to-purple-100 flex items-center justify-center overflow-hidden">
                        @if($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}" 
                                 alt="{{ $project->title }}" 
                                 class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        @else
                            <div class="text-center text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span class="text-sm">No Image</span>
                            </div>
                        @endif
                    </div>

                    {{-- Content --}}
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-indigo-600 transition">
                            {{ $project->title }}
                        </h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                            {{ $project->description }}
                        </p>
                        @if($project->url)
                        <a href="{{ $project->url }}" 
                           target="_blank" 
                           rel="noopener noreferrer"
                           class="inline-flex items-center gap-2 text-indigo-600 font-semibold hover:text-indigo-700 transition">
                            Lihat Detail
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>
</section>

{{-- Contact Section --}}
<section id="contact" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 items-start">
            {{-- Info Kontak --}}
            <div>
                <span class="text-indigo-600 font-semibold text-sm uppercase tracking-widest">Kontak</span>
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mt-2 mb-6">Mari Bekerja Sama!</h2>
                <p class="text-gray-500 mb-8 text-lg">
                    Punya proyek menarik atau ingin berdiskusi? Jangan ragu untuk menghubungi saya melalui form di samping.
                </p>

                <div class="space-y-4">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center text-indigo-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-900">Email</p>
                            <p class="text-gray-500">saripudindev@gmail.com</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center text-indigo-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-900">Lokasi</p>
                            <p class="text-gray-500">Subang, Jawa Barat</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Form Kontak --}}
            <div>
                @if(session('success'))
                <div id="success-alert" class="bg-green-50 border border-green-200 text-green-700 px-6 py-4 rounded-xl mb-6 flex items-center gap-3 animate-fade-in">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
                @endif

                <form action="{{ route('contact.send') }}" method="POST" class="bg-gray-50 rounded-2xl p-8 shadow-sm border border-gray-100">
                    @csrf
                    
                    <div class="mb-5">
                        <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                        <input type="text" 
                               name="name" 
                               id="name" 
                               value="{{ old('name') }}"
                               class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400 transition bg-white @error('name') border-red-400 @enderror" 
                               placeholder="Masukkan nama Anda"
                               required>
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                        <input type="email" 
                               name="email" 
                               id="email" 
                               value="{{ old('email') }}"
                               class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400 transition bg-white @error('email') border-red-400 @enderror" 
                               placeholder="nama@email.com"
                               required>
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="message" class="block text-sm font-semibold text-gray-700 mb-2">Pesan</label>
                        <textarea name="message" 
                                  id="message" 
                                  rows="5" 
                                  class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400 transition bg-white @error('message') border-red-400 @enderror" 
                                  placeholder="Tulis pesan Anda..."
                                  required>{{ old('message') }}</textarea>
                        @error('message')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" 
                            class="w-full bg-indigo-600 text-white py-4 rounded-xl font-semibold hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-300 transition flex items-center justify-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                        </svg>
                        Kirim Pesan
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

{{-- Animasi CSS sederhana --}}
<style>
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in {
        animation: fadeIn 0.5s ease-out;
    }
</style>
@endsection