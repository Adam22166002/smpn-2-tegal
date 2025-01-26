@extends('layouts.backend.app')

@section('title')
Footer
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
                    <h2> Footer</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header header-bottom">
                        <h4>Footer</h4>
                    </div>
                    {{-- Jika footer masih kosong dan beberapa dari salah satu sosmed nya masih kosong
                    tampilkan ini --}}
                    @if (!$footer)
                    <div class="card-body">
                        <form action=" {{route('backend-footer.store')}} " method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="basicInput">Facebook</label> <span class="text-danger">*</span>
                                        <input type="text" class="form-control @error('facebook') is-invalid @enderror"
                                            name="facebook" value="{{old('facebook')}}" />
                                        <small class="text-danger" style="font-size: 10px">Harap hanya memasukan
                                            username saja.</small>
                                        @error('facebook')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="basicInput">Instagram</label> <span class="text-danger">*</span>
                                        <input type="text" class="form-control @error('instagram') is-invalid @enderror"
                                            name="instagram" value="{{old('instagram')}}" />
                                        <small class="text-danger" style="font-size: 10px">Harap hanya memasukan
                                            username saja.</small>
                                        @error('instagram')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="basicInput">Twitter</label> <span class="text-danger">*</span>
                                        <input type="text" class="form-control @error('twitter') is-invalid @enderror"
                                            name="twitter" value="{{old('twitter')}}" />
                                        <small class="text-danger" style="font-size: 10px">Harap hanya memasukan
                                            username saja.</small>
                                        @error('twitter')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="basicInput">Youtube</label> <span class="text-danger">*</span>
                                        <input type="text" class="form-control @error('youtube') is-invalid @enderror"
                                            name="youtube" value="{{old('youtube')}}" />
                                        <small class="text-danger" style="font-size: 10px">Harap hanya memasukan
                                            username saja.</small>
                                        @error('youtube')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="basicInput">Logo Sekolah</label> <span class="text-danger">*</span>
                                        <input type="file" class="form-control @error('logo') is-invalid @enderror"
                                            name="logo" value="{{old('logo')}}" />
                                        <small class="text-danger" style="font-size: 10px">Ukuran yang disarankan 168x41
                                            dengan format .png.</small>
                                        @error('logo')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Nama sekolah --}}
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="basicInput">Nama Sekolah</label> <span class="text-danger">*</span>
                                        <input type="text"
                                            class="form-control @error('school_name') is-invalid @enderror"
                                            name="school_name" value="{{ old('school_name') }}" />
                                        <small class="text-danger" style="font-size: 10px">Harap hanya memasukan
                                            nama sekolah saja.</small>
                                        @error('school_name')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Alamat sekolah --}}
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="basicInput">Alamat Sekolah</label> <span
                                            class="text-danger">*</span>
                                        <input type="text"
                                            class="form-control @error('school_address') is-invalid @enderror"
                                            name="school_address" value="{{ old('school_address') }}" />
                                        <small class="text-danger" style="font-size: 10px">Harap hanya memasukan
                                            alamat sekolah saja.</small>
                                        @error('school_address')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="basicInput">No Telepon</label> <span class="text-danger">*</span>
                                        <input type="text" class="form-control @error('telp') is-invalid @enderror"
                                            name="telp" value="{{old('telp')}} " />
                                        <small class="text-danger" style="font-size: 10px">Harap hanya memasukan
                                            no telepon sekolah saja.</small>
                                        @error('telp')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="basicInput">No WhatsApp</label> <span class="text-danger">*</span>
                                        <input type="text" class="form-control @error('whatsapp') is-invalid @enderror"
                                            name="whatsapp" value="{{old('whatsapp')}}" />
                                        <small class="text-danger" style="font-size: 10px">Harap hanya memasukan
                                            no WA saja.</small>
                                        @error('whatsapp')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="basicInput">Email</label> <span class="text-danger">*</span>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{old('email')}}" />
                                        <small class="text-danger" style="font-size: 10px">Harap hanya memasukan
                                            email saja.</small>
                                        @error('email')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="basicInput">Deskripsi Singkat Sekolah</label> <span
                                            class="text-danger">*</span>
                                        <textarea name="desc" class="form-control @error('desc') is-invalid @enderror"
                                            rows="3">{{old('desc')}} </textarea>
                                        @error('desc')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary mr-1" type="submit">Submit</button>
                            <a href="{{route('backend-footer.index')}}" class="btn btn-warning">Batal</a>
                        </form>
                    </div>
                    @else
                    <div class="card-body">
                        <form action=" {{route('backend-footer.update', $footer->id)}} " method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="basicInput">Facebook</label> <span class="text-danger">*</span>
                                        <input type="text" class="form-control @error('facebook') is-invalid @enderror"
                                            name="facebook" value="{{$footer->facebook}}" />
                                        <small class="text-danger" style="font-size: 10px">Harap hanya memasukan
                                            username saja.</small>
                                        @error('facebook')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="basicInput">Instagram</label> <span class="text-danger">*</span>
                                        <input type="text" class="form-control @error('instagram') is-invalid @enderror"
                                            name="instagram" value="{{$footer->instagram}}" />
                                        <small class="text-danger" style="font-size: 10px">Harap hanya memasukan
                                            username saja.</small>
                                        @error('instagram')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="basicInput">Twitter</label> <span class="text-danger">*</span>
                                        <input type="text" class="form-control @error('twitter') is-invalid @enderror"
                                            name="twitter" value="{{$footer->twitter}}" />
                                        <small class="text-danger" style="font-size: 10px">Harap hanya memasukan
                                            username saja.</small>
                                        @error('twitter')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="basicInput">Youtube</label> <span class="text-danger">*</span>
                                        <input type="text" class="form-control @error('youtube') is-invalid @enderror"
                                            name="youtube" value="{{$footer->youtube}}" />
                                        <small class="text-danger" style="font-size: 10px">Harap hanya memasukan
                                            username saja.</small>
                                        @error('youtube')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="basicInput">Logo Sekolah</label> <span class="text-danger">*</span>
                                        <input type="file" class="form-control @error('logo') is-invalid @enderror"
                                            name="logo" />
                                        <small class="text-danger" style="font-size: 10px">Boleh di kosongkan.</small>
                                        @error('logo')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Nama sekolah --}}
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="basicInput">Nama Sekolah</label> <span class="text-danger">*</span>
                                        <input type="text"
                                            class="form-control @error('school_name') is-invalid @enderror"
                                            name="school_name" value="{{$footer->school_name}}" />
                                        <small class="text-danger" style="font-size: 10px">Harap hanya memasukan
                                            nama sekolah saja.</small>
                                        @error('school_name')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Alamat sekolah --}}
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="basicInput">Alamat Sekolah</label> <span
                                            class="text-danger">*</span>
                                        <input type="text"
                                            class="form-control @error('school_address') is-invalid @enderror"
                                            name="school_address" value="{{$footer->school_address}}" />
                                        <small class="text-danger" style="font-size: 10px">Harap hanya memasukan
                                            alamat sekolah saja.</small>
                                        @error('school_address')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="basicInput">No Telepon</label> <span class="text-danger">*</span>
                                        <input type="number" class="form-control @error('telp') is-invalid @enderror"
                                            name="telp" value="{{$footer->telp}}" />
                                        <small class="text-danger" style="font-size: 10px">Harap hanya memasukan
                                            no telepon sekolah saja.</small>
                                        @error('telp')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="basicInput">No WhatsApp</label> <span class="text-danger">*</span>
                                        <input type="number"
                                            class="form-control @error('whatsapp') is-invalid @enderror" name="whatsapp"
                                            value="{{$footer->whatsapp}}" />
                                        <small class="text-danger" style="font-size: 10px">Harap hanya memasukan
                                            no WA saja.</small>
                                        @error('whatsapp')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="basicInput">Email</label> <span class="text-danger">*</span>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{$footer->email}}" />
                                        @error('email')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="basicInput">Deskripsi Singkat Sekolah</label> <span
                                            class="text-danger">*</span>
                                        <textarea name="desc" class="form-control @error('desc') is-invalid @enderror"
                                            rows="3">{{$footer->desc}} </textarea>
                                        @error('desc')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <button class="btn btn-primary mr-1" type="submit">Update</button>
                            <a href="{{route('backend-footer.index')}}" class="btn btn-warning">Batal</a>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection