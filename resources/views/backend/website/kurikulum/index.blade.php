@extends('layouts.backend.app')

@section('title', 'Kurikulum Sekolah')

@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success" role="alert">
    <div class="alert-body">
        <strong>{{ $message }}</strong>
        <button type="button" class="close" data-dismiss="alert">×</button>
    </div>
</div>
@endif

<div class="container">
    <h2 class="mb-4">Kurikulum SMPN 2 Tegal</h2>

    @if ($kurikulum == NULL)
    <form action="{{ route('backend-kurikulum.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header">
                <h4>Tambah Kurikulum</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="judul">Judul Kurikulum</label>
                            <input type="text" name="judul" class="form-control" value="{{ old('judul') }}" required>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" rows="5" required>{{ old('deskripsi') }}</textarea>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label for="dokumen">Dokumen Kurikulum</label>
                            <input type="file" name="dokumen" class="form-control" accept=".pdf,.docx">
                            <small class="text-danger">Kosongkan jika tidak ingin mengubah dokumen.</small>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Tambah Kurikulum</button>
                    <a href="{{ route('backend-kurikulum.index') }}" class="btn btn-warning">Batal</a>
                </div>
            </div>
        </div>
    </form>
    @else
    <form action="{{ route('backend-kurikulum.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header">
                <h4>Perbarui Kurikulum</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="judul">Judul Kurikulum</label>
                            <input type="text" name="judul" class="form-control" value="{{ $kurikulum->judul }}" required>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="dokumen">Dokumen Kurikulum</label>
                            <input type="file" name="dokumen" class="form-control" accept=".pdf,.docx">
                            <small class="text-danger">Kosongkan jika tidak ingin mengubah dokumen.</small>
                        </div>
                        @if ($kurikulum->dokumen)
                        <div class="mt-2">
                            <a href="{{ asset('storage/' . str_replace('public/', '', $kurikulum->dokumen)) }}" target="_blank">
                                Lihat Dokumen
                            </a>
                        </div>
                        @endif
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" rows="5" required>{{ $kurikulum->deskripsi }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Perbarui Kurikulum</button>
                    <a href="{{ route('backend-kurikulum.index') }}" class="btn btn-warning">Batal</a>
                </div>
            </div>
        </div>
    </form>
    @endif
</div>

@endsection
