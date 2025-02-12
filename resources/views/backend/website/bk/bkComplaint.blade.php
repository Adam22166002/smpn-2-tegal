@extends('layouts.backend.app')

@section('title', 'Manajemen Pengaduan BK')

@section('content')
<div class="content-wrapper container-xxl p-0">
<div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2> Daftar Pengaduan</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Pengaduan Semua Siswa</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>Jenis Masalah</th>
                                        <th>Urgensi</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($complaints as $complaint)
                                    <tr>
                                        <td>{{ $complaint->created_at->format('d/m/Y') }}</td>
                                        <td>{{ $complaint->name ?? 'Anonim' }}</td>
                                        <td>Kelas {{ $complaint->kelas->kelas }} {{ $complaint->kelas->nama_kelas }}</td>
                                        <td>{{ ucfirst($complaint->problem_type) }}</td>
                                        <td>
                                            <span class="badge badge-{{ $complaint->urgency == 'high' ? 'danger' : ($complaint->urgency == 'medium' ? 'warning' : 'info') }}">
                                                {{ ucfirst($complaint->urgency) }}
                                            </span>
                                        </td>
                                        <td>
                                            <form action="{{ route('complaints.update-status', $complaint->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <select name="status" class="form-control" onchange="this.form.submit()">
                                                    <option value="pending" {{ $complaint->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                    <option value="in_progress" {{ $complaint->status == 'in_progress' ? 'selected' : '' }}>Dalam Proses</option>
                                                    <option value="resolved" {{ $complaint->status == 'resolved' ? 'selected' : '' }}>Selesai</option>
                                                </select>
                                            </form>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detailModal{{ $complaint->id }}">
                                                Detail
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Detail Modals -->
@foreach($complaints as $complaint)
<div class="modal fade" id="detailModal{{ $complaint->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Pengaduan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><strong>Deskripsi:</strong></p>
                <p>{{ $complaint->description }}</p>
            </div>
            <div class="modal-body">
                <form action="{{ route('complaints.update-status', $complaint->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-primary">Kirim Tindak Lanjut</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection