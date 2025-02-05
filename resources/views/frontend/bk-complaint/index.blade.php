@extends('layouts.Frontend.app')
@section('title')
    Layanan BK
@endsection

@section('content')
    @section('about')
        <!-- hero section-->
        <div class="welcome-section py-5" style="margin-top: 8rem; margin-bottom: 8rem;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                    <h1 class="display-4 font-weight-bold mb-4">
                        Layanan <span style="color: #007bff;">BK</span><br>
                        <span>Bimbingan Konseling</span>
                    </h1>
                    <p class="lead mb-4 border-left" style="padding-left: 5px; ;border-left: 4px solid #007bff;">
                        Kami hadir untuk mendukung pengembangan diri dan kesejahteraan mental Anda. Konsultasikan setiap masalah Anda dengan Guru BK yang siap membantu kapanpun dan menjadi teman Anda.
                    </p>
                        <div class="d-flex" style="margin-top: 6rem;">
                            <a href="#layanan" class="btn btn-primary btn-lg px-4 rounded-pill scroll-link">
                                <li class="fas fa-comment-dots"></li> Mulai Konsultasi
                            </a>
                            <a href="#info" class="btn btn-outline-primary rounded-pill px-4 py-2 scroll-link" style="font-size: large;">
                            <i class="fas fa-book-open"></i> Pelajari Lebih Lanjut
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-5 d-none d-lg-block">
                        <img src="{{ asset('Assets/Frontend/img/konseling.jpg') }}" alt="Counseling" class="img-fluid">
                    </div>
                </div>
            </div>
        
            <!-- status section -->
            <div id="info" class="text-white py-5" style="margin-top: 8rem; margin-bottom: 4rem;">
                <div class="container">
                    <div class="row text-center">
                        <div class="col-6 col-md-3 mb-5">
                            <div class="h2 text-primary font-weight-bold">1000+</div>
                            <h4 class="text-muted">Siswa Terlayani</h4>
                        </div>
                        <div class="col-6 col-md-3 mb-5">
                            <div class="h2 text-success font-weight-bold">24/7</div>
                            <h4 class="text-muted">Dukungan Online</h4>
                        </div>
                        <div class="col-6 col-md-3 mb-5">
                            <div class="h2 text-info font-weight-bold">98%</div>
                            <h4 class="text-muted">Tingkat Kepuasan</h4>
                        </div>
                        <div class="col-6 col-md-3 mb-5">
                            <div class="h2 text-warning font-weight-bold">5+</div>
                            <h4 class="text-muted">Konselor Profesional</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- informasi section -->
    <section id="" class="bg-light py-5" style="margin-bottom: 8rem; margin-top: 4rem;">
        <div class="container" style="margin-bottom: 8rem;">
            <div class="text-center mb-5" style="margin-bottom: 3rem;">
                <h2 class="section-title mb-3">Mengapa Memilih Layanan BK Kami?</h2>
                <p class="text-muted" style="margin-bottom: 4rem;">Kami menyediakan layanan konseling profesional dengan pendekatan yang komprehensif.</p>
            </div>

                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm border-0 text-center border-bottom border-top" style="border-bottom: 4px solid #007bff; border-top: 4px solid #007bff;">
                            <div class="card-body">
                                <div class="mb-4" style="margin-top: 3rem;">
                                    <i class="fas fa-shield-alt text-primary fa-3x"></i>
                                </div>
                                <h4 class="card-title">Kerahasiaan Terjamin</h4>
                                <p class="card-text text-muted">Kami menjunjung tinggi privasi setiap konsultasi yang Anda lakukan.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12 col-md-4 mb-4">
                        <div class="card h-100 shadow-sm border-0 text-center border-bottom border-top" style="border-bottom: 4px solid #007bff; border-top: 4px solid #007bff;">
                            <div class="card-body">
                                <div class="mb-4" style="margin-top: 3rem;">
                                    <i class="fas fa-user-tie text-primary fa-3x"></i>
                                </div>
                                <h4 class="font-weight-bold mb-3">Konselor Profesional</h4>
                                <p class="text-muted">Tim konselor kami terdiri dari profesional berpengalaman dengan sertifikasi resmi.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12 col-md-4 mb-4">
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
    <section id="layanan" class="py-5" style="margin-top: 8rem; margin-bottom: 8rem;">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Pilih Layanan Sesuai Kebutuhan</h2>
                <p class="text-muted">Berbagai metode konsultasi untuk membantu Anda</p>
            </div>

                <div class="row">
                    <div class="col-12 col-md-4 mb-4">
                        <a href="#" data-toggle="modal" data-target="#notesModal">
                            <div class="card shadow-sm">
                                <div class="card-body text-center bg-success text-white">
                                    <img src="{{ asset('Assets/Frontend/img/online.jpg') }}" alt="Online" class="img-fluid mb-3">
                                </div>
                                <div class="card-body text-center" style="padding: 20px;">
                                    <h4 class="font-weight-bold text-success">Pengaduan Notes</h4>
                                    <p class="text-muted mb-4">Sampaikan masalah Anda secara tertulis dengan nyaman.</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-12 col-md-4 mb-4">
                        <a href="#" data-toggle="modal" data-target="#offlineModal">
                            <div class="card shadow-sm">
                                <div class="card-body text-center bg-success text-white">
                                    <img src="{{ asset('Assets/Frontend/img/offline.jpg') }}" alt="Online" class="img-fluid mb-3">
                                </div>
                                <div class="card-body text-center" style="padding: 20px;">
                                    <h4 class="font-weight-bold text-success">Konsultasi Online</h4>
                                    <p class="text-muted mb-4">Konsultasi virtual melalui platform pilihan Anda. Solusi praktis untuk mendapatkan bimbingan dari mana saja.</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-12 col-md-4 mb-4">
                        <a href="#" data-toggle="modal" data-target="#onlineModal">
                            <div class="card shadow-sm">
                                <div class="card-body text-center bg-purple text-white">
                                    <img src="{{ asset('Assets/Frontend/img/notes.jpg') }}" alt="Offline" class="img-fluid mb-3">
                                </div>
                                <div class="card-body text-center" style="padding: 20px;">
                                    <h4 class="font-weight-bold text-purple">Konsultasi Tatap Muka</h4>
                                    <p class="text-muted mb-4">Konsultasi langsung dengan konselor di ruang konseling yang nyaman dan private.</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-5" style="margin-top: 8rem; margin-bottom: 8rem; background-color: #f8f9fa;">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Pertanyaan yang Sering Diajukan</h2>
                <p class="text-muted">Temukan jawaban dari pertanyaan umum terkait layanan kami.</p>
            </div>
            
            <div class="accordion" id="faqAccordion">
                
                <div class="card">
                    <div class="card-header" id="faqHeading1">
                        <h2 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#faq1" aria-expanded="true" aria-controls="faq1">
                                <i class="bi bi-question-circle me-2"></i> Apakah layanan konseling ini berbayar?
                            </button>
                        </h2>
                    </div>
                    <div id="faq1" class="collapse show" aria-labelledby="faqHeading1" data-parent="#faqAccordion">
                        <div class="card-body">
                            Tidak, semua layanan konseling BK sekolah diberikan secara gratis untuk seluruh siswa.
                        </div>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header" id="faqHeading2">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#faq2" aria-expanded="false" aria-controls="faq2">
                                <i class="bi bi-clock me-2"></i> Berapa lama waktu konsultasi yang diberikan?
                            </button>
                        </h2>
                    </div>
                    <div id="faq2" class="collapse" aria-labelledby="faqHeading2" data-parent="#faqAccordion">
                        <div class="card-body">
                            Setiap sesi konsultasi berlangsung sekitar 45-60 menit.
                        </div>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header" id="faqHeading3">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#faq3" aria-expanded="false" aria-controls="faq3">
                                <i class="bi bi-person-check me-2"></i> Apakah saya bisa memilih konselor?
                            </button>
                        </h2>
                    </div>
                    <div id="faq3" class="collapse" aria-labelledby="faqHeading3" data-parent="#faqAccordion">
                        <div class="card-body">
                            Ya, Anda dapat memilih konselor yang Anda inginkan saat membuat janji konsultasi offline.
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
                    <h5 class="modal-title" id="notesModalLabel">Form Pengaduan</h5>
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
                                @for($i = 10; $i <= 12; $i++)
                                    @foreach(['A', 'B', 'C', 'D'] as $class)
                                        <option value="{{ $i . $class }}">{{ $i . $class }}</option>
                                    @endforeach
                                @endfor
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Jenis Masalah <span class="text-danger">*</span></label>
                            <select name="problem_type" required class="form-control">
                                <option value="">Pilih Jenis Masalah</option>
                                <option value="bullying">Bullying</option>
                                <option value="academic">Akademik</option>
                                <option value="family">Masalah Keluarga</option>
                                <option value="career">Karir</option>
                                <option value="other">Lainnya</option>
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
                                <option value="low">Rendah</option>
                                <option value="medium">Sedang</option>
                                <option value="high">Tinggi</option>
                            </select>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
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
                    <h5 class="modal-title" id="offlineModalLabel">Form Appointment Offline</h5>
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
                                @for($i = 10; $i <= 12; $i++)
                                    @foreach(['A', 'B', 'C', 'D'] as $class)
                                        <option value="{{ $i . $class }}">{{ $i . $class }}</option>
                                    @endforeach
                                @endfor
                            </select>
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
                                <option value="">Pilih Topik</option>
                                <option value="academic">Akademik</option>
                                <option value="career">Karir</option>
                                <option value="personal">Pribadi</option>
                                <option value="social">Sosial</option>
                                <option value="other">Lainnya</option>
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
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-purple">Buat Janji</button>
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
                    <h5 class="modal-title" id="onlineModalLabel">Form Appointment Online</h5>
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
                                @for($i = 10; $i <= 12; $i++)
                                    @foreach(['A', 'B', 'C', 'D'] as $class)
                                        <option value="{{ $i . $class }}">{{ $i . $class }}</option>
                                    @endforeach
                                @endfor
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
                                <option value="academic">Akademik</option>
                                <option value="career">Karir</option>
                                <option value="personal">Pribadi</option>
                                <option value="social">Sosial</option>
                                <option value="other">Lainnya</option>
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
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-green">Buat Janji</button>
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

            /* Accordion Styling */
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
                color:rgb(0, 0, 0);
                font-weight: 600;
                text-decoration: none;
                width: 100%;
                text-align: left;
                transition: color 0.3s ease;
            }

            .accordion .card-header button:hover {
                color: #007bff;
            }

            .accordion .card-body {
                background-color: #fff;
                color: #6c757d;
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
        

    @endsection
@endsection
