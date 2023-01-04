<?php

namespace App\Imports;

use App\Models\siswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswaImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new siswa([
            'nis' => $row['nis'],
            'nama' => $row['nama'],
            'id_kelas' => $row['kelas'],
            'no_hp' => $row['no_hp'],
        ]);
    }
}
