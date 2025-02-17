@extends('layouts.Frontend.app')

@section('title')
    Kalender Pendidikan
@endsection

@section('content')
    @section('about')
    <!-- Hero Section -->
<div class="jumbotron jumbotron-fluid bg-primary text-white mb-0">
    <div class="container py-5">
        <h1 class="display-4">
            <i class="far fa-calendar-alt mr-3"></i>
            Kalender Pendidikan
        </h1>
        <p class="lead">Jadwal Kegiatan Akademik SMPN 2 Tegal Tahun Ajaran 2023/2024</p>
    </div>
</div>
    <div class="container mt-5">

        <div class="table-responsive">
            <table class="table table-hover table-bordered text-center shadow-sm">
                <thead class="table-primary">
                    <tr style="align-items: center; justify-content:center;">
                        <th style="align-items: center;"><i class="fas fa-tasks"></i> Nama Kegiatan</th>
                        <th style="align-items: center;"><i class="fas fa-calendar-alt"></i> Tanggal</th>
                        <th style="align-items: center;"><i class="fas fa-info-circle"></i> Deskripsi</th>
                    </tr>
                </thead>
                <tbody class="bg-light">
                    @foreach ($kaldik as $item)
                        <tr>
                            <td class="fw-bold">{{ $item->nama_kegiatan }}</td>
                            <td><span class="badge badge-success">{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</span></td>
                            <td class="text-muted">{{ $item->deskripsi }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@endsection
