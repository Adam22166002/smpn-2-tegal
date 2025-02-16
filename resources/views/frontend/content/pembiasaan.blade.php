@extends('layouts.frontend.app')

@section('title', 'Pembiasaan Siswa')

@section('content')
@section('about')

<div class="container">
    <h2 class="mb-4">Daftar Pembiasaan Siswa</h2>

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
