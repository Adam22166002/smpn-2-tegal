@extends('layouts.backend.app')

@section('title', 'Manajemen Konsultasi BK')

@section('content')
<div class="content-wrapper container-xxl p-0">
<div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2> Daftar Janji Konsultasi Online dan Offline</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Janji Konsultasi Semua Siswa</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <h4>Konsultasi <span class="text-primary">Online</span></h4>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Tipe</th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>Nomor</th>
                                        <th>Topik</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($appointments as $appointment)
                                        @if($appointment->type == 'online')
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d/m/Y') }}</td>
                                            <td>{{ ucfirst($appointment->type) }}</td>
                                            <td>{{ $appointment->name }}</td>
                                            <td>{{ $appointment->kelas->kelas }} {{ $appointment->kelas->nama_kelas }}</td>
                                            <td>{{ $appointment->phone }}</td>
                                            <td>{{ ucfirst($appointment->consultation_topic) }}</td>
                                            <td>
                                                <form action="{{ route('appointments.update-status', $appointment->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <select name="status" class="form-control" onchange="this.form.submit()">
                                                        <option value="pending" {{ $appointment->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                        <option value="approved" {{ $appointment->status == 'approved' ? 'selected' : '' }}>Disetujui</option>
                                                        <option value="completed" {{ $appointment->status == 'completed' ? 'selected' : '' }}>Selesai</option>
                                                        <option value="cancelled" {{ $appointment->status == 'cancelled' ? 'selected' : '' }}>Dibatalkan</option>
                                                    </select>
                                                </form>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detailModal{{ $appointment->id }}">
                                                    Details
                                                </button>
                                            </td>
                                        </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="table-responsive">
                            <h4>Konsultasi <span class="text-primary">Offline</span></h4>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Tipe</th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>Nomor</th>
                                        <th>Topik</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($appointments as $appointment)
                                        @if($appointment->type == 'offline')
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d/m/Y') }}</td>
                                            <td>{{ ucfirst($appointment->type) }}</td>
                                            <td>{{ $appointment->name }}</td>
                                            <td>{{ $appointment->kelas->kelas }} {{ $appointment->kelas->nama_kelas }}</td>
                                            <td>{{ $appointment->phone }}</td>
                                            <td>{{ ucfirst($appointment->consultation_topic) }}</td>
                                            <td>
                                                <form action="{{ route('appointments.update-status', $appointment->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <select name="status" class="form-control" onchange="this.form.submit()">
                                                        <option value="pending" {{ $appointment->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                        <option value="approved" {{ $appointment->status == 'approved' ? 'selected' : '' }}>Disetujui</option>
                                                        <option value="completed" {{ $appointment->status == 'completed' ? 'selected' : '' }}>Selesai</option>
                                                        <option value="cancelled" {{ $appointment->status == 'cancelled' ? 'selected' : '' }}>Dibatalkan</option>
                                                    </select>
                                                </form>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detailModal{{ $appointment->id }}">
                                                    Details
                                                </button>
                                            </td>
                                        </tr>
                                        @endif
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
@foreach($appointments as $appointment)
<div class="modal fade" id="detailModal{{ $appointment->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Konsultasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Deskripsi:</label>
                    <p>{{ $appointment->description }}</p>
                </div>
                @if($appointment->type == 'offline')
                <div class="form-group">
                    <label>Guru BK</label>
                    <p>{{ $appointment->counselor ? $appointment->counselor->name : '-' }}</p>
                </div>
                @endif
                <div class="form-group">
                    <label>Waktu:</label>
                    <p>{{ $appointment->appointment_time }}</p>
                </div>
                @if($appointment->type == 'online')
                <div class="form-group">
                    <label>Platform:</label>
                    <p>{{ ucfirst($appointment->platform) }}</p>
                </div>
                <div class="form-group">
                    <label>Meeting Link:</label>
                    <input type="url" name="meeting_link" class="form-control" value="{{ $appointment->meeting_link }}" form="updateForm{{ $appointment->id }}">
                </div>
                @endif
                <form id="updateForm{{ $appointment->id }}" action="{{ route('appointments.update-status', $appointment->id) }}" method="POST">
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
