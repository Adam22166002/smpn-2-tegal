@extends('layouts.Frontend.app')

@section('title')
Guru dan Tenaga Pendidikan SMPN 2 Tegal
@endsection

@section('content')
@section('about')
<!-- Hero Section -->
<div class="hero-sejarah position-relative d-flex align-items-center justify-content-center" 
        style="background-image: url('data:image/svg+xml,%3Csvg width=%2760%27 height=%2760%27 viewBox=%270 0 60 60%27 xmlns=%27http://www.w3.org/2000/svg%27%3E%3Cg fill=%27none%27 fill-rule=%27evenodd%27%3E%3Cg fill=%27%239C92AC%27 fill-opacity=%270.1%27%3E%3Cpath d=%27M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z%27/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');">
        <div class="container text-start text-black">
            <h1 class="display-4 text-primary poppins-semibold font-weight-bold mb-3" style="margin-top: 5rem;">Guru dan Tenaga Pendidikan</h1>
            <p class="h5 lead mb-0">Mengenal lebih dekat para pendidik berkualitas di SMPN 2 Tegal</p>
        </div>
    </div>

<!-- Main Content -->
<div class="container py-5">
    <!-- Search & Filter -->
    <div class="row mb-4" style="margin-bottom: 4rem;">
        <div class="col-md-6">
            <div class="input-group">
                <input type="text" class="form-control" id="searchGuru" placeholder="Cari guru...">
                <span class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                </span>
            </div>
        </div>
        <div class="col-md-6">
            <select class="form-control" id="filterMapel">
                <option value="">Semua Mata Pelajaran</option>
                <!-- Data -->
            </select>
        </div>
    </div>

    <!-- Teacher Cards -->
    <div class="row" id="guruContainer">
        @foreach($pengajar as $guru)
        @foreach($guru->detailGuru as $detail)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm hover-card">
                <div class="position-relative">
                    <img src="{{ asset('Assets/Frontend/img/' . $guru->foto_profile) }}" class="card-img-top"
                        alt="Foto {{ $guru->name }}" style="height: 250px; object-fit: cover;">
                </div>
                <div style="display: flex; justify-content:space-between; align-items:center;">
                    <div class="overlay-info position-absolute bottom-0 w-100 p-2">
                        <div class="h5 card-title mb-0"><strong>Nama:</strong> {{ $guru->name }}</div>
                        <div class="small mb-0"><strong>NIP:</strong> {{ $detail->nip ?? 'Belum tersedia' }}
                        </div>
                    </div>
                    <div class="card-body">
                        @if($guru->detailGuru->isNotEmpty())
                        @php
                        $detail = $guru->detailGuru->first();
                        @endphp
                        <div class="mb-2">
                            <strong>Mengajar:</strong>
                            {{ $detail->mengajar ?? 'Belum mengajar' }}
                        </div>
                        <div class="mb-2">
                            <strong>Kelas:</strong>
                            {{ $detail->kelas && $detail->nama_kelas ?
                            $detail->kelas . ' - ' . $detail->nama_kelas :
                            'Belum ada kelas' }}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="card-footer bg-white border-0" style="margin-top: 3rem; margin-bottom: 4rem;">
                    <button class="btn btn-outline-primary btn-sm btn-block" data-toggle="modal"
                        data-target="#guruModal{{ $guru->id }}">
                        <i class="fas fa-info-circle"></i> Detail Profil
                    </button>
                </div>
            </div>
        </div>

        <!-- Modal for each teacher -->
        <div class="modal fade" id="guruModal{{ $guru->id }}" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <button type="button" class="close text-white" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{ asset('Assets/Frontend/img/' . $guru->foto_profile) }}"
                                    class="img-fluid rounded" alt="Foto {{ $guru->name }}">
                            </div>
                            <div class="col-md-8">
                                <h4>Informasi Pribadi {{ $guru->name }}</h4>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><strong>Nama:</strong> {{ $guru->name }}</p>
                                        <p><strong>NIP:</strong> {{ $detail->nip ?? 'Belum tersedia' }}</p>
                                        <p><strong>Email:</strong> {{ $guru->email ?? 'Belum tersedia' }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        @if($guru->detailGuru->isNotEmpty())
                                        <p><strong>Mata Pelajaran:</strong> {{ $detail->mengajar }}</p>
                                        <p><strong>Wali Kelas:</strong>
                                            {{ $detail->kelas && $detail->nama_kelas ?
                                            $detail->kelas . ' - ' . $detail->nama_kelas :
                                            'Bukan Wali Kelas' }}
                                        </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endforeach
    </div>
</div>
@endsection

@push('styles')
<style>
    .hover-card {
        transition: transform 0.3s ease;
    }

    .hover-card:hover {
        transform: translateY(-5px);
    }

    .overlay-info {
        background: rgba(0, 123, 255, 0.9);
    }

    .card-img-top {
        transition: transform 0.3s ease;
    }

    .card:hover .card-img-top {
        transform: scale(1.05);
    }
</style>
@endpush

@push('scripts')
<script>
    $(document).ready(function() {
            // Search functionality
            $("#searchGuru").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#guruContainer .col-md-4").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            // Filter functionality
            $("#filterMapel").on("change", function() {
                var value = $(this).val().toLowerCase();
                if (value === "") {
                    $("#guruContainer .col-md-4").show();
                } else {
                    $("#guruContainer .col-md-4").filter(function() {
                        $(this).toggle($(this).find(".card-body").text().toLowerCase().indexOf(value) > -1)
                    });
                }
            });
        });
</script>
@endpush
@endsection