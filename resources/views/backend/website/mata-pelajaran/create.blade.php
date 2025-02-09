@extends('layouts.backend.app')

@section('title')
Tambah Mata Pelajaran
@endsection

@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success" role="alert">
    <div class="alert-body">
        <strong>{{ $message }}</strong>
        <button type="button" class="close" data-dismiss="alert">×</button>
    </div>
</div>
@elseif($message = Session::get('error'))
<div class="alert alert-danger" role="alert">
    <div class="alert-body">
        <strong>{{ $message }}</strong>
        <button type="button" class="close" data-dismiss="alert">×</button>
    </div>
</div>
@endif
<div class="content-wrapper container-xxl p-0">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2> Mata Pelajaran</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header header-bottom">
                        <h4>Tambah Mata Pelajaran</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('backend-mata-pelajaran.store')}}" method="post">
                            @csrf

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Nama Mata Pelajaran</label> <span
                                            class="text-danger">*</span>
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                            name="nama" value="{{ old('nama') }}"
                                            placeholder="Masukkan nama mata pelajaran" required />
                                        @error('nama')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Waktu Masuk</label> <span class="text-danger">*</span>
                                        <input type="time"
                                            class="form-control @error('waktu_masuk') is-invalid @enderror"
                                            name="waktu_masuk" value="{{ old('waktu_masuk') }}" required />
                                        @error('waktu_masuk')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Kode Mata Pelajaran</label> <span
                                            class="text-danger">*</span>
                                        <input type="text" class="form-control @error('kode') is-invalid @enderror"
                                            name="kode" value="{{ old('kode') }}"
                                            placeholder="Masukkan kode mata pelajaran" />
                                        @error('kode')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Waktu Selesai</label> <span class="text-danger">*</span>
                                        <input type="time"
                                            class="form-control @error('waktu_selesai') is-invalid @enderror"
                                            name="waktu_selesai" value="{{ old('waktu_selesai') }}" required />
                                        @error('waktu_selesai')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mt-2">
                                <button class="btn btn-primary mr-1" type="submit">Simpan</button>
                                <a href="{{route('backend-mata-pelajaran.index')}}" class="btn btn-warning">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection