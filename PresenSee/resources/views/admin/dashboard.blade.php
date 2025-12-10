@extends('layouts.app')

@section('title', 'Dashboard Admin')
@section('page-title', 'Dashboard Admin')
@section('page-subtitle', 'Selamat datang, Administrator')

@section('content')
<!-- Filter Section -->
<div class="flex items-center justify-between mb-6">
    <div class="flex items-center gap-3">
        <div class="flex items-center gap-2 text-sm text-gray-600">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
            <span class="font-medium">Rabu, 12 November 2025</span>
        </div>
    </div>
    
    <div class="flex items-center gap-3">
        <!-- Filter Tanggal -->
        <select class="px-4 py-2 bg-white border border-gray-200 rounded-lg text-sm font-medium text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#004680] focus:border-transparent">
            <option>Hari Ini</option>
            <option>7 Hari Terakhir</option>
            <option>30 Hari Terakhir</option>
            <option>Bulan Ini</option>
            <option>Custom Range</option>
        </select>
        
        <!-- Export Button -->
        <button class="flex items-center gap-2 px-4 py-2 bg-white border border-gray-200 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-all duration-200">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
            </svg>
            Export Data
        </button>
    </div>
</div>

<!-- Summary Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mb-8">
    <!-- Total Guru -->
    @component('components.card-summary', [
        'title' => 'Total Guru',
        'value' => '48',
        'iconBg' => 'bg-blue-100',
        'iconColor' => 'text-[#004680]',
        'trend' => '+3',
        'trendUp' => true,
        'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>'
    ])
    @endcomponent
    
    <!-- Total Siswa -->
    @component('components.card-summary', [
        'title' => 'Total Siswa',
        'value' => '1,247',
        'iconBg' => 'bg-green-100',
        'iconColor' => 'text-green-600',
        'trend' => '+45',
        'trendUp' => true,
        'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>'
    ])
    @endcomponent
    
    <!-- Total Kelas -->
    @component('components.card-summary', [
        'title' => 'Total Kelas',
        'value' => '36',
        'iconBg' => 'bg-purple-100',
        'iconColor' => 'text-purple-600',
        'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>'
    ])
    @endcomponent
    
    <!-- Total Presensi Hari Ini -->
    @component('components.card-summary', [
        'title' => 'Presensi Hari Ini',
        'value' => '142',
        'iconBg' => 'bg-yellow-100',
        'iconColor' => 'text-yellow-600',
        'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>'
    ])
    @endcomponent
    
    <!-- Tingkat Kehadiran -->
    @component('components.card-summary', [
        'title' => 'Tingkat Kehadiran',
        'value' => '89%',
        'iconBg' => 'bg-orange-100',
        'iconColor' => 'text-orange-600',
        'trend' => '+2%',
        'trendUp' => true,
        'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>'
    ])
    @endcomponent
</div>

<!-- Quick Actions -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
    <!-- Tambah Siswa Baru -->
    <a href="{{ route('admin.siswa') }}" class="flex items-center justify-center gap-3 bg-[#004680] text-white px-6 py-4 rounded-xl hover:bg-[#003766] transition-all duration-200 shadow-sm hover:shadow-md">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
        </svg>
        <span class="font-semibold">Tambah Siswa Baru</span>
    </a>
    
    <!-- Tambah Kelas -->
    <a href="{{ route('admin.kelas-jadwal') }}" class="flex items-center justify-center gap-3 bg-[#ffca05] text-gray-900 px-6 py-4 rounded-xl hover:bg-[#e6b804] transition-all duration-200 shadow-sm hover:shadow-md">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
        </svg>
        <span class="font-semibold">Tambah Kelas</span>
    </a>
    
    <!-- Lihat Semua Presensi -->
    <a href="{{ route('admin.laporan') }}" class="flex items-center justify-center gap-3 bg-white border-2 border-[#004680] text-[#004680] px-6 py-4 rounded-xl hover:bg-blue-50 transition-all duration-200 shadow-sm hover:shadow-md">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
        </svg>
        <span class="font-semibold">Lihat Semua Presensi</span>
    </a>
</div>

<!-- Main Content Grid -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
    <!-- Kehadiran per Kelas Hari Ini -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-5 border-b border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-lg font-bold text-gray-900">Kehadiran per Kelas</h2>
                    <p class="text-sm text-gray-500 mt-0.5">Statistik hari ini</p>
                </div>
                <select class="px-3 py-1.5 bg-gray-50 border border-gray-200 rounded-lg text-xs font-medium text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#004680] focus:border-transparent">
                    <option>Semua Tingkat</option>
                    <option>Kelas X</option>
                    <option>Kelas XI</option>
                    <option>Kelas XII</option>
                </select>
            </div>
        </div>
        
        <div class="p-6 space-y-3">
            <!-- Kelas Item 1 -->
            <div class="flex items-center justify-between p-4 rounded-xl border border-gray-100 hover:border-blue-200 hover:bg-blue-50/30 transition-all duration-200">
                <div class="flex items-center gap-4">
                    <div class="flex items-center justify-center w-12 h-12 bg-blue-100 text-[#004680] rounded-xl font-bold">
                        X-1
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900">Kelas X-1</h3>
                        <p class="text-sm text-gray-600">35 Siswa</p>
                    </div>
                </div>
                <div class="text-right">
                    <div class="flex items-center gap-2 mb-1">
                        <span class="text-2xl font-bold text-gray-900">94%</span>
                        <span class="inline-flex items-center px-2 py-0.5 rounded-md text-xs font-medium bg-green-100 text-green-700">
                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                            </svg>
                            Baik
                        </span>
                    </div>
                    <p class="text-xs text-gray-500">33 hadir • 2 izin</p>
                </div>
            </div>
            
            <!-- Kelas Item 2 -->
            <div class="flex items-center justify-between p-4 rounded-xl border border-gray-100 hover:border-blue-200 hover:bg-blue-50/30 transition-all duration-200">
                <div class="flex items-center gap-4">
                    <div class="flex items-center justify-center w-12 h-12 bg-green-100 text-green-600 rounded-xl font-bold">
                        X-2
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900">Kelas X-2</h3>
                        <p class="text-sm text-gray-600">34 Siswa</p>
                    </div>
                </div>
                <div class="text-right">
                    <div class="flex items-center gap-2 mb-1">
                        <span class="text-2xl font-bold text-gray-900">91%</span>
                        <span class="inline-flex items-center px-2 py-0.5 rounded-md text-xs font-medium bg-green-100 text-green-700">
                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                            </svg>
                            Baik
                        </span>
                    </div>
                    <p class="text-xs text-gray-500">31 hadir • 1 sakit • 2 izin</p>
                </div>
            </div>
            
            <!-- Kelas Item 3 -->
            <div class="flex items-center justify-between p-4 rounded-xl border border-gray-100 hover:border-blue-200 hover:bg-blue-50/30 transition-all duration-200">
                <div class="flex items-center gap-4">
                    <div class="flex items-center justify-center w-12 h-12 bg-purple-100 text-purple-600 rounded-xl font-bold">
                        XI-1
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900">Kelas XI-1</h3>
                        <p class="text-sm text-gray-600">36 Siswa</p>
                    </div>
                </div>
                <div class="text-right">
                    <div class="flex items-center gap-2 mb-1">
                        <span class="text-2xl font-bold text-gray-900">86%</span>
                        <span class="inline-flex items-center px-2 py-0.5 rounded-md text-xs font-medium bg-yellow-100 text-yellow-700">
                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                            </svg>
                            Cukup
                        </span>
                    </div>
                    <p class="text-xs text-gray-500">31 hadir • 2 sakit • 3 izin</p>
                </div>
            </div>
            
            <!-- Kelas Item 4 -->
            <div class="flex items-center justify-between p-4 rounded-xl border border-gray-100 hover:border-blue-200 hover:bg-blue-50/30 transition-all duration-200">
                <div class="flex items-center gap-4">
                    <div class="flex items-center justify-center w-12 h-12 bg-yellow-100 text-yellow-600 rounded-xl font-bold">
                        XI-2
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900">Kelas XI-2</h3>
                        <p class="text-sm text-gray-600">35 Siswa</p>
                    </div>
                </div>
                <div class="text-right">
                    <div class="flex items-center gap-2 mb-1">
                        <span class="text-2xl font-bold text-gray-900">97%</span>
                        <span class="inline-flex items-center px-2 py-0.5 rounded-md text-xs font-medium bg-green-100 text-green-700">
                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                            </svg>
                            Sangat Baik
                        </span>
                    </div>
                    <p class="text-xs text-gray-500">34 hadir • 1 izin</p>
                </div>
            </div>
            
            <!-- Kelas Item 5 -->
            <div class="flex items-center justify-between p-4 rounded-xl border border-gray-100 hover:border-red-200 hover:bg-red-50/30 transition-all duration-200">
                <div class="flex items-center gap-4">
                    <div class="flex items-center justify-center w-12 h-12 bg-red-100 text-red-600 rounded-xl font-bold">
                        XII-1
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900">Kelas XII-1</h3>
                        <p class="text-sm text-gray-600">33 Siswa</p>
                    </div>
                </div>
                <div class="text-right">
                    <div class="flex items-center gap-2 mb-1">
                        <span class="text-2xl font-bold text-gray-900">67%</span>
                        <span class="inline-flex items-center px-2 py-0.5 rounded-md text-xs font-medium bg-red-100 text-red-700">
                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6"/>
                            </svg>
                            Perlu Perhatian
                        </span>
                    </div>
                    <p class="text-xs text-gray-500">22 hadir • 5 sakit • 6 izin</p>
                </div>
            </div>
            
            <!-- View All Button -->
            <button class="w-full py-3 text-[#004680] hover:bg-blue-50 rounded-xl font-medium text-sm transition-all duration-200">
                Lihat Semua Kelas (36)
            </button>
        </div>
    </div>
    
    <!-- Aktivitas Sistem Terbaru -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-5 border-b border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-lg font-bold text-gray-900">Aktivitas Sistem</h2>
                    <p class="text-sm text-gray-500 mt-0.5">Real-time updates</p>
                </div>
                <button class="text-[#004680] hover:text-[#003766] text-sm font-medium">
                    Lihat Semua
                </button>
            </div>
        </div>
        
        <div class="p-6 space-y-4 max-h-[600px] overflow-y-auto">
            <!-- Activity Item 1 -->
            <div class="flex items-start gap-4">
                <div class="flex items-center justify-center w-10 h-10 bg-green-100 text-green-600 rounded-xl shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-900">Presensi Selesai</p>
                    <p class="text-sm text-gray-600 mt-1">Guru Budi memulai presensi Matematika - Kelas X-1</p>
                    <p class="text-xs text-gray-400 mt-1">2 menit yang lalu</p>
                </div>
            </div>
            
            <!-- Activity Item 2 -->
            <div class="flex items-start gap-4">
                <div class="flex items-center justify-center w-10 h-10 bg-blue-100 text-[#004680] rounded-xl shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                    </svg>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-900">Guru Baru Ditambahkan</p>
                    <p class="text-sm text-gray-600 mt-1">Ibu Siti bergabung sebagai guru Bahasa Indonesia</p>
                    <p class="text-xs text-gray-400 mt-1">15 menit yang lalu</p>
                </div>
            </div>
            
            <!-- Activity Item 3 -->
            <div class="flex items-start gap-4">
                <div class="flex items-center justify-center w-10 h-10 bg-green-100 text-green-600 rounded-xl shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-900">Sesi Presensi Kimia Selesai</p>
                    <p class="text-sm text-gray-600 mt-1">Guru Ahmad - Kelas XI-2 • 34/35 siswa hadir</p>
                    <p class="text-xs text-gray-400 mt-1">30 menit yang lalu</p>
                </div>
            </div>
            
            <!-- Activity Item 4 -->
            <div class="flex items-start gap-4">
                <div class="flex items-center justify-center w-10 h-10 bg-yellow-100 text-yellow-600 rounded-xl shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-900">Perhatian: Kehadiran Rendah</p>
                    <p class="text-sm text-gray-600 mt-1">Kelas XII-1 hanya 67% tingkat kehadiran hari ini</p>
                    <p class="text-xs text-gray-400 mt-1">45 menit yang lalu</p>
                </div>
            </div>
            
            <!-- Activity Item 5 -->
            <div class="flex items-start gap-4">
                <div class="flex items-center justify-center w-10 h-10 bg-purple-100 text-purple-600 rounded-xl shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-900">Kelas Baru Dibuat</p>
                    <p class="text-sm text-gray-600 mt-1">Kelas X-4 ditambahkan dengan 32 siswa</p>
                    <p class="text-xs text-gray-400 mt-1">1 jam yang lalu</p>
                </div>
            </div>
            
            <!-- Activity Item 6 -->
            <div class="flex items-start gap-4">
                <div class="flex items-center justify-center w-10 h-10 bg-blue-100 text-[#004680] rounded-xl shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-900">Laporan Bulanan Dihasilkan</p>
                    <p class="text-sm text-gray-600 mt-1">Laporan kehadiran Oktober 2025 tersedia</p>
                    <p class="text-xs text-gray-400 mt-1">2 jam yang lalu</p>
                </div>
            </div>
            
            <!-- Activity Item 7 -->
            <div class="flex items-start gap-4">
                <div class="flex items-center justify-center w-10 h-10 bg-green-100 text-green-600 rounded-xl shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-900">Presensi Fisika Selesai</p>
                    <p class="text-sm text-gray-600 mt-1">Guru Rahman - Kelas X-3 • 33/35 siswa hadir</p>
                    <p class="text-xs text-gray-400 mt-1">3 jam yang lalu</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Statistics Overview -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
    <!-- Guru Terbaik Bulan Ini -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-5 border-b border-gray-100">
            <h2 class="text-lg font-bold text-gray-900">Guru Terbaik Bulan Ini</h2>
            <p class="text-sm text-gray-500 mt-0.5">Berdasarkan kehadiran tertinggi</p>
        </div>
        <div class="p-6 space-y-4">
            <!-- Top Guru 1 -->
            <div class="flex items-center gap-4">
                <div class="relative">
                    <img src="https://ui-avatars.com/api/?name=Budi+Santoso&background=004680&color=fff&size=128" alt="Guru" class="w-12 h-12 rounded-full border-2 border-yellow-400">
                    <span class="absolute -top-1 -right-1 w-6 h-6 bg-yellow-400 text-white rounded-full flex items-center justify-center text-xs font-bold">1</span>
                </div>
                <div class="flex-1">
                    <h3 class="font-semibold text-gray-900">Pak Budi Santoso</h3>
                    <p class="text-sm text-gray-600">Matematika</p>
                </div>
                <div class="text-right">
                    <p class="text-lg font-bold text-[#004680]">98%</p>
                    <p class="text-xs text-gray-500">Kehadiran</p>
                </div>
            </div>
            
            <!-- Top Guru 2 -->
            <div class="flex items-center gap-4">
                <div class="relative">
                    <img src="https://ui-avatars.com/api/?name=Siti+Nurhaliza&background=004680&color=fff&size=128" alt="Guru" class="w-12 h-12 rounded-full border-2 border-gray-300">
                    <span class="absolute -top-1 -right-1 w-6 h-6 bg-gray-300 text-gray-700 rounded-full flex items-center justify-center text-xs font-bold">2</span>
                </div>
                <div class="flex-1">
                    <h3 class="font-semibold text-gray-900">Bu Siti Nurhaliza</h3>
                    <p class="text-sm text-gray-600">Bahasa Indonesia</p>
                </div>
                <div class="text-right">
                    <p class="text-lg font-bold text-[#004680]">96%</p>
                    <p class="text-xs text-gray-500">Kehadiran</p>
                </div>
            </div>
            
            <!-- Top Guru 3 -->
            <div class="flex items-center gap-4">
                <div class="relative">
                    <img src="https://ui-avatars.com/api/?name=Ahmad+Rahman&background=004680&color=fff&size=128" alt="Guru" class="w-12 h-12 rounded-full border-2 border-orange-400">
                    <span class="absolute -top-1 -right-1 w-6 h-6 bg-orange-400 text-white rounded-full flex items-center justify-center text-xs font-bold">3</span>
                </div>
                <div class="flex-1">
                    <h3 class="font-semibold text-gray-900">Pak Ahmad Rahman</h3>
                    <p class="text-sm text-gray-600">Fisika</p>
                </div>
                <div class="text-right">
                    <p class="text-lg font-bold text-[#004680]">95%</p>
                    <p class="text-xs text-gray-500">Kehadiran</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Kelas dengan Kehadiran Terendah -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-5 border-b border-gray-100">
            <h2 class="text-lg font-bold text-gray-900">Perlu Perhatian</h2>
            <p class="text-sm text-gray-500 mt-0.5">Kelas dengan kehadiran rendah</p>
        </div>
        <div class="p-6 space-y-4">
            <!-- Alert Kelas 1 -->
            <div class="flex items-start gap-3 p-4 bg-red-50 rounded-xl border border-red-100">
                <div class="flex items-center justify-center w-10 h-10 bg-red-100 text-red-600 rounded-lg shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                </div>
                <div class="flex-1">
                    <h3 class="font-semibold text-gray-900 mb-1">Kelas XII-1</h3>
                    <p class="text-sm text-gray-600 mb-2">Tingkat kehadiran 67% (7 hari terakhir)</p>
                    <button class="text-xs font-medium text-red-600 hover:text-red-700">
                        Lihat Detail →
                    </button>
                </div>
            </div>
            
            <!-- Alert Kelas 2 -->
            <div class="flex items-start gap-3 p-4 bg-yellow-50 rounded-xl border border-yellow-100">
                <div class="flex items-center justify-center w-10 h-10 bg-yellow-100 text-yellow-600 rounded-lg shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                </div>
                <div class="flex-1">
                    <h3 class="font-semibold text-gray-900 mb-1">Kelas XI-3</h3>
                    <p class="text-sm text-gray-600 mb-2">Tingkat kehadiran 78% (7 hari terakhir)</p>
                    <button class="text-xs font-medium text-yellow-600 hover:text-yellow-700">
                        Lihat Detail →
                    </button>
                </div>
            </div>
            
            <!-- Alert Kelas 3 -->
            <div class="flex items-start gap-3 p-4 bg-yellow-50 rounded-xl border border-yellow-100">
                <div class="flex items-center justify-center w-10 h-10 bg-yellow-100 text-yellow-600 rounded-lg shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                </div>
                <div class="flex-1">
                    <h3 class="font-semibold text-gray-900 mb-1">Kelas X-5</h3>
                    <p class="text-sm text-gray-600 mb-2">Tingkat kehadiran 81% (7 hari terakhir)</p>
                    <button class="text-xs font-medium text-yellow-600 hover:text-yellow-700">
                        Lihat Detail →
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Quick Stats -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-5 border-b border-gray-100">
            <h2 class="text-lg font-bold text-gray-900">Statistik Cepat</h2>
            <p class="text-sm text-gray-500 mt-0.5">Data minggu ini</p>
        </div>
        <div class="p-6 space-y-4">
            <!-- Stat Item 1 -->
            <div class="flex items-center justify-between p-4 bg-gradient-to-r from-blue-50 to-blue-100 rounded-xl">
                <div>
                    <p class="text-sm font-medium text-gray-700 mb-1">Total Presensi</p>
                    <p class="text-2xl font-bold text-[#004680]">856</p>
                </div>
                <div class="flex items-center justify-center w-12 h-12 bg-white rounded-xl">
                    <svg class="w-6 h-6 text-[#004680]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                </div>
            </div>
            
            <!-- Stat Item 2 -->
            <div class="flex items-center justify-between p-4 bg-gradient-to-r from-green-50 to-green-100 rounded-xl">
                <div>
                    <p class="text-sm font-medium text-gray-700 mb-1">Siswa Hadir</p>
                    <p class="text-2xl font-bold text-green-600">91%</p>
                </div>
                <div class="flex items-center justify-center w-12 h-12 bg-white rounded-xl">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
            
            <!-- Stat Item 3 -->
            <div class="flex items-center justify-between p-4 bg-gradient-to-r from-yellow-50 to-yellow-100 rounded-xl">
                <div>
                    <p class="text-sm font-medium text-gray-700 mb-1">Izin/Sakit</p>
                    <p class="text-2xl font-bold text-yellow-600">6%</p>
                </div>
                <div class="flex items-center justify-center w-12 h-12 bg-white rounded-xl">
                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
            
            <!-- Stat Item 4 -->
            <div class="flex items-center justify-between p-4 bg-gradient-to-r from-red-50 to-red-100 rounded-xl">
                <div>
                    <p class="text-sm font-medium text-gray-700 mb-1">Alpha</p>
                    <p class="text-2xl font-bold text-red-600">3%</p>
                </div>
                <div class="flex items-center justify-center w-12 h-12 bg-white rounded-xl">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart Section - Grafik Kehadiran Mingguan -->
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="px-6 py-5 border-b border-gray-100">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-lg font-bold text-gray-900">Tren Kehadiran Sekolah</h2>
                <p class="text-sm text-gray-500 mt-0.5">30 hari terakhir</p>
            </div>
            <div class="flex items-center gap-2">
                <select class="px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg text-sm font-medium text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#004680] focus:border-transparent">
                    <option>30 Hari</option>
                    <option>7 Hari</option>
                    <option>Bulan Ini</option>
                    <option>Tahun Ini</option>
                </select>
            </div>
        </div>
    </div>
    
    <div class="p-8">
        <!-- Chart Placeholder -->
        <div class="flex items-center justify-center h-80 bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 rounded-xl border-2 border-dashed border-blue-200">
            <div class="text-center">
                <svg class="w-20 h-20 mx-auto text-blue-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"/>
                </svg>
                <p class="text-base font-semibold text-gray-700">Grafik Tren Kehadiran Sekolah</p>
                <p class="text-sm text-gray-500 mt-2">(Area untuk visualisasi data Chart.js atau Recharts)</p>
                <p class="text-xs text-gray-400 mt-1">Menampilkan perbandingan kehadiran per hari</p>
            </div>
        </div>
        
        <!-- Legend -->
        <div class="flex items-center justify-center gap-6 mt-6">
            <div class="flex items-center gap-2">
                <div class="w-4 h-4 bg-green-500 rounded"></div>
                <span class="text-sm text-gray-600">Hadir</span>
            </div>
            <div class="flex items-center gap-2">
                <div class="w-4 h-4 bg-yellow-500 rounded"></div>
                <span class="text-sm text-gray-600">Izin/Sakit</span>
            </div>
            <div class="flex items-center gap-2">
                <div class="w-4 h-4 bg-red-500 rounded"></div>
                <span class="text-sm text-gray-600">Alpha</span>
            </div>
            <div class="flex items-center gap-2">
                <div class="w-4 h-4 bg-blue-500 rounded"></div>
                <span class="text-sm text-gray-600">Total Siswa</span>
            </div>
        </div>
    </div>
</div>
@endsection