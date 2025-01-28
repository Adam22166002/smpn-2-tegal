<?php

namespace App\Imports;

use App\Models\User;
use App\Models\dataMurid;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // Konversi nisn ke integer
        $nisn = is_numeric($row[1]) ? (int)$row[1] : null;
        if (!$nisn) {
            return null;
        }

        // Ambil username
        $username = explode(" ", $row[0])[0];

        // Insert ke tabel users
        $user = User::create([
            'name'  => $row[0],
            'username'  => $username,
            'email' => $row[2],
            'role' => 'Murid',
            'status' => 'Aktif',
            'password' => bcrypt($row[4])
        ]);

        // Insert ke tabel addresses menggunakan user_id
        dataMurid::create([
            'user_id' => $user->id,
            'nisn' => $nisn,
            'jenis_kelamin' => $row[3],
            'proses' => 'Murid'
        ]);

        return $user;
    }

    public function chunkSize(): int
    {
        return 1000; // Jumlah baris per batch, jika data sangat besar
    }
}
