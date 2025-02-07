@extends('layouts.Frontend.app')
@section('title')
Raport Online SMPN 2 Tegal
@endsection

@section('content')
<div class="raport-online-page">
    {{-- Hero Section --}}
    <section id="hero" class="hero-section position-relative">
        <div class="hero-background"></div>
        <div class="container">
            <div class="row align-items-center vh-100">
                <div class="col-md-8 text-white">
                    <h1 class="display-4 font-weight-bold">Raport Online SMPN 2 Tegal</h1>
                    <p class="lead">Akses Nilai dan Raport Anda Dengan Mudah</p>
                    <div class="mt-4">
                        <a href="{{ route('siswa.cek-raport') }}" class="btn btn-primary mr-3">
                            <i class="fas fa-search"></i> Cek Raport Saya
                        </a>
                        <a href="{{ route('siswa.cetak-raport') }}" class="btn btn-outline-light">
                            <i class="fas fa-print"></i> Cetak Raport
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Cara Penggunaan Section --}}
    <section id="cara-penggunaan" class="py-5 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-siswa-tab" data-toggle="pill" href="#v-pills-siswa" role="tab">Cara Siswa Mengecek Raport</a>
                        <a class="nav-link" id="v-pills-ortu-tab" data-toggle="pill" href="#v-pills-ortu" role="tab">Cara Orang Tua Mengecek Raport</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-siswa" role="tabpanel">
                            <img src="{{ asset('images/cara-siswa.png') }}" alt="Cara Siswa" class="img-fluid">
                        </div>
                        <div class="tab-pane fade" id="v-pills-ortu" role="tabpanel">
                            <img src="{{ asset('images/cara-ortu.png') }}" alt="Cara Orang Tua" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Mengapa Menggunakan Raport Online --}}
    <section id="keunggulan" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Mengapa Menggunakan Raport Online?</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card h-100 text-center">
                        <div class="card-body">
                            <i class="fas fa-clock fa-3x mb-3 text-primary"></i>
                            <h5>Akses Cepat</h5>
                            <p>Raport dapat diakses kapan saja dan di mana saja</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 text-center">
                        <div class="card-body">
                            <i class="fas fa-mobile-alt fa-3x mb-3 text-primary"></i>
                            <h5>Mudah Digunakan</h5>
                            <p>Antarmuka sederhana dan intuitif</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 text-center">
                        <div class="card-body">
                            <i class="fas fa-chart-line fa-3x mb-3 text-primary"></i>
                            <h5>Transparansi Nilai</h5>
                            <p>Lihat perkembangan nilai secara real-time</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Cetak Raport Section --}}
    <section id="cetak-raport" class="bg-primary text-white py-5 text-center">
        <div class="container">
            <h2>Dengan Satu Klik, Cetak Rapor Anda</h2>
            <p>Cetak Sekarang</p>
            <a href="{{ route('siswa.cetak-raport') }}" class="btn btn-light btn-lg">
                <i class="fas fa-print"></i> Cetak Raport
            </a>
        </div>
    </section>

    {{-- Guru Mata Pelajaran --}}
    <section id="guru" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">Guru Mata Pelajaran</h2>
            <div class="row" id="guru-carousel">
                @foreach($gurus as $guru)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ $guru->foto }}" class="card-img-top" alt="{{ $guru->nama }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $guru->nama }}</h5>
                            <p class="card-text">{{ $guru->mata_pelajaran }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Kata Kepala Sekolah --}}
    <section id="sambutan-kepsek" class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img src="{{ asset('images/kepsek.jpg') }}" alt="Kepala Sekolah" class="img-fluid rounded-circle mb-3">
                </div>
                <div class="col-md-6">
                    <h3>Sambutan Kepala Sekolah</h3>
                    <blockquote class="blockquote">
                        <p>{{ $sambutan_kepsek }}</p>
                        <footer class="blockquote-footer">{{ $nama_kepsek }}</footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </section>

    {{-- FAQ Section --}}
    <section id="faq" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">Pertanyaan Umum</h2>
            <div class="accordion" id="accordionFAQ">
                @foreach($faqs as $index => $faq)
                <div class="card">
                    <div class="card-header" id="heading{{ $index }}">
                        <h2 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{ $index }}">
                                {{ $faq->pertanyaan }}
                            </button>
                        </h2>
                    </div>
                    <div id="collapse{{ $index }}" class="collapse" data-parent="#accordionFAQ">
                        <div class="card-body">
                            {{ $faq->jawaban }}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
@endsection

@push('styles')
<style>
    .hero-section {
        background: url('{{ asset('images/hero-background.jpg') }}') no-repeat center center fixed;
        background-size: cover;
    }
</style>
@endpush

@push('scripts')
<script>
    $(document).ready(function() {
        // Smooth scrolling
        $('a.nav-link').on('click', function(event) {
            if (this.hash !== "") {
                event.preventDefault();
                var hash = this.hash;
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 800);
            }
        });
    });
</script>
@endpush
