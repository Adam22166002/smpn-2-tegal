@extends('layouts.Frontend.app')
@section('title')
Gallery
@endsection
@section('content')
    @section('about')
    <div class="header">
        <h2>Gallery<span class="text-primary"> SMPN 2 Tegal</span></h2>
        <p class="mb-0">Dokumentasi kegiatan-kegiatan di sekolah kami</p>
    </div>

    <!-- Filter Kategori sebagai Tombol -->
    <div class="container">
        <div class="row">
            <div class="d-flex justify-content-center gap-2 flex-wrap mb-4 ">
                <a href="{{ route('gallery') }}" class="category-btn {{ request('category') == null ? 'active' : '' }}">
                    Semua Kategori
                </a>
                @foreach ($categories as $cat)
                    <a href="{{ route('gallery', ['category' => $cat]) }}"
                        class="category-btn {{ request('category') == $cat ? 'active' : '' }}">
                        {{ $cat }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Gallery -->
    <div class="gallery d-flex flex-wrap gap-3">
        @if ($galleries->count() > 0)
            @foreach ($galleries as $gallery)
                <div class="gallery-item">
                    <img src="{{ asset('storage/images/galeri/' . $gallery->image) }}" alt="{{ $gallery->title }}">
                    <div class="overlay">
                        <h3>{{ $gallery->title }}</h3>
                        <p>{{ $gallery->category }}</p>
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-center text-muted">Tidak ada gambar yang tersedia.</p>
        @endif
    </div>

    <!-- Pagination -->
    <div class="pagination justify-content-center">
        {{ $galleries->links() }}
    </div>


    @endsection
@endsection
