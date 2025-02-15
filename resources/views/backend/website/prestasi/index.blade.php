@extends('layouts.backend.app')

@section('title', 'Prestasi Siswa')

@section('content')
<div class="container">
    <h2 class="mb-4">Prestasi Siswa</h2>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#createPrestasiModal">
        Tambah Prestasi
    </button>

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Prestasi</th>
                <th>Deskripsi</th>
                <th>Tingkat</th>
                <th>Gambar</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @foreach($prestasi as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->nama_siswa }}</td>
                    <td>{{ $item->prestasi }}</td>
                    <td>{{ $item->deskripsi }}</td>
                    <td>{{ ucfirst($item->tingkat) }}</td>
                    <td><img src="{{ asset('storage/' . $item->gambar) }}" width="70"></td>
                    <td>{{ $item->tanggal }}</td>
                    <td>
                        <button type="button" class="btn btn-success btn-sm edit-prestasi" data-toggle="modal" data-target="#editPrestasiModal" 
                                data-id="{{ $item->id }}" data-nama="{{ $item->nama_siswa }}" data-prestasi="{{ $item->prestasi }}"
                                data-deskripsi="{{ $item->deskripsi }}" data-tingkat="{{ $item->tingkat }}" 
                                data-image="{{ asset('storage/' . $item->gambar) }}">
                            Edit
                        </button>
                        <form action="{{ route('backend-prestasi.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Create Modal -->
<div class="modal fade" id="createPrestasiModal" tabindex="-1" role="dialog" aria-labelledby="createPrestasiModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createPrestasiModalLabel">Tambah Prestasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('backend-prestasi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_siswa">Nama Siswa</label>
                        <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" required>
                    </div>
                    <div class="form-group">
                        <label for="prestasi">Prestasi</label>
                        <input type="text" class="form-control" id="prestasi" name="prestasi" required>
                    </div>
                    <div class="form-group">
                        <label for="tingkat">Tingkat</label>
                        <select class="form-control" id="tingkat" name="tingkat" required>
                            <option value="Sekolah">Sekolah</option>
                            <option value="Kabupaten">Kabupaten</option>
                            <option value="Provinsi">Provinsi</option>
                            <option value="Nasional">Nasional</option>
                            <option value="Internasional">Internasional</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <input type="file" class="form-control" id="gambar" name="gambar">
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editPrestasiModal" tabindex="-1" role="dialog" aria-labelledby="editPrestasiModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPrestasiModalLabel">Edit Prestasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('backend-prestasi.update', 'id') }}" id="editForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <input type="hidden" id="edit_id" name="id">
                    <div class="form-group">
                        <label for="edit_nama_siswa">Nama Siswa</label>
                        <input type="text" class="form-control" id="edit_nama_siswa" name="nama_siswa" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_prestasi">Prestasi</label>
                        <input type="text" class="form-control" id="edit_prestasi" name="prestasi" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_tingkat">Tingkat</label>
                        <input type="text" class="form-control" id="edit_tingkat" name="tingkat" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_deskripsi">Deskripsi</label>
                        <textarea class="form-control" id="edit_deskripsi" name="deskripsi"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="edit_gambar">Gambar</label>
                        <input type="file" class="form-control" id="edit_gambar" name="gambar">
                        <img id="edit_image_preview" src="" width="100" class="mt-2">
                    </div>
                    <div class="form-group">
                        <label for="edit_tanggal">Tanggal</label>
                        <input type="date" class="form-control" id="edit_tanggal" name="tanggal" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
