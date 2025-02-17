@extends('layouts.frontend.app')

@section('title', 'Pembiasaan Siswa')

@section('content')
@section('about')
<div class="hero-sejarah position-relative d-flex align-items-center justify-content-center" 
        style="background-image: url('data:image/svg+xml,%3Csvg width=%2760%27 height=%2760%27 viewBox=%270 0 60 60%27 xmlns=%27http://www.w3.org/2000/svg%27%3E%3Cg fill=%27none%27 fill-rule=%27evenodd%27%3E%3Cg fill=%27%239C92AC%27 fill-opacity=%270.1%27%3E%3Cpath d=%27M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z%27/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');">
        <div class="container text-start text-black">
            <h1 class="display-4 text-primary poppins-semibold font-weight-bold mb-3" style="margin-top: 5rem;"><i class="fas fa-user-graduate"></i> Pembiasaan Siswa</h1>
            <p class="h5 lead mb-0">Membentuk Karakter Unggul Melalui Kebiasaan Positif</p>
        </div>
    </div>

<!-- Content Section -->
<div class="container my-5">
    <div class="table-responsive d-none d-md-block" style="margin-top: 6rem; margin-bottom:6rem;">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center" style="width: 30%;">Judul</th>
                    <th class="text-center">Deskripsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pembiasaanSiswa as $item)
                    <tr>
                        <td><i class="fas fa-check-circle text-success"></i> {{ $item->judul }}</td>
                        <td>{{ $item->deskripsi }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
</div>

@push('styles')
<style>
    .table th {
        background-color: #002147;
        color: white;
    }
    .table td {
        vertical-align: middle;
    }
    .card {
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        border-left: 5px solid #002147;
    }
</style>
@endpush

@endsection
@endsection
