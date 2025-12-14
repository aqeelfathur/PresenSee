@extends('layouts.app')

@section('title', 'Pengaturan')
@section('page-title', 'Pengaturan Akun')
@section('page-subtitle', 'Kelola profil dan keamanan akun Anda')

@section('content')
<div class="max-w-3xl mx-auto">
    <!-- Profile Section -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mb-6">
        <div class="px-6 py-4 border-b border-gray-100">
            <h2 class="text-lg font-bold text-gray-900">Informasi Profil</h2>
            <p class="text-sm text-gray-500 mt-0.5">Update informasi profil Anda</p>
        </div>
        
        <form class="p-6 space-y-6">
            <!-- Profile Photo -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-3">Foto Profil</label>
                <div class="flex items-center gap-6">
                    <div class="relative">
                        <img src="https://ui-avatars.com/api/?name=Pak+Budi&background=004680&color=fff&size=128" alt="Profile" class="w-24 h-24 rounded-full border-4 border-gray-100">
                        <div class="absolute bottom-0 right-0 w-8 h-8 bg-[#004680] rounded-full flex items-center justify-center cursor-pointer hover:bg-[#003766] transition-colors duration-200">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <button type="button" class="px-4 py-2 bg-[#004680] text-white rounded-lg hover:bg-[#003766] transition-colors duration-200 text-sm font-medium">
                            Upload Foto Baru
                        </button>
                        <p class="text-xs text-gray-500 mt-2">JPG, PNG atau GIF • Maksimal 2MB</p>
                    </div>
                </div>
            </div>
            
            <!-- Nama Lengkap -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                <input 
                    type="text" 
                    value="Budi Santoso, S.Pd"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004680] focus:border-transparent transition-all duration-200"
                    placeholder="Masukkan nama lengkap"
                >
            </div>
            
            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                <input 
                    type="email" 
                    value="budi.santoso@presensee.sch.id"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004680] focus:border-transparent transition-all duration-200"
                    placeholder="nama@presensee.sch.id"
                >
            </div>
            
            <!-- NIP -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">NIP</label>
                <input 
                    type="text" 
                    value="198501152010011001"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-50 cursor-not-allowed"
                    disabled
                >
                <p class="text-xs text-gray-500 mt-1">NIP tidak dapat diubah</p>
            </div>
            
            <!-- Mata Pelajaran -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Mata Pelajaran</label>
                <select class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004680] focus:border-transparent transition-all duration-200">
                    <option selected>Matematika</option>
                    <option>Fisika</option>
                    <option>Kimia</option>
                    <option>Biologi</option>
                    <option>Bahasa Indonesia</option>
                    <option>Bahasa Inggris</option>
                </select>
            </div>
            
            <!-- Nomor Telepon -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon</label>
                <input 
                    type="tel" 
                    value="+62 812-3456-7890"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004680] focus:border-transparent transition-all duration-200"
                    placeholder="+62 xxx-xxxx-xxxx"
                >
            </div>
            
            <!-- Save Button -->
            <div class="flex items-center justify-end gap-3 pt-4">
                <button type="button" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors duration-200 font-medium">
                    Batal
                </button>
                <button type="submit" class="px-6 py-2 bg-[#004680] text-white rounded-lg hover:bg-[#003766] transition-colors duration-200 font-medium shadow-sm">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
    
    <!-- Change Password Section -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mb-6">
        <div class="px-6 py-4 border-b border-gray-100">
            <h2 class="text-lg font-bold text-gray-900">Keamanan Akun</h2>
            <p class="text-sm text-gray-500 mt-0.5">Update password untuk keamanan akun</p>
        </div>
        
        <form class="p-6 space-y-6">
            <!-- Current Password -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Password Saat Ini</label>
                <div class="relative">
                    <input 
                        type="password" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004680] focus:border-transparent transition-all duration-200"
                        placeholder="Masukkan password saat ini"
                    >
                    <button type="button" class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-gray-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    </button>
                </div>
            </div>
            
            <!-- New Password -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Password Baru</label>
                <div class="relative">
                    <input 
                        type="password" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004680] focus:border-transparent transition-all duration-200"
                        placeholder="Masukkan password baru"
                    >
                    <button type="button" class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-gray-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    </button>
                </div>
                <p class="text-xs text-gray-500 mt-1">Password minimal 8 karakter dengan kombinasi huruf dan angka</p>
            </div>
            
            <!-- Confirm New Password -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Konfirmasi Password Baru</label>
                <div class="relative">
                    <input 
                        type="password" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004680] focus:border-transparent transition-all duration-200"
                        placeholder="Ulangi password baru"
                    >
                    <button type="button" class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-gray-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    </button>
                </div>
            </div>
            
            <!-- Update Password Button -->
            <div class="flex items-center justify-end gap-3 pt-4">
                <button type="button" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors duration-200 font-medium">
                    Batal
                </button>
                <button type="submit" class="px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors duration-200 font-medium shadow-sm">
                    Update Password
                </button>
            </div>
        </form>
    </div>
    
    

<script>
// Toggle switches (dummy functionality)
document.querySelectorAll('button[class*="inline-flex h-6 w-11"]').forEach(toggle => {
    toggle.addEventListener('click', function() {
        const span = this.querySelector('span');
        const isActive = this.classList.contains('bg-[#004680]');
        
        if (isActive) {
            this.classList.remove('bg-[#004680]');
            this.classList.add('bg-gray-300');
            span.classList.remove('translate-x-6');
            span.classList.add('translate-x-1');
        } else {
            this.classList.add('bg-[#004680]');
            this.classList.remove('bg-gray-300');
            span.classList.add('translate-x-6');
            span.classList.remove('translate-x-1');
        }
    });
});
</script>
@endsection