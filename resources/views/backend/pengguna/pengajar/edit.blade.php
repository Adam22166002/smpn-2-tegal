@extends('layouts.backend.app')

@section('title')
Edit Pengajar
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
                        <h4>Edit Pengajar</h4>
                    </div>
                    <div class="card-body">
                        <form action=" {{route('backend-pengguna-pengajar.update', $pengajar->id)}} " method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Nama Pengajar</label> <span class="text-danger">*</span>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" value="{{$pengajar->name}}" placeholder="Nama" />
                                        @error('name')
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
                                            name="email" value="{{$pengajar->email}}" placeholder="Email" />
                                        @error('email')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Mengajar</label> <span class="text-danger">*</span>
                                        <select name="mengajar"
                                            class="form-control @error('mengajar') is-invalid @enderror">
                                            <option value="">-- Pilih --</option>

                                            <option value="Matematika" {{$pengajar->userDetail->mengajar == 'Matematika'
                                                ? 'selected' : ''}} >Matematika</option>

                                            <option value="Bahasa Inggris" {{$pengajar->userDetail->mengajar == 'Bahasa
                                                Inggris'
                                                ? 'selected' : ''}} >Bahasa Inggris</option>
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
                                            name="nip" value="{{$pengajar->userDetail->nip}}" placeholder="NIP" />
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
                                            name="foto_profile" />
                                        <small class="text-danger">Kosongkan jika tidak ingin mengubah.</small>
                                        @error('foto_profile')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Status</label> <span class="text-danger">*</span>
                                        <select name="status"
                                            class="form-control @error('status') is-invalid @enderror">
                                            <option value="Aktif" {{$pengajar->status == 'Aktif' ? 'selected' : ''}}
                                                >Aktif</option>
                                            <option value="Tidak Aktif" {{$pengajar->status == 'Tidak Aktif' ?
                                                'selected' : ''}} >Tidak Aktif</option>
                                        </select>
                                        @error('status')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <button class="btn btn-primary mr-1" type="submit">Update</button>
                            <a href="{{route('backend-pengguna-pengajar.index')}}" class="btn btn-warning">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection