@extends('layouts.Frontend.app')

@section('title')
Profile Sekolah
@endsection

@section('content')
@section('about')
<div class="container">
    @if ($profile)

        <div style="margin-top: 2%; margin-bottom:3%">
            <img src="{{asset('storage/images/profileSekolah/' .$profile->image)}}" class="img-responsive" style="max-height:500px; width:100%; object-fit:cover">
        </div>
        <p class="sub-title-full-width">{{$profile->content}}</p>
    @else
    <img src="{{asset('Assets/Frontend/img/empty.svg')}}" class="img-responsive"
        style="object-fit:cover; margin-top:5% !important; display: block; margin: 0 auto;">
    @endif
</div>
<div class="sambutan-section py-5" style="margin-bottom: 7rem;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 mb-4 mb-lg-0">
                <div class="kepsek-image position-relative">
                    <img src="{{asset('storage/images/kepsek/' .$profile->kepsek_image)}}"
                        class="img-fluid rounded-3 shadow-lg" alt="Kepala Sekolah">
                </div>
            </div>
            <div class="col-lg-8">
                <div class="sambutan-content bg-light p-4 rounded-3 shadow-sm">
                    <p class="mb-3">Bismiillahirahmanirrahim..</p>
                    <p class="mb-3">Assalamualaikum Wr.Wb.</p>
                    <p class="mb-3">Puji syukur kehadirat Allah SWT yang telah memberikan nikmat dan karunianya kepada
                        kita semua, dan kepadanyalah kelak kita nanti kan kembali. Shalawat serta salam semoga
                        senantiasa tercurah kepada junjungan kita Nabi Muhammad SAW beserta keluarga dan para
                        sahabatnya.</p>
                    <p class="mb-3">Kami ucapkan selamat datang di website SMPN 2 Tegal. Website ini digunakan sebagai
                        sarana informasi dan publikasi bagi masyarakat yang membutuhkan informasi seputar tentang SMPN 2
                        Tegal.</p>
                    <p class="mb-3">Semoga informasi yang diberikan, bisa memberikan gambaran yang cukup untuk
                        mengetahui rangkaian kegiatan yang telah dilaksanakan oleh SMPN 2 Tegal. Kami menyadari akan
                        kekurangan yang kami miliki. Tidak terputus kami mohon Do'a dan dukungan dari semua pihak,
                        sangat kami harapkan agar generasi penerus bangsa dapat terus semangat dalam berkarya.</p>
                    <p class="mb-3">Wassalamu alaikum wr.wb.</p>
                    <div class="mt-4">
                        <p class="mb-1">Ttd.</p>
                        <strong>Ries Murdiani</strong>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4 mb-lg-0">
                <div class="kepsek-image position-relative">
                    <img src="{{asset('storage/images/kepsek/' .$profile->kepsek_image)}}"
                        class="img-fluid rounded-3 shadow-lg" alt="Kepala Sekolah">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Profile Sekolah Section -->
<div class="profile-detail-section bg-light py-5 mt-3">
    <div class="container">
        <h2 class="text-center mb-2 font-weight-bold">Profil SMP Negeri 2 Tegal</h2>
        <p class="text-center mb-5 text-muted">Berikut adalah Profil dari sekolah SMP Negeri 2 yang berlokasi di
            Kecamatan Tegal Timur, Kota Tegal</p>

        <div class="row g-4">
            <!-- Informasi Umum -->
            <div class="col-lg-6">
                <div class="card border-0 rounded-3 shadow-sm h-100">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <tbody>
                                    <tr>
                                        <td class="font-weight-bold text-black ps-4" style="font-weight:bold;"
                                            style="width: 40%;">NPSN</td>
                                        <td>20329833</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold text-black ps-4" style="font-weight:bold;">Tingkatan
                                        </td>
                                        <td>Sekolah Menengah Pertama</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold text-black ps-4" style="font-weight:bold;">Kepala
                                            Sekolah</td>
                                        <td>Ries Murdiani</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold text-black ps-4" style="font-weight:bold;">Operator
                                        </td>
                                        <td>Efta Shufiyati</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold text-black ps-4" style="font-weight:bold;">
                                            Akreditasi</td>
                                        <td><span class="badge badge-success">A</span></td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold text-black ps-4" style="font-weight:bold;">Kurikulum
                                        </td>
                                        <td>SMP 2013</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold text-black ps-4" style="font-weight:bold;">Jam
                                            Belajar</td>
                                        <td>Pagi/6 hari</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold text-black ps-4" style="font-weight:bold;">Luas
                                            Tanah</td>
                                        <td>7,600 m²</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kontak & Legalitas -->
            <div class="col-lg-6">
                <div class="card border-0 rounded-3 shadow-sm h-100">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <tbody>
                                    <tr>
                                        <td class="ps-4" style="font-weight: bold;" style="width: 40%;">Telepon</td>
                                        <td><i class="bi bi-telephone-fill me-2"></i>0283351532</td>
                                    </tr>
                                    <tr>
                                        <td class="ps-4" style="font-weight: bold;">Fax</td>
                                        <td><i class="bi bi-printer-fill me-2"></i>0283324963</td>
                                    </tr>
                                    <tr>
                                        <td class="ps-4" style="font-weight: bold;">Email</td>
                                        <td><i class="bi bi-envelope-fill me-2"></i>smpn2tegal@yahoo.com</td>
                                    </tr>
                                    <tr>
                                        <td class="ps-4" style="font-weight: bold;">Website</td>
                                        <td><i class="bi bi-globe me-2"></i>www.smpn2tegal.sch.id</td>
                                    </tr>
                                    <tr>
                                        <td class="ps-4" style="font-weight: bold;">SK Pendirian</td>
                                        <td>131100100008035577</td>
                                    </tr>
                                    <tr>
                                        <td class="ps-4" style="font-weight: bold;">Tanggal SK</td>
                                        <td>01 August 1958</td>
                                    </tr>
                                    <tr>
                                        <td class="ps-4" style="font-weight: bold;">SK Operasional</td>
                                        <td>39 SK B 111</td>
                                    </tr>
                                    <tr>
                                        <td class="ps-4" style="font-weight: bold;">Tgl Operasional</td>
                                        <td>01 August 1958</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if (!$profile)
<div class="text-center py-5">
    <img src="{{asset('Assets/Frontend/img/empty.svg')}}" class="img-fluid" alt="No Content" style="max-width: 400px;">
    <h3 class="mt-4">Tidak ada konten tersedia</h3>
</div>
@endif
</div>
</div>

<style>
    .sambutan-content {
        text-align: justify;
        line-height: 1.8;
    }

    .info-list .d-flex:last-child {
        border-bottom: none !important;
    }

    .card {
        transition: transform 0.2s;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    @media (max-width: 768px) {
        .info-list .d-flex {
            flex-direction: column;
        }

        .info-list .fw-bold {
            width: 100%;
            margin-bottom: 0.5rem;
        }
    }
</style>

@endsection
@endsection