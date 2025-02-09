<?php

namespace App\Exports;

use App\Models\User;
use App\Models\UsersDetail;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AbsenPerHariIniExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $date = date('Y-m-d');
        $guru_id = Auth::user()->id;
        $guru = User::select('id')->where('id', $guru_id)->first();
        $guruMengajar = UsersDetail::select(
            'users_details.kelas',
            'users_details.nama_kelas'
        )
            ->where('user_id', $guru->id)->first();

        return User::select(
            'users.name',
            'absensi.status',
            'absensi.keterangan',
            'absensi.tanggal',
            'mata_pelajaran.nama'
        )
            ->join('data_murids', 'users.id', '=', 'data_murids.user_id')
            ->leftJoin('absensi', 'users.id', '=', 'absensi.murid_id')
            ->leftJoin('mata_pelajaran', 'absensi.mata_pelajaran_id', '=', 'mata_pelajaran.id')
            ->where('users.role', 'Murid')
            ->where('data_murids.kelas', $guruMengajar->kelas)
            ->where('data_murids.nama_kelas', $guruMengajar->nama_kelas)
            ->whereDate('absensi.tanggal', $date)
            ->get();
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Status',
            'Keterangan',
            'Tanggal',
            'Mata Pelajaran'
        ];
    }

    public function map($absen): array
    {
        return [
            $absen->name,
            $absen->status,
            $absen->keterangan,
            Carbon::parse($absen->tanggal)->format('Y-m-d'),
            $absen->nama
        ];
    }
}
