@extends('layouts.Frontend.app')

@section('title')
    Sejarah Singkat SMPN 2 Tegal 
@endsection

@section('content')
@section('about')
    <div class="hero-sejarah position-relative d-flex align-items-center justify-content-center" 
        style="background-image: url('data:image/svg+xml,%3Csvg width=%2760%27 height=%2760%27 viewBox=%270 0 60 60%27 xmlns=%27http://www.w3.org/2000/svg%27%3E%3Cg fill=%27none%27 fill-rule=%27evenodd%27%3E%3Cg fill=%27%239C92AC%27 fill-opacity=%270.1%27%3E%3Cpath d=%27M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z%27/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');">
        <div class="container text-start text-black">
            <h1 class="display-4 text-primary poppins-semibold font-weight-bold mb-3" style="margin-top: 5rem;">Sejarah SMP Negeri 2 Tegal</h1>
            <p class="h5 lead mb-0">Perjalanan Menuju Keunggulan Sejak 1958</p>
        </div>
    </div>

    <!-- Content Section -->
    <div class="container py-5" style="margin-top: -99px;">
        <div class="row">
            <div class="col-lg-8 order-lg-1 order-2">
                <div class="sejarah-content pe-lg-4">
                    <div class="timeline">
                            @foreach ($sejarah as $paragraf)
                                <p class="text-muted">
                                    {!! $paragraf !!}
                                </p>
                            @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-4 order-lg-2 order-1 mb-lg-0 mb-5">
                <div class="sticky-top" style="top: 2rem;">
                    <div class="card border-0 shadow-sm text-center p-4 mb-4">
                        <img src="{{asset('Assets/Frontend/img/sejarah-logo.png')}}" 
                             class="img-fluid rounded-circle shadow mx-auto mb-4" 
                             alt="Logo Sejarah SMPN 2 Tegal" 
                             style="max-width: 200px;">
                        <h4 class="mb-3">SMPN 2 Tegal</h4>
                        <p class="text-muted mb-0">Mendidik Generasi Unggul Sejak 1958</p>
                    </div>
                    
                    <!-- Quick Facts -->
                    <div class="card border-0 shadow-sm p-4">
                        <div class="fact-item mb-3">
                            <i class="fas fa-calendar-alt text-primary mb-2"></i>
                            <h6 class="mb-1">Tahun Berdiri</h6>
                            <p class="small text-muted mb-0">1958</p>
                        </div>
                        <div class="fact-item mb-3">
                            <i class="fas fa-map-marker-alt text-primary mb-2"></i>
                            <h6 class="mb-1">Lokasi Pertama</h6>
                            <p class="small text-muted mb-0">Kota Tegal</p>
                        </div>
                        <div class="fact-item">
                            <i class="fas fa-users text-primary mb-2"></i>
                            <h6 class="mb-1">Alumni</h6>
                            <p class="small text-muted mb-0">Ribuan lulusan berkualitas</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<style>
    .wave-shape {
    position: relative;
    bottom: -1px;
}

/* Hero Section */
.hero-sejarah {
    min-height: 60vh;
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
}

/* Timeline Styling */
.timeline {
    position: relative;
    padding: 2rem 0;
}

.timeline::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 3px;
}

.timeline-item {
    position: relative;
    padding-left: 3rem;
    margin-bottom: 3rem;
}

.timeline-item::before {
    content: '';
    position: absolute;
    left: -8px;
    top: 0;
    width: 20px;
    height: 20px;
    border-radius: 50%;
    background: #007bff;
    border: 4px solid white;
    box-shadow: 0 0 0 3px rgba(0,123,255,0.2);
}

.timeline-content {
    border-radius: 15px;
    overflow: hidden;
    transition: all 0.3s ease;
}

.timeline-content:hover {
    transform: translateY(-5px);
}

/* Fact Items */
.fact-item {
    text-align: center;
    padding: 1rem;
    border-radius: 10px;
    transition: all 0.3s ease;
}

.fact-item:hover {
    background-color: rgba(0,123,255,0.1);
}

.fact-item i {
    font-size: 1.5rem;
    display: block;
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .timeline::before {
        left: 50%;
        transform: translateX(-50%);
    }
    
    .timeline-item {
        padding-left: 0;
        padding-top: 3rem;
    }
    
    .timeline-item::before {
        left: 50%;
        top: 0;
        transform: translateX(-50%);
    }
}

/* Text Styling */
.sejarah-content {
    font-size: 1.5rem;
    line-height: 1.8;
    text-align: justify;
}

.text-muted {
    color: #6c757d !important;
}

/* Animation */
[data-aos] {
    opacity: 0;
    transform: translateY(20px);
    transition: all 0.6s ease;
}

[data-aos].aos-animate {
    opacity: 1;
    transform: translateY(0);
}
</style>

<script>
// Animate on scroll initialization
document.addEventListener('DOMContentLoaded', function() {
    AOS.init({
        duration: 800,
        once: true
    });
});

// Parallax effect for hero section
window.addEventListener('scroll', function() {
    const hero = document.querySelector('.hero-sejarah');
    const scrolled = window.pageYOffset;
    hero.style.backgroundPositionY = (scrolled * 0.5) + 'px';
});
</script>
@endsection
@endsection