@extends('layouts.frontend.app')

@section('title', 'Informasi Kurikulum')

@section('content')
@section('about')

<!-- Hero Section -->
<div class="hero-sejarah position-relative d-flex align-items-center justify-content-center" 
        style="background-image: url('data:image/svg+xml,%3Csvg width=%2760%27 height=%2760%27 viewBox=%270 0 60 60%27 xmlns=%27http://www.w3.org/2000/svg%27%3E%3Cg fill=%27none%27 fill-rule=%27evenodd%27%3E%3Cg fill=%27%239C92AC%27 fill-opacity=%270.1%27%3E%3Cpath d=%27M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z%27/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');">
        <div class="container text-start text-black">
            <h1 class="display-4 text-primary poppins-semibold font-weight-bold mb-3" style="margin-top: 5rem;">Kurikulum SMPN 2 Tegal</h1>
            <p class="h5 lead mb-0">Mewujudkan Pembelajaran Berkualitas dan Pembentukan Karakter</p>
        </div>
    </div>

<!-- Quick Info -->
<div class="bg-light py-4" style="margin-bottom: 5rem; margin-top: 8rem;">
    <div class="container">
    @foreach ($kurikulums as $kurikulum)
    <div class="row text-center">
    <div class="col-md-3">
        <div class="info-box p-3">
            <i class="fas fa-graduation-cap fa-3x mb-2" style="color: #002147;"></i>
            <h3>{{ $kurikulum->judul }}</h3>
            <p class="mb-0 text-muted">{!! $kurikulum->deskripsi !!}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="info-box p-3">
            <i class="fas fa-users fa-3x mb-2" style="color: #002147;"></i>
            <h3>Profil Pelajar</h3>
            <p class="mb-0 text-muted">
                Pembentukan profil pelajar yang berlandaskan nilai-nilai Pancasila, dengan menanamkan sikap beriman, bertakwa, dan berakhlak mulia. 
                Siswa diajarkan untuk berpikir kritis, mandiri, serta memiliki rasa kebhinekaan global. 
                Pembelajaran juga mendorong kepedulian sosial dan pengembangan keterampilan komunikasi yang efektif.
            </p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="info-box p-3">
            <i class="fas fa-project-diagram fa-3x mb-2" style="color: #002147;"></i>
            <h3>Pembelajaran</h3>
            <p class="mb-0 text-muted">
                Kurikulum berbasis projek yang mengintegrasikan teori dan praktik secara seimbang. 
                Siswa terlibat dalam eksplorasi kreatif, problem-solving, dan inovasi melalui proyek kolaboratif yang mencerminkan dunia nyata. 
                Model pembelajaran ini bertujuan untuk meningkatkan keterampilan berpikir kritis dan analitis.
            </p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="info-box p-3">
            <i class="fas fa-star fa-3x mb-2" style="color: #002147;"></i>
            <h3>Karakter</h3>
            <p class="mb-0 text-muted">
                Program penguatan pendidikan karakter menanamkan nilai-nilai seperti kedisiplinan, kejujuran, kerja sama, dan tanggung jawab. 
                Siswa didorong untuk memiliki semangat kepemimpinan dan empati terhadap lingkungan sosial mereka. 
                Kegiatan ekstrakurikuler dan sosial menjadi bagian integral dalam membangun karakter unggul.
            </p>
        </div>
    </div>
</div>

@endforeach
    
    </div>
</div>
@foreach ($kurikulums as $kurikulum)
@if($kurikulum->dokumen)
                        <div class="mt-4">
                            <a href="{{ asset('storage/' . str_replace('public/', '', $kurikulum->dokumen)) }}" 
                               class="btn btn-primary">
                                <i class="fas fa-file-pdf mr-2"></i>Unduh Dokumen Lengkap
                            </a>
                        </div>
@endif
@endforeach

@push('styles')
<style>
    .info-box {
        border-right: 1px solid #dee2e6;
    }
    .info-box:last-child {
        border-right: none;
    }
    @media (max-width: 768px) {
        .info-box {
            border-right: none;
            border-bottom: 1px solid #dee2e6;
            margin-bottom: 1rem;
        }
        .info-box:last-child {
            border-bottom: none;
            margin-bottom: 0;
        }
    }
    .program-item h5 {
        color: #333;
    }
    .jumbotron {
        background: linear-gradient(to right, #007bff, #0056b3);
    }
    .card {
        transition: transform 0.3s ease;
    }
    .card:hover {
        transform: translateY(-5px);
    }
</style>
@endpush

@endsection
@endsection