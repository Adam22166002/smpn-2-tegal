@extends('layouts.frontend.app')

@section('title', 'Info ATS, AAS, ANBK, Dll')

@section('content')
@section('about')

<!-- Hero Section -->
<div class="hero-sejarah position-relative d-flex align-items-center justify-content-center" 
        style="background-image: url('data:image/svg+xml,%3Csvg width=%2760%27 height=%2760%27 viewBox=%270 0 60 60%27 xmlns=%27http://www.w3.org/2000/svg%27%3E%3Cg fill=%27none%27 fill-rule=%27evenodd%27%3E%3Cg fill=%27%239C92AC%27 fill-opacity=%270.1%27%3E%3Cpath d=%27M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z%27/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');">
        <div class="container text-start text-black">
            <h1 class="display-4 text-primary poppins-semibold font-weight-bold mb-3" style="margin-top: 5rem;">Informasi Akademik</h1>
            <p class="h5 lead mb-0">ATS, AAS, ANBK, dan Informasi Penting Lainnya</p>
        </div>
    </div>

<!-- Filter Section -->
<div class="bg-light py-3" style="margin-top: 6rem;">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="input-group">
                    <input type="text" class="form-control" id="searchInfo" placeholder="Cari informasi...">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <select class="form-control" id="filterKategori">
                    <option value="">Semua Kategori</option>
                    <option value="ATS">ATS</option>
                    <option value="AAS">AAS</option>
                    <option value="ANBK">ANBK</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </div>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="container py-5">
    @if($informasi->isEmpty())
        <div class="text-center py-5">
            <i class="fas fa-info-circle fa-3x text-muted mb-3"></i>
            <h3 class="text-muted">Tidak ada informasi tersedia saat ini</h3>
            <p class="text-muted">Silakan periksa kembali nanti untuk pembaruan informasi.</p>
        </div>
    @else
        <div class="row" id="infoContainer">
            @foreach($informasi as $item)
                <div class="col-md-6 mb-4">
                    <div class="card h-100 shadow-sm hover-card">
                        <div class="card-header bg-white">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="badge badge-primary px-3 py-2">{{ $item->kategori }}</span>
                                <small class="text-muted">
                                    <i class="far fa-calendar-alt"></i> 
                                    {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                                </small>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->judul }}</h5>
                            <p class="card-text">{{ Str::limit($item->deskripsi, 200) }}</p>
                        </div>
                        <div class="card-footer bg-white border-0">
                            <button class="btn btn-outline-primary btn-sm" 
                                    data-toggle="modal" 
                                    data-target="#infoModal{{ $item->id }}">
                                <i class="fas fa-info-circle"></i> Baca Selengkapnya
                            </button>
                            @if($item->file)
                                <a href="{{ asset('storage/'.$item->file) }}" 
                                   class="btn btn-outline-success btn-sm ml-2" 
                                   download>
                                    <i class="fas fa-download"></i> Unduh Dokumen
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="infoModal{{ $item->id }}" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-primary text-white">
                                <button type="button" class="close text-white" data-dismiss="modal">
                                    <span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <span class="badge badge-primary">{{ $item->kategori }}</span>
                                    <small class="text-muted ml-2">
                                        <i class="far fa-calendar-alt"></i> 
                                        {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                                    </small>
                                </div>
                                <div class="content-wrapper">
                                    {!! $item->deskripsi !!}
                                </div>
                                @if($item->file)
                                    <div class="mt-4">
                                        <h6>Dokumen Terkait:</h6>
                                        <a href="{{ asset('storage/'.$item->file) }}" 
                                           class="btn btn-outline-success btn-sm" 
                                           download>
                                            <i class="fas fa-download"></i> Unduh Dokumen
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

@push('styles')
<style>
    .hover-card {
        transition: transform 0.3s ease;
    }
    .hover-card:hover {
        transform: translateY(-5px);
    }
    .badge {
        font-weight: 500;
    }
    .content-wrapper {
        line-height: 1.6;
    }
    .jumbotron {
        background: linear-gradient(to right, #007bff, #0056b3);
    }
</style>
@endpush

@push('scripts')
<script>
$(document).ready(function() {
    // Search functionality
    $("#searchInfo").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#infoContainer .col-md-6").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    // Filter functionality
    $("#filterKategori").on("change", function() {
        var value = $(this).val().toLowerCase();
        if (value === "") {
            $("#infoContainer .col-md-6").show();
        } else {
            $("#infoContainer .col-md-6").filter(function() {
                $(this).toggle($(this).find(".badge").text().toLowerCase() === value)
            });
        }
    });
});
</script>
@endpush

@endsection
@endsection