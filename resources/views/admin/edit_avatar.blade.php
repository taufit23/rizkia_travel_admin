@extends('admin.layouts.master')
@section('content')
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @if (session('sucess'))
                            <div class="alert alert-success" style="margin: 10px 0px;" role="alert">
                                {{ session('sucess') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-success" style="margin: 10px 0px;" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form class="form-horizontal"
                            action="/dashboard/{{ $jamaah->id }}/data_jamaah/upload_avatar_action" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

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
