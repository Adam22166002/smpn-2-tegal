@extends('layouts.backend.app')

@section('title', 'Kegiatan Siswa')

@section('content')
<div class="container">
    <h2 class="mb-4">Kegiatan Siswa</h2>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#createKegiatanModal">
        Tambah Kegiatan
    </button>

    <table class="table">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Tanggal</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kegiatan as $item)
                <tr>
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->deskripsi }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                    <td><img src="{{ asset('storage/' . $item->gambar) }}" width="100"></td>
                    <td>
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#editKegiatanModal" 
                                data-id="{{ $item->id }}" data-judul="{{ $item->judul }}" data-deskripsi="{{ $item->deskripsi }}" 
                                data-tanggal="{{ $item->tanggal }}" data-gambar="{{ asset('storage/' . $item->gambar) }}">
                            Edit
                        </button>
                        <form action="{{ route('backend-kegiatan-siswa.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Create Modal -->
<div class="modal fade" id="createKegiatanModal" tabindex="-1" role="dialog" aria-labelledby="createKegiatanModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createKegiatanModalLabel">Tambah Kegiatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('backend-kegiatan-siswa.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <input type="file" class="form-control" id="gambar" name="gambar" required>
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
<div class="modal fade" id="editKegiatanModal" tabindex="-1" role="dialog" aria-labelledby="editKegiatanModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editKegiatanModalLabel">Edit Kegiatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" method="POST" enctype="multipart/form-data" id="editForm">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <input type="hidden" id="edit_id" name="id">
                    <div class="form-group">
                        <label for="edit_judul">Judul</label>
                        <input type="text" class="form-control" id="edit_judul" name="judul" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_deskripsi">Deskripsi</label>
                        <textarea class="form-control" id="edit_deskripsi" name="deskripsi" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="edit_tanggal">Tanggal</label>
                        <input type="date" class="form-control" id="edit_tanggal" name="tanggal" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_gambar">Gambar</label>
                        <input type="file" class="form-control" id="edit_gambar" name="gambar">
                        <img id="edit_gambar_preview" src="" alt="Current Image" width="100" class="mt-2">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    $('#editKegiatanModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var judul = button.data('judul');
        var deskripsi = button.data('deskripsi');
        var tanggal = button.data('tanggal');
        var gambar = button.data('gambar');
        
        var modal = $(this);
        modal.find('#edit_id').val(id);
        modal.find('#edit_judul').val(judul);
        modal.find('#edit_deskripsi').val(deskripsi);
        modal.find('#edit_tanggal').val(tanggal);
        modal.find('#edit_gambar_preview').attr('src', gambar);
        modal.find('form').attr('action', '/backend-kegiatan-siswa/' + id);
    });
</script>
@endsection
