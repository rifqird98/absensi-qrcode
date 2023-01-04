<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function Kelas()
    {
        return $this->belongsTo(kelas::class,'id_kelas','id');
    }

    public function kehadiran()
    {
        return $this->belongsTo(kehadiran::class, 'id_kelas', 'id');
    }
    public function rekap()
    {
        return $this->belongsTo(Rekap::class, 'id_kelas', 'id');
    }
}
