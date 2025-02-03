<?php

namespace App\Imports;

use App\Models\Kelas;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;

class KelasImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Kelas([
            'kelas'     => trim($row['kelas']),
            'nama_kelas'  => trim(ucwords($row['nama_kelas']))
        ]);
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
