@extends('layouts.Frontend.app')

@section('title')
    Penghargaan SMPN 2 Tegal
@endsection

@section('content')
@section('about')
    <!-- Hero Section -->
    <div class="hero-penghargaan position-relative">
        <div class="container text-center py-5">
            <div class="trophy-icon mb-4">
                <i class="fas fa-trophy display-1 text-warning"></i>
            </div>
            <h1 class="display-4 mb-3">Penghargaan</h1>
            <p class="lead">Prestasi dan Pencapaian SMPN 2 Tegal</p>
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
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    margin-bottom: 30px;
    transition: all 0.3s ease;
    overflow: hidden;
}

.award-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
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
    background: #007bff;
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