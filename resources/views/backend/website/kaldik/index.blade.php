@extends('layouts.backend.app')

@section('title', 'Kalender Pendidikan')

@section('content')
<div class="container">
    <h2 class="mb-4">Daftar Kalender Pendidikan</h2>
    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#addKaldikModal">Tambah Kegiatan</button>

    <table class="table">
        <thead>
            <tr>
                <th>Nama Kegiatan</th>
                <th>Tanggal</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kaldik as $item)
                <tr>
                    <td>{{ $item->nama_kegiatan }}</td>
                    <td>{{ $item->tanggal->format('d-m-Y') }}</td>
                    <td>{{ $item->deskripsi }}</td>
                    <td>
                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editKaldikModal{{ $item->id}}">Edit</button>
                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteKaldikModal{{ $item->id }}">Hapus</button>
                    </td>
                </tr>

                <!-- Delete Modal -->
                <div class="modal fade" id="deleteKaldikModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteKaldikModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteKaldikModalLabel">Hapus Kegiatan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Apakah Anda yakin ingin menghapus kegiatan ini?
                            </div>
                            <div class="modal-footer">
                                <form action="{{ route('backend-kaldik.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="editKaldikModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="editKaldikModalLabel{{ $item->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editKaldikModalLabel{{ $item->id }}">Edit Kegiatan Kaldik</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('backend-kaldik.update', $item->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_kegiatan">Nama Kegiatan</label>
                            <input type="text" class="form-control" name="nama_kegiatan" id="nama_kegiatan" value="{{ $item->nama_kegiatan }}" required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control" name="tanggal" id="tanggal" value="{{ $item->tanggal->format('Y-m-d') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" id="deskripsi">{{ $item->deskripsi }}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal Tambah Kegiatan Kaldik -->
<div class="modal fade" id="addKaldikModal" tabindex="-1" role="dialog" aria-labelledby="addKaldikModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addKaldikModalLabel">Tambah Kegiatan Kaldik</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('backend-kaldik.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_kegiatan">Nama Kegiatan</label>
                        <input type="text" class="form-control" name="nama_kegiatan" id="nama_kegiatan" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" id="tanggal" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
