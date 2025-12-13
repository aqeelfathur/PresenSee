<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Sesi extends Model
{
    use HasFactory;

    protected $table = 'sesi';
    protected $primaryKey = 'id_sesi';

    protected $fillable = [
        'id_mapel_kelas',
        'id_guru',
        'tanggal_sesi',
        'jam_mulai',
        'jam_selesai'
    ];

    protected $casts = [
        'tanggal_sesi' => 'date',
    ];

    public function mapelKelas()
    {
        return $this->belongsTo(MapelKelas::class, 'id_mapel_kelas', 'id_mapel_kelas');
    }

    public function guru()
    {
        return $this->belongsTo(User::class, 'id_guru', 'id_user');
    }

    public function presensi()
    {
        return $this->hasMany(Presensi::class, 'id_sesi', 'id_sesi');
    }

    // Helper method untuk cek apakah sesi sedang berlangsung
    public function isBerlangsung()
    {
        $now = Carbon::now();
        $tanggalSekarang = $now->toDateString();
        $jamSekarang = $now->format('H:i:s');
        
        return $this->tanggal_sesi->toDateString() === $tanggalSekarang 
            && $jamSekarang >= $this->jam_mulai 
            && $jamSekarang <= $this->jam_selesai;
    }

    // Helper method untuk mendapatkan durasi dalam menit
    public function getDurasiMenit()
    {
        $mulai = Carbon::parse($this->jam_mulai);
        $selesai = Carbon::parse($this->jam_selesai);
        return $mulai->diffInMinutes($selesai);
    }

    // Helper method untuk format jam yang readable
    public function getJamFormatted()
    {
        return Carbon::parse($this->jam_mulai)->format('H:i') . ' - ' . Carbon::parse($this->jam_selesai)->format('H:i');
    }
}