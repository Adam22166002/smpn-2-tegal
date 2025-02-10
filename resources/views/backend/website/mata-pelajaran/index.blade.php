@extends('layouts.backend.app')

@section('title')
Mata Pelajaran
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
                    <h2> Daftar Mata Pelajaran</h2>
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
                                <div
                                    class="card-header border-bottom d-flex justify-content-between align-items-center">
                                    <h4 class="card-title mb-0">Mata Pelajaran</h4>

                                    <div class="d-flex align-items-center mt-1 mb-1">
                                        <a href="{{ route('backend-mata-pelajaran.create') }}"
                                            class="btn btn-primary mr-2">Tambah</a>

                                        <form id="importForm" action="{{ url('importExcelMataPelajaran') }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <label for="fileInput" class="btn btn-success d-inline">
                                                <img src="{{ asset('Assets/Backend/images/excel.png') }}"
                                                    style="width:15px; margin-right:5px;">
                                                Import Excel
                                            </label>
                                            <input type="file" name="file" id="fileInput" class="d-none" required>
                                        </form>
                                    </div>
                                </div>

                                <div class="card-datatable">
                                    <table class="dt-responsive table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Kode Mata Pelajaran</th>
                                                <th>Waktu Masuk</th>
                                                <th>Waktu Selesai</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            @php
                                            $no = 1;
                                            @endphp

                                            @foreach($mata_pelajaran as $item)
                                            <tr>
                                                <td></td>
                                                <td> {{ $no++ }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td> {{ $item->kode}} </td>
                                                <td> {{ \Carbon\Carbon::parse($item->waktu_masuk)->format('H:i') }}
                                                </td>
                                                <td> {{ \Carbon\Carbon::parse($item->waktu_selesai)->format('H:i') }}
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="{{ route('backend-mata-pelajaran.edit', $item->id) }}"
                                                            class="btn btn-success btn-sm mr-2">Edit</a>

                                                        <form
                                                            action="{{ route('backend-mata-pelajaran.destroy', $item->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Apakah Anda yakin ingin menghapus mata pelajaran ini?')">
                                                                <i class="bi bi-trash-fill"></i> Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
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