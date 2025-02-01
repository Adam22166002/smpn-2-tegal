@extends('layouts.backend.app')

@section('title')
Edit Galeri
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
            <h2>Edit Foto Galeri</h2>
        </div>
    </div>

    <form action="{{ route('backend-gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $gallery->title }}" required>
        </div>
        @error('title')
        <div class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </div>
        @enderror

        <div class="mb-3">
            <label for="category" class="form-label">Kategori</label>
            <select class="form-control" id="category" name="category" required>
                <option value="akademik" {{ $gallery->category == 'Akademik' ? 'selected' : '' }}>Akademik</option>
                <option value="ekstrakurikuler" {{ $gallery->category == 'Ekstrakurikuler' ? 'selected' : ''
                    }}>Ekstrakurikuler</option>
                <option value="fasilitas" {{ $gallery->category == 'Fasilitas' ? 'selected' : '' }}>Fasilitas</option>
            </select>
        </div>
        @error('category')
        <div class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </div>
        @enderror

        <div class="mb-3">
            <label for="image" class="form-label">Pilih Gambar</label>
            <input type="file" class="form-control" id="image" name="image">
            <p style="color:red;">* Kosongkan jika tidak ingin mengupdate.</p>
        </div>
        @error('image')
        <div class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </div>
        @enderror

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="description" name="description">{{ $gallery->description }}</textarea>
        </div>
        @error('description')
        <div class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </div>
        @enderror

        <a href="{{ url('/backend-gallery') }}" class="btn btn-danger mr-2">Kembali</a>
        <button type="submit" class="btn btn-primary">Update Foto</button>
    </form>
</div>
@endsection