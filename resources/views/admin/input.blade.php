@extends('admin.layouts.master')
@section('content')

    <style>
        .requiredstar:after {
            content: " *";
            color: red;
        }

    </style>

    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-horizontal" action="/dashboard/input/go" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <div class="text-primary">
                                    <label class="control-label col-sm-2">Jamaah Choice : </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2 requiredstar" for="grub">Grub Keberangkatan:</label>
                                <div class="col-sm-10">
                                    <input name="grub" type="text" value="{{ old('grub') }}"
                                        class="form-control  @error('grub') is-invalid @enderror" grub="grub" id="grub"
                                        placeholder="Masukan Nama grub">
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
                                <label class="control-label col-sm-2 requiredstar" for="jenis_paket">Jenis Paket :</label>
                                <div class="col-sm-10">
                                    <input name="jenis_paket" type="text" value="{{ old('jenis_paket') }}"
                                        class="form-control  @error('jenis_paket') is-invalid @enderror"
                                        jenis_paket="jenis_paket" id="jenis_paket" placeholder="Masukan Nama jenis_paket">
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
                                <label class="control-label col-sm-2 requiredstar" for="tanggal_keberangkatan">Tanggal
                                    Keberangkatan
                                    : </label>
                                <div class="col-sm-10">
                                    <input name="tanggal_keberangkatan" type="date" data-date-format="YYYY MMMM DD"
                                        value="{{ old('tanggal_keberangkatan') }}"
                                        class="form-control  @error('tanggal_keberangkatan') is-invalid @enderror"
                                        id="tanggal_keberangkatan" placeholder="Masukan Tanggal Keberangkatan">
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
                                <label class="control-label col-sm-2 requiredstar" for="status_pembayaran">Status Pembayaran
                                    : </label>
                                <div class="col-sm-10">
                                    <select name="status_pembayaran"
                                        class="form-control @error('status_pembayaran') is-invalid @enderror">
                                        <option>Select</option>
                                        <option value="LUNAS" {{ old('status_pembayaran') == 'LUNAS' ? 'selected' : '' }}>
                                            LUNAS
                                        </option>
                                        <option value="BELUM LUNAS"
                                            {{ old('status_pembayaran') == 'BELUM LUNAS' ? 'selected' : '' }}>BELUM LUNAS
                                        </option>
                                    </select>
                                    @error('status_pembayaran')
                                        <span class="invalid-feedback">
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                            <hr size="20px">
                            <div class="form-group">
                                <div class="text-primary">
                                    <label class="control-label col-sm-2">Personal Data : </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2 requiredstar" for="name">Nama : </label>
                                <div class="col-sm-10">
                                    <input name="name" type="text" value="{{ old('name') }}"
                                        class="form-control  @error('name') is-invalid @enderror" id="name"
                                        placeholder="Masukan Nama">
                                    @error('name')
                                        <span class="invalid-feedback">
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2 requiredstar" for="nik">Nik : </label>
                                <div class="col-sm-10">
                                    <input name="nik" type="text" value="{{ old('nik') }}"
                                        class="form-control  @error('nik') is-invalid @enderror" id="nik"
                                        placeholder="Masukan Nik">
                                    @error('nik')
                                        <span class="invalid-feedback">
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="tempat_lahir">Tempat Lahir : </label>
                                <div class="col-sm-10">
                                    <input name="tempat_lahir" type="text" value="{{ old('tempat_lahir') }}"
                                        class="form-control  @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir"
                                        placeholder="Masukan Tempat Lahir">
                                    @error('tempat_lahir')
                                        <span class="invalid-feedback">
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="tanggal_lahir">Tanggal Lahir : </label>
                                <div class="col-sm-10">
                                    <input name="tanggal_lahir" type="date" data-date-format="YYYY MMMM DD"
                                        value="{{ old('tanggal_lahir') }}"
                                        class="form-control  @error('tanggal_lahir') is-invalid @enderror"
                                        id="tanggal_lahir" placeholder="Masukan Tanggal Lahir">
                                    @error('tanggal_lahir')
                                        <span class="invalid-feedback">
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="sex">Jenis Kelamin : </label>
                                <div class="col-sm-10">
                                    <select name="sex" class="form-control  @error('sex') is-invalid @enderror">
                                        <option>Select</option>
                                        <option value="MR" {{ old('sex') == 'MR' ? 'selected' : '' }}>Laki-Laki
                                        </option>
                                        <option value="MRS" {{ old('sex') == 'MRS' ? 'selected' : '' }}>Perempuan
                                        </option>
                                    </select>
                                    @error('sex')
                                        <span class="invalid-feedback">
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="nama_ayah">Nama ayah : </label>
                                <div class="col-sm-10">
                                    <input name="nama_ayah" type="text" value="{{ old('nama_ayah') }}"
                                        class="form-control  @error('nama_ayah') is-invalid @enderror" id="nama_ayah"
                                        placeholder="Masukan Nama Ayah">
                                    @error('nama_ayah')
                                        <span class="invalid-feedback">
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="email">Email : </label>
                                <div class="col-sm-10">
                                    <input name="email" type="text" value="{{ old('email') }}"
                                        class="form-control  @error('email') is-invalid @enderror" id="email"
                                        placeholder="Masukan Email">
                                    @error('email')
                                        <span class="invalid-feedback">
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="no_telp">No Telp : </label>
                                <div class="col-sm-10">
                                    <input name="no_telp" type="tel" value="{{ old('no_telp') }}"
                                        class="form-control  @error('no_telp') is-invalid @enderror" id="no_telp"
                                        placeholder="Masukan No Telp">
                                    @error('no_telp')
                                        <span class="invalid-feedback">
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <hr size="20px">
                            <div class="form-group">
                                <div class="text-primary">
                                    <label class="control-label col-sm-2">Passport Detail : </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2 " for="passpor_no">Nomor Passport : </label>
                                <div class="col-sm-10">
                                    <input name="passpor_no" type="text" value="{{ old('passport_no') }}"
                                        class="form-control  @error('passport_no') is-invalid @enderror" id="passpor_no"
                                        placeholder="Masukan Nomor Passport">
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
                                    : </label>
                                <div class="col-sm-10">
                                    <input name="place_of_isssued_passpor" type="text"
                                        value="{{ old('place_of_isssued_passpor') }}"
                                        class="form-control  @error('place_of_issued_pasppor') is-invalid @enderror"
                                        id="place_of_isssued_passpor" placeholder="Masukan Tempat Keluar Passport">
                                    @error('place_of_issued_pasppor')
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
                                    : </label>
                                <div class="col-sm-10">
                                    <input name="issued_passpor" type="date" data-date-format="YYYY MMMM DD"
                                        value="{{ old('issued_passpor') }}"
                                        class="form-control  @error('issued_passpor') is-invalid @enderror"
                                        id="issued_passpor" placeholder="Masukan Tanggal Keluar Passport">
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
                                <label class="control-label col-sm-2" for="expiried_passpor">Tanggal Berlaku Passport
                                    : </label>
                                <div class="col-sm-10">
                                    <input name="expiried_passpor" type="date" data-date-format="YYYY MMMM DD"
                                        value="{{ old('expiried_passpor') }}"
                                        class="form-control  @error('expiried_passpor') is-invalid @enderror"
                                        id="expiried_passpor" placeholder="Masukan Tanggal Berlaku Passport">
                                    @error('expiried_passpor')
                                        <span class="invalid-feedback">
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <hr size="20px">

                            <div class="form-group">
                                <div class="text-capitalize text-primary">
                                    <label class="control-label col-sm-2">Alamat Jamaah </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="provinsi">Provinsi : </label>
                                <div class="col-sm-10">
                                    <input name="provinsi" type="text" value="{{ old('provinsi') }}"
                                        class="form-control  @error('provinsi') is-invalid @enderror" id="provinsi"
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
                                <label class="control-label col-sm-2" for="kabupaten_kota">kabupaten/kota : </label>
                                <div class="col-sm-10">
                                    <input name="kabupaten_kota" type="text" value="{{ old('kabupaten_kota') }}"
                                        class="form-control  @error('kabupaten_kota') is-invalid @enderror"
                                        id="kabupaten_kota" placeholder="Masukan kabupaten/kota">
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
                                    <input name="kecamatan" type="text" value="{{ old('kecamatan') }}"
                                        class="form-control  @error('kecamatan') is-invalid @enderror" id="kecamatan"
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
                                <label class="control-label col-sm-2" for="desa_kelurahan">Kelurahan/desa : </label>
                                <div class="col-sm-10">
                                    <input name="desa_kelurahan" type="text" value="{{ old('desa_kelurahan') }}"
                                        class="form-control  @error('desa_kelurahan') is-invalid @enderror"
                                        id="desa_kelurahan" placeholder="Masukan Kelurahan/desa">
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
                                <label class="control-label col-sm-2" for="alamat">Alamat : </label>
                                <div class="col-sm-10">
                                    <input name="alamat" type="text" value="{{ old('alamat') }}"
                                        class="form-control  @error('alamat') is-invalid @enderror" id="alamat"
                                        placeholder="Masukan Alamat">
                                    @error('alamat')
                                        <span class="invalid-feedback">
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn btn-outline-info btn-primary btn-block">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
