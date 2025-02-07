@extends('layouts.backend.app')

@section('title')
Murid
@endsection

@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success" role="alert">
    <div class="alert-body">
        <strong>{{ $message }}</strong>
        <button type="button" class="close" data-dismiss="alert">×</button>
    </div>
</div>
@elseif($message = Session::get('error'))
<div class="alert alert-danger" role="alert">
    <div class="alert-body">
        <strong>{{ $message }}</strong>
        <button type="button" class="close" data-dismiss="alert">×</button>
    </div>
</div>
@endif
<div class="content-wrapper container-xxl p-0">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2> Murid Dalam Kelas</h2>
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
                                    <h4 class="card-title">Murid </h4>
                                </div>
                                <div class="card-datatable table-responsive mt-2 ">
                                    <table class="table table-bordered" id="table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Kelas</th>
                                                <th>Nama Kelas</th>
                                                <th>Jenis Kelamin</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @php
                                            $no = 1;
                                            @endphp

                                            @foreach ($murid as $item)
                                            @foreach ($item->dataMurid as $itemDetail)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ ucwords($item->name) }}</td>
                                                <td>{{ ucwords($itemDetail->kelas) }}</td>
                                                <td>{{ ucwords($itemDetail->nama_kelas) }}</td>
                                                <td>{{ ucwords($itemDetail->jenis_kelamin) }}</td>
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