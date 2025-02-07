@extends('layouts.backend.app')

@section('title')
Absensi
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
                    <h2> Absensi Hari Ini</h2>
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
                                    <h4 class="card-title">Absensi </h4>
                                </div>
                                <div class="card-datatable table-responsive mt-2 ">
                                    <table class="table table-bordered" id="table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Status Kehadiran</th>
                                                <th>Keterangan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            @php
                                            $no = 1;
                                            $date = date('Y-m-d');
                                            @endphp

                                            @foreach ($absensi as $item)
                                            <tr class="text-center">
                                                <td>{{ $no++ }}</td>
                                                <td>{{ ucwords($item->name) }}</td>

                                                @if($item->tanggal == $date)
                                                <td>{{ ($item->status != "" ? $item->status : '-') }}</td>
                                                <td>{{ ($item->keterangan != "" ? $item->keterangan : '-') }}</td>

                                                @else
                                                <td>-</td>
                                                <td>-</td>
                                                @endif

                                                <td>

                                                    @if($item->tanggal == $date)
                                                    <button type="button" class="btn btn-warning" data-toggle="modal"
                                                        data-target="#updateAbsenModal"
                                                        onclick="btnUpdateAbsenModal('{{ $item->id }}', '{{ $item->status }}', '{{ $item->keterangan }}')">
                                                        Update Absen
                                                    </button>

                                                    @else
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#absenModal"
                                                        onclick="btnAbsenModal('{{ $item->id }}')">
                                                        Absen
                                                    </button>
                                                    @endif

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

    <!-- Modal Tambah -->
    <div class="modal fade" id="absenModal" tabindex="-1" aria-labelledby="absenModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="absenModalLabel">Kehadiran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="{{url('proses-tambah-absensi')}}" method="post">
                        @csrf

                        <input type="hidden" name="murid_id" id="murid_id">

                        <div class="row mb-1">
                            <div class="col">
                                <div class="form-group">
                                    <label for="basicInput">Kehadiran Murid</label> <span class="text-danger">*</span>
                                    <select name="status" class="form-control @error('status') is-invalid @enderror"
                                        required>
                                        <option value="Hadir">Hadir</option>
                                        <option value="Sakit">Sakit</option>
                                        <option value="Izin">Izin</option>
                                        <option value="Alpha">Alpha</option>
                                    </select>

                                    @error('status')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="basicInput">Keterangan</label> <span class="text-danger">*</span>
                                    <input type="text"
                                        class="form-control mb-1 @error('keterangan') is-invalid @enderror"
                                        name="keterangan" value="{{old('keterangan')}}"
                                        placeholder="Masukkan keterangan" autocomplete="off" />
                                    <i>* Boleh di kosongkan.</i>
                                    @error('keterangan')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary ml-1">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Update -->
    <div class="modal fade" id="updateAbsenModal" tabindex="-1" aria-labelledby="updateAbsenModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateAbsenModalLabel">Update Kehadiran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="{{url('proses-update-absensi')}}" method="post">
                        @csrf

                        <input type="hidden" name="murid_id_old" id="murid_id_old">

                        <div class="row mb-1">
                            <div class="col">
                                <div class="form-group">
                                    <label for="basicInput">Kehadiran Murid</label> <span class="text-danger">*</span>
                                    <select name="status"
                                        class="form-control selectOption selectOption @error('status') is-invalid @enderror"
                                        required>
                                        <option value="Hadir" class="statusOption">Hadir</option>
                                        <option value="Sakit" class="statusOption">Sakit</option>
                                        <option value="Izin" class="statusOption">Izin</option>
                                        <option value="Alpha" class="statusOption">Alpha</option>
                                    </select>

                                    @error('status')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="basicInput">Keterangan</label> <span class="text-danger">*</span>
                                    <input type="text"
                                        class="form-control keterangan mb-1 @error('keterangan') is-invalid @enderror"
                                        name="keterangan" value="{{old('keterangan')}}"
                                        placeholder="Masukkan keterangan" autocomplete="off" />
                                    <i>* Boleh di kosongkan.</i>
                                    @error('keterangan')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary ml-1">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection