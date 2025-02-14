@extends('layouts.Frontend.app')

@section('title')
    Sejarah Singkat SMPN 2 Tegal
@endsection

@section('content')
@section('about')
    <div class="container py-5" style="margin-bottom: 3rem;">
        <h2 class="text-center mb-4 font-weight-bold text-primary">Sejarah Singkat SMP Negeri 2 Tegal</h2>
        
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="border-0 rounded-3 mb-4">
                    <div class="">
                        <div class="sejarah-content">
                            @foreach ($sejarah as $paragraf)
                                <p class="text-muted">
                                    {!! $paragraf !!}
                                </p>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <!-- Gambar Sejarah (Jika Diperlukan) -->
                <div class="text-center">
                    <img src="{{asset('Assets/Frontend/img/sejarah-logo.png')}}" class="img-fluid rounded-circle shadow-lg" alt="Logo Sejarah SMPN 2 Tegal" style="max-height: 200px;">
                </div>
            </div>
        </div>
    </div>

    <!-- Styling untuk konten sejarah -->
    <style>
        .sejarah-content {
            text-align: justify;
            line-height: 1.8;
            font-size: 1.5rem;
        }

        h2 {
            font-family: 'Arial', sans-serif;
            font-weight: bold;
        }

        /* Gambar/logo sejarah */
        img {
            max-width: 100%;
            height: auto;
            object-fit: cover;
        }

        .text-primary {
            color: #0066cc !important;
        }

        .sejarah-content p {
            margin-bottom: 1.5rem;
        }

        .sejarah-content p:last-child {
            margin-bottom: 0;
        }

        .text-center {
            margin-top: 2rem;
        }

        /* Styling Link */
        a {
            color: #0066cc;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
@endsection
@endsection

