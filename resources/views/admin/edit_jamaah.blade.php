@extends('admin.layouts.master')
@section('content')
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

                        <form class="form-horizontal" action="/dashboard/{{ $jamaah->id }}/update_jamaah" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="tanggal_keberangkatan">Tanggal Keberangkatan :
                                </label>
                                <div class="col-sm-10">
                                    <input type="date"
                                        value="{{ old('tanggal_keberangkatan') ? old('tanggal_keberangkatan') : $jamaah->tanggal_keberangkatan }}"
                                        name="tanggal_keberangkatan" id="tanggal_keberangkatan"
                                        class="form-control @error('tanggal_keberangkatan') is-invalid @enderror"
                                        placeholder="Masukan Tanggal Keberangkatan">
                                    @error('tanggal_keberangkatan')
                                        <span class="invalid-feedback">
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="grub">Nama Grub :
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{ old('grub') ? old('grub') : $jamaah->grub }}" name="grub"
                                        id="grub" class="form-control @error('grub') is-invalid @enderror"
                                        placeholder="Masukan Nama">
                                    @error('grub')
                                        <span class="invalid-feedback">
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="status_pembayaran">Status Pembayaran : </label>
                                <div class="col-sm-10">
                                    <select name="status_pembayaran"
                                        class="form-control @error('status_pembayaran') is-invalid @enderror">
                                        <option>Select</option>
                                        <option value="LUNAS" @if ($jamaah->status_pembayaran == 'LUNAS') selected @endif>LUNAS
                                        </option>

                                        <option value="BELUM LUNAS" @if ($jamaah->status_pembayaran == 'BELUM LUNAS') selected @endif>BELUM LUNAS
                                        </option>
                                    </select>
                                </div>
                                @error('status_pembayaran')
                                    <span class="invalid-feedback">
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="jenis_paket">Jenis Paket :
                                </label>
                                <div class="col-sm-10">
                                    <input type="text"
                                        value="{{ old('jenis_paket') ? old('jenis_paket') : $jamaah->jenis_paket }}"
                                        name="jenis_paket" id="jenis_paket"
                                        class="form-control @error('jenis_paket') is-invalid @enderror"
                                        placeholder="Masukan Jenis Paket">
                                    @error('jenis_paket')
                                        <span class="invalid-feedback">
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="passpor_name">Passport Name :
                                </label>
                                <div class="col-sm-10">
                                    <input type="text"
                                        value="{{ old('passpor_name') ? old('passpor_name') : $jamaah->passpor_name }}"
                                        name="passpor_name" id="passpor_name"
                                        class="form-control @error('passpor_name') is-invalid @enderror"
                                        placeholder="Masukan Passport Name">
                                    @error('passpor_name')
                                        <span class="invalid-feedback">
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="passpor_no">Passport Number :
                                </label>
                                <div class="col-sm-10">
                                    <input type="text"
                                        value="{{ old('passpor_no') ? old('passpor_no') : $jamaah->passpor_no }}"
                                        name="passpor_no" id="passpor_no"
                                        class="form-control @error('passpor_no') is-invalid @enderror"
                                        placeholder="Masukan Passport Number">
                                    @error('passpor_no')
                                        <span class="invalid-feedback">
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="place_of_isssued_passpor">Tempat Keluar Passport
                                    :
                                </label>
                                <div class="col-sm-10">
                                    <input type="text"
                                        value="{{ old('place_of_isssued_passpor') ? old('place_of_isssued_passpor') : $jamaah->place_of_isssued_passpor }}"
                                        name="place_of_isssued_passpor" id="place_of_isssued_passpor"
                                        class="form-control @error('place_of_isssued_passpor') is-invalid @enderror"
                                        placeholder="Masukan Tempat Keluar Passport">
                                    @error('place_of_isssued_passpor')
                                        <span class="invalid-feedback">
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="issued_passpor">Tanggal Keluar Passport
                                    :
                                </label>
                                <div class="col-sm-10">
                                    <input type="date"
                                        value="{{ old('issued_passpor') ? old('issued_passpor') : $jamaah->issued_passpor }}"
                                        name="issued_passpor" id="issued_passpor"
                                        class="form-control @error('issued_passpor') is-invalid @enderror">
                                    @error('issued_passpor')
                                        <span class="invalid-feedback">
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="expiried_passpor">Expiried Passport
                                    :
                                </label>
                                <div class="col-sm-10">
                                    <input type="date"
                                        value="{{ old('expiried_passpor') ? old('expiried_passpor') : $jamaah->expiried_passpor }}"
                                        name="expiried_passpor" id="expiried_passpor"
                                        class="form-control @error('expiried_passpor') is-invalid @enderror">
                                    @error('expiried_passpor')
                                        <span class="invalid-feedback">
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="foto_passport">Foto Passport : </label>
                                <div class="col-md-2">
                                    <img src="{{ $jamaah->getPassport() }}" style="width: 200px; align-content: center"
                                        class="img-fluid img-thumbnail" alt="">
                                </div>
                                <div class="col-sm-8">
                                    <input type="file" name="foto_passport" id="foto_passport"
                                        class="form-control-file @error('foto_passport') is-invalid @enderror">
                                </div>@error('foto_passport')
                                    <span class="invalid-feedback">
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    </span>
                                @enderror
                            </div>
                            <div class="text-center">
                                <a href="{{ url()->previous() }}" class="btn btn-default">Kembali</a>
                                <button type="submit" class="btn btn-default">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
