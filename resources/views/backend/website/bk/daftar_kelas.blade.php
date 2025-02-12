@extends('layouts.backend.app')

@section('title', 'Manajemen Pengaduan BK')

@section('content')
<div class="content-wrapper container-xxl p-0">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2> Daftar Kelas</h2>
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
                                <div class="card-header border-bottom d-flex justify-content-between align-items-center">
                                    <h4 class="card-title mb-0">Kelas</h4>
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kelas</th>
                                                    <th>Nama Kelas</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach($kelas as $index => $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->kelas }}</td>
                                                    <td>{{ $item->nama_kelas }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div> <!-- End Card Body -->
                            </div> <!-- End Card -->
                        </div> <!-- End Col -->
                    </div> <!-- End Row -->
                </section>
            </div>
        </div>
    </div>
</div>
@endsection
