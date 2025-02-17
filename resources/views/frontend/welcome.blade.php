@extends('layouts.Frontend.app')
@section('title')
    SMPN 2 Tegal
@endsection

@section('content')

{{-- About --}}
    @section('about')
        @include('frontend.content.about')
    @endsection
    
    {{-- Slider --}}
    @section('slider')
        @include('frontend.content.slider')
    @endsection

    {{-- Guru --}}
    @section('guru')
        @include('frontend.content.guru')
    @endsection


     {{-- Berita & Event --}}
     @section('beritaEvent')
        @include('frontend.content.beritaEvent')
    @endsection
@endsection