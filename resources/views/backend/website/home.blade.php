@extends('layouts.backend.app')

@section('title')
Dashboard
@endsection

@section('content')
<div class="content-wrapper container-xxl p-0">
    <div class="content-body">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="card card-congratulations">
                    <div class="card-body text-center">
                        <img src="{{asset('Assets/Backend/images/pages/decore-left.png')}}"
                            class="congratulations-img-left" alt="card-img-left" />
                        <img src="{{asset('Assets/Backend/images/pages/decore-right.png')}}"
                            class="congratulations-img-right" alt="card-img-right" />
                        <div class="avatar avatar-xl bg-primary shadow">
                            <div class="avatar-content">
                                <i data-feather="award" class="font-large-1"></i>
                            </div>
                        </div>
                        <div class="text-center">
                            <h3 class="mb-1 text-white">Selamat Datang {{Auth::user()->name}},</h3>
                            <p class="card-text m-auto w-75">
                                {{ $mengajarKelas->nama_kelas ?? 'Have fun day' }}
                                {{ $mengajarKelas->kelas ?? '' }}

                            </p>
                        </div>
                    </div>
                </div>
            </div>

            @if (Auth::user()->role == 'Admin')
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <a href="#" class="card-header">
                                <div>
                                    <h2 class="font-weight-bolder mb-0">{{$berita}}</h2>
                                    <p class="card-text">Total Berita</p>
                                </div>
                                <div class="avatar bg-light-primary p-50 m-0">
                                    <div class="avatar-content">
                                        <i data-feather="book" class="font-medium-5"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <a href="#" class="card-header">
                                <div>
                                    <h2 class="font-weight-bolder mb-0">{{ ($acara == null ? '0' : $acara) }}</h2>
                                    <p class="card-text">Total Events</p>
                                </div>
                                <div class="avatar bg-light-danger p-50 m-0">
                                    <div class="avatar-content">
                                        <i data-feather="user" class="font-medium-5"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <a href="#" class="card-header">
                                <div>
                                    <h2 class="font-weight-bolder mb-0">{{$murid}}</h2>
                                    <p class="card-text">Total Murid</p>
                                </div>
                                <div class="avatar bg-light-warning p-50 m-0">
                                    <div class="avatar-content">
                                        <i data-feather="user-check" class="font-medium-5"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <a href="#" class="card-header">
                                <div>
                                    <h2 class="font-weight-bolder mb-0">{{$guru}}</h2>
                                    <p class="card-text">Total Pengajar</p>
                                </div>
                                <div class="avatar bg-light-success p-50 m-0">
                                    <div class="avatar-content">
                                        <i data-feather="user" class="font-medium-5"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endif


            @if (Auth::user()->role == 'BK')
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <a href="#" class="card-header">
                                <div>
                                    <h2 class="font-weight-bolder mb-0">{{$pendingComplaints}}</h2>
                                    <p class="card-text">Pending Pengaduan</p>
                                </div>
                                <div class="avatar bg-light-danger p-50 m-0">
                                    <div class="avatar-content">
                                        <i data-feather="alert-circle" class="font-medium-5"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <a href="#" class="card-header">
                                <div>
                                    <h2 class="font-weight-bolder mb-0">{{$pendingAppointments}}</h2>
                                    <p class="card-text">Pending Konsultasi</p>
                                </div>
                                <div class="avatar bg-light-primary p-50 m-0">
                                    <div class="avatar-content">
                                        <i data-feather="calendar" class="font-medium-5"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <a href="#" class="card-header">
                                <div>
                                    <h2 class="font-weight-bolder mb-0">{{$murid}}</h2>
                                    <p class="card-text">Total Murid</p>
                                </div>
                                <div class="avatar bg-light-warning p-50 m-0">
                                    <div class="avatar-content">
                                        <i data-feather="user-check" class="font-medium-5"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <a href="#" class="card-header">
                                <div>
                                    <h2 class="font-weight-bolder mb-0">{{$totalKelas}}</h2>
                                    <p class="card-text">Total Kelas</p>
                                </div>
                                <div class="avatar bg-light-success p-50 m-0">
                                    <div class="avatar-content">
                                        <i data-feather="user" class="font-medium-5"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <div class="col-lg-4 col-md-6 col-12">
                <div class="card card-developer-meetup">
                    <div class="meetup-img-wrapper rounded-top text-center">
                        <img src="{{asset('Assets/Backend/images/illustration/email.svg')}}" alt="Meeting Pic"
                            height="170" />
                    </div>
                    <div class="card-body">
                        <div class="meetup-header d-flex align-items-center">
                            <div class="meetup-day">

                                @php
                                $hari = [
                                'Sunday' => 'Minggu',
                                'Monday' => 'Senin',
                                'Tuesday' => 'Selasa',
                                'Wednesday' => 'Rabu',
                                'Thursday' => 'Kamis',
                                'Friday' => 'Jumat',
                                'Saturday' => 'Sabtu'
                                ];

                                $date = new DateTime();
                                $hari_ini = $hari[$date->format('l')];
                                @endphp

                                <h6 class="mb-0">{{ $hari_ini }}</h6>
                                <h3 class="mb-0">{{ date('d') }}</h3>
                            </div>
                            <div class="my-auto">
                                <h4 class="card-title mb-25">{{ Auth::user()->name }}</h4>
                                <p class="card-text mb-0">{{ Auth::user()->role }}</p>
                            </div>
                        </div>
                        <div class="media">
                            <div class="avatar bg-light-primary rounded mr-1">
                                <div class="avatar-content">
                                    <i data-feather="calendar" class="avatar-icon font-medium-3"></i>
                                </div>
                            </div>
                            <div class="media-body">
                                <h6 class="mb-0">{{ date('Y-m-d') }}</h6>
                                <small id="clock"></small>
                            </div>
                        </div>
                        <div class="media">
                            <div class="avatar bg-light-primary rounded mr-1">
                                <div class="avatar-content">
                                    <i data-feather="map-pin" class="avatar-icon font-medium-3"></i>
                                </div>
                            </div>
                            <div class="media-body">
                                <h6 class="mb-0">SMPN2 Tegal</h6>
                                <small>Jl. Mentri Supeno</small>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            @if (Auth::user()->role == 'Admin')
            <div class="col-xl-8 col-md-6 col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-statistics">
                            <div class="card-header">
                                <h4 class="card-title">Statistik Pengunjung</h4>
                                <div class="d-flex align-items-center">
                                    {{-- <p class="card-text font-small-2 mr-25 mb-0">Updated 1 day ago</p> --}}
                                </div>

                                <canvas id="visitorChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection