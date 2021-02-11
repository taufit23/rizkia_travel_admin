@extends('admin.layouts.master')
@section('content')
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

                        <form class="form-horizontal" action="/dashboard/{{ $jamaah->id }}/update_alamat" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="provinsi">Provinsi : </label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{ old('provinsi') ? old('provinsi') : $jamaah->provinsi }}"
                                        name="provinsi" id="provinsi"
                                        class="form-control @error('provinsi') is-invalid @enderror"
                                        placeholder="Masukan Provinsi">
                                    @error('provinsi')
                                        <span class="invalid-feedback">
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="kabupaten_kota">Kabupaten/Kota : </label>
                                <div class="col-sm-10">
                                    <input type="text"
                                        value="{{ old('kabupaten_kota') ? old('kabupaten_kota') : $jamaah->kabupaten_kota }}"
                                        name="kabupaten_kota" id="kabupaten_kota"
                                        class="form-control @error('kabupaten_kota') is-invalid @enderror"
                                        placeholder="Masukan Kabupaten/Kota">
                                    @error('kabupaten_kota')
                                        <span class="invalid-feedback">
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="kecamatan">Kecamatan : </label>
                                <div class="col-sm-10">
                                    <input type="text"
                                        value="{{ old('kecamatan') ? old('kecamatan') : $jamaah->kecamatan }}"
                                        name="kecamatan" id="kecamatan"
                                        class="form-control @error('kecamatan') is-invalid @enderror"
                                        placeholder="Masukan Kecamatan">
                                    @error('kecamatan')
                                        <span class="invalid-feedback">
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="desa_kelurahan">Desa/Kelurahan : </label>
                                <div class="col-sm-10">
                                    <input type="text"
                                        value="{{ old('desa_kelurahan') ? old('desa_kelurahan') : $jamaah->desa_kelurahan }}"
                                        name="desa_kelurahan" id="desa_kelurahan"
                                        class="form-control @error('desa_kelurahan') is-invalid @enderror"
                                        placeholder="Masukan Desa/Kelurahan">
                                    @error('desa_kelurahan')
                                        <span class="invalid-feedback">
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="alamat">Nama Jalan : </label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{ old('alamat') ? old('alamat') : $jamaah->alamat }}"
                                        name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror"
                                        placeholder="Masukan Nama Jalan">
                                    @error('alamat')
                                        <span class="invalid-feedback">
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="foto_ktp">Foto KTP : </label>
                                <div class="col-md-2">
                                    <img src="{{ $jamaah->getKtp() }}" style="width: 200px; align-content: center"
                                        class="img-fluid img-thumbnail" alt="">
                                </div>
                                <div class="col-sm-8">
                                    <input type="file" name="foto_ktp" id="foto_ktp"
                                        class="form-control @error('foto_ktp') is-invalid @enderror">
                                </div>@error('foto_ktp')
                                    <span class="invalid-feedback">
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-warning btn-block">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
