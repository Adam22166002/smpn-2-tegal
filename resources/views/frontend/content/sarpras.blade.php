@extends('layouts.Frontend.app')

@section('title')
    Sarana dan Prasarana SMPN 2 Tegal
@endsection

@section('content')
@section('about')
<div class="sarpras-section">
<div class="hero-sejarah position-relative d-flex align-items-center justify-content-center" 
         style="background-image: linear-gradient(rgba(0, 33, 71, 0.6), rgba(0, 33, 71, 0.6)), url('{{ asset('Assets/Frontend/img/sejarah-bg.jpg') }}');">
        <div class="container text-center text-white">
            <h1 class="display-4 text-white font-weight-bold mb-3"style="margin-top: 2rem;">Sarana dan Prasarana</h1>
            <p class="lead mb-0">Fasilitas Lengkap untuk Mendukung Kegiatan Belajar Mengajar</p>
        </div>
        <div class="wave-shape position-absolute bottom-0 left-0 w-100">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#ffffff" fill-opacity="1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,154.7C960,171,1056,181,1152,165.3C1248,149,1344,107,1392,85.3L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            </svg>
        </div>
        </div>
    </div>
    <div class="container" style="margin-bottom: 5rem; margin-top:-99px">
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

