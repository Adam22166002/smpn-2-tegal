@extends('layouts.frontend.app')

@section('title', 'Informasi Kurikulum')

@section('content')
@section('about')

<!-- Hero Section -->
<div class="jumbotron jumbotron-fluid bg-primary text-white mb-0">
    <div class="container py-5">
        <h1 class="display-4">Kurikulum SMPN 2 Tegal</h1>
        <p class="lead">Mewujudkan Pembelajaran Berkualitas dan Pembentukan Karakter</p>
    </div>
</div>

<!-- Quick Info -->
<div class="bg-light py-4">
    <div class="container">
    @foreach ($kurikulums as $kurikulum)
        <div class="row text-center">
            <div class="col-md-3">
                <div class="info-box p-3">
                    <i class="fas fa-graduation-cap fa-3x text-primary mb-2"></i>
                    <h3>{{ $kurikulum->judul }}</h3>
                    <p class="mb-0 text-muted">{!! $kurikulum->deskripsi !!}</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="info-box p-3">
                    <i class="fas fa-users fa-3x text-primary mb-2"></i>
                    <h3>Profil Pelajar</h3>
                    <p class="mb-0 text-muted">Pancasila</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="info-box p-3">
                    <i class="fas fa-project-diagram fa-3x text-primary mb-2"></i>
                    <h3>Pembelajaran</h3>
                    <p class="mb-0 text-muted">Berbasis Projek</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="info-box p-3">
                    <i class="fas fa-star fa-3x text-primary mb-2"></i>
                    <h3>Karakter</h3>
                    <p class="mb-0 text-muted">Penguatan Pendidikan</p>
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