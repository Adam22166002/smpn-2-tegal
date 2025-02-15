@extends('layouts.backend.app')

@section('title')
    Edit Penghargaan
@endsection

@section('content')
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <h2>Edit Penghargaan</h2>
            </div>
        </div>

        <div class="content-body">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('backend-penghargaan.update', $penghargaan->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nama">Nama Penghargaan</label>
                            <input type="text" name="nama" value="{{ old('nama', $penghargaan->nama) }}" class="form-control @error('nama') is-invalid @enderror" id="nama">
                            @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label for="tahun">Tahun</label>
                            <input type="number" name="tahun" value="{{ old('tahun', $penghargaan->tahun) }}" class="form-control @error('tahun') is-invalid @enderror" id="tahun">
                            @error('tahun')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label for="penyelenggara">Penyelenggara</label>
                            <input type="text" name="penyelenggara" value="{{ old('penyelenggara', $penghargaan->penyelenggara) }}" class="form-control @error('penyelenggara') is-invalid @enderror" id="penyelenggara">
                            @error('penyelenggara')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi">{{ old('deskripsi', $penghargaan->deskripsi) }}</textarea>
                            @error('deskripsi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label for="image">Gambar</label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image">
                            <div class="mt-2">
                                <img src="{{ asset('storage/images/penghargaan/' . $penghargaan->image) }}" alt="Image" style="width: 100px;">
                            </div>
                            @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Perbarui</button>
                        <a href="{{ route('backend-penghargaan.index') }}" class="btn btn-warning">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
