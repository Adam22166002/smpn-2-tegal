@extends('layouts.backend.app')

@section('title')
Edit Kelas
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
                    <h2> Kelas</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header header-bottom">
                        <h4>Edit Kelas</h4>
                    </div>
                    <div class="card-body">
                        <form action=" {{route('backend-kelas.update', $kelas->id)}} " method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Kelas</label> <span class="text-danger">*</span>
                                        <select name="kelas" class="form-control @error('kelas') is-invalid @enderror">
                                            <option value="7" {{ ($kelas->kelas == "7" ? "selected" : "") }}>Kelas 7
                                            </option>
                                            <option value="8" {{ ($kelas->kelas == "8" ? "selected" : "") }}>Kelas 8
                                            </option>
                                            <option value="9" {{ ($kelas->kelas == "9" ? "selected" : "") }}>Kelas 9
                                            </option>
                                        </select>

                                        @error('kelas')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Nama Kelas</label> <span class="text-danger">*</span>
                                        <input type="text"
                                            class="form-control @error('nama_kelas') is-invalid @enderror"
                                            name="nama_kelas" value="{{ $kelas->nama_kelas }}"
                                            placeholder="Contoh: Kelas A, Kelas B, Kelas C" />
                                        @error('nama_kelas')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-primary mr-1" type="submit">Update</button>
                            <a href="{{route('backend-kelas.index')}}" class="btn btn-warning">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection