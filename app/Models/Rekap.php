<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekap extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function kelas(){
        return $this->hasMany( kelas::class, 'id', 'id_kelas' );
    }

    public function siswa(){
        return $this->hasMany( siswa::class, 'id', 'id_siswa' );
    }
}
