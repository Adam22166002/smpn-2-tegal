@extends('layouts.frontend.app')

@section('title', 'Informasi Kurikulum')

@section('content')
@section('about')
<div class="container my-5">
    <h1 class="my-4 text-center">Informasi Kurikulum Sekolah</h1>
    
    @if($kurikulums->isEmpty())
        <p class="text-center">Tidak ada informasi kurikulum yang tersedia saat ini.</p>
    @else
        @foreach ($kurikulums as $kurikulum)
            <div class="kurikulum-item mb-4 p-4 bg-light rounded shadow-sm">
                <h2 class="text-primary">{{ $kurikulum->judul }}</h2>
                
                <div class="kurikulum-description mb-3">
                    <p>{{ $kurikulum->deskripsi }}</p>
                </div>
                
                @if ($kurikulum->dokumen)
                    <div class="kurikulum-dokumen mt-3">
                        <a href="{{ asset('storage/' . str_replace('public/', '', $kurikulum->dokumen)) }}" download class="btn btn-outline-primary">
                            <i class="fas fa-download"></i> Unduh Kurikulum (PDF)
                        </a>
                    </div>
                @endif
            </div>
        @endforeach
    @endif
</div>
@endsection
@endsection

