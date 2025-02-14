@extends('layouts.Frontend.app')
@section('title')
Raport Online SMPN 2 Tegal
@endsection
@section('content')
    @section('about')
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
                            <a href="{{ route('cekRapot') }}" class="btn btn-primary mr-3">
                                <i class="fas fa-search"></i> Cek Raport Saya
                            </a>
                            <a href="{{ route('cetakRapot') }}" class="btn btn-outline-light">
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
                <a href="{{ route('cetakRapot') }}" class="btn btn-light btn-lg">
                    <i class="fas fa-print"></i> Cetak Raport
                </a>
            </div>
        </section>

        {{-- Guru Mata Pelajaran --}}
        <section id="guru" class="py-5 bg-light">
            <div class="container">
                <h2 class="text-center mb-4">Guru Mata Pelajaran</h2>
                <div class="row" id="guru-carousel">
                    @foreach($pengajars as $pengajar)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ asset('Assets/Frontend/img/' . $pengajar->foto_profile) }}" class="card-img-top" alt="{{ $pengajar->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $pengajar->name }}</h5>
                                <p class="card-text">{{ $pengajar->role }}</p>
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
        <section class="py-5 px-5" style="padding-top: 8rem; padding-bottom: 8rem; background-color: #f8f9fa;">
            <div class="container">
                <div class="row">
                    <!-- Kolom Judul -->
                    <div class="col-lg-5 mb-4 mb-lg-0 text-lg-start">
                        <h2 class="fw-bold" style="font-weight: bold;">F.A.Q</h2>
                        <p class="text-muted">Pertanyaan umum terkait layanan BK</p>
                    </div>
                <div class="col-lg-7">
                <div class="accordion" id="faqAccordion">
                    <div style="border-bottom: 1px solid; border-color: #337ab7; padding-bottom: 1rem; padding-top:1rem">
                            <h2 class="btn btn-link w-100 text-start collapsed" id="faqHeading1"
                                        type="button" data-toggle="collapse" data-target="#faq1"
                                        aria-expanded="true" aria-controls="faq1"
                                        style="text-decoration: none; font-size: large; font-weight:bold; display:flex; justify-content:space-between;">
                                        <span>Apa itu Layanan BK?</span>
                                        <i class="bi bi-chevron-down"></i>

                            </h2>
                            <div id="faq1" class="collapse" aria-labelledby="faqHeading1" data-parent="#faqAccordion">
                                <div class="card-body" style="padding-left: 1rem;">
                                    Layanan pengaduan siswa ke guru BK untuk sarana bagi siswa untuk melaporkan masalah pribadi, akademik, maupun sosial yang mereka hadapi di lingkungan sekolah. Guru BK akan membantu mencari solusi terbaik sesuai dengan kebutuhan siswa.
                                </div>
                            </div>
                    </div>

                    <div style="border-bottom: 1px solid; border-color:#337ab7; padding-bottom: 1rem; padding-top:1rem">
                            <h2 class="btn btn-link w-100 text-start collapsed" id="faqHeading2"
                                        type="button" data-toggle="collapse" data-target="#faq2"
                                        aria-expanded="false" aria-controls="faq2"
                                        style="text-decoration: none; font-size: large; font-weight:bold; display:flex; justify-content:space-between; align-items:center;">
                                        <span>Masalah apa saja yang bisa saya adukan melalui layanan ini?</span>
                                        <i class="bi bi-chevron-down"></i>
                            </h2>
                        <div id="faq2" class="collapse" aria-labelledby="faqHeading2" data-parent="#faqAccordion">
                            <div class="card-body" style="padding-left: 1rem;">
                            Anda bisa mengadukan berbagai masalah, seperti:
                            <div>> Perundungan (bullying) di sekolah</div>
                            <div>> Masalah pertemanan atau keluarga</div>
                            <div>> Kesulitan belajar atau akademik</div>
                            <div>> Tekanan emosional atau stres</div>
                            <div>> Masalah kepercayaan diri dan motivasi</div>
                            </div>
                        </div>
                    </div>

                    <div style="border-bottom: 1px solid; border-color:#337ab7; padding-bottom: 1rem; padding-top:1rem">
                            <h2 class="btn btn-link w-100 text-start collapsed" id="faqHeading3"
                                        type="button" data-toggle="collapse" data-target="#faq3"
                                        aria-expanded="false" aria-controls="faq3"
                                        style="text-decoration: none; font-size: large; font-weight:bold; display:flex; justify-content:space-between; align-items:center;">
                                        <span>Apakah pengaduan saya akan dirahasiakan?</span>
                                        <i class="bi bi-chevron-down"></i>
                            </h2>
                        <div id="faq3" class="collapse" aria-labelledby="faqHeading3" data-parent="#faqAccordion">
                            <div class="card-body" style="padding-left: 1rem;">
                            Ya, semua pengaduan yang Anda sampaikan bersifat rahasia. Guru BK memiliki kode etik untuk menjaga privasi siswa dan hanya akan membagikan informasi dengan pihak terkait jika diperlukan dan dengan izin siswa.
                            </div>
                        </div>
                    </div>

                    <div style="border-bottom: 1px solid; border-color:#337ab7; padding-bottom: 1rem; padding-top:1rem">
                            <h2 class="btn btn-link w-100 text-start collapsed" id="faqHeading4"
                                        type="button" data-toggle="collapse" data-target="#faq4"
                                        aria-expanded="false" aria-controls="faq4"
                                        style="text-decoration: none; font-size: large; font-weight:bold; display:flex; justify-content:space-between; align-items:center;">
                                        <span>Bagaimana cara saya mengajukan pengaduan?</span>
                                        <i class="bi bi-chevron-down"></i>
                            </h2>
                        <div id="faq4" class="collapse" aria-labelledby="faqHeading4" data-parent="#faqAccordion">
                            <div class="card-body" style="padding-left: 1rem;">
                            Anda dapat mengajukan pengaduan dengan beberapa cara:
                            <div>1. Mengisi formulir pengaduan online di website ini</div>
                            <div>2. Datang langsung ke ruang BK dan berbicara dengan guru BK</div>
                            <div>3. Menghubungi guru BK melalui email atau nomor kontak yang tersedia</div>
                            </div>
                        </div>
                    </div>

                    <div style="border-bottom: 1px solid; border-color:#337ab7; padding-bottom: 1rem; padding-top:1rem">
                            <h2 class="btn btn-link w-100 text-start collapsed" id="faqHeading5"
                                        type="button" data-toggle="collapse" data-target="#faq5"
                                        aria-expanded="false" aria-controls="faq5"
                                        style="text-decoration: none; font-size: large; font-weight:bold; display:flex; justify-content:space-between; align-items:center;">
                                        <span>Apakah saya bisa mengadukan masalah orang lain?</span>
                                        <i class="bi bi-chevron-down"></i>
                            </h2>
                        <div id="faq5" class="collapse" aria-labelledby="faqHeading5" data-parent="#faqAccordion">
                            <div class="card-body" style="padding-left: 1rem;">
                            Ya, jika Anda mengetahui ada teman yang mengalami kesulitan atau menjadi korban perundungan, Anda bisa melaporkannya kepada guru BK. Namun, kami tetap akan melakukan verifikasi terlebih dahulu untuk memastikan kebenaran laporan tersebut.
                            </div>
                        </div>
                    </div>

                    <div style="border-bottom: 1px solid; border-color:#337ab7; padding-bottom: 1rem; padding-top:1rem">
                            <h2 class="btn btn-link w-100 text-start collapsed" id="faqHeading6"
                                        type="button" data-toggle="collapse" data-target="#faq6"
                                        aria-expanded="false" aria-controls="faq6"
                                        style="text-decoration: none; font-size: large; font-weight:bold; display:flex; justify-content:space-between; align-items:center;">
                                        <span>Apakah saya bisa mendapatkan solusi langsung setelah mengadu?</span>
                                        <i class="bi bi-chevron-down"></i>
                            </h2>
                        <div id="faq6" class="collapse" aria-labelledby="faqHeading6" data-parent="#faqAccordion">
                            <div class="card-body" style="padding-left: 1rem;">
                            Tergantung pada kompleksitas masalahnya. Untuk masalah sederhana, guru BK bisa memberikan solusi atau saran langsung. Namun, jika masalahnya lebih mendalam, guru BK mungkin akan mengatur sesi konseling lebih lanjut untuk membantu menemukan solusi terbaik.
                            </div>
                        </div>
                    </div>

                    <div style="border-bottom: 1px solid; border-color:#337ab7; padding-bottom: 1rem; padding-top:1rem">
                            <h2 class="btn btn-link w-100 text-start collapsed" id="faqHeading7"
                                        type="button" data-toggle="collapse" data-target="#faq7"
                                        aria-expanded="false" aria-controls="faq7"
                                        style="text-decoration: none; font-size: large; font-weight:bold; display:flex; justify-content:space-between; align-items:center;">
                                        <span>Apakah ada biaya untuk menggunakan layanan ini?</span>
                                        <i class="bi bi-chevron-down"></i>
                            </h2>
                        <div id="faq7" class="collapse" aria-labelledby="faqHeading7" data-parent="#faqAccordion">
                            <div class="card-body" style="padding-left: 1rem;">
                            Tidak. Layanan pengaduan dan konseling dari guru BK ini sepenuhnya gratis untuk semua siswa.
                            </div>
                        </div>
                    </div>

                    <div style="border-bottom: 1px solid; border-color:#337ab7; padding-bottom: 1rem; padding-top:1rem">
                            <h2 class="btn btn-link w-100 text-start collapsed" id="faqHeading8"
                                        type="button" data-toggle="collapse" data-target="#faq8"
                                        aria-expanded="false" aria-controls="faq8"
                                        style="text-decoration: none; font-size: large; font-weight:bold; display:flex; justify-content:space-between; align-items:center;">
                                        <span>Bagaimana jika saya takut atau ragu untuk melapor?</span>
                                        <i class="bi bi-chevron-down"></i>
                            </h2>
                        <div id="faq8" class="collapse" aria-labelledby="faqHeading8" data-parent="#faqAccordion">
                            <div class="card-body" style="padding-left: 1rem;">
                            Kami memahami bahwa mengungkapkan masalah tidak selalu mudah. Namun, layanan ini ada untuk membantu Anda. Jika ragu, Anda bisa mencoba mengirim pengaduan secara anonim atau berbicara secara informal terlebih dahulu dengan guru BK.
                            </div>
                        </div>
                    </div>

                    <div style="border-bottom: 1px solid; border-color:#337ab7; padding-bottom: 1rem; padding-top:1rem">
                            <h2 class="btn btn-link w-100 text-start collapsed" id="faqHeading9"
                                        type="button" data-toggle="collapse" data-target="#faq9"
                                        aria-expanded="false" aria-controls="faq9"
                                        style="text-decoration: none; font-size: large; font-weight:bold; display:flex; justify-content:space-between; align-items:center;">
                                        <span>Apakah saya bisa konsultasi masalah saya ada di luar sekolah?</span>
                                        <i class="bi bi-chevron-down"></i>
                            </h2>
                        <div id="faq9" class="collapse" aria-labelledby="faqHeading9" data-parent="#faqAccordion">
                            <div class="card-body" style="padding-left: 1rem;">
                            Ya, guru BK dapat membantu memberikan arahan atau referensi kepada pihak yang lebih kompeten jika masalah Anda membutuhkan bantuan lebih lanjut, seperti psikolog profesional atau lembaga terkait lainnya.
                            </div>
                        </div>
                    </div>

                    <div style="border-bottom: 1px solid; border-color:#337ab7; padding-bottom: 1rem; padding-top:1rem">
                            <h2 class="btn btn-link w-100 text-start collapsed" id="faqHeading10"
                                        type="button" data-toggle="collapse" data-target="#faq10"
                                        aria-expanded="false" aria-controls="faq10"
                                        style="text-decoration: none; font-size: large; font-weight:bold; display:flex; justify-content:space-between; align-items:center;">
                                        <span>Berapa lama waktu untuk mendapatkan respons dari guru BK?</span>
                                        <i class="bi bi-chevron-down"></i>
                            </h2>
                        <div id="faq10" class="collapse" aria-labelledby="faqHeading10" data-parent="#faqAccordion">
                            <div class="card-body" style="padding-left: 1rem;">
                            Kami berusaha untuk merespons setiap pengaduan secepat mungkin, biasanya dalam waktu 1-2 hari kerja. Jika kasusnya mendesak, kami akan menanganinya dengan prioritas lebih tinggi.
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </section>
    </div>
    @endsection
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
