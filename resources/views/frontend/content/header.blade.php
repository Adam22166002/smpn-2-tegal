<div id="header2" class="header4-area">
    <div class="header-top-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="header-top-left">
                        <div class="logo-area">
                            @if (@$footer->logo == NULL)
                            <img class="img-responsive" src="{{asset('Assets/Frontend/img/logo.jp')}}" alt="logo">
                            @else
                            <img class="img-responsive" src="{{asset('storage/images/logo/' .$footer->logo)}}"
                                alt="logo">
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    <div class="header-top-right">
                        <ul>
                        <li><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:{{ @$footer->telp }}">{{ @$footer->telp }}</a></li>
<li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:{{ @$footer->email }}">{{ @$footer->email }}</a></li>
                            <li>
                                @auth
                                <a href="/home" class="apply-now-btn2">Home</a>
                                @else
                                <a class="apply-now-btn2" href="{{route('login')}}"> Masuk</a>
                                @endauth
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-menu-area bg-primary" id="sticker">
        <div class="container-fluid" style="align-items: center; justify-content:center; margin-left:3rem;">
            <div class="row" style="align-items: center; justify-content:center;">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="align-items: center; justify-content:center;">
                    <nav id="desktop-nav" style="align-items: center; justify-content:center;">
                        <ul>
                            <li class="{{ (request()->is('/')) ? 'active' : '' }}"><a href="/">Beranda</a></li>
                            <li><a href="#">Tentang Kami</a>
                                <ul>
                                    <li><a href=" {{route('profile.sekolah')}} ">Profile Sekolah</a></li>
                                    <li><a href=" {{route('sejarah.sekolah')}} ">Sejarah Singkat</a></li>
                                    <li><a href=" {{route('visimisi.sekolah')}} ">Visi dan Misi</a></li>
                                    <li><a href=" {{ route('sarpras') }} ">Sarana dan Prasarana</a></li>
                                    <li><a href=" {{route('penghargaan.sekolah')}} ">Penghargaan</a></li>
                                    <li><a href=" {{route('gtk.sekolah')}} ">GTK</a></li>
                                </ul>
                            </li>

                            <li><a href="#">Ekstrakurikuler</a>
                                <ul class="thired-level">
                                    @foreach ($kegiatanM as $kegiatans)
                                        <li><a href="{{ url('kegiatan', $kegiatans->slug) }}">{{ $kegiatans->nama }} </a></li>
                                    @endforeach


                                    {{-- <li class="has-child-menu"><a href="#">Program</a>
                                        <ul class="thired-level">
                                            @foreach ($jurusanM as $jurusans)
                                                <li><a href="{{ url('program', $jurusans->slug) }}">{{ $jurusans->nama }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li> --}}
                                </ul>
                            </li>
                            <li><a href="#">Kesiswaan</a>
                                <ul>
                                    <li><a href=" {{route('kegiatanSiswa.sekolah')}} ">Kegiatan Siswa</a></li>
                                    <li><a href=" {{route('prestasi.sekolah')}} ">Prestasi Siswa</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Kurikulum</a>
                                <ul>
                                    <li><a href=" {{route('kurikulum.sekolah')}} ">Kurikulum yang digunakan</a></li>
                                    <li><a href=" {{route('pembiasaan.sekolah')}} ">Pembiasaan Siswa</a></li>
                                    <li><a href=" {{route('kaldik.sekolah')}} ">Kaldik</a></li>
                                    <li><a href="http://link-ke-aplikasi-dapodik" target="_blank">Dapodik</a></li>
                                    <li><a href=" {{route('info.sekolah')}} ">Info ATS, AAS, ANBK, Dll</a></li>
                                </ul>
                            </li>
                            {{-- <li><a href="#">Informasi</a>
                                <ul>
                                    <li class="{{ (request()->is('berita')) ? 'active' : '' }}"><a
                                            href=" {{route('berita')}} ">Berita Terkini</a></li>
                                    <li class="{{ (request()->is('event')) ? 'active' : '' }}"><a
                                            href=" {{route('event')}} ">Event Terbaru</a></li>
                                    <li class="{{ (request()->is('gallery')) ? 'active' : '' }}"><a
                                        href="{{ route('gallery') }}">Galeri Sekolah</a></li>
                                </ul>
                            </li> --}}

                            {{-- <li><a href="{{route('bk-complaint.index')}}">BK</a></li>
                            <li><a href="{{ route('rapot') }}">Rapot</a></li> --}}

                            <li><a href="#">KONSPERO</a>
                                <ul>
                                    <li class="{{ (request()->is('konspero')) ? 'active' : '' }}"><a
                                            href=" {{route('konspero')}} ">Konsultasi Bimbingan dan Penyuluhan</a></li>
                                </ul>
                            </li>

                            <li><a href="#">PERPUS DIGITAL</a>
                                <ul>
                                    <li class="{{ (request()->is('perpus')) ? 'active' : '' }}"><a
                                            href="http://perpus.smp2tegal.sch.id/">Majalah Online</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Raport</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Mobile Menu Area Start -->
<div class="mobile-menu-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mobile-menu">
                    <nav id="dropdown">
                        <ul>
                            <li class="active"><a href="#">Beranda</a></li>
                            <li><a href="#">Tentang Kami</a>
                                <ul>
                                    <li><a href=" {{route('profile.sekolah')}} ">Profile Sekolah</a></li>
                                    <li><a href=" {{route('sejarah.sekolah')}} ">Sejarah Singkat</a></li>
                                    <li><a href=" {{route('visimisi.sekolah')}} ">Visi dan Misi</a></li>
                                    <li><a href=" {{ route('sarpras') }} ">Sarana dan Prasarana</a></li>
                                    <li><a href=" {{route('penghargaan.sekolah')}} ">Penghargaan</a></li>
                                    <li><a href=" {{route('gtk.sekolah')}} ">GTK</a></li>
                                </ul>
                            </li>

                            <li><a href="#">Ekstrakurikuler</a>
                                <ul class="thired-level">
                                            @foreach ($kegiatanM as $kegiatans)
                                            <li><a
                                                    href=" {{url('kegiatan', $kegiatans->slug)}} ">{{$kegiatans->nama}}</a>
                                            </li>
                                            @endforeach

                                     {{--<li class="has-child-menu"><a href="#">Program Studi</a>
                                        <ul class="thired-level">
                                            @foreach ($jurusanM as $jurusans)
                                            <li><a href=" {{ url('program', $jurusans->slug)}} "> {{$jurusans->nama}}
                                                </a></li>
                                            @endforeach
                                        </ul>
                                    </li>--}}
                                </ul>
                            </li>
                            <li><a href="#">Kesiswaan</a>
                                <ul>
                                    <li><a href=" {{route('kegiatanSiswa.sekolah')}} ">Kegiatan Siswa</a></li>
                                    <li><a href=" {{route('prestasi.sekolah')}} ">Prestasi Siswa</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Kurikulum</a>
                                <ul>
                                    <li><a href=" {{route('kurikulum.sekolah')}} ">Kurikulum yang digunakan</a></li>
                                    <li><a href=" {{route('pembiasaan.sekolah')}} ">Pembiasaan Siswa</a></li>
                                    <li><a href=" {{route('kaldik.sekolah')}} ">Kaldik</a></li>
                                    <li><a href="http://link-ke-aplikasi-dapodik" target="_blank">Dapodik</a></li>
                                    <li><a href=" {{route('info.sekolah')}} ">Info ATS, AAS, ANBK, Dll</a></li>
                                </ul>
                            </li>

                            {{--<li><a href="#">Informasi</a>
                                <ul>
                                    <li class="{{ (request()->is('berita')) ? 'active' : '' }}"><a
                                            href=" {{route('berita')}} ">Berita Terkini</a></li>
                                    <li class="{{ (request()->is('event')) ? 'active' : '' }}"><a
                                            href=" {{route('event')}} ">Event Terbaru</a></li>
                                    <li><a href="#">Galeri Sekolah</a></li>
                                </ul>
                            </li>--}}

                            {{--<li><a href="{{route('bk-complaint.index')}}">BK</a></li>
                            <li><a href="#">Rapot</a></li>--}}
                            <li><a href="#">KONSPERO</a>
                                <ul>
                                    <li class="{{ (request()->is('konspero')) ? 'active' : '' }}"><a
                                            href=" {{route('konspero')}} ">Konsultasi Bimbingan dan Penyuluhan</a></li>
                                </ul>
                            </li>


                            <li><a href="#">PERPUS DIGITAL</a>
                                <ul>
                                    <li class="{{ (request()->is('perpus')) ? 'active' : '' }}"><a
                                            href=" {{route('perpus')}} ">Majalah Online</a></li>
                                </ul>
                            </li>
                            <li>
                                @auth
                                <a href="">{{Auth::user()->name}}</a>
                                @else
                                <a href=" {{route('login')}} ">Masuk</a>
                                @endauth
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Mobile Menu Area End -->
