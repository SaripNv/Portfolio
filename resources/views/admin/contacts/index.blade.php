@extends('layouts.admin')

@section('title', 'Pesan Masuk')

@section('content')
<div class="bg-white rounded-2xl shadow-sm border border-gray-100">
    <div class="p-6 border-b border-gray-100">
        <h2 class="text-lg font-bold text-gray-800">Pesan dari Pengunjung</h2>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">#</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Nama</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Pesan</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Tanggal</th>
                    <th class="px-6 py-4 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($contacts as $index => $contact)
                <tr class="hover:bg-gray-50 transition {{ !$contact->is_read ? 'bg-indigo-50/50' : '' }}">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                        {{ $index + 1 }}
                        @if(!$contact->is_read)
                            <span class="ml-2 w-2 h-2 bg-indigo-600 rounded-full inline-block"></span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <p class="font-medium text-gray-900">{{ $contact->name }}</p>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="mailto:{{ $contact->email }}" class="text-indigo-600 hover:underline text-sm">
                            {{ $contact->email }}
                        </a>
                    </td>
                    <td class="px-6 py-4">
                        <p class="text-sm text-gray-600 truncate max-w-xs">{{ Str::limit($contact->message, 60) }}</p>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($contact->is_read)
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                Sudah Dibaca
                            </span>
                        @else
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                Baru
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $contact->created_at->format('d M Y H:i') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="{{ route('admin.contacts.show', $contact) }}" 
                           class="text-indigo-600 hover:text-indigo-900 mr-4 transition">
                            Detail
                        </a>
                        <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="text-red-600 hover:text-red-900 transition"
                                    onclick="return confirm('Hapus pesan ini?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-6 py-12 text-center text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <p class="text-lg">Belum ada pesan masuk.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection