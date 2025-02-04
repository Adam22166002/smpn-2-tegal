@extends('layouts.Frontend.app')

@section('content')
<div class="container">
    <h2>Galeri Sekolah</h2>

    <!-- Filter Buttons -->
    <div class="btn-group" role="group">
        <button type="button" class="btn btn-outline-primary active" data-filter="all">Semua</button>
        <button type="button" class="btn btn-outline-primary" data-filter="akademik">Akademik</button>
        <button type="button" class="btn btn-outline-primary" data-filter="ekskul">Ekstrakurikuler</button>
        <button type="button" class="btn btn-outline-primary" data-filter="fasilitas">Fasilitas</button>
    </div>

    <!-- Gallery Grid -->
    <div class="row g-4 mt-4">
        @foreach ($galleries as $gallery)
        <div class="col-lg-4 col-md-6 gallery-item" data-category="{{ $gallery->category }}">
            <div class="card border-0 shadow-sm h-100">
                <div class="position-relative overflow-hidden">
                    <img src="{{ asset('storage/' . $gallery->image) }}" class="card-img-top"
                        alt="{{ $gallery->title }}">
                    <div
                        class="gallery-overlay position-absolute start-0 top-0 w-100 h-100 d-flex align-items-center justify-content-center">
                        <div class="text-white text-center p-3">
                            <h5 class="mb-3">{{ $gallery->title }}</h5>
                            <button type="button" class="btn btn-light btn-sm" data-bs-toggle="modal"
                                data-bs-target="#galleryModal">
                                <i class="bi bi-zoom-in"></i> Lihat Detail
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $gallery->title }}</h5>
                    <p class="card-text text-muted">{{ $gallery->description }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Gallery Modal -->
<div class="modal fade" id="galleryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title">Detail Foto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="" id="modalImage" class="img-fluid" alt="Gallery Detail">
                <div class="mt-3">
                    <h5 id="modalTitle"></h5>
                    <p class="text-muted" id="modalDescription"></p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Menambahkan event listener untuk modal
    document.querySelectorAll('.gallery-item').forEach(item => {
        item.addEventListener('click', function() {
            const title = item.querySelector('.card-title').innerText;
            const image = item.querySelector('.card-img-top').src;
            const description = item.querySelector('.card-text').innerText;

            document.getElementById('modalTitle').innerText = title;
            document.getElementById('modalImage').src = image;
            document.getElementById('modalDescription').innerText = description;
        });
    });
</script>

@endsection
