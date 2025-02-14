@extends('layouts.Frontend.app')

@section('title')
    Guru dan Tenaga Pendidikan SMPN 2 Tegal
@endsection

@section('content')
    @section('about')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Guru Tenaga Kependidikan</h1>

        <div class="row">
            @foreach($pengajar as $guru)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <img src="{{ asset('Assets/Frontend/img/' . $guru->foto_profile) }}" class="card-img-top" alt="Foto Profil">
                        <div class="card-body">
                            <h5 class="card-title">{{ $guru->name }}</h5>

                            @if($guru->detailGuru->isNotEmpty())
                                @php
                                    $detail = $guru->detailGuru->first();
                                @endphp

                                @if($detail->mengajar)
                                    <p class="card-text"><strong>Mengajar:</strong> {{ $detail->mengajar }}</p>
                                @else
                                    <p class="card-text"><strong>Mengajar:</strong> Informasi mengajar tidak tersedia.</p>
                                @endif

                                @if($detail->kelas && $detail->nama_kelas)
                                    <p class="card-text"><strong>Kelas:</strong> {{ $detail->kelas }} - {{ $detail->nama_kelas }}</p>
                                @else
                                    <p class="card-text"><strong>Kelas:</strong> Informasi kelas tidak tersedia.</p>
                                @endif
                            @else
                                <p class="card-text">Informasi pengajaran tidak tersedia.</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @endsection
@endsection
