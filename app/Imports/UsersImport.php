<?php

namespace App\Imports;

use App\Models\User;
use App\Models\dataMurid;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // Konversi nisn ke integer
        $nisn = is_numeric($row['nisn']) ? (int)$row['nisn'] : null;
        if (!$nisn) {
            return null;
        }

        // Ambil username
        $username = explode(" ", $row['nama'])[0];

        // Insert ke tabel users
        $user = User::create([
            'name'  => $row['nama'],
            'username'  => $username,
            'email' => $row['email'],
            'role' => 'Murid',
            'status' => 'Aktif',
            'password' => bcrypt($row['password'])
        ]);

        // Insert ke tabel addresses menggunakan user_id
        dataMurid::create([
            'user_id' => $user->id,
            'nisn' => $nisn,
            'kelas' => $row['kelas'],
            'nama_kelas' => strtolower($row['nama_kelas']),
            'jenis_kelamin' => strtolower($row['jenis_kelamin']),
            'proses' => 'Murid'
        ]);

        return $user;
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
