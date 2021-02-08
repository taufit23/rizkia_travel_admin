@extends('admin.layouts.master')
@section('content')
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

                        <form class="form-horizontal" action="/dashboard/{{ $jamaah->id }}}/update_data" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="name">Nama : </label>
                                <div class="col-sm-10">
                                    <input name="name" type="text" value="{{ $jamaah->name }}" class="form-control"
                                        id="name" placeholder="Masukan Nama">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="nik">Nik : </label>
                                <div class="col-sm-10">
                                    <input name="nik" type="text" value="{{ $jamaah->nik }}" class="form-control" id="nik"
                                        placeholder="Masukan Nik">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="tempat_lahir">Tempat Lahir : </label>
                                <div class="col-sm-10">
                                    <input name="tempat_lahir" type="text" value="{{ $jamaah->tempat_lahir }}"
                                        class="form-control" id="tempat_lahir" placeholder="Masukan Tempat Lahir">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="tanggal_lahir">Tanggal Lahir : </label>
                                <div class="col-sm-10">
                                    <input name="tanggal_lahir" type="date" value="{{ $jamaah->tanggal_lahir }}"
                                        class="form-control" id="tanggal_lahir" placeholder="Masukan Tanggal Lahir">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="sex">Jenis Kelamin : </label>
                                <div class="col-sm-10">
                                    <select name="sex" class="form-control">
                                        <option>Select</option>
                                        <option value="MR" @if ($jamaah->sex == 'MR') selected @endif>Laki-Laki
                                        </option>

                                        <option value="MRS" @if ($jamaah->sex == 'MRS') selected @endif>Perempuan
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="nama_ayah">Nama ayah : </label>
                                <div class="col-sm-10">
                                    <input name="nama_ayah" type="text" value="{{ $jamaah->nama_ayah }}"
                                        class="form-control" id="nama_ayah" placeholder="Masukan Nama Ayah">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="email">Email : </label>
                                <div class="col-sm-10">
<<<<<<< HEAD
                                    <input name="email" type="email" value="{{ $jamaah->email }}" class="form-control"
=======
                                    <input name="email" type="text" value="{{ $jamaah->email }}" class="form-control"
>>>>>>> e87669f5b627c76d978c025b453c15740084186f
                                        id="email" placeholder="Masukan Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="no_telp">No Telp : </label>
                                <div class="col-sm-10">
<<<<<<< HEAD
                                    <input name="no_telp" type="tel" value="{{ $jamaah->no_telp }}" class="form-control"
=======
                                    <input name="no_telp" type="text" value="{{ $jamaah->no_telp }}" class="form-control"
>>>>>>> e87669f5b627c76d978c025b453c15740084186f
                                        id="no_telp" placeholder="Masukan No Telp">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="avatar">Foto Diri : </label>
                                <div class="col-md-2">
                                    <img src="{{ $jamaah->getAvatar() }}" style="width: 200px; align-content: center"
                                        class="img-fluid img-thumbnail" alt="">
                                </div>
                                <div class="col-sm-8">
                                    <input name type="file" name="avatar" id="avatar" class="form-control">
                                </div>
                            </div>

                            <hr size="20px">

                            <div class="form-group">
                                <div class="text-primary">
                                    <label class="control-label col-sm-2" for="passpor_no">Passport Detail : </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="passpor_no">Nomor Passport : </label>
                                <div class="col-sm-10">
                                    <input name="passpor_no" type="text" value="{{ $jamaah->passpor_no }}"
                                        class="form-control" id="passpor_no" placeholder="Masukan Nomor Passport">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="place_of_isssued_passpor">Tempat Keluar Passport
                                    : </label>
                                <div class="col-sm-10">
                                    <input name="place_of_isssued_passpor" type="text"
                                        value="{{ $jamaah->place_of_isssued_passpor }}" class="form-control"
                                        id="place_of_isssued_passpor" placeholder="Masukan Tempat Keluar Passport">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="issued_passpor">Tanggal Keluar Passport
                                    : </label>
                                <div class="col-sm-10">
                                    <input name="issued_passpor" type="date" value="{{ $jamaah->issued_passpor }}"
                                        class="form-control" id="issued_passpor"
                                        placeholder="Masukan Tanggal Keluar Passport">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="expiried_passpor">Tanggal Berlaku Passport
                                    : </label>
                                <div class="col-sm-10">
                                    <input name="expiried_passpor" type="date" value="{{ $jamaah->expiried_passpor }}"
                                        class="form-control" id="expiried_passpor"
                                        placeholder="Masukan Tanggal Berlaku Passport">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="tanggal_keberangkatan">Tanggal Keberangkatan
                                    : </label>
                                <div class="col-sm-10">
                                    <input name="tanggal_keberangkatan" type="date" data-date-format="DD MMMM YYYY"
                                        value="{{ $jamaah->tanggal_keberangkatan }}" class="form-control"
                                        id="tanggal_keberangkatan" placeholder="Masukan Tanggal Keberangkatan">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="grub">Grub Keberangkatan:</label>
                                <div class="col-sm-10">
                                    <input name="grub" type="text"
                                        value="{{ old('grub') ? old('grub') : $jamaah->grub }}" class="form-control"
                                        grub="grub" id="grub" placeholder="Masukan Nama grub">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="foto_passport">Foto Passport : </label>
                                <div class="col-md-2">
                                    <img src="{{ $jamaah->getPassport() }}" style="width: 200px; align-content: center"
                                        class="img-fluid img-thumbnail" alt="">
                                </div>
                                <div class="col-sm-8">
                                    <input name type="file" name="foto_passport" id="foto_passport" class="form-control">
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="text-capitalize text-primary">
                                    <label class="control-label col-sm-2">Alamat Jamaah </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="provinsi">Provinsi : </label>
                                <div class="col-sm-10">
                                    <input name="provinsi" type="text" value="{{ $jamaah->provinsi }}"
                                        class="form-control" id="provinsi" placeholder="Masukan Provinsi">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="kabupaten_kota">kabupaten/kota : </label>
                                <div class="col-sm-10">
                                    <input name="kabupaten_kota" type="text" value="{{ $jamaah->kabupaten_kota }}"
                                        class="form-control" id="kabupaten_kota" placeholder="Masukan kabupaten/kota">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="kecamatan">Kecamatan : </label>
                                <div class="col-sm-10">
                                    <input name="kecamatan" type="text" value="{{ $jamaah->kecamatan }}"
                                        class="form-control" id="kecamatan" placeholder="Masukan Kecamatan">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="desa_kelurahan">Kelurahan/desa : </label>
                                <div class="col-sm-10">
                                    <input name="desa_kelurahan" type="text" value="{{ $jamaah->desa_kelurahan }}"
                                        class="form-control" id="desa_kelurahan" placeholder="Masukan Kelurahan/desa">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="alamat">Alamat : </label>
                                <div class="col-sm-10">
                                    <input name="alamat" type="text" value="{{ $jamaah->alamat }}" class="form-control"
                                        id="alamat" placeholder="Masukan Alamat">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="foto_ktp">Foto KTP : </label>
                                <div class="col-md-2">
                                    <img src="{{ $jamaah->getKtp() }}" style="width: 200px; align-content: center"
                                        class="img-fluid img-thumbnail" alt="">
                                </div>
                                <div class="col-sm-8">
                                    <input name type="file" name="foto_ktp" id="foto_ktp" class="form-control">
                                </div>
                            </div>









                            <div class="form-group mx-auto float-right">
                                <button type="submit" class="btn btn-warning btn-block">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
