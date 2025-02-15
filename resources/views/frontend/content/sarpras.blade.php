@extends('layouts.Frontend.app')

@section('title')
    Sarana dan Prasarana SMPN 2 Tegal
@endsection

@section('content')
@section('about')
    <div class="container py-5">
        <h2 class="text-center mb-4 font-weight-bold">Sarana dan Prasarana</h2>
        @if ($sarpras->count() > 0)
            <div class="row">
                @foreach ($sarpras as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="card shadow border-0 mb-4">
                            <img src="{{ asset('storage/images/sarpras/' . $item->image) }}" class="card-img-top" alt="{{ $item->nama }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->nama }}</h5>
                                <p class="card-text">{{ $item->deskripsi }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center">
                <img src="{{ asset('Assets/Frontend/img/empty.svg') }}" class="img-fluid" alt="No Data">
                <p class="mt-4 text-muted">Belum ada data sarana dan prasarana yang tersedia.</p>
            </div>
        @endif
    </div>
@endsection
@endsection

