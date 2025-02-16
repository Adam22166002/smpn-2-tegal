@extends('layouts.backend.app')

@section('title', 'Info ATS, AAS, ANBK, Dll')

@section('content')
<div class="container">
    <h2 class="mb-4">Daftar Pengumuman</h2>

    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#addInformasiModal">Tambah Pengumuman</button>

    <table class="table">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($informasi as $item)
                <tr>
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->kategori }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                    <td>
                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editInformasiModal{{ $item->id }}">Edit</button>
                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteInformasiModal{{ $item->id }}">Hapus</button>
                    </td>
                </tr>

                <!-- Modal Hapus -->
                <div class="modal fade" id="deleteInformasiModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteInformasiModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteInformasiModalLabel">Hapus Pengumuman</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Apakah Anda yakin ingin menghapus pengumuman ini?
                            </div>
                            <div class="modal-footer">
                                <form action="{{ route('backend-informasi.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Edit -->
                <div class="modal fade" id="editInformasiModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="editInformasiModalLabel{{ $item->id }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editInformasiModalLabel{{ $item->id }}">Edit Pengumuman</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('backend-informasi.update', $item->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="judul">Judul</label>
                                        <input type="text" class="form-control" name="judul" id="judul" value="{{ $item->judul }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="kategori">Kategori</label>
                                        <select class="form-control" name="kategori" id="kategori" required>
                                            <option value="ATS" {{ $item->kategori == 'ATS' ? 'selected' : '' }}>ATS</option>
                                            <option value="AAS" {{ $item->kategori == 'AAS' ? 'selected' : '' }}>AAS</option>
                                            <option value="ANBK" {{ $item->kategori == 'ANBK' ? 'selected' : '' }}>ANBK</option>
                                            <option value="Lainnya" {{ $item->kategori == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                        </select>
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

<!-- Modal Tambah Pengumuman -->
<div class="modal fade" id="addInformasiModal" tabindex="-1" role="dialog" aria-labelledby="addInformasiModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addInformasiModalLabel">Tambah Pengumuman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('backend-informasi.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                    <label for="judul">Judul</label>
<input type="text" class="form-control" name="judul" id="judul" required>
</div>
<div class="form-group">
    <label for="kategori">Kategori</label>
    <select class="form-control" name="kategori" id="kategori" required>
        <option value="ATS">ATS</option>
        <option value="AAS">AAS</option>
        <option value="ANBK">ANBK</option>
        <option value="Lainnya">Lainnya</option>
    </select>
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
