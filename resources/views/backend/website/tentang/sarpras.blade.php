@extends('layouts.backend.app')

@section('title')
Sarana dan Prasarana
@endsection

@section('content')
<div class="container">
    <h2 class="mb-4">Sarana dan Prasarana</h2>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Button to trigger Create Modal -->
    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#createModal">
        Tambah Sarana dan Prasarana
    </button>

    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Image</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sarpras as $item)
                <tr>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->deskripsi }}</td>
                    <td><img src="{{ asset('storage/images/sarpras/' . $item->image) }}" width="100" alt="Image"></td>
                    <td>
                        <!-- Edit Button to open Modal -->
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editModal" 
                                data-id="{{ $item->id }}" data-nama="{{ $item->nama }}" data-deskripsi="{{ $item->deskripsi }}" 
                                data-image="{{ asset('storage/images/sarpras/' . $item->image) }}">
                            Edit
                        </button>

                        <!-- Delete Form -->
                        <form action="{{ route('backend-sarpras.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Create Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Tambah Sarana dan Prasarana</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('backend-sarpras.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" id="image" name="image" required>
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
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Sarana dan Prasarana</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('backend-sarpras.update', 'id') }}" method="POST" enctype="multipart/form-data" id="editForm">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <input type="hidden" id="edit_id" name="id">
                    <div class="form-group">
                        <label for="edit_nama">Nama</label>
                        <input type="text" class="form-control" id="edit_nama" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_deskripsi">Deskripsi</label>
                        <textarea class="form-control" id="edit_deskripsi" name="deskripsi" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="edit_image">Image</label>
                        <input type="file" class="form-control" id="edit_image" name="image">
                        <img id="edit_image_preview" src="" alt="Current Image" width="100" class="mt-2">
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
    // Populate the Edit Modal with data
    $('#editModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var id = button.data('id');
        var nama = button.data('nama');
        var deskripsi = button.data('deskripsi');
        var image = button.data('image');

        var modal = $(this);
        modal.find('.modal-title').text('Edit Sarana dan Prasarana');
        modal.find('#edit_id').val(id);
        modal.find('#edit_nama').val(nama);
        modal.find('#edit_deskripsi').val(deskripsi);
        modal.find('#edit_image_preview').attr('src', image);
        modal.find('form').attr('action', '/backend-sarpras/' + id);
    });
</script>
@endsection
