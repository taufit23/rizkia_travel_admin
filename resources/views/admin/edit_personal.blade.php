@extends('admin.layouts.master')
@section('content')
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

                        <form class="form-horizontal" action="/dashboard/{{ $jamaah->id }}/update_personal" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="name">Nama : </label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{ old('name') ? old('name') : $jamaah->name }}" name="name"
                                        id="name" class="form-control @error('name') is-invalid @enderror"
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
                                <label class="control-label col-sm-2" for="nik">Nik : </label>
                                <div class="col-sm-10">
                                    <input name="nik" type="text" value="{{ $jamaah->nik }}"
                                        class="form-control @error('nik') is-invalid @enderror" id="nik"
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
                                    <input name="tempat_lahir" type="text" value="{{ $jamaah->tempat_lahir }}"
                                        class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir"
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
                                    <input name="tanggal_lahir" type="date" value="{{ $jamaah->tanggal_lahir }}"
                                        class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir"
                                        placeholder="Masukan Tanggal Lahir">
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
                                    <select name="sex" class="form-control @error('sex') is-invalid @enderror">
                                        <option>Select</option>
                                        <option value="MR" @if ($jamaah->sex == 'MR') selected @endif>Laki-Laki
                                        </option>

                                        <option value="MRS" @if ($jamaah->sex == 'MRS') selected @endif>Perempuan
                                        </option>
                                    </select>
                                </div>
                                @error('sex')
                                    <span class="invalid-feedback">
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="nama_ayah">Nama ayah : </label>
                                <div class="col-sm-10">
                                    <input name="nama_ayah" type="text" value="{{ $jamaah->nama_ayah }}"
                                        class="form-control @error('nama_ayah') is-invalid @enderror" id="nama_ayah"
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
                                    <input name="email" type="text" value="{{ $jamaah->email }}"
                                        class="form-control @error('email') is-invalid @enderror" id="email"
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
                                    <input name="no_telp" type="text" value="{{ $jamaah->no_telp }}"
                                        class="form-control @error('no_telp') is-invalid @enderror" id="no_telp"
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

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="avatar">Foto Diri : </label>
                                <div class="col-md-2">
                                    <img src="{{ $jamaah->getAvatar() }}" style="width: 200px; align-content: center"
                                        class="img-fluid img-thumbnail" alt="">
                                </div>
                                <div class="col-sm-8">
                                    <input type="file" name="avatar" id="avatar"
                                        class="form-control @error('avatar') is-invalid @enderror">
                                </div>@error('avatar')
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
