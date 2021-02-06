@extends('admin.layouts.master')
@section('content')
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
                                <label class="control-label col-sm-2" for="grub">Grub Keberangkatan</label>
                                <div class="col-sm-10">
                                    <input name="grub" type="text" class="form-control" grub="grub" id="grub"
                                        placeholder="Masukan nama grub">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="nama_ayah">Nama ayah</label>
                                <div class="col-sm-10">
                                    <input name="nama_ayah" type="text" class="form-control" id="nama_ayah"
                                        placeholder="Masukan nama ayah">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="nik">Nik</label>
                                <div class="col-sm-10">
                                    <input name="nik" type="text" class="form-control" id="nik" placeholder="Masukan nik">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="alamat">Alamat</label>
                                <div class="col-sm-10">
                                    <input name="alamat" type="text" class="form-control" id="alamat"
                                        placeholder="Masukan alamat">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="desa_kelurahan">Kelurahan/Desa</label>
                                <div class="col-sm-10">
                                    <input name="desa_kelurahan" type="text" class="form-control" id="desa_kelurahan"
                                        placeholder="Masukan kelurahan/desa">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="kecamatan">Kecamatan</label>
                                <div class="col-sm-10">
                                    <input name="kecamatan" type="text" class="form-control" id="kecamatan"
                                        placeholder="Masukan kecamatan">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="kabupaten_kota">Kabupaten/Kota</label>
                                <div class="col-sm-10">
                                    <input name="kabupaten_kota" type="text" class="form-control" id="kabupaten_kota"
                                        placeholder="Masukan kabupaten/kota">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="provinsi">Provinsi</label>
                                <div class="col-sm-10">
                                    <input name="provinsi" type="text" class="form-control" id="provinsi"
                                        placeholder="Masukan provinsi">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="jenis_kelamin">Jenis Kelamin</label>
                                <div class="col-sm-10">
                                    <select name="jenis_kelamin" class="form-control" id="jenis_kelamin"
                                        placeholder="Pilih jenis kelamin">
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="name">Nama</label>
                                <div class="col-sm-10">
                                    <input name="name" type="text" class="form-control" id="name"
                                        placeholder="Masukan nama">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="tempat_lahir">Tempat Lahir</label>
                                <div class="col-sm-10">
                                    <input name="tempat_lahir" type="text" class="form-control" id="tempat_lahir"
                                        placeholder="Masukan tempat lahir">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="tanggal_lahir">Tanggal Lahir</label>
                                <div class="col-sm-10">
                                    <input name="tanggal_lahir" type="date" class="form-control" id="tanggal_lahir"
                                        placeholder="Masukan tanggal lahir">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="passpor_no">Nomor Passport</label>
                                <div class="col-sm-10">
                                    <input name="passpor_no" type="text" class="form-control" id="passpor_no"
                                        placeholder="Masukan nomor passport">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="place_of_isssued_passpor">Tempat Keluar
                                    Passport</label>
                                <div class="col-sm-10">
                                    <input name="place_of_isssued_passpor" type="text" class="form-control"
                                        id="place_of_isssued_passpor" placeholder="Masukan tempat keluar passport">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="issued_passpor">Tanggal Keluar Passport</label>
                                <div class="col-sm-10">
                                    <input name="issued_passpor" type="date" class="form-control" id="issued_passpor"
                                        placeholder="Masukan tanggal keluar passport">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="expiried_passpor">Tanggal Berlaku
                                    Passport</label>
                                <div class="col-sm-10">
                                    <input name="expiried_passpor" type="date" class="form-control" id="expiried_passpor"
                                        placeholder="Masukan tanggal berlaku passport">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="tanggal_keberangkatan">Tanggal
                                    Keberangkatan</label>
                                <div class="col-sm-10">
                                    <input name="tanggal_keberangkatan" type="date" data-date-format="DD MMMM YYYY">

                                </div>
                            </div>


                            <button type="submit" class="btn btn-success">Input</button>
                            <table class="table table-bordered table-striped">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
