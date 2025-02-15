@extends('layouts.Frontend.app')

@section('title')
    Penghargaan SMPN 2 Tegal
@endsection

@section('content')
@section('about')
    <div class="container py-5">
        <h2 class="text-center mb-4 font-weight-bold">Penghargaan</h2>
        @if ($penghargaan)
            <div class="row">
                @foreach ($penghargaan as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="card shadow border-0 mb-4">
                            <div class="card-body">
                            <h5 class="card-title">{{ $item->nama }}</h5>
                            <p class="card-text">{{ $item->deskripsi }}</p>
                            <p><strong>Tahun:</strong> {{ $item->tahun }}</p>
                            <p><strong>Penyelenggara:</strong> {{ $item->penyelenggara }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center">
                <img src="{{asset('Assets/Frontend/img/empty.svg')}}" class="img-fluid" alt="No Data">
                <p class="mt-4 text-muted">Belum ada data penghargaan yang tersedia.</p>
            </div>
        @endif
    </div>
@endsection
@endsection

