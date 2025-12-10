@extends('layouts.app')

@section('title', 'Data Siswa')
@section('page-title', 'Data Siswa')
@section('page-subtitle', 'Kelola data siswa di sistem PresenSee')

@section('content')

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">Total Siswa</p>
                <p class="text-2xl font-bold text-gray-900 mt-1">1,247</p>
            </div>
            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-[#004680]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
            </div>
        </div>
    </div>
    
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">Kelas X</p>
                <p class="text-2xl font-bold text-green-600 mt-1">420</p>
            </div>
            <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                </svg>
            </div>
        </div>
    </div>
    
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">Kelas XI</p>
                <p class="text-2xl font-bold text-purple-600 mt-1">415</p>
            </div>
            <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                </svg>
            </div>
        </div>
    </div>
    
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">Kelas XII</p>
                <p class="text-2xl font-bold text-orange-600 mt-1">412</p>
            </div>
            <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                </svg>
            </div>
        </div>
    </div>
</div>

<!-- Header Actions -->
<div class="flex items-center justify-between mb-6">
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
                placeholder="Cari nama atau NIS siswa..."
                class="pl-10 pr-4 py-2 bg-white border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#004680] focus:border-transparent w-80"
            >
        </div>
        
        <!-- Filter Kelas -->
        <select class="px-4 py-2 bg-white border border-gray-200 rounded-lg text-sm font-medium text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#004680] focus:border-transparent">
            <option>Semua Kelas</option>
            <option>Kelas X-1</option>
            <option>Kelas X-2</option>
            <option>Kelas XI-1</option>
            <option>Kelas XI-2</option>
            <option>Kelas XII-1</option>
        </select>
    </div>
    
    <div class="flex items-center gap-3">
        <button onclick="openModal('addSiswaModal')" class="flex items-center gap-2 px-4 py-2 bg-[#004680] text-white rounded-lg hover:bg-[#003766] transition-colors duration-200 shadow-sm">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
            </svg>
            Tambah Siswa
        </button>
    </div>
</div>

<!-- Table Section -->
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-100">
        <h2 class="text-lg font-bold text-gray-900">Daftar Siswa</h2>
        <p class="text-sm text-gray-500 mt-0.5">Menampilkan semua data siswa</p>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50 border-b border-gray-100">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">No</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nama Siswa</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">NIS</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Kelas</th>
                    <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Status Wajah</th>
                    <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                
                <tr class="hover:bg-gray-50 transition-colors duration-150">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">1</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center gap-3">
                            <img src="https://ui-avatars.com/api/?name=Ahmad+Rizki&background=004680&color=fff&size=128" alt="Siswa" class="w-8 h-8 rounded-full">
                            <span class="text-sm font-medium text-gray-900">Ahmad Rizki Fauzan</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">2401001</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-700">
                            X-1
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                         <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-red-100 text-red-700">
                            Belum Terdaftar
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        <div class="flex items-center justify-center gap-2">
                            <button onclick="openModal('editSiswaModal')" class="p-1.5 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors duration-200">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </button>
                            <button onclick="confirmDelete()" class="p-1.5 text-red-600 hover:bg-red-50 rounded-lg transition-colors duration-200">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
                
                <tr class="hover:bg-gray-50 transition-colors duration-150">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">2</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center gap-3">
                            <img src="https://ui-avatars.com/api/?name=Siti+Nurhaliza&background=004680&color=fff&size=128" alt="Siswa" class="w-8 h-8 rounded-full">
                            <span class="text-sm font-medium text-gray-900">Siti Nurhaliza</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">2401002</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-700">
                            X-1
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                         <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                            Terdaftar
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        <div class="flex items-center justify-center gap-2">
                            <button onclick="openModal('editSiswaModal')" class="p-1.5 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors duration-200">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </button>
                            <button onclick="confirmDelete()" class="p-1.5 text-red-600 hover:bg-red-50 rounded-lg transition-colors duration-200">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
                
                <tr class="hover:bg-gray-50 transition-colors duration-150">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">3</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center gap-3">
                            <img src="https://ui-avatars.com/api/?name=Budi+Santoso&background=004680&color=fff&size=128" alt="Siswa" class="w-8 h-8 rounded-full">
                            <span class="text-sm font-medium text-gray-900">Budi Santoso</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">2401003</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                            XI-2
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                         <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                            Terdaftar
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        <div class="flex items-center justify-center gap-2">
                            <button onclick="openModal('editSiswaModal')" class="p-1.5 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors duration-200">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </button>
                            <button onclick="confirmDelete()" class="p-1.5 text-red-600 hover:bg-red-50 rounded-lg transition-colors duration-200">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <div class="px-6 py-4 border-t border-gray-100 flex items-center justify-between">
        <div class="text-sm text-gray-600">
            Menampilkan <span class="font-semibold">1-3</span> dari <span class="font-semibold">1,247</span> siswa
        </div>
        <div class="flex items-center gap-2">
            <button class="px-3 py-1.5 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors duration-200">Previous</button>
            <button class="px-3 py-1.5 bg-[#004680] text-white rounded-lg text-sm font-medium">1</button>
            <button class="px-3 py-1.5 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors duration-200">2</button>
            <button class="px-3 py-1.5 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors duration-200">...</button>
            <button class="px-3 py-1.5 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors duration-200">416</button>
            <button class="px-3 py-1.5 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors duration-200">Next</button>
        </div>
    </div>
</div>

<div id="addSiswaModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
            <h3 class="text-lg font-bold text-gray-900">Tambah Siswa Baru</h3>
            <button onclick="closeModal('addSiswaModal')" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        
        <form class="p-6 space-y-5">
            
            <h4 class="text-base font-semibold text-gray-800 border-b pb-2">Data Siswa</h4>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="nama_siswa" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap Siswa</label>
                    <input type="text" id="nama_siswa" name="nama_siswa" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004680] focus:border-transparent" placeholder="Masukkan nama lengkap siswa">
                </div>
                <div>
                    <label for="nis" class="block text-sm font-medium text-gray-700 mb-2">NIS (Nomor Induk Siswa)</label>
                    <input type="text" id="nis" name="nis" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004680] focus:border-transparent" placeholder="Contoh: 2024001">
                </div>
            </div>
            
            <h4 class="text-base font-semibold text-gray-800 border-b pb-2 pt-2">Data Kontak Wali Murid</h4>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="nama_walimurid" class="block text-sm font-medium text-gray-700 mb-2">Nama Wali Murid</label>
                    <input type="text" id="nama_walimurid" name="nama_walimurid" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004680] focus:border-transparent" placeholder="Nama lengkap wali/orang tua">
                </div>
                <div>
                    <label for="no_hp_walimurid" class="block text-sm font-medium text-gray-700 mb-2">No. Handphone Wali</label>
                    <input type="text" id="no_hp_walimurid" name="no_hp_walimurid" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004680] focus:border-transparent" placeholder="Contoh: 0812xxxxxx">
                </div>
            </div>
            
            <div>
                <label for="kelas" class="block text-sm font-medium text-gray-700 mb-2">Kelas Siswa</label>
                <select id="kelas" name="kelas" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004680] focus:border-transparent">
                    <option>Pilih Kelas</option>
                    <option>X-1</option>
                    <option>X-2</option>
                    <option>XI-1</option>
                    <option>XI-2</option>
                    <option>XII-1</option>
                </select>
            </div>
            
            <h4 class="text-base font-semibold text-gray-800 border-b pb-2 pt-2">Pendaftaran Wajah</h4>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Foto Siswa untuk Presensi Wajah</label>
                <div class="p-4 border border-blue-200 rounded-lg text-center bg-blue-50">
                     <p class="text-sm text-gray-700 mb-3">Tindakan ini akan mengaktifkan kamera perangkat. Pastikan wajah siswa berada di tengah dan pencahayaan cukup saat proses pengambilan foto.</p>
                     <button type="button" id="startFaceRegistration" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg shadow-sm text-white bg-[#004680] hover:bg-[#003766] transition-colors duration-200">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.865-1.297A2 2 0 0111.933 3h.134a2 2 0 011.664.89l.865 1.297A2 2 0 0017.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        Mulai Pendaftaran Wajah
                    </button>
                </div>
            </div>
            
            <div class="flex items-center justify-end gap-3 pt-4">
                <button type="button" onclick="closeModal('addSiswaModal')" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors duration-200">
                    Batal
                </button>
                <button type="submit" class="px-4 py-2 bg-[#004680] text-white rounded-lg hover:bg-[#003766] transition-colors duration-200">
                    Simpan Data Siswa
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit Siswa -->
<div id="editSiswaModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
            <h3 class="text-lg font-bold text-gray-900">Edit Data Siswa</h3>
            <button onclick="closeModal('editSiswaModal')" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        
        <form class="p-6 space-y-5">
            
            <h4 class="text-base font-semibold text-gray-800 border-b pb-2">Data Siswa</h4>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="edit_nama_siswa" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap Siswa</label>
                    <input type="text" id="edit_nama_siswa" name="nama_siswa" value="Ahmad Rizki Fauzan" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004680] focus:border-transparent">
                </div>
                <div>
                    <label for="edit_nis" class="block text-sm font-medium text-gray-700 mb-2">NIS (Nomor Induk Siswa)</label>
                    <input type="text" id="edit_nis" name="nis" value="2401001" readonly class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-50 cursor-not-allowed text-gray-500">
                </div>
            </div>
            
            <h4 class="text-base font-semibold text-gray-800 border-b pb-2 pt-2">Data Kontak Wali Murid</h4>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="edit_nama_walimurid" class="block text-sm font-medium text-gray-700 mb-2">Nama Wali Murid</label>
                    <input type="text" id="edit_nama_walimurid" name="nama_walimurid" value="Bambang Santoso" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004680] focus:border-transparent">
                </div>
                <div>
                    <label for="edit_no_hp_walimurid" class="block text-sm font-medium text-gray-700 mb-2">No. Handphone Wali</label>
                    <input type="text" id="edit_no_hp_walimurid" name="no_hp_walimurid" value="081234567890" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004680] focus:border-transparent">
                </div>
            </div>
            
            <div>
                <label for="edit_kelas" class="block text-sm font-medium text-gray-700 mb-2">Kelas Siswa</label>
                <select id="edit_kelas" name="kelas" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004680] focus:border-transparent">
                    <option>X-1</option>
                    <option selected>X-2</option>
                    <option>XI-1</option>
                    <option>XI-2</option>
                    <option>XII-1</option>
                </select>
            </div>
            
            <h4 class="text-base font-semibold text-gray-800 border-b pb-2 pt-2">Status Pendaftaran Wajah)</h4>
            <div>
                <div class="p-4 border border-green-300 rounded-lg bg-green-50">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-green-800">Status:</p>
                            <p class="font-bold text-lg text-green-900">Wajah Sudah Terdaftar</p>
                            <p class="text-xs text-gray-600 mt-1">Terakhir diperbarui: 05/12/2025</p>
                        </div>
                        <button type="button" id="updateFaceRegistration" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg shadow-sm text-white bg-red-600 hover:bg-red-700 transition-colors duration-200">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 10m2.404 10.938v-5h-.582m15.356-2A8.001 8.001 0 014.582 14m2.404-3.062H12m0 0l-1.5-1.5M12 11.938l-1.5 1.5"/>
                            </svg>
                            Ulangi Pendaftaran Wajah
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="flex items-center justify-end gap-3 pt-4">
                <button type="button" onclick="closeModal('editSiswaModal')" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors duration-200">
                    Batal
                </button>
                <button type="submit" class="px-4 py-2 bg-[#004680] text-white rounded-lg hover:bg-[#003766] transition-colors duration-200">
                    Update Data Siswa
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function openModal(modalId) {
    document.getElementById(modalId).classList.remove('hidden');
}

function closeModal(modalId) {
    document.getElementById(modalId).classList.add('hidden');
}

function confirmDelete() {
    if (confirm('Apakah Anda yakin ingin menghapus data siswa ini?')) {
        alert('Data siswa berhasil dihapus!');
    }
}
</script>
@endsection