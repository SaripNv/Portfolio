@extends('layouts.admin')

@section('title', 'Edit Keahlian')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        {{-- Header --}}
        <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-amber-50 to-orange-50">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-amber-100 rounded-xl flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-gray-800">Edit Keahlian</h2>
                    <p class="text-sm text-gray-500">Perbarui informasi keahlian yang sudah ada</p>
                </div>
            </div>
        </div>

        {{-- Form --}}
        <form action="{{ route('admin.skills.update', $skill) }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf
            @method('PUT')
            
            {{-- Nama Keahlian --}}
            <div class="mb-6">
                <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                    Nama Keahlian <span class="text-red-500">*</span>
                </label>
                <input type="text" 
                       name="name" 
                       id="name" 
                       value="{{ old('name', $skill->name) }}"
                       class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400 transition @error('name') border-red-400 @enderror" 
                       placeholder="Contoh: Laravel, Microsoft Excel, React.js"
                       required>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Kategori --}}
            <div class="mb-6">
                <label for="category" class="block text-sm font-semibold text-gray-700 mb-2">
                    Kategori <span class="text-red-500">*</span>
                </label>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <label class="relative flex items-center p-4 border rounded-xl cursor-pointer transition-all duration-200 @error('category') border-red-400 @else border-gray-200 hover:border-indigo-300 @enderror">
                        <input type="radio" name="category" value="technical" class="w-5 h-5 text-indigo-600" {{ old('category', $skill->category) == 'technical' ? 'checked' : '' }} required>
                        <div class="ml-3">
                            <div class="font-semibold text-gray-800">💻 Teknis & Programming</div>
                            <div class="text-xs text-gray-500">Laravel, React, Node.js, dll</div>
                        </div>
                    </label>
                    <label class="relative flex items-center p-4 border rounded-xl cursor-pointer transition-all duration-200 @error('category') border-red-400 @else border-gray-200 hover:border-emerald-300 @enderror">
                        <input type="radio" name="category" value="administrative" class="w-5 h-5 text-emerald-600" {{ old('category', $skill->category) == 'administrative' ? 'checked' : '' }}>
                        <div class="ml-3">
                            <div class="font-semibold text-gray-800">📊 Administrasi & Perkantoran</div>
                            <div class="text-xs text-gray-500">Microsoft Office, Google Workspace, dll</div>
                        </div>
                    </label>
                </div>
                @error('category')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Persentase --}}
            <div class="mb-6">
                <label for="percentage" class="block text-sm font-semibold text-gray-700 mb-2">
                    Persentase Keahlian (%) <span class="text-red-500">*</span>
                </label>
                <div class="flex items-center gap-4">
                    <input type="range" 
                           id="percentageSlider" 
                           min="0" 
                           max="100" 
                           value="{{ old('percentage', $skill->percentage) }}"
                           class="flex-1 h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer">
                    <input type="number" 
                           name="percentage" 
                           id="percentage" 
                           value="{{ old('percentage', $skill->percentage) }}"
                           min="0" 
                           max="100"
                           class="w-24 border border-gray-300 rounded-xl px-3 py-2 text-center focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400 transition @error('percentage') border-red-400 @enderror" 
                           required>
                </div>
                <div class="mt-2 w-full bg-gray-100 rounded-full h-2 overflow-hidden">
                    <div id="previewProgress" class="h-2 rounded-full transition-all duration-300 
                        {{ $skill->category == 'technical' ? 'bg-gradient-to-r from-indigo-500 to-purple-500' : 'bg-gradient-to-r from-emerald-500 to-teal-500' }}" 
                        style="width: {{ old('percentage', $skill->percentage) }}%"></div>
                </div>
                @error('percentage')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Ikon --}}
            <div class="mb-6">
                <label for="icon" class="block text-sm font-semibold text-gray-700 mb-2">
                    Ikon / Logo Keahlian
                    <span class="text-gray-400 text-xs font-normal">(Opsional, maks 2MB)</span>
                </label>
                
                <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4">
                    <div class="flex-1 w-full">
                        <label class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed rounded-xl cursor-pointer hover:bg-gray-50 transition @error('icon') border-red-400 @else border-gray-300 @enderror">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                </svg>
                                <p class="text-sm text-gray-500">Klik untuk upload atau drag & drop</p>
                                <p class="text-xs text-gray-400">PNG, JPG, SVG, WEBP (Maks 2MB)</p>
                            </div>
                            <input type="file" name="icon" id="icon" class="hidden" accept="image/png, image/jpeg, image/jpg, image/svg+xml, image/webp">
                        </label>
                    </div>
                    
                    {{-- Preview existing icon --}}
                    <div id="iconPreview" class="w-32 h-32 border-2 rounded-xl overflow-hidden bg-gray-50 flex-shrink-0 {{ $skill->icon ? '' : 'hidden' }}">
                        <img id="previewImg" class="w-full h-full object-contain p-2" src="{{ $skill->icon_url ?? '' }}">
                        @if($skill->icon)
                            <div class="text-center text-xs text-green-600 bg-green-50 py-1">Ikon saat ini</div>
                        @endif
                    </div>
                </div>
                
                @if($skill->icon)
                    <div class="mt-2 flex items-center gap-2 text-sm">
                        <span class="text-green-600">✓ Ikon saat ini tersimpan</span>
                        <button type="button" onclick="removeIcon()" class="text-red-500 hover:text-red-700 text-xs">(Hapus ikon)</button>
                    </div>
                @endif                
                @error('icon')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Tombol --}}
            <div class="flex gap-4 pt-4 border-t border-gray-100">
                <button type="submit" 
                        class="bg-indigo-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-indigo-700 transition flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Perbarui Keahlian
                </button>
                <a href="{{ route('admin.skills.index') }}" 
                   class="border border-gray-300 text-gray-700 px-6 py-3 rounded-xl font-semibold hover:bg-gray-50 transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

<script>
// Sync percentage
const slider = document.getElementById('percentageSlider');
const percentageInput = document.getElementById('percentage');
const previewProgress = document.getElementById('previewProgress');

function updatePercentage(value) {
    slider.value = value;
    percentageInput.value = value;
    previewProgress.style.width = value + '%';
}

slider.addEventListener('input', () => updatePercentage(slider.value));
percentageInput.addEventListener('input', () => updatePercentage(percentageInput.value));

// Update progress bar color based on category selection
document.querySelectorAll('input[name="category"]').forEach(radio => {
    radio.addEventListener('change', function() {
        if (this.value === 'technical') {
            previewProgress.className = 'h-2 rounded-full transition-all duration-300 bg-gradient-to-r from-indigo-500 to-purple-500';
        } else {
            previewProgress.className = 'h-2 rounded-full transition-all duration-300 bg-gradient-to-r from-emerald-500 to-teal-500';
        }
    });
});

// Preview new image
document.getElementById('icon').addEventListener('change', function(e) {
    const preview = document.getElementById('iconPreview');
    const img = document.getElementById('previewImg');
    
    if (e.target.files && e.target.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            img.src = e.target.result;
            preview.classList.remove('hidden');
            // Update caption
            const caption = preview.querySelector('.text-center');
            if (caption) caption.innerHTML = 'Ikon baru (belum tersimpan)';
        }
        reader.readAsDataURL(e.target.files[0]);
    }
});

function removeIcon() {
    if (confirm('Hapus ikon yang tersimpan?')) {
        // Create hidden input to mark icon deletion
        const form = document.querySelector('form');
        const hiddenInput = document.createElement('input');
        hiddenInput.type = 'hidden';
        hiddenInput.name = 'remove_icon';
        hiddenInput.value = '1';
        form.appendChild(hiddenInput);
        
        // Hide preview
        document.getElementById('iconPreview').classList.add('hidden');
        document.getElementById('icon').value = '';
    }
}
</script>
@endsection