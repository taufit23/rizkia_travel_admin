@extends('admin.layouts.master')
@section('content')
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

                        <form class="form-horizontal" action="/dashboard/{{ $jamaah->id }}/update" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="grub">Grub Keberangkatan:</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{ $jamaah->grub }}" class="form-control" id="grub"
                                        placeholder="Masukan Nama grub">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="nama_ayah">Nama ayah : </label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{ $jamaah->nama_ayah }}" class="form-control"
                                        id="nama_ayah" placeholder="Masukan Nama Ayah">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="nik">Nik : </label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{ $jamaah->nik }}" class="form-control" id="nik"
                                        placeholder="Masukan Nik" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="alamat">Alamat : </label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{ $jamaah->alamat }}" class="form-control" id="alamat"
                                        placeholder="Masukan Alamat">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="desa_kelurahan">Kelurahan/desa : </label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{ $jamaah->desa_kelurahan }}" class="form-control"
                                        id="desa_kelurahan" placeholder="Masukan Kelurahan/desa">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="kecamatan">Kecamatan : </label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{ $jamaah->kecamatan }}" class="form-control"
                                        id="kecamatan" placeholder="Masukan Kecamatan">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="kabupaten_kota">kabupaten/kota : </label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{ $jamaah->kabupaten_kota }}" class="form-control"
                                        id="kabupaten_kota" placeholder="Masukan kabupaten/kota">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="provinsi">Provinsi : </label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{ $jamaah->provinsi }}" class="form-control" id="provinsi"
                                        placeholder="Masukan Provinsi">
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
                                <label class="control-label col-sm-2" for="name">Nama : </label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{ $jamaah->name }}" class="form-control" id="name"
                                        placeholder="Masukan Nama">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="tempat_lahir">Tempat Lahir : </label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{ $jamaah->tempat_lahir }}" class="form-control"
                                        id="tempat_lahir" placeholder="Masukan Tempat Lahir">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="tanggal_lahir">Tanggal Lahir : </label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{ $jamaah->tanggal_lahir }}" class="form-control"
                                        id="tanggal_lahir" placeholder="Masukan Tanggal Lahir">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="passpor_no">Nomor Passport : </label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{ $jamaah->passpor_no }}" class="form-control"
                                        id="passpor_no" placeholder="Masukan Nomor Passport">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="place_of_isssued_passpor">Tempat Keluar Passport
                                    : </label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{ $jamaah->place_of_isssued_passpor }}"
                                        class="form-control" id="place_of_isssued_passpor"
                                        placeholder="Masukan Tempat Keluar Passport">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="issued_passpor">Tanggal Keluar Passport
                                    : </label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{ $jamaah->issued_passpor }}" class="form-control"
                                        id="issued_passpor" placeholder="Masukan Tanggal Keluar Passport">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="expiried_passpor">Tanggal Berlaku Passport
                                    : </label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{ $jamaah->expiried_passpor }}" class="form-control"
                                        id="expiried_passpor" placeholder="Masukan Tanggal Berlaku Passport">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="tanggal_keberangkatan">Tanggal Keberangkatan
                                    : </label>
                                <div class="col-sm-10">
                                    <input type="date" data-date-format="DD MMMM YYYY"
                                        value="{{ $jamaah->tanggal_keberangkatan }}" class="form-control"
                                        id="tanggal_keberangkatan" placeholder="Masukan Tanggal Keberangkatan">
                                </div>
                            </div>
                            {{-- <div class="form-group">
                                <div class="col-md-2">
                                    <img src="{{ $jamaah->getAvatar() }}" style="width: 200px; align-content: center"
                                        class="img-fluid img-thumbnail" alt="">
                                </div>
                                <div class="col-sm-8">
                                    <input type="file" name="avatar" id="avatar" class="form-control">
                                </div>
                            </div> --}}
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