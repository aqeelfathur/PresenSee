@extends('layouts.app')

@section('title', 'Daftar Sesi Presensi')
@section('page-title', 'Daftar Sesi Presensi')
@section('page-subtitle', 'Kelola sesi presensi kelas Anda')

@section('content')

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
    <!-- Total Sesi Hari Ini -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">Total Sesi</p>
                <p class="text-2xl font-bold text-gray-900 mt-1">{{ $stats['total'] }}</p>
            </div>
            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-[#004680]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                </svg>
            </div>
        </div>
    </div>
    
    <!-- Belum Dimulai -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">Belum Dimulai</p>
                <p class="text-2xl font-bold text-yellow-600 mt-1">{{ $stats['belum_dimulai'] }}</p>
            </div>
            <div class="w-12 h-12 bg-yellow-100 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
        </div>
    </div>
    
    <!-- Selesai -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">Selesai</p>
                <p class="text-2xl font-bold text-green-600 mt-1">{{ $stats['selesai'] }}</p>
            </div>
            <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
        </div>
    </div>
</div>

<!-- Filter Section -->
<form method="GET" action="{{ route('guru.sesi-presensi') }}" class="mb-6">
    <div class="flex items-center justify-between">
        <div class="flex items-center gap-3">
            <!-- Filter Status -->
            <select name="status" class="px-4 py-2 bg-white border border-gray-200 rounded-lg text-sm font-medium text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#004680] focus:border-transparent" onchange="this.form.submit()">
                <option value="all" {{ $status == 'all' ? 'selected' : '' }}>Semua Status</option>
                <option value="upcoming" {{ $status == 'upcoming' ? 'selected' : '' }}>Belum Dimulai</option>
                <option value="ongoing" {{ $status == 'ongoing' ? 'selected' : '' }}>Berlangsung</option>
                <option value="completed" {{ $status == 'completed' ? 'selected' : '' }}>Selesai</option>
            </select>
            
            <!-- Filter Tanggal -->
            <input 
                type="date" 
                name="tanggal"
                class="px-4 py-2 bg-white border border-gray-200 rounded-lg text-sm font-medium text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#004680] focus:border-transparent"
                value="{{ $tanggal }}"
                onchange="this.form.submit()"
            >
        </div>
        
        <div class="flex items-center gap-3">
            <!-- Search -->
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
                <input 
                    type="text" 
                    name="search"
                    placeholder="Cari kelas atau mata pelajaran..."
                    class="pl-10 pr-4 py-2 bg-white border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#004680] focus:border-transparent w-64"
                    value="{{ $search }}"
                >
            </div>
            
            <!-- Refresh Button -->
            <a href="{{ route('guru.sesi-presensi') }}" class="p-2 bg-white border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                </svg>
            </a>
        </div>
    </div>
</form>

<!-- Table Section -->
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <!-- Table Header -->
    <div class="px-6 py-4 border-b border-gray-100">
        <h2 class="text-lg font-bold text-gray-900">Daftar Sesi Presensi</h2>
        <p class="text-sm text-gray-500 mt-0.5">{{ \Carbon\Carbon::parse($tanggal)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</p>
    </div>
    
    <!-- Table Content -->
    <div class="overflow-x-auto">
        @if($sesi->count() > 0)
        <table class="w-full">
            <thead class="bg-gray-50 border-b border-gray-100">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Waktu</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Mata Pelajaran</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Kelas</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Kehadiran</th>
                    <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach($sesi as $item)
                <tr class="hover:bg-{{ $item->status_display == 'ongoing' ? 'blue-50/30' : 'gray-50' }} transition-colors duration-150">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-semibold text-gray-900">
                            {{ \Carbon\Carbon::parse($item->tanggal_sesi)->format('H:i') }} - 
                            {{ \Carbon\Carbon::parse($item->tanggal_sesi)->addMinutes(90)->format('H:i') }}
                        </div>
                        <div class="text-xs text-gray-500">90 menit</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm font-medium text-gray-900">{{ $item->mapelKelas->mapel->nama_mapel }}</div>
                        <div class="text-xs text-gray-500">{{ $item->mapelKelas->mapel->nama_mapel }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm font-medium text-gray-900">{{ $item->mapelKelas->kelas->kode_kelas }}</div>
                        <div class="text-xs text-gray-500">{{ $item->jumlah_siswa }} siswa</div>
                    </td>
                    <td class="px-6 py-4">
                        @if($item->status_display == 'ongoing')
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-700">
                                <span class="w-1.5 h-1.5 bg-blue-500 rounded-full mr-1.5 animate-pulse"></span>
                                Berlangsung
                            </span>
                        @elseif($item->status_display == 'upcoming')
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-700">
                                <span class="w-1.5 h-1.5 bg-yellow-500 rounded-full mr-1.5"></span>
                                Belum Dimulai
                            </span>
                        @else
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                                <span class="w-1.5 h-1.5 bg-green-500 rounded-full mr-1.5"></span>
                                Selesai
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        @if($item->status_display == 'upcoming')
                            <div class="text-sm font-medium text-gray-400">- / {{ $item->jumlah_siswa }}</div>
                            <div class="text-xs text-gray-400">Belum dimulai</div>
                        @else
                            <div class="text-sm font-semibold text-gray-900">
                                {{ $item->kehadiran['hadir'] }} / {{ $item->kehadiran['total'] }}
                            </div>
                            <div class="text-xs text-gray-500">{{ $item->kehadiran['persentase'] }}% hadir</div>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-center">
                        @if($item->status_display == 'completed')
                            <a href="{{ route('guru.presensi.download', $item->id_sesi) }}" class="inline-flex items-center gap-2 px-4 py-2 bg-white border border-gray-300 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-50 transition-colors duration-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                </svg>
                                Download
                            </a>
                        @elseif($item->status_display == 'ongoing')
                            <a href="{{ route('guru.presensi-kamera', $item->id_sesi) }}" class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition-colors duration-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Lanjutkan
                            </a>
                        @else
                            <a href="{{ route('guru.presensi-kamera', $item->id_sesi) }}" class="inline-flex items-center gap-2 px-4 py-2 bg-[#004680] text-white text-sm font-medium rounded-lg hover:bg-[#003766] transition-colors duration-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Mulai Presensi
                            </a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="px-6 py-12 text-center">
            <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
            </svg>
            <h3 class="text-lg font-medium text-gray-900 mb-2">Tidak Ada Sesi</h3>
            <p class="text-sm text-gray-500">Tidak ada sesi presensi untuk tanggal yang dipilih.</p>
        </div>
        @endif
    </div>
    
    <!-- Pagination -->
    @if($sesi->hasPages())
    <div class="px-6 py-4 border-t border-gray-100 flex items-center justify-between">
        <div class="text-sm text-gray-600">
            Menampilkan <span class="font-semibold">{{ $sesi->firstItem() }}</span> - 
            <span class="font-semibold">{{ $sesi->lastItem() }}</span> dari 
            <span class="font-semibold">{{ $sesi->total() }}</span> sesi
        </div>
        <div class="flex items-center gap-2">
            {{-- Previous Button --}}
            @if($sesi->onFirstPage())
                <button disabled class="px-3 py-1.5 border border-gray-300 rounded-lg text-sm font-medium text-gray-400 cursor-not-allowed">
                    Previous
                </button>
            @else
                <a href="{{ $sesi->previousPageUrl() }}" class="px-3 py-1.5 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors duration-200">
                    Previous
                </a>
            @endif

            {{-- Page Numbers --}}
            @foreach($sesi->getUrlRange(1, $sesi->lastPage()) as $page => $url)
                @if($page == $sesi->currentPage())
                    <button class="px-3 py-1.5 bg-[#004680] text-white rounded-lg text-sm font-medium">{{ $page }}</button>
                @else
                    <a href="{{ $url }}" class="px-3 py-1.5 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors duration-200">{{ $page }}</a>
                @endif
            @endforeach

            {{-- Next Button --}}
            @if($sesi->hasMorePages())
                <a href="{{ $sesi->nextPageUrl() }}" class="px-3 py-1.5 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors duration-200">
                    Next
                </a>
            @else
                <button disabled class="px-3 py-1.5 border border-gray-300 rounded-lg text-sm font-medium text-gray-400 cursor-not-allowed">
                    Next
                </button>
            @endif
        </div>
    </div>
    @endif
</div>

@if(session('success'))
<div class="fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="fixed bottom-4 right-4 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg">
    {{ session('error') }}
</div>
@endif

@if(session('info'))
<div class="fixed bottom-4 right-4 bg-blue-500 text-white px-6 py-3 rounded-lg shadow-lg">
    {{ session('info') }}
</div>
@endif

@endsection