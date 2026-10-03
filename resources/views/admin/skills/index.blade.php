@extends('layouts.admin')

@section('title', 'Kelola Keahlian')

@section('content')
<div class="bg-white rounded-2xl shadow-sm border border-gray-100">
    {{-- Header --}}
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-left gap-4 p-6 border-b border-gray-100">
        <div>
            <h2 class="text-xl font-bold text-gray-800">Daftar Keahlian</h2>
            <p class="text-sm text-gray-500 mt-1">Kelola skill dan teknologi yang Anda kuasai</p>
        </div>
        <a href="{{ route('admin.skills.create') }}" 
           class="bg-indigo-600 text-white px-5 py-2.5 rounded-xl font-medium hover:bg-indigo-700 transition flex items-center gap-2 shadow-sm whitespace-nowrap">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Tambah Keahlian
        </a>
    </div>

    {{-- Filter Tabs --}}
    <div class="px-6 pt-4 border-b border-gray-100">
        <div class="flex gap-2 flex-wrap">
            <button type="button" onclick="filterSkills('all')" 
                    class="filter-btn px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200 bg-indigo-600 text-white"
                    data-filter="all">
                Semua ({{ $skills->count() }})
            </button>
            <button type="button" onclick="filterSkills('technical')" 
                    class="filter-btn px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200 bg-gray-100 text-gray-700 hover:bg-gray-200"
                    data-filter="technical">
                💻 Teknis & Programming ({{ $skills->where('category', 'technical')->count() }})
            </button>
            <button type="button" onclick="filterSkills('administrative')" 
                    class="filter-btn px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200 bg-gray-100 text-gray-700 hover:bg-gray-200"
                    data-filter="administrative">
                📊 Administrasi & Perkantoran ({{ $skills->where('category', 'administrative')->count() }})
            </button>
        </div>
    </div>

    {{-- Tabel --}}
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">No</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Kategori</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Ikon</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Nama Keahlian</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Persentase</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Progress</th>
                    <th class="px-6 py-4 text-center text-xs font-semibold text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white" id="skillsTableBody">
                @forelse($skills as $index => $skill)
                <tr class="skill-row hover:bg-gray-50 transition duration-150" data-category="{{ $skill->category }}">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $index + 1 }}
                    </td>
                    
                    {{-- Kategori Badge --}}
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($skill->category == 'technical')
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                                💻 Teknis
                            </span>
                        @else
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800">
                                📊 Administrasi
                            </span>
                        @endif
                    </td>
                    
                    {{-- Ikon --}}
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($skill->icon_url)
                            <img src="{{ $skill->icon_url }}" 
                                 alt="{{ $skill->name }}" 
                                 class="w-10 h-10 object-contain rounded-lg border border-gray-100 bg-gray-50 p-1.5">
                        @else
                            <div class="w-10 h-10 bg-gradient-to-br from-indigo-100 to-purple-100 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                                </svg>
                            </div>
                        @endif
                    </td>
                    
                    {{-- Nama --}}
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="font-semibold text-gray-900">{{ $skill->name }}</span>
                    </td>
                    
                    {{-- Persentase Badge --}}
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium 
                            @if($skill->percentage >= 80) bg-green-100 text-green-800
                            @elseif($skill->percentage >= 60) bg-blue-100 text-blue-800
                            @elseif($skill->percentage >= 40) bg-yellow-100 text-yellow-800
                            @else bg-gray-100 text-gray-800
                            @endif">
                            {{ $skill->percentage }}%
                        </span>
                    </td>
                    
                    {{-- Progress Bar --}}
                    <td class="px-6 py-4 whitespace-nowrap w-64">
                        <div class="flex items-center gap-2">
                            <div class="flex-1 bg-gray-100 rounded-full h-2 overflow-hidden">
                                <div class="h-2 rounded-full transition-all duration-500 
                                    {{ $skill->category == 'technical' ? 'bg-gradient-to-r from-indigo-500 to-purple-500' : 'bg-gradient-to-r from-emerald-500 to-teal-500' }}" 
                                    style="width: {{ $skill->percentage }}%"></div>
                            </div>
                            <span class="text-xs text-gray-500">{{ $skill->percentage }}%</span>
                        </div>
                    </td>
                    
                    {{-- Aksi --}}
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        <div class="flex items-center justify-center gap-2">
                            <a href="{{ route('admin.skills.edit', $skill) }}" 
                               class="inline-flex items-center gap-1 px-3 py-1.5 bg-indigo-50 text-indigo-700 rounded-lg hover:bg-indigo-100 transition"
                               title="Edit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                Edit
                            </a>
                            
                            <button type="button" 
                                    onclick="confirmDelete('{{ $skill->id }}', '{{ $skill->name }}')"
                                    class="inline-flex items-center gap-1 px-3 py-1.5 bg-red-50 text-red-700 rounded-lg hover:bg-red-100 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                Hapus
                            </button>
                            
                            <form id="delete-form-{{ $skill->id }}" action="{{ route('admin.skills.destroy', $skill) }}" method="POST" class="hidden">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-6 py-12 text-center">
                        <div class="flex flex-col items-center justify-center">
                            <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-1">Belum ada keahlian</h3>
                            <p class="text-gray-500 mb-4">Mulai tambahkan keahlian pertama Anda</p>
                            <a href="{{ route('admin.skills.create') }}" 
                               class="bg-indigo-600 text-white px-5 py-2 rounded-xl font-medium hover:bg-indigo-700 transition inline-flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                Tambah Keahlian
                            </a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Footer dengan informasi jumlah data --}}
    @if($skills->count() > 0)
    <div class="px-6 py-4 border-t border-gray-100 bg-gray-50 rounded-b-2xl">
        <div class="flex flex-col sm:flex-row justify-between items-center gap-4 text-sm">
            <span class="text-gray-600">
                Menampilkan <span class="font-semibold" id="totalDisplay">{{ $skills->count() }}</span> keahlian
            </span>
            <div class="flex gap-4 text-xs">
                <span class="text-gray-500">
                    Rata-rata Teknis: 
                    <span class="font-semibold text-indigo-600">
                        {{ round($skills->where('category', 'technical')->avg('percentage')) }}%
                    </span>
                </span>
                <span class="text-gray-500">
                    Rata-rata Administrasi: 
                    <span class="font-semibold text-emerald-600">
                        {{ round($skills->where('category', 'administrative')->avg('percentage')) }}%
                    </span>
                </span>
                <span class="text-gray-500">
                    Total Rata-rata: 
                    <span class="font-semibold text-gray-700">
                        {{ round($skills->avg('percentage')) }}%
                    </span>
                </span>
            </div>
        </div>
    </div>
    @endif
</div>

<script>
function filterSkills(category) {
    const rows = document.querySelectorAll('.skill-row');
    let visibleCount = 0;
    
    // Update active class on buttons
    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.classList.remove('bg-indigo-600', 'text-white');
        btn.classList.add('bg-gray-100', 'text-gray-700');
    });
    
    const activeBtn = document.querySelector(`.filter-btn[data-filter="${category}"]`);
    activeBtn.classList.remove('bg-gray-100', 'text-gray-700');
    activeBtn.classList.add('bg-indigo-600', 'text-white');
    
    // Filter rows
    rows.forEach(row => {
        if (category === 'all' || row.dataset.category === category) {
            row.style.display = '';
            visibleCount++;
        } else {
            row.style.display = 'none';
        }
    });
    
    // Update total display
    document.getElementById('totalDisplay').innerText = visibleCount;
}

function confirmDelete(id, name) {
    if (confirm(`Apakah Anda yakin ingin menghapus keahlian "${name}"?`)) {
        document.getElementById(`delete-form-${id}`).submit();
    }
}
</script>
@endsection