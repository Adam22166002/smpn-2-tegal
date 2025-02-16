@extends('layouts.backend.app')

@section('title', 'Pembiasaan Siswa')

@section('content')
<div class="container">
    <h2 class="mb-4">Daftar Pembiasaan Siswa</h2>

    <!-- Button to trigger the modal -->
    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#addPembiasaanModal">Tambah Pembiasaan Siswa</button>

    <table class="table">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($pembiasaanSiswa as $item)
            <tr>
                <td>{{ $item->judul }}</td>
                <td>{{ $item->deskripsi }}</td>
                <td>
                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editPembiasaanModal{{ $item->id }}">Edit</button>
                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deletePembiasaanModal{{ $item->id }}">Hapus</button>
                </td>
            </tr>

                <!-- Delete Modal -->
                <div class="modal fade" id="deletePembiasaanModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="deletePembiasaanModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deletePembiasaanModalLabel">Hapus Pembiasaan Siswa</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Apakah Anda yakin ingin menghapus Pembiasaan Siswa ini?
                            </div>
                            <div class="modal-footer">
                                <form action="{{ route('backend-pembiasaan.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Edit Pembiasaan Siswa -->
                <div class="modal fade" id="editPembiasaanModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="editPembiasaanModalLabel{{ $item->id }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editPembiasaanModalLabel{{ $item->id }}">Edit Pembiasaan Siswa</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('backend-pembiasaan.update', $item->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="judul">Judul</label>
                                        <input type="text" class="form-control" name="judul" id="judul" value="{{ $item->judul }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="deskripsi">Deskripsi</label>
                                        <textarea class="form-control" name="deskripsi" id="deskripsi" required>{{ $item->deskripsi }}</textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal Tambah Pembiasaan Siswa -->
<div class="modal fade" id="addPembiasaanModal" tabindex="-1" role="dialog" aria-labelledby="addPembiasaanModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPembiasaanModalLabel">Tambah Pembiasaan Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('backend-pembiasaan.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" name="judul" id="judul" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
