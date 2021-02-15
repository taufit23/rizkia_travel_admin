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
                        <form class="form-horizontal" action="/user/user_management/tambah/go" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <div class="text-primary">
                                    <label class="control-label col-sm-2">
                                        <span class="input-group-addon"><i class="fa fa-user"></i> Tambah User :</span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2 requiredstar" for="name">Name :</label>
                                <div class="col-sm-10">
                                    <input name="name" type="text" value="{{ old('name') }}"
                                        class="form-control  @error('name') is-invalid @enderror" name="name" id="name"
                                        placeholder="Masukan Nama User">
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
                                <label class="control-label col-sm-2 requiredstar" for="email">Email :</label>
                                <div class="col-sm-10">
                                    <input name="email" type="email" value="{{ old('email') }}"
                                        class="form-control  @error('email') is-invalid @enderror" email="email" id="email"
                                        placeholder="Masukan email">
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
                                <label class="control-label col-sm-2 requiredstar" for="role">Role : </label>
                                <div class="col-sm-10">
                                    <select name="role" class="form-control @error('role') is-invalid @enderror"
                                        required="required">
                                        <option>Pilih Role</option>
                                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin
                                        </option>
                                        <option value="super_admin" {{ old('role') == 'super_admin' ? 'selected' : '' }}>
                                            Super Admin
                                        </option>
                                    </select>
                                    @error('role')
                                        <span class="invalid-feedback">
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- <div class="form-group">
                                <label class="control-label col-sm-2" for="password">Password :</label>
                                <div class="col-sm-10">
                                    <input name="password" type="password"
                                        class="form-control  @error('password') is-invalid @enderror" password="password"
                                        id="password" placeholder="Masukan password" readonly>
                                    @error('password')
                                        <span class="invalid-feedback">
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        </span>
                                    @enderror
                                </div>
                            </div> --}}



                            <button type="submit" class="btn btn-outline-info btn-primary btn-block">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
