@extends('layouts.Frontend.app')
@section('title')
    Layanan BK
@endsection

@section('content')
    @section('about')
        <!-- hero section-->
        <div class="welcome-section py-5" style="margin-top: 8rem; margin-bottom: 4rem;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                    <h1 class="display-4 font-weight-bold mb-4">
                        Layanan <span style="color: #007bff;">BK</span><br>
                        <span>Bimbingan Konseling</span>
                    </h1>
                    <p class="lead mb-4 border-left" style="padding-left: 5px; ;border-left: 4px solid #007bff;">
                        Layanan BK merupakan Layanan Bimbingan dan Konseling di Sekolah. Layanan BK menyediakan banyak layanan yang akan menjadi alat bantu seperti pengaduan Siswaa ke Konselor Sekolah/Guru Bimbingan dan Konseling.
                    </p>
                        <div class="d-flex">
                            <a href="#layanan" class="btn btn-primary btn-lg px-4 rounded-pill scroll-link" style="margin-bottom: 2rem; margin-top:2rem;">
                                <li class="fas fa-comment-dots"></li> Mulai Konsultasi
                            </a>
                            <a href="#info" class="btn btn-outline-primary rounded-pill px-4 py-2 scroll-link" style="font-size: large;" style="margin-bottom: 2rem;">
                            <i class="fas fa-book-open"></i> Pelajari Lebih Lanjut
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-5 d-none d-lg-block" style="margin-top:2rem;">
                        <img src="{{ asset('Assets/Frontend/img/konseling.jpg') }}" alt="Counseling" class="img-fluid">
                    </div>
                </div>
            </div>

            <!-- status section -->
            <div id="info" class="text-white py-5" style="margin-top: 8rem; margin-bottom: 8rem;">
                <div class="container d-flex justify-content-center">
                    <div class="card w-75 shadow-lg border-0 rounded-lg p-4" style="pointer-events: none;">
                        <div class="row text-center">
                            <div class="col-6 col-sm-3 mb-4">
                                <div class="h2 text-primary font-weight-bold">1000+</div>
                                <h4 class="text-muted">Pengaduan Siswa</h4>
                            </div>
                            <div class="col-6 col-sm-3 mb-4">
                                <div class="h2 text-success font-weight-bold">24/7</div>
                                <h4 class="text-muted">Pengaduan Online</h4>
                            </div>
                            <div class="col-6 col-sm-3 mb-4">
                                <div class="h2 text-info font-weight-bold">98%</div>
                                <h4 class="text-muted">Tingkat Kepuasan</h4>
                            </div>
                            <div class="col-6 col-sm-3 mb-4">
                                <div class="h2 text-warning font-weight-bold">5+</div>
                                <h4 class="text-muted">Guru Konselor</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- informasi section -->
    <section id="" class="bg-light py-5" style="margin-bottom: 2rem; padding-top: 10rem;">
        <div class="container" style="margin-bottom: 8rem;">
            <div class="text-center mb-5" style="margin-bottom: 4rem;">
                <h2 class="section-title mb-3">Mengapa Memilih Layanan BK Kami?</h2>
                <p class="text-muted" style="margin-bottom: 4rem;">Layanan Bk menyediakan layanan konseling pengaduan profesional dengan pendekatan siswa yang komprehensif.</p>
            </div>

                <div class="row">
                    <div class="col-md-4 mb-4" style="margin-bottom: 2rem;">
                        <div class="card h-100 shadow-sm border-0 text-center border-bottom border-top" style="border-bottom: 4px solid #007bff; border-top: 4px solid #007bff;">
                            <div class="card-body">
                                <div class="mb-4" style="margin-top: 3rem;">
                                    <i class="fas fa-shield-alt text-primary fa-3x"></i>
                                </div>
                                <h4 class="card-title">Kerahasiaan Terjamin</h4>
                                <p class="card-text text-muted">Layanan pengaduan siswa bersifat privasi di konsultasi yang Anda lakukan</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-4 mb-4" style="margin-bottom: 2rem;">
                        <div class="card h-100 shadow-sm border-0 text-center border-bottom border-top" style="border-bottom: 4px solid #007bff; border-top: 4px solid #007bff;">
                            <div class="card-body">
                                <div class="mb-4" style="margin-top: 3rem;">
                                    <i class="fas fa-user-tie text-primary fa-3x"></i>
                                </div>
                                <h4 class="font-weight-bold mb-3">Guru Konselor</h4>
                                <p class="text-muted">Guru konselor dilayanan Bk terdiri dari guru yang berpengalaman dengan konsultasi siswa.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-4 mb-4" style="margin-bottom: 2rem;">
                        <div class="card h-100 shadow-sm border-0 text-center border-bottom border-top" style="border-bottom: 4px solid #007bff; border-top: 4px solid #007bff;">
                            <div class="card-body">
                                <div class="mb-4" style="margin-top: 3rem;">
                                    <i class="fas fa-comments text-primary fa-3x"></i>
                                </div>
                                <h4 class="font-weight-bold mb-3">Fleksibilitas Konsultasi</h4>
                                <p class="text-muted">Pilih metode konsultasi yang sesuai dengan kebutuhan Anda, baik online maupun offline.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

        <!-- jenis layanan Section -->
        <svg class="svg-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style="background: #f1f5f9;"><path class="dark:fill-dark bg-none; dark:opacity-100" fill="white" fill-opacity="1" d="M0,32L30,58.7C60,85,120,139,180,170.7C240,203,300,213,360,192C420,171,480,117,540,90.7C600,64,660,64,720,90.7C780,117,840,171,900,176C960,181,1020,139,1080,144C1140,149,1200,203,1260,218.7C1320,235,1380,213,1410,202.7L1440,192L1440,0L1410,0C1380,0,1320,0,1260,0C1200,0,1140,0,1080,0C1020,0,960,0,900,0C840,0,780,0,720,0C660,0,600,0,540,0C480,0,420,0,360,0C300,0,240,0,180,0C120,0,60,0,30,0L0,0Z"></path></svg>
    <section id="layanan" class="py-5" style="padding-bottom: 10rem; padding-bottom: 8rem; background: #f1f5f9;">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Pilih Layanan BK Sesuai pengaduan siswa</h2>
                <p class="text-muted">Berbagai metode konsultasi/pengaduan untuk membantu Siswa</p>
            </div>

                <div class="row">
                    <div class="col-12 col-md-4 mb-4" style="margin-bottom: 4rem;">
                        <a href="#" data-toggle="modal" data-target="#notesModal">
                            <div class="card shadow-sm" style="background: #f1f5f9;">
                                <div class="card-body text-center bg-success text-white">
                                    <img src="{{ asset('Assets/Frontend/img/online.jpg') }}" alt="Online" class="img-fluid mb-3">
                                </div>
                                <div class="card-body text-center" style="padding: 20px;">
                                    <h4 class="font-weight-bold" style="color: #337ab7;">Pengaduan Notes</h4>
                                    <p class="text-muted mb-4">Sampaikan masalah Anda secara tertulis dengan private dan nyaman.</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-12 col-md-4 mb-4" style="margin-bottom: 4rem;">
                        <a href="#" data-toggle="modal" data-target="#offlineModal">
                            <div class="card shadow-sm" style="background: #f1f5f9;">
                                <div class="card-body text-center bg-success text-white">
                                    <img src="{{ asset('Assets/Frontend/img/offline.jpg') }}" alt="Online" class="img-fluid mb-3">
                                </div>
                                <div class="card-body text-center" style="padding: 20px;">
                                    <h4 class="font-weight-bold" style="color: #337ab7;">Konsultasi Online</h4>
                                    <p class="text-muted mb-4">Konsultasi secara virtual solusi praktis untuk mendapatkan bimbingan dari mana saja.</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-12 col-md-4 mb-4" style="margin-bottom: 4rem;">
                        <a href="#" data-toggle="modal" data-target="#onlineModal">
                            <div class="card shadow-sm" style="background: #f1f5f9;">
                                <div class="card-body text-center bg-purple text-white">
                                    <img src="{{ asset('Assets/Frontend/img/notes.jpg') }}" alt="Offline" class="img-fluid mb-3">
                                </div>
                                <div class="card-body text-center" style="padding: 20px;">
                                    <h4 class="font-weight-bold" style="color: #337ab7;">Konsultasi Tatap Muka</h4>
                                    <p class="text-muted mb-4">Konsultasi langsung dengan Guru konselor di ruang konseling yang nyaman dan private.</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
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

    <!-- modal notes -->
    <div class="modal fade" id="notesModal" tabindex="-1" role="dialog" aria-labelledby="notesModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="notesModalLabel">Form Pengaduan</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('bk-complaint.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="type" value="notes">

                        <div class="form-group">
                            <label>Nama (Opsional)</label>
                            <input type="text" name="name" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Kelas <span class="text-danger">*</span></label>
                            <select name="class" required class="form-control">
                                <option value="">Pilih Kelas</option>
                                @foreach($kelas as $k)
                                    <option value="{{ $k->id }}">Kelas {{ $k->kelas }} {{ $k->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Jenis Masalah <span class="text-danger">*</span></label>
                            <select name="problem_type" required class="form-control">
                                <option value="">Pilih Jenis Masalah</option>
                                @foreach($problemTypes as $key => $label)
                                    <option value="{{ $key }}">{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Deskripsi Pengaduan <span class="text-danger">*</span></label>
                            <textarea name="description" required rows="4"
                                    class="form-control"
                                    placeholder="Ceritakan masalahmu di sini..."></textarea>
                        </div>

                        <div class="form-group">
                            <label>Tingkat Urgensi</label>
                            <select name="urgency" class="form-control">
                            @foreach($urgencyLevels as $key => $label)
                                <option value="{{ $key }}">{{ $label }}</option>
                            @endforeach
                            </select>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Kirim Pengaduan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- modal offline -->
    <div class="modal fade" id="offlineModal" tabindex="-1" role="dialog" aria-labelledby="offlineModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="offlineModalLabel">Form Appointment Offline</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('bk-appointment.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="type" value="offline">

                        <div class="form-group">
                            <label>Nama <span class="text-danger">*</span></label>
                            <input type="text" name="name" required class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Kelas <span class="text-danger">*</span></label>
                            <select name="class" required class="form-control">
                                <option value="">Pilih Kelas</option>
                                @foreach($kelas as $k)
                                    <option value="{{ $k->id }}">Kelas {{ $k->kelas }} {{ $k->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" required class="form-control" placeholder="email@example.com">
                        </div>

                        <div class="form-group">
                            <label>Nomor WhatsApp <span class="text-danger">*</span></label>
                            <input type="tel" name="phone" required class="form-control" placeholder="628xxxxxxxxxx">
                        </div>

                        <div class="form-group">
                            <label>Tanggal Konsultasi <span class="text-danger">*</span></label>
                            <input type="date" name="appointment_date" required
                                min="{{ date('Y-m-d') }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Waktu Konsultasi <span class="text-danger">*</span></label>
                            <select name="appointment_time" required class="form-control">
                                <option value="">Pilih Waktu</option>
                                @foreach(['09:00', '10:00', '11:00', '13:00', '14:00', '15:00'] as $time)
                                    <option value="{{ $time }}">{{ $time }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Topik Konsultasi <span class="text-danger">*</span></label>
                            <select name="consultation_topic" required class="form-control">
                                <option value="">Pilih Topik Konsultasi</option>
                                @foreach($konsultasi as $topik => $label)
                                <option value="{{ $topik }}">{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Deskripsi Singkat</label>
                            <textarea name="description" rows="3"
                                    class="form-control"
                                    placeholder="Jelaskan secara singkat apa yang ingin dikonsultasikan..."></textarea>
                        </div>

                        <div class="form-group">
                            <label>Guru BK yang Dituju (Opsional)</label>
                            <select name="counselor" class="form-control">
                                <option value="">Pilih Guru BK</option>
                                <option value="1">Bu Ani</option>
                                <option value="2">Pak Budi</option>
                                <option value="3">Bu Citra</option>
                            </select>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Buat Janji</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- modal online -->
    <div class="modal fade" id="onlineModal" tabindex="-1" role="dialog" aria-labelledby="onlineModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="onlineModalLabel">Form Appointment Online</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('bk-appointment.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="type" value="online">

                        <div class="form-group">
                            <label>Nama <span class="text-danger">*</span></label>
                            <input type="text" name="name" required class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Kelas <span class="text-danger">*</span></label>
                            <select name="class" required class="form-control">
                                <option value="">Pilih Kelas</option>
                                @foreach($kelas as $k)
                                    <option value="{{ $k->id }}">Kelas {{ $k->kelas }} {{ $k->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" required
                                class="form-control" placeholder="email@example.com">
                        </div>

                        <div class="form-group">
                            <label>Nomor WhatsApp <span class="text-danger">*</span></label>
                            <input type="tel" name="phone" required
                                class="form-control" placeholder="628xxxxxxxxxx">
                        </div>

                        <div class="form-group">
                            <label>Tanggal Konsultasi <span class="text-danger">*</span></label>
                            <input type="date" name="appointment_date" required
                                min="{{ date('Y-m-d') }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Waktu Konsultasi <span class="text-danger">*</span></label>
                            <select name="appointment_time" required class="form-control">
                                <option value="">Pilih Waktu</option>
                                @foreach(['09:00', '10:00', '11:00', '13:00', '14:00', '15:00'] as $time)
                                    <option value="{{ $time }}">{{ $time }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Topik Konsultasi <span class="text-danger">*</span></label>
                            <select name="consultation_topic" required class="form-control">
                                <option value="">Pilih Topik</option>
                                @foreach($konsultasi as $topik => $label)
                                <option value="{{ $topik }}">{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Deskripsi Singkat</label>
                            <textarea name="description" rows="3"
                                    class="form-control"
                                    placeholder="Jelaskan secara singkat apa yang ingin dikonsultasikan..."></textarea>
                        </div>

                        <div class="form-group">
                            <label>Platform yang Disukai</label>
                            <select name="platform" class="form-control">
                                <option value="google_meet">Google Meet</option>
                                <option value="zoom">Zoom</option>
                                <option value="whatsapp">WhatsApp Video Call</option>
                            </select>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Buat Janji</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

        <style>
            @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

            body {
                font-family: 'Inter', sans-serif;
            }
            .card {
                border-radius: 15px;
                box-shadow: 0 4px 6px rgba(0,0,0,0.1);
                transition: all 0.3s ease;
                overflow: hidden;
            }

            .card:hover {
                transform: translateY(-10px);
                box-shadow: 0 10px 20px rgba(0,0,0,0.15);
            }

            .card-body.text-center.bg-success {
                height: 220px;
                display: flex;
                align-items: center;
                justify-content: center;
                background: linear-gradient(135deg, #28a745, #218838);
            }

            .card-body.text-center.bg-purple {
                height: 220px;
                display: flex;
                align-items: center;
                justify-content: center;
                background: linear-gradient(135deg, #6f42c1, #5a32a3);
            }

            .card img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            .accordion .card {
                margin-bottom: 10px;
                border-radius: 10px;
                overflow: hidden;
            }

            .accordion .card-header {
                background-color: #f8f9fa;
                padding: 15px;
                border-bottom: none;
            }

            .accordion .card-header button {
                font-weight: 600;
                text-decoration: none;
                width: 100%;
                text-align: left;
                transition: color 0.3s ease;
            }

            .accordion .card-body {
                background-color: #f8f9fa;
                color: black;
                padding: 20px;
            }
        </style>
        @push('styles')
        <style>
            .section-title {
                font-weight: 700;
                color: #2c3e50;
                margin-bottom: 20px;
            }
            .scroll-link {
                transition: all 0.3s ease;
            }
            .scroll-link:hover {
                transform: translateY(-5px);
            }
        </style>
        @endpush
        @if(session('success'))
            <script>
                Swal.fire({
                    title: 'Berhasil!',
                    text: '{{ session("success") }}',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            </script>
        @endif


    @endsection
@endsection
