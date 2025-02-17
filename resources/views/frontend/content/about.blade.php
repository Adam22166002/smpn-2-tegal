<div class="welcome-section py-5" style="margin-top: 8rem; margin-bottom: 8rem;">
    <div class="container">
        <div class="row align-items-center">
            @if ($about != NULL)
            <div class="col-lg-7">
                <h1 class="display-4 fw-bold mb-4" data-wow-duration="1s" data-wow-delay=".2s">
                    Selamat Datang di<br>
                    Web Resmi <span class="about-title poppins-semibold wow fadeIn">{{$about->title}}</span>
                </h1>
                <p class="lead text-muted mb-5" data-wow-duration="1s" data-wow-delay=".2s"> {{$about->desc}} </p>
                <div class="d-flex gap-3 flex-wrap">
                    <a href="{{route('profile.sekolah')}}" class="btn btn-primary btn-lg px-4 rounded-pill">
                        <i class="bi bi-person-lines-fill me-2"></i>
                        Profile Sekolah
                    </a>
                    <a href="{{route('visimisi.sekolah')}}" class="btn text-primary btn-lg px-4 rounded-pill" style="border-color: #00BFFF; transition: background-color 0.3s;">
                    <i class="bi bi-bookmark-star-fill me-2"></i>
                    Visi & Misi
                    </a>
                </div>
            </div>
            <div class="col-lg-5 mt-5 mt-lg-0">
                <div class="position-relative">
                    <div class="position-absolute top-0 end-0 bg-success rounded-4"
                        style="width: 85%; height: 90%; transform: translate(10%, 10%); opacity: 0.1;"></div>

                    <div class="position-relative">
                        <div class="rounded-4 overflow-hidden shadow-lg">
                            <img src="path/to/kepsek-image.jpg"
                                class="img-fluid"
                                alt="Kepala Sekolah SMPN 2 Tegal"
                                style="object-fit: cover; height: 600px; width: 100%;">
                        </div>

                        <div class="position-absolute bottom-0 start-0 bg-white p-4 rounded-4 shadow-lg"
                            style="transform: translateX(-20%) translateY(20%); max-width: 300px;">
                            <h5 class="fw-bold mb-2">Drs. H. Nama Kepsek</h5>
                            <p class="text-muted mb-0">Kepala SMPN 2 Tegal</p>
                            <div class="d-flex align-items-center mt-3">
                                <div class="badge bg-success rounded-pill px-3 py-2">
                                    <i class="bi bi-mortarboard-fill me-2"></i>
                                    Periode 2025/2026
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    @endif

        </div>
    </div>
</div>
