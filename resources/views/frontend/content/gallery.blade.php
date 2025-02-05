@extends('layouts.Frontend.app')
@section('title')
Gallery
@endsection
@section('content')
    @section('about')
    <div class="header">
        <h2>Gallery<span class="text-primary"> SMPN 2 Tegal</span></h2>
        <p class="mb-0">Dokumentasi kegiatan-kegiatan di sekolah kami</p>
    </div>
    <div class="gallery">
        @foreach ($galleries as $galleri)
        <div class="gallery-item">
            <img src="{{ asset('storage/images/galeri/' . $galleri->image) }}" alt="{{ $galleri->title }}">
            <div class="overlay">
                <h3>{{ $galleri->title }}</h3>
                <p>{{ $galleri->categori }}</p>
            </div>
        </div>
        @endforeach
    </div>
    @endsection
@endsection
