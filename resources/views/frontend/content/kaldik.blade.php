@extends('layouts.Frontend.app')

@section('title')
    Kalender Pendidikan
@endsection

@section('content')
    @section('about')
    <!-- Hero Section -->
    <div class="hero-sejarah position-relative d-flex align-items-center justify-content-center" 
        style="background-image: url('data:image/svg+xml,%3Csvg width=%2760%27 height=%2760%27 viewBox=%270 0 60 60%27 xmlns=%27http://www.w3.org/2000/svg%27%3E%3Cg fill=%27none%27 fill-rule=%27evenodd%27%3E%3Cg fill=%27%239C92AC%27 fill-opacity=%270.1%27%3E%3Cpath d=%27M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z%27/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');">
        <div class="container text-start text-black">
            <h1 class="display-4 text-primary poppins-semibold font-weight-bold mb-3" style="margin-top: 5rem;"><i class="far fa-calendar-alt mr-3"></i>
            Kalender Pendidikan</h1>
            <p class="h5 lead mb-0">Jadwal Kegiatan Akademik SMPN 2 Tegal Tahun Ajaran 2023/2024</p>
        </div>
    </div>
    
    <div class="container mt-5" style="margin-top: 6rem;">

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
