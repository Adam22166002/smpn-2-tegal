@extends('layouts.Frontend.app')

@section('title')
    Prestasi Siswa SMPN 2 Tegal
@endsection

@section('content')
@section('about')
    <div class="container py-5" style="margin-bottom: 3rem;">
        <h2 class="mb-4 text-center fw-bold text-primary">Prestasi Siswa</h2>
        <div class="row g-4 justify-content-center">
            @foreach($prestasi as $item)
                <div class="col-md-4 d-flex justify-content-center">
                    <div class="card shadow-lg border-0 rounded-4 overflow-hidden" style="width: 260px; background: #fff; padding: 12px; border-radius: 12px; box-shadow: 0px 6px 10px rgba(0,0,0,0.15); transform: rotate(-2deg); transition: transform 0.3s ease-in-out;">
                        <div class="text-center">
                            <img src="{{ asset('storage/'.$item->gambar ?? 'default.jpg') }}" class="card-img-top img-fluid" alt="{{ $item->prestasi }}" style="border-radius: 5px; border: 6px solid #fff;">
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
@endsection
@endsection

