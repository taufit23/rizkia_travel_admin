@extends('admin.layouts.master')
@section('content')
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <div class="panel panel-profile">
                    <div class="clearfix">
                        <div class="row" style="margin: 15px">
                            <form class="form-horizontal" role="form"
                                action="/{{ auth()->user()->id }}/edit_profile/update_profile" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="col-md-5">
                                    <div class="text-center">
                                        <img src="{{ auth()->user()->getAvatar() }}" class="avatar img-circle"
                                            alt="avatar" style="width: 200px;">
                                        <h6>Upload a different photo...</h6>
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


                                <!-- edit form column -->
                                <div class="col-md-7 personal-info">
                                    <h3>Personal info</h3>

                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="name">Nama : </label>
                                        <div class="col-lg-10">
                                            <input type="text"
                                                value="{{ old('name') ? old('name') : auth()->user()->name }}" name="name"
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
                                        <label class="control-label col-sm-2" for="email">Email : </label>
                                        <div class="col-lg-10">
                                            <input type="text"
                                                value="{{ old('email') ? old('email') : auth()->user()->email }}"
                                                name="email" id="email"
                                                class="form-control @error('email') is-invalid @enderror"
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

                                    <a href="{{ url()->previous() }}" class="btn btn-default">Kembali</a>

                                    <button type="submit"
                                        class="btn btn-sm btn-warning btn-outline-light btn-rounded mx-auto">
                                        Update
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
@endsection
