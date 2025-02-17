@extends('layouts.Frontend.app')
@section('title')
    Kegiatan {{$kegiatan->nama}}
@endsection

@section('content')
@section('about')

<div class="container-fluid" style="margin-top: 5rem; margin-bottom: 5rem;">
    <div class="container py-5">
        <!-- Tentang Kegiatan -->
        <div class="row g-5">
            <div class="col-lg-6 col-md-8 col-sm-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h2 class="h2 text-primary mb-4 ">Ekstrakurikuler {{$kegiatan->nama}}</h2>
                        <p class="lh-lg">{{$kegiatan->content}}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="position-relative">
                    <img src="{{asset('storage/images/kegiatan/' .$kegiatan->image)}}" 
                         class="img-fluid rounded-3 shadow-lg img-hover-scale" 
                         alt="{{$kegiatan->nama}}">
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="sidebar">
                    <div class="sidebar-box">
                        <div class="sidebar-box-inner">
                            <h3 class="sidebar-title">Semua Ekstrakurikuler</h3>
                            <div class="sidebar-latest-research-area">
                                <ul>
                                    @foreach ($kegiatanM as $item)
                                        <li class="mb-3">
                                            <div class="latest-research-img">
                                                <a href="{{url('kegiatan', $item->slug)}}">
                                                    <img src="{{asset('storage/images/kegiatan/' .$item->image)}}" 
                                                         class="img-fluid rounded shadow-sm" 
                                                         alt="{{$item->nama}}">
                                                </a>
                                            </div>
                                            <div class="latest-research-content mt-2">
                                                <p class="small text-primary mb-1">{{Carbon\Carbon::parse($item->created_at)->format('d M, Y')}}</p>
                                                <p class="text-2xl font-weight-bold p-2">{{$item->nama}}</p>
                                                <p class="small">{{ \Illuminate\Support\Str::limit($item->content, 40, '...') }}</p>
                                            </div>   
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<style>
    .img-hover-scale {
        transition: transform 0.3s ease-in-out;
    }
    .img-hover-scale:hover {
        transform: scale(1.02);
    }
</style>
@endsection
@endsection
