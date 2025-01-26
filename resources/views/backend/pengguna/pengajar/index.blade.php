@extends('layouts.backend.app')

@section('title')
Pengajar
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
                <section>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h4 class="card-title">Pengajar <a
                                            href=" {{route('backend-pengguna-pengajar.create')}} "
                                            class="btn btn-primary">Tambah</a> </h4>
                                </div>
                                <div class="card-datatable">
                                    <table class="dt-responsive table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>No</th>
                                                <th>Nama Pengajar</th>
                                                <th>Mata Pelajaran</th>
                                                <th>NIP</th>
                                                <th>Email Pengajar</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @php
                                            $no = 1;
                                            @endphp

                                            @foreach ($pengajar as $guru)
                                            @if ($guru->userDetail)
                                            <tr>
                                                <td></td>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $guru->name }}</td>
                                                <td>{{ $guru->userDetail->mengajar }}</td>
                                                <td>{{ $guru->userDetail->nip }}</td>
                                                <td>{{ $guru->email }}</td>
                                                <td>{{ $guru->status == 'Aktif' ? 'Aktif' : 'Tidak Aktif' }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="{{ route('backend-pengguna-pengajar.edit', $guru->id) }}"
                                                            class="btn btn-success btn-sm mr-2">Edit</a>

                                                        <form
                                                            action="{{ route('backend-pengguna-pengajar.destroy', $guru->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Apakah Anda yakin ingin menghapus pengajar ini?')">
                                                                <i class="bi bi-trash-fill"></i> Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
@endsection