@extends('layouts.backend.app')

@section('title', 'Manajemen Pengaduan BK')

@section('content')
<div class="content-wrapper container-xxl p-0">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2> Daftar Murid</h2>
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
                                    <h4 class="card-title">Murid</h4>
                                </div>
                                <div class="card-datatable">
                                    <table class="dt-responsive table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>NISN</th>
                                                <th>Email</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Kelas</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $no = 1; @endphp
                                            @foreach ($murid as $user)
                                                @foreach ($user->dataMurid as $index => $userDetail)
                                                <tr>
                                                    <td> {{ $no++ }} </td>
                                                    <td> {{ $user->name }} </td>
                                                    <td> {{ $userDetail->nisn ?? '-' }} </td>
                                                    <td> {{ $user->email }} </td>
                                                    <td> {{ $userDetail->jenis_kelamin ?? '-' }} </td>
                                                    <td>{{ $userDetail->kelas ? $userDetail->kelas . ' ' . $userDetail->nama_kelas : '-' }}</td>
                                                    <td> {{ $user->status }} </td>
                                                </tr>
                                                @endforeach
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
</div>
@endsection
