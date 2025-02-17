@extends('layouts.frontend.app')

@section('title', 'Pembiasaan Siswa')

@section('content')
@section('about')
<!-- Hero Section -->
<div class="jumbotron jumbotron-fluid bg-primary text-white mb-0">
    <div class="container py-5">
        <h1 class="display-4">Pembiasaan Siswa</h1>
        <p class="lead">Membentuk Karakter Unggul Melalui Kebiasaan Positif</p>
    </div>
</div>
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pembiasaanSiswa as $item)
                <tr>
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->deskripsi }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@endsection
