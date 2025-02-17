@extends('layouts.Frontend.app')

@section('title')
    Kegiatan Siswa SMPN 2 Tegal
@endsection

@section('content')
@section('about')
<div class="hero-kegiatan position-relative">
        <div class="container text-center py-5">
            <h1 class="display-4 mb-3">Kegiatan Siswa SMPN 2 Tegal</h1>
            <p class="lead">...</p>
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

