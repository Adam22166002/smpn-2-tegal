@extends('layouts.Frontend.app')

@section('title')
    Kegiatan Siswa SMPN 2 Tegal
@endsection

@section('content')
@section('about')
<div class="hero-sejarah position-relative d-flex align-items-center justify-content-center"
        style="background-image: url('data:image/svg+xml,%3Csvg width=%2760%27 height=%2760%27 viewBox=%270 0 60 60%27 xmlns=%27http://www.w3.org/2000/svg%27%3E%3Cg fill=%27none%27 fill-rule=%27evenodd%27%3E%3Cg fill=%27%239C92AC%27 fill-opacity=%270.1%27%3E%3Cpath d=%27M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z%27/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');">
        <div class="container text-header text-start text-black">
            <h1 class="display-4 header-mobile text-primary poppins-semibold font-weight-bold mb-3" style="margin-top: 5rem;">Kegiatan Siswa SMPN 2 Tegal</h1>
            <p class="h5 lead mb-0">Beragam aktivitas siswa yang menginspirasi, mulai dari akademik, seni, olahraga, hingga kegiatan sosial</p>
        </div>
    </div>
    <div class="container py-5" style="margin-bottom: 5rem; margin-top: 5rem;">
        <div class="row g-4">
            @foreach($kegiatan as $item)
                <div class="col-md-4 d-flex justify-content-center">
                    <div class="card kegiatan-card shadow-lg border-0 overflow-hidden position-relative">
                        <img src="{{ asset('storage/'.$item->gambar ?? 'default.jpg') }}" class="card-img-top img-fluid" alt="{{ $item->judul }}">
                        <div class="overlay">
                            <div class="card-body text-center text-white">
                                <div class="h4 card-title fw-bold">{{ $item->judul }}</div>
                                <p class="card-text">{{ Str::limit($item->deskripsi, 100) }}</p>
                                <p class="card-text"><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $kegiatan->links() }}
        </div>
    </div>

<style>
    .hero-kegiatan {
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    padding: 4rem 0;
}
    .kegiatan-card {
        width: 300px;
        border-radius: 12px;
        transition: transform 0.3s ease-in-out;
        overflow: hidden;
    }

    .kegiatan-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 33, 71, 0.7);
        color: white;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease-in-out;
        border-radius: 12px;
        padding: 20px;
        text-align: center;
    }

    .kegiatan-card:hover .overlay {
        opacity: 1;
    }

    .kegiatan-card:hover {
        transform: scale(1.05);
    }
</style>
@endsection
@endsection

