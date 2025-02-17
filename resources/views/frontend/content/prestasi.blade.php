@extends('layouts.Frontend.app')

@section('title')
    Prestasi Siswa SMPN 2 Tegal
@endsection

@section('content')
@section('about')
<div class="hero-prestasi position-relative">
        <div class="container text-center py-5">
            <h1 class="display-4 mb-3">Prestasi Siswa SMPN 2 Tegal</h1>
            <p class="lead">...</p>
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

