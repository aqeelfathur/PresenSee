@extends('layouts.app')

@section('title', 'Daftar Kelas')
@section('page-title', 'Daftar Kelas')

@section('page-subtitle')
    Kelola kelas yang Anda ampu
@endsection

@section('content')

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">Total Kelas</p>
                <p class="text-2xl font-bold text-gray-900 mt-1">{{ $totalKelas }}</p>
            </div>
            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-[#004680]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                </svg>
            </div>
        </div>
    </div>
    
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">Total Siswa</p>
                <p class="text-2xl font-bold text-green-600 mt-1">{{ $totalSiswa }}</p>
            </div>
            <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
            </div>
        </div>
    </div>
    
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">Total Pertemuan</p>
                <p class="text-2xl font-bold text-purple-600 mt-1">{{ $totalPertemuan }}</p>
            </div>
            <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </div>
        </div>
    </div>
</div>

<!-- Table Section -->
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
        <div>
            <h2 class="text-lg font-bold text-gray-900">Daftar Kelas yang Diampu</h2>
            <p class="text-sm text-gray-500 mt-0.5">Kelas yang Anda ajar tahun ajaran ini</p>
        </div>
        
        <!-- Search -->
        <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>
            <input 
                type="text" 
                id="searchInput"
                placeholder="Cari kelas..."
                class="pl-10 pr-4 py-2 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#004680] focus:border-transparent w-64"
            >
        </div>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full" id="kelasTable">
            <thead class="bg-gray-50 border-b border-gray-100">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">No</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nama Kelas</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Mata Pelajaran</th>
                    <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Jumlah Siswa</th>
                    <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Pertemuan</th>
                    <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($kelasData as $index => $kelas)
                <tr class="hover:bg-gray-50 transition-colors duration-150 kelas-row" data-kelas="{{ strtolower($kelas['kode_kelas']) }}" data-mapel="{{ strtolower($kelas['nama_mapel']) }}">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $index + 1 }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-blue-100 text-blue-700">
                            {{ $kelas['kode_kelas'] }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $kelas['nama_mapel'] }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        <span class="text-sm font-semibold text-gray-900">{{ $kelas['jumlah_siswa'] }} siswa</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        <span class="text-sm font-semibold text-gray-900">{{ $kelas['jumlah_pertemuan'] }} pertemuan</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center justify-center gap-2">
                            <button 
                                onclick="openSiswaModal({{ $kelas['id_kelas'] }}, '{{ $kelas['kode_kelas'] }}')" 
                                class="inline-flex items-center gap-1 px-3 py-1.5 bg-blue-600 text-white text-xs font-medium rounded-lg hover:bg-blue-700 transition-colors duration-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                </svg>
                                Daftar Siswa
                            </button>
                            <button 
                                onclick="openPertemuanModal({{ $kelas['id_mapel_kelas'] }}, '{{ $kelas['kode_kelas'] }}', '{{ $kelas['nama_mapel'] }}')" 
                                class="inline-flex items-center gap-1 px-3 py-1.5 bg-green-600 text-white text-xs font-medium rounded-lg hover:bg-green-700 transition-colors duration-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                Pertemuan
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center">
                        <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                        <p class="text-sm font-medium text-gray-600">Belum ada kelas yang diampu</p>
                        <p class="text-xs text-gray-400 mt-1">Hubungi admin untuk penugasan kelas</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Daftar Siswa -->
<div id="siswaModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl max-w-3xl w-full max-h-[90vh] overflow-y-auto">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
            <div>
                <h3 class="text-lg font-bold text-gray-900">Daftar Siswa - <span id="siswaKelas">Loading...</span></h3>
                <p class="text-sm text-gray-500 mt-0.5"><span id="siswaCount">0</span> siswa terdaftar</p>
            </div>
            <button onclick="closeModal('siswaModal')" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        
        <div class="p-6">
            <!-- Search in Modal -->
            <div class="mb-4">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <input 
                        type="text" 
                        id="searchSiswa"
                        placeholder="Cari nama atau NIS siswa..."
                        class="w-full pl-10 pr-4 py-2 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#004680] focus:border-transparent"
                    >
                </div>
            </div>
            
            <!-- Loading State -->
            <div id="siswaLoading" class="text-center py-8">
                <svg class="animate-spin h-8 w-8 mx-auto text-[#004680]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <p class="text-sm text-gray-500 mt-2">Memuat data siswa...</p>
            </div>
            
            <!-- Students List -->
            <div id="siswaList" class="space-y-3 hidden"></div>
            
            <!-- Empty State -->
            <div id="siswaEmpty" class="text-center py-8 hidden">
                <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
                <p class="text-sm font-medium text-gray-600">Belum ada siswa di kelas ini</p>
            </div>
        </div>
    </div>
</div>

<!-- Modal Daftar Pertemuan -->
<div id="pertemuanModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl max-w-4xl w-full max-h-[90vh] overflow-y-auto">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
            <div>
                <h3 class="text-lg font-bold text-gray-900">Daftar Pertemuan</h3>
                <p class="text-sm text-gray-500 mt-0.5"><span id="pertemuanKelas">Loading...</span> • <span id="pertemuanMapel">Loading...</span></p>
            </div>
            <button onclick="closeModal('pertemuanModal')" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        
        <div class="p-6">
            <!-- Loading State -->
            <div id="pertemuanLoading" class="text-center py-8">
                <svg class="animate-spin h-8 w-8 mx-auto text-[#004680]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <p class="text-sm text-gray-500 mt-2">Memuat data pertemuan...</p>
            </div>
            
            <!-- Pertemuan Table -->
            <div id="pertemuanTable" class="overflow-x-auto hidden">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b border-gray-100">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Pertemuan</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Tanggal</th>
                            <th class="px-4 py-3 text-center text-xs font-semibold text-gray-600 uppercase">Kehadiran</th>
                            <th class="px-4 py-3 text-center text-xs font-semibold text-gray-600 uppercase">Status</th>
                            <th class="px-4 py-3 text-center text-xs font-semibold text-gray-600 uppercase">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="pertemuanTableBody" class="divide-y divide-gray-100">
                    </tbody>
                </table>
            </div>
            
            <!-- Empty State -->
            <div id="pertemuanEmpty" class="text-center py-8 hidden">
                <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <p class="text-sm font-medium text-gray-600">Belum ada pertemuan untuk kelas ini</p>
                <p class="text-xs text-gray-400 mt-1">Buat sesi presensi baru di Dashboard</p>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
// ============================================
// SEARCH FUNCTIONALITY
// ============================================
document.getElementById('searchInput').addEventListener('input', function(e) {
    const searchTerm = e.target.value.toLowerCase();
    const rows = document.querySelectorAll('.kelas-row');
    
    rows.forEach(row => {
        const kelas = row.dataset.kelas;
        const mapel = row.dataset.mapel;
        
        if (kelas.includes(searchTerm) || mapel.includes(searchTerm)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});

// ============================================
// MODAL FUNCTIONS
// ============================================
function openModal(modalId) {
    document.getElementById(modalId).classList.remove('hidden');
}

function closeModal(modalId) {
    document.getElementById(modalId).classList.add('hidden');
}

// ============================================
// MODAL DAFTAR SISWA
// ============================================
async function openSiswaModal(idKelas, namaKelas) {
    openModal('siswaModal');
    
    // Update judul
    document.getElementById('siswaKelas').textContent = 'Kelas ' + namaKelas;
    
    // Show loading
    document.getElementById('siswaLoading').classList.remove('hidden');
    document.getElementById('siswaList').classList.add('hidden');
    document.getElementById('siswaEmpty').classList.add('hidden');
    
    try {
        const response = await fetch(`/guru/daftar-kelas/siswa/${idKelas}`);
        const result = await response.json();
        
        if (result.success && result.data.length > 0) {
            // Update count
            document.getElementById('siswaCount').textContent = result.data.length;
            
            // Render siswa list
            const siswaList = document.getElementById('siswaList');
            siswaList.innerHTML = result.data.map(siswa => `
                <div class="flex items-center gap-4 p-4 border border-gray-100 rounded-xl hover:bg-gray-50 transition-colors duration-200 siswa-item" data-nama="${siswa.nama_siswa.toLowerCase()}" data-nis="${siswa.nis}">
                    <img src="${siswa.avatar}" alt="${siswa.nama_siswa}" class="w-12 h-12 rounded-full">
                    <div class="flex-1">
                        <h4 class="text-sm font-semibold text-gray-900">${siswa.nama_siswa}</h4>
                        <p class="text-xs text-gray-500">NIS: ${siswa.nis}</p>
                    </div>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium ${siswa.status === 'Aktif' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'}">
                        ${siswa.status}
                    </span>
                </div>
            `).join('');
            
            // Show list
            document.getElementById('siswaLoading').classList.add('hidden');
            document.getElementById('siswaList').classList.remove('hidden');
            
            // Setup search
            setupSiswaSearch();
        } else {
            // Show empty state
            document.getElementById('siswaLoading').classList.add('hidden');
            document.getElementById('siswaEmpty').classList.remove('hidden');
            document.getElementById('siswaCount').textContent = '0';
        }
    } catch (error) {
        console.error('Error loading siswa:', error);
        alert('Gagal memuat data siswa. Silakan coba lagi.');
        closeModal('siswaModal');
    }
}

function setupSiswaSearch() {
    document.getElementById('searchSiswa').addEventListener('input', function(e) {
        const searchTerm = e.target.value.toLowerCase();
        const items = document.querySelectorAll('.siswa-item');
        
        items.forEach(item => {
            const nama = item.dataset.nama;
            const nis = item.dataset.nis;
            
            if (nama.includes(searchTerm) || nis.includes(searchTerm)) {
                item.style.display = '';
            } else {
                item.style.display = 'none';
            }
        });
    });
}

// ============================================
// MODAL DAFTAR PERTEMUAN
// ============================================
async function openPertemuanModal(idMapelKelas, namaKelas, namaMapel) {
    openModal('pertemuanModal');
    
    // Update judul
    document.getElementById('pertemuanKelas').textContent = 'Kelas ' + namaKelas;
    document.getElementById('pertemuanMapel').textContent = namaMapel;
    
    // Show loading
    document.getElementById('pertemuanLoading').classList.remove('hidden');
    document.getElementById('pertemuanTable').classList.add('hidden');
    document.getElementById('pertemuanEmpty').classList.add('hidden');
    
    try {
        const response = await fetch(`/guru/daftar-kelas/pertemuan/${idMapelKelas}`);
        const result = await response.json();
        
        if (result.success && result.data.length > 0) {
            // Render pertemuan table
            const tableBody = document.getElementById('pertemuanTableBody');
            tableBody.innerHTML = result.data.map(sesi => {
                let statusBadge = '';
                let actionButton = '';
                let rowClass = '';
                
                if (sesi.status === 'completed') {
                    statusBadge = '<span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">Selesai</span>';
                    actionButton = `<button onclick="downloadPresensi(${sesi.id_sesi})" class="inline-flex items-center gap-1 px-3 py-1 bg-blue-600 text-white text-xs font-medium rounded-lg hover:bg-blue-700">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                        </svg>
                        Download
                    </button>`;
                } else if (sesi.status === 'ongoing') {
                    statusBadge = '<span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-700"><span class="w-1.5 h-1.5 bg-blue-500 rounded-full mr-1.5 animate-pulse"></span>Berlangsung</span>';
                    actionButton = `<a href="{{ url('/guru/presensi-kamera') }}/${sesi.id_sesi}" class="inline-flex items-center gap-1 px-3 py-1 bg-green-600 text-white text-xs font-medium rounded-lg hover:bg-green-700">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Lanjutkan
                    </a>`;
                    rowClass = 'bg-blue-50/30';
                } else {
                    statusBadge = '<span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-700">Belum Dimulai</span>';
                    actionButton = `<a href="{{ url('/guru/presensi-kamera') }}/${sesi.id_sesi}" class="inline-flex items-center gap-1 px-3 py-1 bg-[#004680] text-white text-xs font-medium rounded-lg hover:bg-[#003766]">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Mulai Presensi
                    </a>`;
                }
                
                const kehadiranText = sesi.total_presensi > 0 
                    ? `${sesi.total_hadir}/${sesi.total_presensi} hadir`
                    : 'Belum ada data';
                
                return `
                    <tr class="hover:bg-gray-50 ${rowClass}">
                        <td class="px-4 py-3 text-sm font-semibold text-gray-900">Pertemuan ${sesi.pertemuan_ke}</td>
                        <td class="px-4 py-3 text-sm text-gray-600">${sesi.is_today ? '<span class="font-semibold text-[#004680]">Hari Ini</span>' : sesi.tanggal_sesi}</td>
                        <td class="px-4 py-3 text-center text-sm text-gray-900">${kehadiranText}</td>
                        <td class="px-4 py-3 text-center">${statusBadge}</td>
                        <td class="px-4 py-3 text-center">${actionButton}</td>
                    </tr>
                `;
            }).join('');
            
            // Show table
            document.getElementById('pertemuanLoading').classList.add('hidden');
            document.getElementById('pertemuanTable').classList.remove('hidden');
        } else {
            // Show empty state
            document.getElementById('pertemuanLoading').classList.add('hidden');
            document.getElementById('pertemuanEmpty').classList.remove('hidden');
        }
    } catch (error) {
        console.error('Error loading pertemuan:', error);
        alert('Gagal memuat data pertemuan. Silakan coba lagi.');
        closeModal('pertemuanModal');
    }
}

// ============================================
// DOWNLOAD PRESENSI
// ============================================
function downloadPresensi(idSesi) {
    window.location.href = `/guru/presensi/${idSesi}/download`;
}

// ============================================
// CLOSE MODAL ON ESC KEY
// ============================================
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
        closeModal('siswaModal');
        closeModal('pertemuanModal');
    }
});

// ============================================
// CLOSE MODAL ON BACKDROP CLICK
// ============================================
document.getElementById('siswaModal').addEventListener('click', (e) => {
    if (e.target.id === 'siswaModal') {
        closeModal('siswaModal');
    }
});

document.getElementById('pertemuanModal').addEventListener('click', (e) => {
    if (e.target.id === 'pertemuanModal') {
        closeModal('pertemuanModal');
    }
});
</script>
@endpush
@endsection