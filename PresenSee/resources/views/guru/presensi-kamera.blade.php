@extends('layouts.app')

@section('title', 'Presensi Kamera')
@section('page-title', 'Presensi dengan Face Recognition')
@section('page-subtitle', '{{ $sesi->mapelKelas->mapel->nama_mapel }} - {{ $sesi->mapelKelas->kelas->kode_kelas }} • {{ \Carbon\Carbon::createFromFormat("H:i:s", $sesi->jam_mulai)->format("H:i") }} - {{ \Carbon\Carbon::createFromFormat("H:i:s", $sesi->jam_selesai)->format("H:i") }}')

@section('content')
<!-- Back Button -->
<div class="mb-6">
    <a href="{{ route('guru.sesi-presensi') }}" class="inline-flex items-center gap-2 text-[#004680] hover:text-[#003766] font-medium transition-colors duration-200">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
        Kembali ke Daftar Sesi
    </a>
</div>

<!-- Session Info Card -->
<div class="bg-gradient-to-r from-[#004680] to-blue-700 rounded-2xl shadow-lg p-6 mb-6 text-white">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold mb-2">{{ $sesi->mapelKelas->mapel->nama_mapel }}</h2>
            <div class="flex items-center gap-6 text-sm">
                <span class="flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                    {{ $sesi->mapelKelas->kelas->kode_kelas }}
                </span>
                <span class="flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    {{ \Carbon\Carbon::createFromFormat('H:i:s', $sesi->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::createFromFormat('H:i:s', $sesi->jam_selesai)->format('H:i') }} 
                    ({{ \Carbon\Carbon::createFromFormat('H:i:s', $sesi->jam_mulai)->diffInMinutes(\Carbon\Carbon::createFromFormat('H:i:s', $sesi->jam_selesai)) }} menit)
                </span>
                <span class="flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    {{ \Carbon\Carbon::parse($sesi->tanggal_sesi)->isoFormat('dddd, D MMM Y') }}
                </span>
            </div>
        </div>
        <div class="text-right">
            <div class="text-4xl font-bold" id="displayHadir">{{ $stats['hadir'] }}/{{ $stats['total'] }}</div>
            <div class="text-sm opacity-90">siswa hadir</div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
    <!-- Camera Preview Section -->
    <div class="lg:col-span-2">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-bold text-gray-900">Live Camera Preview</h3>
                    <p class="text-sm text-gray-500 mt-0.5">Face Recognition aktif</p>
                </div>
                <div class="flex items-center gap-2">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                        <span class="w-2 h-2 bg-green-500 rounded-full mr-1.5 animate-pulse"></span>
                        Recording
                    </span>
                </div>
            </div>
            
            <!-- Camera Feed -->
            <div class="relative bg-gray-900 aspect-video flex items-center justify-center">
                <!-- Video Element untuk webcam -->
                <video id="videoElement" class="hidden absolute inset-0 w-full h-full object-cover" autoplay></video>
                
                <!-- Canvas untuk detection -->
                <canvas id="canvasElement" class="absolute inset-0 w-full h-full"></canvas>
                
                <!-- Placeholder -->
                <div id="cameraPlaceholder" class="absolute inset-0 flex items-center justify-center bg-gradient-to-br from-gray-800 to-gray-900">
                    <div class="text-center">
                        <svg class="w-24 h-24 mx-auto text-gray-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                        </svg>
                        <p class="text-gray-400 text-lg font-medium">Kamera Siap Diaktifkan</p>
                        <p class="text-gray-500 text-sm mt-2">Klik tombol "Aktifkan Kamera" di bawah</p>
                        <button id="startCameraBtn" class="mt-4 px-6 py-2 bg-[#004680] text-white rounded-lg hover:bg-[#003766] transition-colors">
                            Aktifkan Kamera
                        </button>
                    </div>
                </div>
                
                <!-- Detection Info Overlay -->
                <div id="detectionInfo" class="hidden absolute top-4 left-4 bg-black/70 backdrop-blur-sm px-4 py-2 rounded-lg">
                    <div class="text-white text-sm font-medium">
                        <span class="text-green-400">●</span> <span id="detectedName">Mendeteksi...</span>
                    </div>
                </div>
                
                <!-- Stats Overlay -->
                <div class="absolute bottom-4 left-4 right-4 flex items-center justify-between">
                    <div class="bg-black/70 backdrop-blur-sm px-4 py-2 rounded-lg">
                        <div class="text-white text-sm font-medium">
                            <span class="text-green-400">●</span> Status: <span id="cameraStatus">Standby</span>
                        </div>
                    </div>
                    <div id="confidenceDisplay" class="hidden bg-black/70 backdrop-blur-sm px-4 py-2 rounded-lg">
                        <div class="text-white text-sm font-medium">
                            Confidence: <span id="confidenceValue">0%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Quick Stats -->
    <div class="space-y-4">
        <!-- Hadir -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
            <div class="flex items-center justify-between mb-2">
                <span class="text-sm font-medium text-gray-600">Hadir</span>
                <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
            <div class="text-3xl font-bold text-gray-900" id="statHadir">{{ $stats['hadir'] }}</div>
            <div class="text-sm text-gray-500 mt-1"><span id="persentaseHadir">{{ $stats['persentase'] }}%</span> dari total</div>
        </div>
        
        <!-- Belum Hadir -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
            <div class="flex items-center justify-between mb-2">
                <span class="text-sm font-medium text-gray-600">Belum Hadir</span>
                <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
            <div class="text-3xl font-bold text-gray-900" id="statBelumHadir">{{ $stats['belum_hadir'] }}</div>
            <div class="text-sm text-gray-500 mt-1"><span id="persentaseBelum">{{ 100 - $stats['persentase'] }}%</span> dari total</div>
        </div>
        
        
    </div>
</div>

<!-- Student List Table -->
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
        <div>
            <h3 class="text-lg font-bold text-gray-900">Daftar Siswa</h3>
            <p class="text-sm text-gray-500 mt-0.5">Klik status untuk mengubah kehadiran manual</p>
        </div>
        <div class="flex items-center gap-2">
            <!-- Search -->
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
                <input 
                    type="text" 
                    id="searchInput"
                    placeholder="Cari siswa..."
                    class="pl-9 pr-4 py-2 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#004680] focus:border-transparent w-48"
                >
            </div>
        </div>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50 border-b border-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">No</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">NIS</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nama Siswa</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Waktu Absen</th>
                    <th class="px-6 py-3 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100" id="studentTableBody">
                @foreach($siswaWithPresensi as $index => $siswa)
                <tr class="hover:bg-gray-50 transition-colors duration-150 student-row" data-nama="{{ strtolower($siswa['nama_siswa']) }}">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $index + 1 }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $siswa['nis'] }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center gap-3">
                            <img src="{{ $siswa['avatar'] }}" alt="Student" class="w-8 h-8 rounded-full">
                            <span class="text-sm font-medium text-gray-900">{{ $siswa['nama_siswa'] }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm waktu-absen" data-siswa-id="{{ $siswa['id_siswa'] }}">
                        {{ $siswa['waktu_absen'] ? \Carbon\Carbon::parse($siswa['waktu_absen'])->format('H:i:s') : '-' }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        <button 
                            class="status-btn inline-flex items-center px-3 py-1 rounded-full text-xs font-medium transition-colors duration-200
                                {{ $siswa['status'] === 'presensi' ? 'bg-green-100 text-green-700 hover:bg-green-200' : 'bg-red-100 text-red-700 hover:bg-red-200' }}"
                            data-siswa-id="{{ $siswa['id_siswa'] }}"
                            data-siswa-nama="{{ $siswa['nama_siswa'] }}"
                            data-status="{{ $siswa['status'] }}"
                            onclick="toggleStatus(this)">
                            @if($siswa['status'] === 'presensi')
                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Hadir
                            @else
                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                                {{ $siswa['status'] === 'tidak' ? 'Tidak Hadir' : 'Belum Hadir' }}
                            @endif
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <!-- Table Footer Actions -->
    <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex items-center justify-between">
        <div class="text-sm text-gray-600">
            Menampilkan <span class="font-semibold" id="totalShown">{{ $siswaWithPresensi->count() }}</span> dari <span class="font-semibold">{{ $stats['total'] }}</span> siswa
        </div>
        <div class="flex items-center gap-3">
            <button onclick="exportExcel()" class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors duration-200">
                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                Export Excel
            </button>
            <form action="{{ route('guru.presensi-kamera.akhiri', $sesi->id_sesi) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin mengakhiri sesi presensi ini?')">
                @csrf
                <button type="submit" class="px-6 py-2 bg-red-600 text-white rounded-lg text-sm font-semibold hover:bg-red-700 transition-colors duration-200 shadow-lg hover:shadow-xl">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 10a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 01-1-1v-4z"/>
                    </svg>
                    Akhiri Presensi
                </button>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    const sesiId = {{ $sesi->id_sesi }};
    const csrfToken = '{{ csrf_token() }}';
    let refreshInterval;

    // Toggle status presensi manual
    async function toggleStatus(button) {
        const siswaId = button.getAttribute('data-siswa-id');
        const siswaNama = button.getAttribute('data-siswa-nama');
        
        try {
            const response = await fetch(`/guru/presensi-kamera/${sesiId}/toggle`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({ id_siswa: siswaId })
            });
            
            const data = await response.json();
            
            if (data.success) {
                // Update button
                const newStatus = data.data.status;
                button.setAttribute('data-status', newStatus);
                
                if (newStatus === 'presensi') {
                    button.className = 'status-btn inline-flex items-center px-3 py-1 rounded-full text-xs font-medium transition-colors duration-200 bg-green-100 text-green-700 hover:bg-green-200';
                    button.innerHTML = `<svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>Hadir`;
                } else {
                    button.className = 'status-btn inline-flex items-center px-3 py-1 rounded-full text-xs font-medium transition-colors duration-200 bg-red-100 text-red-700 hover:bg-red-200';
                    button.innerHTML = `<svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>Tidak Hadir`;
                }
                
                // Update waktu absen
                const waktuCell = document.querySelector(`.waktu-absen[data-siswa-id="${siswaId}"]`);
                waktuCell.textContent = data.data.waktu_absen;
                waktuCell.classList.remove('text-gray-400');
                waktuCell.classList.add('text-gray-600');
                
                // Update statistik
                updateStats(data.data.stats);
                
                // Tambah ke aktivitas terbaru
                addRecentActivity(siswaNama, newStatus);
                
                // Show notification
                showNotification(`Status ${siswaNama} berhasil diubah`, 'success');
            }
        } catch (error) {
            console.error('Error:', error);
            showNotification('Terjadi kesalahan saat mengubah status', 'error');
        }
    }

    // Update statistik
    function updateStats(stats) {
        document.getElementById('statHadir').textContent = stats.hadir;
        document.getElementById('statBelumHadir').textContent = stats.belum_hadir;
        document.getElementById('persentaseHadir').textContent = stats.persentase + '%';
        document.getElementById('persentaseBelum').textContent = (100 - stats.persentase) + '%';
        document.getElementById('displayHadir').textContent = `${stats.hadir}/${stats.total}`;
    }

    // Tambah aktivitas terbaru
    function addRecentActivity(nama, status) {
        const container = document.getElementById('recentActivity');
        const now = new Date().toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit', second: '2-digit' });
        
        const activityItem = document.createElement('div');
        activityItem.className = 'text-xs p-2 bg-gray-50 rounded-lg';
        activityItem.innerHTML = `
            <div class="flex items-center justify-between">
                <span class="font-medium text-gray-700">${nama}</span>
                <span class="${status === 'presensi' ? 'text-green-600' : 'text-red-600'} font-semibold">
                    ${status === 'presensi' ? '✓' : '✗'}
                </span>
            </div>
            <div class="text-gray-400 mt-0.5">${now}</div>
        `;
        
        // Hapus placeholder jika ada
        if (container.querySelector('p')) {
            container.innerHTML = '';
        }
        
        // Tambahkan di awal
        container.insertBefore(activityItem, container.firstChild);
        
        // Batasi hanya 5 item terbaru
        while (container.children.length > 5) {
            container.removeChild(container.lastChild);
        }
    }

    // Show notification
    function showNotification(message, type = 'success') {
        const notification = document.createElement('div');
        notification.className = `fixed top-4 right-4 z-50 px-6 py-3 rounded-lg shadow-lg ${type === 'success' ? 'bg-green-500' : 'bg-red-500'} text-white font-medium transition-all duration-300 transform translate-x-0`;
        notification.textContent = message;
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.style.transform = 'translateX(400px)';
            setTimeout(() => notification.remove(), 300);
        }, 3000);
    }

    // Auto-refresh data
    async function refreshData() {
        try {
            const response = await fetch(`/guru/presensi-kamera/${sesiId}/data`);
            const data = await response.json();
            
            if (data.success) {
                updateStats(data.stats);
                
                // Update recent attendance jika ada
                if (data.recent_attendance && data.recent_attendance.length > 0) {
                    data.recent_attendance.forEach(attendance => {
                        addRecentActivity(attendance.nama_siswa, attendance.status);
                    });
                }
            }
        } catch (error) {
            console.error('Error refreshing data:', error);
        }
    }

    // Start auto-refresh setiap 5 detik
    refreshInterval = setInterval(refreshData, 5000);

    // Search functionality
    document.getElementById('searchInput').addEventListener('input', function(e) {
        const searchTerm = e.target.value.toLowerCase();
        const rows = document.querySelectorAll('.student-row');
        let visibleCount = 0;
        
        rows.forEach(row => {
            const nama = row.getAttribute('data-nama');
            if (nama.includes(searchTerm)) {
                row.style.display = '';
                visibleCount++;
            } else {
                row.style.display = 'none';
            }
        });
        
        document.getElementById('totalShown').textContent = visibleCount;
    });

    // Export Excel (placeholder)
    function exportExcel() {
        alert('Fitur export sedang dalam pengembangan');
    }

    // Cleanup on page unload
    window.addEventListener('beforeunload', () => {
        clearInterval(refreshInterval);
    });

    // Camera functionality (placeholder untuk face recognition)
    document.getElementById('startCameraBtn')?.addEventListener('click', async () => {
        try {
            const stream = await navigator.mediaDevices.getUserMedia({ video: true });
            const video = document.getElementById('videoElement');
            video.srcObject = stream;
            video.classList.remove('hidden');
            document.getElementById('cameraPlaceholder').classList.add('hidden');
            document.getElementById('cameraStatus').textContent = 'Aktif';
            showNotification('Kamera berhasil diaktifkan', 'success');
        } catch (error) {
            console.error('Error accessing camera:', error);
            showNotification('Gagal mengakses kamera', 'error');
        }
    });
</script>
@endpush
@endsection