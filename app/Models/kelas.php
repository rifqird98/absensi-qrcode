<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelas extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function siswa(){
        
        return $this->hasMany( siswa::class, 'id_kelas', 'id' );
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
