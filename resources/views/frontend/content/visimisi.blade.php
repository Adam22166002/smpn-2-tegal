@extends('layouts.Frontend.app')
@section('title')
    Visi dan Misi
@endsection

@section('content')
    @section('about')
        {{-- Header Section --}}
        <div class="container-fluid py-5 text-dark text-center">
            <div class="container">
                <h1 class="h1 fw-semibold mb-3">VISI DAN MISI</h1>
                <h2 class="h2 text-primary fw-semibold mb-3">SMP NEGERI 2 TEGAL</h2>
                <p class="lead mb-4">UNGGUL, BERPRESTASI, BERAKHLAK MULIA</p>
                <p class="mb-0">
                    TERWUJUDNYA LINGKUNGAN PENDIDIKAN YANG BERKUALITAS, MENDUKUNG POTENSI SISWA, DAN BERKARAKTER.
                </p>
            </div>
        </div>

        {{-- Content Section --}}
        <div class="container py-5" style="margin-top: 5rem; margin-bottom: 5rem;">
            @if ($visimisi)
                <div class="row g-4 align-items-center">
                    {{-- Visi dan Misi Text --}}
                    <div class="col-lg-6">
                        <div class="card shadow border-0">
                            <div class="card-body">
                                <h2 class="card-title h4 text-primary fw-bold mb-3">VISI</h2>
                                <p class="card-text text-muted">{{$visimisi->visi}}</p>
                            </div>
                        </div>
                        <div class="card shadow border-0 mt-4">
                            <div class="card-body">
                                <h2 class="card-title h4 text-primary fw-bold mb-3">MISI</h2>
                                <p class="card-text text-muted">{{$visimisi->misi}}</p>
                            </div>
                        </div>
                    </div>

                    {{-- Image Section --}}
                    <div class="col-lg-6 text-center">
                        <img src="{{asset('storage/images/visimisi/' .$visimisi->image)}}" 
                             class="img-fluid rounded-3 shadow-lg" 
                             alt="Visi dan Misi">
                    </div>
                </div>
            @else
                {{-- Empty State --}}
                <div class="text-center">
                    <img src="{{asset('Assets/Frontend/img/empty.svg')}}" 
                         class="img-fluid" 
                         alt="No Data" 
                         style="max-width: 300px;">
                    <p class="mt-4 text-muted">Belum ada data visi dan misi yang tersedia.</p>
                </div>
            @endif
        </div>
    @endsection
@endsection
