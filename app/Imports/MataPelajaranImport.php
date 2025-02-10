<?php

namespace App\Imports;

use App\Models\MataPelajaran;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;

class MataPelajaranImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new MataPelajaran([
            'nama'     => $row['nama'],
            'kode'  => $row['kode_mata_pelajaran'],
            'waktu_masuk' => $row['waktu_masuk'],
            'waktu_selesai' => $row['waktu_selesai']
        ]);
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
