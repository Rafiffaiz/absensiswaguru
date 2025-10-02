<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuruRekap extends Model
{
    protected $table = 'gurus_rekap';

    protected $fillable = [
        'guru_id',
        'siswa_id',
        'foto',
        'tanggal',
        'kelas',
        'keterangan',
    ];

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id'); // sesuaikan model Guru
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }
}

