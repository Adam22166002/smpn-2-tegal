<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\UsersDetail;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Carbon\Carbon;

class SemuaPenilaianExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $guru_id = Auth::user()->id;
        $guru = User::select('id')->where('id', $guru_id)->first();
        $guruMengajar = UsersDetail::select(
            'users_details.kelas',
            'users_details.nama_kelas'
        )
            ->where('user_id', $guru->id)->first();

        return User::select(
            'users.name',
            'penilaian.kategori',
            'penilaian.nilai',
            'penilaian.keterangan',
            'penilaian.created_at',
            'penilaian.updated_at'
        )
            ->join('data_murids', 'users.id', '=', 'data_murids.user_id')
            ->leftJoin('penilaian', 'users.id', '=', 'penilaian.murid_id')
            ->where('users.role', 'Murid')
            ->where('data_murids.kelas', $guruMengajar->kelas)
            ->where('data_murids.nama_kelas', $guruMengajar->nama_kelas)
            ->get();
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Kategori',
            'Nilai',
            'Keterangan',
            'Dibuat Pada',
            'Diperbarui Pada'
        ];
    }

    public function map($penilaian): array
    {
        return [
            $penilaian->name,
            $penilaian->kategori,
            $penilaian->nilai,
            $penilaian->keterangan,
            Carbon::parse($penilaian->created_at)->format('Y-m-d H:i:s'),
            Carbon::parse($penilaian->updated_at)->format('Y-m-d H:i:s'),
        ];
    }
}
