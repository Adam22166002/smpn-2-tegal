@extends('layouts.backend.app')

@section('title')
Tambah Pengajar
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
                    <h2> Pengajar</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header header-bottom">
                        <h4>Tambah Pengajar</h4>
                    </div>

                    <div class="card-body">
                        <form action=" {{route('backend-pengguna-pengajar.store')}} " method="post"
                            enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="kelas" class="kelasValue">
                            <button type="button" class="btn btn-dark mb-2" data-toggle="modal"
                                data-target="#pilihKelas">Pilih Kelas</button>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Nama Pengajar</label> <span class="text-danger">*</span>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" value="{{old('name')}}" placeholder="Nama" autocomplete="off"
                                            required />
                                        @error('name')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Mata Pelajaran</label> <span
                                            class="text-danger">*</span>
                                        <select name="mengajar"
                                            class="form-control @error('mengajar') is-invalid @enderror" required>
                                            <option value="">-- Pilih --</option>
                                            <option value="Matematika">Matematika</option>
                                            <option value="Bahasa Inggris">Bahasa Inggris</option>
                                            <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                                        </select>
                                        @error('mengajar')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">NIP</label> <span class="text-danger">*</span>
                                        <input type="number" class="form-control @error('nip') is-invalid @enderror"
                                            name="nip" value="{{old('nip')}}" placeholder="NIP" autocomplete="off"
                                            required />
                                        @error('nip')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Foto Profile</label> <span class="text-danger">*</span>
                                        <input type="file"
                                            class="form-control @error('foto_profile') is-invalid @enderror"
                                            name="foto_profile" required />
                                        @error('foto_profile')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Email</label> <span class="text-danger">*</span>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{old('email')}}" placeholder="Email" autocomplete="off"
                                            required />
                                        @error('email')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Mengajar Kelas</label> <span
                                            class="text-danger">*</span>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="kelas-ke">
                                                    {{ old('kelas') }}
                                                    -
                                                </span>
                                            </div>
                                            <input type="text"
                                                class="form-control @error('nama_kelas') is-invalid @enderror"
                                                name="nama_kelas" value="{{ old('nama_kelas') }}" id="nama_kelas"
                                                placeholder="Kelas" autocomplete="off" readonly />
                                        </div>

                                        @error('nama_kelas')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mt-2">
                                <button class="btn btn-primary mr-2" type="submit">Tambah</button>
                                <a href="{{route('backend-pengguna-pengajar.index')}}" class="btn btn-warning">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade pilihKelas" id="pilihKelas" tabindex="-1" aria-labelledby="pilihKelasLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pilihKelasLabel">Pilih Kelas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="card-datatable">
                    <table class="table table-bordered" id="table">
                        <thead>
                            <tr>
                                <th>Kelas</th>
                                <th>Nama Kelas</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($kelas as $item)
                            <tr>
                                <td>{{ $item->kelas }}</td>
                                <td>{{ $item->nama_kelas }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary btnPilihKelas"
                                        onclick="pilihKelas('{{ $item->kelas }}', '{{ $item->nama_kelas }}')">Pilih</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection