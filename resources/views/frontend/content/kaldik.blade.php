@extends('layouts.Frontend.app')

@section('title')
    Kaldik
@endsection

@section('content')
    @section('about')
    <div class="container">
    <h2 class="mb-4">Kalender Pendidikan</h2>

    <table class="table">
        <thead>
            <tr>
                <th>Nama Kegiatan</th>
                <th>Tanggal</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kaldik as $item)
                <tr>
                    <td>{{ $item->nama_kegiatan }}</td>
                    <td>{{ $item->tanggal->format('d-m-Y') }}</td>
                    <td>{{ $item->deskripsi }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@endsection