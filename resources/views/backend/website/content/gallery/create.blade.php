@extends('layouts.backend.app')

@section('title')
Tambah Galeri
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

<div class="container">
    <div class="row">
        <div class="col">
            <h2>Tambah Foto Galeri</h2>
        </div>
    </div>

    <form action="{{ route('backend-gallery.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        @error('title')
        <div class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </div>
        @enderror

        <div class="mb-3">
            <label for="category" class="form-label">Kategori</label>
            <select class="form-control" id="category" name="category" required>
                <option value="" selected>- Pilih Kategori -</option>
                <option value="akademik">Akademik</option>
                <option value="ekstrakurikuler">Ekstrakurikuler</option>
                <option value="fasilitas">Fasilitas</option>
            </select>
        </div>
        @error('category')
        <div class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </div>
        @enderror

        <div class="mb-3">
            <label for="image" class="form-label">Pilih Gambar</label>
            <input type="file" class="form-control" id="image" name="image" required>
        </div>
        @error('image')
        <div class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </div>
        @enderror

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        @error('description')
        <div class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </div>
        @enderror

        <a href="{{ url('/backend-gallery') }}" class="btn btn-danger mr-2">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan Foto</button>
    </form>
</div>
@endsection
