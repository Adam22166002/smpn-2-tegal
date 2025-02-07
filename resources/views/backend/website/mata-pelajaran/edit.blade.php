@extends('layouts.backend.app')

@section('title')
Edit Mata Pelajaran
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
                        <h4>Edit Mata Pelajaran</h4>
                    </div>
                    <div class="card-body">
                        <form action=" {{route('backend-mata-pelajaran.update', $mata_pelajaran->id)}} " method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Nama Mata Pelajaran</label> <span
                                            class="text-danger">*</span>
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                            name="nama" value="{{ $mata_pelajaran->nama }}" />
                                        @error('nama')
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
                                            name="kode" value="{{ $mata_pelajaran->kode }}" />
                                        @error('kode')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mt-2">
                                <button class="btn btn-primary mr-1" type="submit">Update</button>
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