<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswas';
    protected $fillable = ['username', 'password', 'jurusan', 'kelas'];

    public function izins()
    {
        return $this->hasMany(Izin::class, 'siswa_id');
    }
}

