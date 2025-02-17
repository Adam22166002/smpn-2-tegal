@extends('layouts.Frontend.app')

@section('title')
    Sarana dan Prasarana SMPN 2 Tegal
@endsection

@section('content')
@section('about')
<div class="sarpras-section">
<div class="hero-sejarah position-relative d-flex align-items-center justify-content-center" 
        style="background-image: url('data:image/svg+xml,%3Csvg width=%2760%27 height=%2760%27 viewBox=%270 0 60 60%27 xmlns=%27http://www.w3.org/2000/svg%27%3E%3Cg fill=%27none%27 fill-rule=%27evenodd%27%3E%3Cg fill=%27%239C92AC%27 fill-opacity=%270.1%27%3E%3Cpath d=%27M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z%27/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');">
        <div class="container text-header text-start text-black">
            <h1 class="header-mobile display-4 text-primary poppins-semibold font-weight-bold mb-3" style="margin-top: 5rem;">Sarana dan Prasarana</h1>
            <p class="h5 lead mb-0">Fasilitas Lengkap untuk Mendukung Kegiatan Belajar Mengajar</p>
        </div>
    </div>
    <div class="container" style="margin-bottom: 5rem; margin-top: 5rem">
        @if ($sarpras->count() > 0)
            <div class="row">
                @foreach ($sarpras as $item)
                    <div class="col-lg-4 col-md-6">
                        <!-- Card yang bisa diklik untuk memunculkan modal -->
                        <div class="facility-card mb-4" data-toggle="modal" data-target="#facilityModal{{ $item->id }}">
                            <div class="card-wrapper position-relative">
                                <img src="{{ asset('storage/images/sarpras/' . $item->image) }}" 
                                    class="img-fluid w-100" 
                                    alt="{{ $item->nama }}">
                                <div class="card-overlay">
                                    <div class="overlay-content">
                                        <div class=" h4 mb-2 text-white text-primary font-weight-bold">{{ $item->nama }}</div>
                                        <div class="mb-0 small">{{ Str::limit($item->deskripsi, 30) }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="facilityModal{{ $item->id }}" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header border-0">
                                        <button type="button" class="close" data-dismiss="modal">
                                            <span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="{{ asset('storage/images/sarpras/' . $item->image) }}" 
                                            class="img-fluid rounded mb-4" 
                                            alt="{{ $item->nama }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
        @endif
    </div>
</div>

<style>
    .wave-shape {
    position: relative;
    bottom: -1px;
}
.facility-card {
    position: relative;
    cursor: pointer;
    overflow: hidden;
    transition: all 0.3s ease;
}

.card-wrapper {
    aspect-ratio: 4/3;
    overflow: hidden;
}

.card-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.facility-card:hover img {
    transform: scale(1.1);
}

.card-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(to top, rgba(0,0,0,0.9), rgba(0,0,0,0.5), transparent);
    padding: 20px;
    color: white;
    opacity: 0;
    transition: all 0.3s ease;
    transform: translateY(20px);
}

.facility-card:hover .card-overlay {
    opacity: 1;
    transform: translateY(0);
}

.overlay-content {
    position: relative;
    z-index: 2;
}

/* Modal styling tetap sama */
.modal-content {
    overflow: hidden;
}

.modal-header {
    background-color: #f8f9fa;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .card-wrapper {
        aspect-ratio: 3/2;
    }
}
</style>
<script>
// Animasi saat scroll
document.addEventListener('DOMContentLoaded', function() {
    const cards = document.querySelectorAll('.facility-card');
    
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate__animated', 'animate__fadeInUp');
            }
        });
    }, { threshold: 0.1 });

    cards.forEach(card => observer.observe(card));
});
</script>
@endsection
@endsection

