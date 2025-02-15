@extends('layouts.backend.app')

@section('title')
    Tambah Penghargaan
@endsection

@section('content')
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <h2>Tambah Penghargaan</h2>
            </div>
        </div>

        <div class="content-body">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('backend-penghargaan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama Penghargaan</label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama">
                            @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label for="tahun">Tahun</label>
                            <input type="number" name="tahun" class="form-control @error('tahun') is-invalid @enderror" id="tahun">
                            @error('tahun')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label for="penyelenggara">Penyelenggara</label>
                            <input type="text" name="penyelenggara" class="form-control @error('penyelenggara') is-invalid @enderror" id="penyelenggara">
                            @error('penyelenggara')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi"></textarea>
                            @error('deskripsi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label for="image">Gambar</label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image">
                            @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('backend-penghargaan.index') }}" class="btn btn-warning">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
