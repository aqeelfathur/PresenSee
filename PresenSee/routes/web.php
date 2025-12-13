   <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\Auth\AuthController;
    use App\Http\Controllers\Admin\AdminController;
    use App\Http\Controllers\Guru\GuruController;

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    */

    // Redirect root berdasarkan status login
    Route::get('/', function () {
        if (auth()->check()) {
            $user = auth()->user();
            
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }
            
            if ($user->role === 'guru') {
                return redirect()->route('guru.dashboard');
            }
            
            // Fallback jika role tidak dikenali
            auth()->logout();
            return redirect()->route('login');
        }
        
        return redirect()->route('login');
    });

    /*
    |--------------------------------------------------------------------------
    | Authentication Routes
    |--------------------------------------------------------------------------
    */
    Route::middleware('guest')->group(function () {
        // Login
        Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('login.post');
        
        // Register
        Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
        Route::post('/register', [AuthController::class, 'register'])->name('register.post');
    });

    // Logout (harus authenticated)
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

    /*
    |--------------------------------------------------------------------------
    | Admin Routes
    |--------------------------------------------------------------------------
    */
    Route::prefix('admin')->name('admin.')->middleware(['auth', 'auth.check:admin'])->group(function () {
        // Dashboard Admin
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        
        // Data Guru
        Route::get('/guru', [AdminController::class, 'guru'])->name('guru');
        
        // Data Siswa
        Route::get('/siswa', [AdminController::class, 'siswa'])->name('siswa');
        
        // Kelas & Jadwal
        Route::get('/kelas-jadwal', [AdminController::class, 'kelasJadwal'])->name('kelas-jadwal');
        
        // Laporan
        Route::get('/laporan', [AdminController::class, 'laporan'])->name('laporan');
        
        // Pengaturan
        Route::get('/pengaturan', [AdminController::class, 'pengaturan'])->name('pengaturan');
    });

    /*
    |--------------------------------------------------------------------------
    | Guru Routes
    |--------------------------------------------------------------------------
    */
    Route::prefix('guru')->name('guru.')->middleware(['auth', 'auth.check:guru'])->group(function () {
        // Dashboard Guru
        Route::get('/dashboard', [GuruController::class, 'dashboard'])->name('dashboard');
        
        // Sesi Presensi
        Route::get('/sesi-presensi', [GuruController::class, 'sesiPresensi'])->name('sesi-presensi');
        
        // Presensi Kamera (Face Recognition)
        Route::get('/presensi-kamera/{id}', [GuruController::class, 'presensiKamera'])->name('presensi-kamera');
        Route::post('/presensi-kamera/{id}/simpan', [GuruController::class, 'simpanPresensi'])->name('presensi-kamera.simpan');
        
        // Download Laporan Presensi
        Route::get('/presensi/{id}/download', [GuruController::class, 'downloadPresensi'])->name('presensi.download');
        
        // Daftar Kelas
        Route::get('/daftar-kelas', [GuruController::class, 'daftarKelas'])->name('daftar-kelas');
        
        // API untuk Modal (AJAX)
        Route::get('/daftar-kelas/siswa/{idKelas}', [GuruController::class, 'getDaftarSiswa'])->name('daftar-kelas.siswa');
        Route::get('/daftar-kelas/pertemuan/{idMapelKelas}', [GuruController::class, 'getDaftarPertemuan'])->name('daftar-kelas.pertemuan');
        
        
        // Wali Kelas
        Route::get('/wali-kelas', [GuruController::class, 'waliKelas'])->name('wali-kelas');
        
        // Pengaturan
        Route::get('/pengaturan', [GuruController::class, 'pengaturan'])->name('pengaturan');
    });

    /*
    |--------------------------------------------------------------------------
    | Fallback Route
    |--------------------------------------------------------------------------
    */
    Route::fallback(function () {
        return view('errors.404');
    });