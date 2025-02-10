@extends('layouts.backend.app')

@section('title')
Penilaian
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

@php
$no = 1;
$tanggalSekarang = date('Y-m-d');
@endphp


<div class="content-wrapper container-xxl p-0">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2> Penilaian Mata Pelajaran</h2>
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
                                    <h4 class="card-title">Penilaian {{ ucwords($guruMengajar->mengajar) }} Hari Ini

                                        <div class="d-flex justify-content-center">

                                            @if($tanggalExport == $tanggalSekarang)
                                            <div class="row mr-1">
                                                <div class="col">
                                                    <a href="{{ url('exportPenilaianPerHariIni') }}">
                                                        <label for="fileInput" class="btn btn-success mt-1">
                                                            <img src="{{asset('Assets/Backend/images/excel.png')}}"
                                                                style="width:15px; margin-right:5px;">
                                                            Export
                                                            Data Hari Ini</label>
                                                    </a>
                                                </div>
                                            </div>
                                            @endif

                                            @if($tanggalExport)
                                            <div class="row">
                                                <div class="col">
                                                    <a href="{{ url('exportSemuaPenilaian') }}">
                                                        <label for="fileInput" class="btn btn-success mt-1">
                                                            <img src="{{asset('Assets/Backend/images/excel.png')}}"
                                                                style="width:15px; margin-right:5px;">
                                                            Export Semua
                                                            Data </label>
                                                    </a>
                                                </div>
                                            </div>
                                            @endif

                                        </div>
                                    </h4>

                                </div>
                                <div class="card-datatable table-responsive mt-2 ">
                                    <table class="table table-bordered" id="table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Kategori Tugas</th>
                                                <th>Nilai</th>
                                                <th>Keterangan</th>
                                                <th>Di Buat Pada</th>
                                                <th>Di Update Pada</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            @foreach ($penilaian as $item)

                                            @php
                                            $tanggalDiBuat = date('Y-m-d', strtotime($item->created_at));
                                            @endphp
                                            <tr class="text-center">
                                                <td>{{ $no++ }}</td>
                                                <td>{{ ucwords($item->name) }}</td>

                                                @if($tanggalDiBuat == $tanggalSekarang)
                                                <td>{{ $item->kategori }}</td>
                                                <td>{{ ($item->nilai != "" ? $item->nilai : '-') }}</td>
                                                <td>{{ ($item->keterangan != "" ? $item->keterangan : '-') }}</td>
                                                <td>{{ $item->created_at }}</td>
                                                <td>{{ $item->updated_at }}</td>

                                                @else
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                @endif

                                                <td>

                                                    @if($tanggalDiBuat == $tanggalSekarang)
                                                    <button type="button" class="btn btn-warning" data-toggle="modal"
                                                        data-target="#updatePenilaianModal"
                                                        onclick="btnUpdatePenilaianModal('{{ $item->id }}', '{{ $item->kategori }}', '{{ $item->nilai }}', '{{ $item->keterangan }}')">
                                                        Update Nilai
                                                    </button>

                                                    @else
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#penilaianModal"
                                                        onclick="btnPenilaianModal('{{ $item->id }}')">
                                                        Koreksi
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
    <div class="modal fade" id="penilaianModal" tabindex="-1" aria-labelledby="penilaianModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="penilaianModalLabel">Penilaian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="{{url('proses-tambah-penilaian')}}" method="post">
                        @csrf

                        <input type="hidden" name="murid_id" id="murid_id">

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="basicInput">Kategori Tugas</label> <span class="text-danger">*</span>
                                    <select name="kategori"
                                        class="form-control selectOption selectOption @error('kategori') is-invalid @enderror"
                                        required>
                                        <option value="" selected>- Pilih Kategori Tugas -</option>
                                        <option value="Tugas">Hadir</option>
                                        <option value="Ulangan Harian">Ulangan Harian</option>
                                        <option value="UTS">UTS</option>
                                        <option value="UAS">UAS</option>
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
                                    <label for="basicInput">Masukkan Nilai</label> <span class="text-danger">*</span>
                                    <input type="number" class="form-control mb-1 @error('nilai') is-invalid @enderror"
                                        name="nilai" value="{{old('nilai')}}" placeholder="Masukkan nilai"
                                        autocomplete="off" required />
                                    @error('keterangan')
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
    <div class="modal fade" id="updatePenilaianModal" tabindex="-1" aria-labelledby="updatePenilaianModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updatePenilaianModalLabel">Update Penilaian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="{{url('proses-update-penilaian')}}" method="post">
                        @csrf

                        <input type="hidden" name="murid_id_old" id="murid_id_old">

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="basicInput">Kategori Tugas</label> <span class="text-danger">*</span>
                                    <select name="kategori"
                                        class="form-control selectOption selectOption @error('kategori') is-invalid @enderror"
                                        required>

                                        <option value="Tugas" class="kategoriOption">Tugas</option>
                                        <option value="Ulangan Harian" class="kategoriOption">Ulangan Harian</option>
                                        <option value="UTS" class="kategoriOption">UTS</option>
                                        <option value="UAS" class="kategoriOption">UAS</option>
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
                                    <label for="basicInput">Masukkan Nilai</label> <span class="text-danger">*</span>
                                    <input type="number"
                                        class="form-control mb-1 nilai @error('nilai') is-invalid @enderror"
                                        name="nilai" value="{{old('nilai')}}" placeholder="Masukkan nilai"
                                        autocomplete="off" required />
                                    @error('keterangan')
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