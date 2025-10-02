<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IzinGuru extends Model
{
    use HasFactory;

    protected $table = 'izin_gurus';

    protected $fillable = [
    'guru_id',
    'nama',
    'mapel',
    'keterangan',
    'tanggal',
];
}
