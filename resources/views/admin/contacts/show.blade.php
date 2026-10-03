@extends('layouts.admin')

@section('title', 'Detail Pesan')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
        <div class="flex justify-between items-start mb-6">
            <h2 class="text-2xl font-bold text-gray-800 flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                Detail Pesan
            </h2>
            <a href="{{ route('admin.contacts.index') }}" 
               class="text-gray-600 hover:text-gray-900 transition flex items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali
            </a>
        </div>

        {{-- Status --}}
        <div class="mb-6">
            @if($contact->is_read)
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                    ✅ Sudah Dibaca
                </span>
            @else
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                    🆕 Belum Dibaca
                </span>
            @endif
        </div>

        {{-- Info Pengirim --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6 p-6 bg-gray-50 rounded-xl">
            <div>
                <p class="text-sm text-gray-500 mb-1">Nama Pengirim</p>
                <p class="font-semibold text-gray-900">{{ $contact->name }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500 mb-1">Email</p>
                <a href="mailto:{{ $contact->email }}" class="font-semibold text-indigo-600 hover:underline">
                    {{ $contact->email }}
                </a>
            </div>
            <div class="sm:col-span-2">
                <p class="text-sm text-gray-500 mb-1">Tanggal Diterima</p>
                <p class="font-semibold text-gray-900">{{ $contact->created_at->format('d F Y, H:i') }} WIB</p>
            </div>
        </div>

        {{-- Isi Pesan --}}
        <div class="mb-6">
            <p class="text-sm text-gray-500 mb-2 font-semibold">Isi Pesan</p>
            <div class="bg-gray-50 rounded-xl p-6">
                <p class="text-gray-800 whitespace-pre-wrap leading-relaxed">{{ $contact->message }}</p>
            </div>
        </div>

        {{-- Aksi --}}
        <div class="flex gap-4">
            <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" 
                        class="border border-red-300 text-red-600 px-6 py-2.5 rounded-xl font-semibold hover:bg-red-50 transition flex items-center gap-2"
                        onclick="return confirm('Hapus pesan ini?')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                    Hapus Pesan
                </button>
            </form>
        </div>
    </div>
</div>
@endsection