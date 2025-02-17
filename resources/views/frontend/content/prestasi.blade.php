@extends('layouts.Frontend.app')

@section('title')
    Prestasi Siswa SMPN 2 Tegal
@endsection

@section('content')
@section('about')
<div class="hero-sejarah position-relative d-flex align-items-center justify-content-center" 
        style="background-image: url('data:image/svg+xml,%3Csvg width=%2760%27 height=%2760%27 viewBox=%270 0 60 60%27 xmlns=%27http://www.w3.org/2000/svg%27%3E%3Cg fill=%27none%27 fill-rule=%27evenodd%27%3E%3Cg fill=%27%239C92AC%27 fill-opacity=%270.1%27%3E%3Cpath d=%27M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z%27/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');">
        <div class="container text-header text-start text-black">
            <h1 class="display-4 header-mobile text-primary poppins-semibold font-weight-bold mb-3" style="margin-top: 5rem;">Prestasi Siswa SMPN 2 Tegal</h1>
            <p class="h5 lead mb-0">Beragam aktivitas siswa yang menginspirasi, mulai dari akademik, seni, olahraga, hingga kegiatan sosial</p>
        </div>
    </div>
    <div class="container py-5" style="margin-bottom: 3rem; margin-top:5rem;">
        <div class="row g-4 justify-content-center">
            @foreach($prestasi as $item)
                <div class="col-md-4 d-flex justify-content-center">
                    <div class="card prestasi-card shadow-lg border-0 rounded-4 overflow-hidden" style="width: 260px; background: #fff; padding: 12px; border-radius: 12px; box-shadow: 0px 6px 10px rgba(0,0,0,0.15); transform: rotate(-2deg); transition: transform 0.3s ease-in-out;">
                        <div class="text-center">
                            <img src="{{ asset('storage/'.$item->gambar ?? 'default.jpg') }}" class="card-img-top img-fluid prestasi-img" alt="{{ $item->prestasi }}" style="border-radius: 5px; border: 6px solid #fff;">
                        </div>
                        <div class="card-body text-center">
                            <div class="h4 card-title fw-bold text-dark">{{ $item->prestasi }}</div>
                            <div class="card-text text-muted"><strong>Nama Siswa:</strong> {{ $item->nama_siswa }}</div>
                            <div class="card-text text-muted"><strong>Tingkat:</strong> {{ $item->tingkat }}</div>
                            <div class="card-text text-muted"><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</div>
                            <div class="card-text">{{ Str::limit($item->deskripsi, 100) }}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $prestasi->links() }}
        </div>
    </div>
    <style>
        .hero-prestasi {
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    padding: 4rem 0;
}
        /* Efek Hover dan Animasi */
        .prestasi-card {
            width: 280px;
            padding: 12px;
            transition: all 0.3s ease-in-out;
            transform: rotate(-2deg);
            background: linear-gradient(135deg, #ffffff, #f8f9fa);
            box-shadow: 0px 6px 10px rgba(0,0,0,0.15);
        }

        .prestasi-card:hover {
            transform: rotate(0deg) scale(1.05);
            box-shadow: 0px 10px 15px rgba(0,0,0,0.2);
        }

        .prestasi-img {
            border-radius: 8px;
            border: 4px solid #fff;
            transition: transform 0.3s ease-in-out;
        }

        .prestasi-img:hover {
            transform: scale(1.1);
        }
    </style>
@endsection
@endsection

