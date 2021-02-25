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
                            action="/dashboard/{{ $jamaah->id }}/data_jamaah/upload_foto_kk_action" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="foto_kk">Foto kk : </label>
                                <div class="col-md-2">
                                    <img src="{{ $jamaah->getkk() }}" style="width: 200px; align-content: center"
                                        class="img-fluid img-thumbnail" alt="">
                                </div>
                                <div class="col-sm-8">
                                    <input type="file" name="foto_kk" id="foto_kk"
                                        class="form-control-file @error('foto_kk') is-invalid @enderror">
                                </div>@error('foto_kk')
                                    <span class="invalid-feedback">
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    </span>
                                @enderror
                            </div>
                            <div class="text-center">
                                <a href="{{ url()->previous() }}" class="btn btn-default">Kembali</a>
                                <button type="submit" class="btn btn-warning">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
