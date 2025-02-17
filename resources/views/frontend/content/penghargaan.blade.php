@extends('layouts.Frontend.app')

@section('title')
    Penghargaan SMPN 2 Tegal
@endsection

@section('content')
@section('about')
    <!-- Hero Section -->
    <div class="hero-sejarah position-relative d-flex align-items-center justify-content-center" 
        style="background-image: url('data:image/svg+xml,%3Csvg width=%2760%27 height=%2760%27 viewBox=%270 0 60 60%27 xmlns=%27http://www.w3.org/2000/svg%27%3E%3Cg fill=%27none%27 fill-rule=%27evenodd%27%3E%3Cg fill=%27%239C92AC%27 fill-opacity=%270.1%27%3E%3Cpath d=%27M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z%27/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');">
        <div class="container text-header text-center text-black">
            <h1 class="display-4 header-mobile text-primary poppins-semibold font-weight-bold mb-3" style="margin-top: 5rem;">Penghargaan</h1>
            <p class="h5 lead mb-0">Prestasi dan Pencapaian SMPN 2 Tegal</p>
        </div>
    </div>

    <!-- Awards Section -->
    <div class="container py-5" style="margin-top: 5rem;">
        @if ($penghargaan->count() > 0)
            <div class="row">
                @foreach ($penghargaan as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="award-card">
                            <div class="award-content">
                                <div class="award-icon">
                                    <i class="fas fa-award"></i>
                                    <span class="year-badge">{{ $item->tahun }}</span>
                                </div>
                                <h5 class="award-title">{{ $item->nama }}</h5>
                                <p class="award-desc">{{ $item->deskripsi }}</p>
                                <div class="award-footer">
                                    <span class="organizer">
                                        <i class="fas fa-building me-2"></i>
                                        {{ $item->penyelenggara }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-5">
                <img src="{{asset('Assets/Frontend/img/empty.svg')}}" 
                     class="img-fluid mb-4" 
                     style="max-width: 300px;" 
                     alt="No Data">
                <h3 class="text-muted">Belum ada data penghargaan</h3>
                <p class="text-muted">Silakan kembali lagi nanti.</p>
            </div>
        @endif
    </div>

<style>
/* Hero Section */
.hero-penghargaan {
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    padding: 4rem 0;
}

.trophy-icon {
    animation: float 3s ease-in-out infinite;
}

@keyframes float {
    0% { transform: translateY(0px); }
    50% { transform: translateY(-20px); }
    100% { transform: translateY(0px); }
}

/* Counter Section */
.counter-section {
    border-bottom: 1px solid rgba(0,0,0,0.1);
}

.counter-number {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
}

.counter-label {
    color: #6c757d;
    font-size: 1.1rem;
    margin-bottom: 0;
}

/* Award Cards */
.award-card {
    background: white;
    border-radius: 15px;
    margin-bottom: 30px;
    transition: all 0.3s ease;
    overflow: hidden;
}

.award-content {
    padding: 2rem;
}

.award-icon {
    position: relative;
    margin-bottom: 1.5rem;
}

.award-icon i {
    font-size: 2.5rem;
    color: #ffc107;
}

.year-badge {
    position: absolute;
    top: 0;
    right: 0;
    background: #00BFFF;
    color: white;
    padding: 0.25rem 0.75rem;
    border-radius: 20px;
    font-size: 0.9rem;
}

.award-title {
    color: #2c3e50;
    margin-bottom: 1rem;
    font-weight: 600;
}

.award-desc {
    color: #6c757d;
    margin-bottom: 1.5rem;
    line-height: 1.6;
}

.award-footer {
    padding-top: 1rem;
    border-top: 1px solid rgba(0,0,0,0.1);
}

.organizer {
    color: #6c757d;
    font-size: 0.9rem;
}

/* Responsive Design */
@media (max-width: 768px) {
    .counter-number {
        font-size: 2rem;
    }
    
    .award-content {
        padding: 1.5rem;
    }
}
</style>

@endsection
@endsection