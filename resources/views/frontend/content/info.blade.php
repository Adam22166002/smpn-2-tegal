@extends('layouts.frontend.app')

@section('title', 'Info Pengumuman')

@section('content')
@section('about')

<div class="container mt-5">
    <h2 class="text-center mb-4">Daftar Pengumuman</h2>
    
    @if($informasi->isEmpty())
        <p class="text-center">Tidak ada pengumuman saat ini.</p>
    @else
        <div class="row">
            @foreach($informasi as $item)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->judul }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $item->kategori }}</h6>
                            <p class="card-text">{{ Str::limit($item->deskripsi, 150) }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
@endsection

