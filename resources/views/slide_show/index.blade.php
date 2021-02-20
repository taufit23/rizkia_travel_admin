@extends('admin.layouts.master')
@section('content')
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="{{ asset('/css/swiper.min.css') }}">

    <style>
        body {
            background: #eee;
            font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
            font-size: 14px;
            color: #000;
            margin: 0;
            padding: 0;
        }

        .swiper-container {
            width: 100%;
            height: 300px;
            margin: 20px 0;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;

            /* Center slide text vertically */
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
        }

    </style>

    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <!-- OVERVIEW -->
                <div class="panel panel-headline">

                    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
                    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
                    <script src="{{ asset('js/jquery.min.js') }}"></script>
                    <link rel="stylesheet" href="{{ asset('css/jquery-fancybox.min.css') }}" media="screen">
                    <script src="{{ asset('js/jquery-fancybox.min.js') }}"></script>

                    <a data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-sm btn-default"
                        style="margin: 10px 10px">Tambah Gambar</a>
                    <div class="row">
                        <div class='list-group gallery' style="margin: 10px 10px">
                            @foreach ($image_galery as $gambar)
                                <div class=' col-sm-4 col-xs-6 col-md-3 col-lg-3'>
                                    <a style="height: 150px" class="thumbnail fancybox" href="{{ $gambar->getImage() }}"
                                        target="blank">
                                        <img class="img-responsive" alt="{{ $gambar->title }}"
                                            src="{{ $gambar->getImage() }}" />
                                        <div class='text-right'>
                                            <small class='text-muted'> Created By: {{ $gambar->creator }}</small>
                                        </div> <!-- text-right / end -->
                                    </a>
                                </div> <!-- col-6 / end -->
                            @endforeach
                        </div> <!-- list-group / end -->
                    </div> <!-- row / end -->
                </div> <!-- container / end -->


                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Gambar</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
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
                                <form class="form-horizontal" action="/slide_show/slide_show_management/tambah"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <div class="col-md-4">
                                            <img src="{{ asset('/image_jamaah/031.jpg') }}"
                                                style="width: 200px; align-content: center" class="img-fluid img-thumbnail"
                                                alt="">
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="file" name="image" id="image"
                                                class="form-control @error('image') is-invalid @enderror">
                                            @error('image')
                                                <span class="invalid-feedback">
                                                    <div class="alert alert-danger">
                                                        {{ $message }}
                                                    </div>
                                                </span>
                                            @enderror

                                            <input style="margin: 5px auto" name="title" type="text"
                                                value="{{ old('title') }}"
                                                class="form-control  @error('title') is-invalid @enderror" id="title"
                                                placeholder="Masukan title">
                                            @error('title')
                                                <span class="invalid-feedback">
                                                    <div class="alert alert-danger">
                                                        {{ $message }}
                                                    </div>
                                                </span>
                                            @enderror

                                            <input style="margin: 5px auto" name="deskripsi" type="text"
                                                value="{{ old('deskripsi') }}"
                                                class="form-control  @error('deskripsi') is-invalid @enderror"
                                                id="deskripsi" placeholder="Masukan deskripsi">
                                            @error('deskripsi')
                                                <span class="invalid-feedback">
                                                    <div class="alert alert-danger">
                                                        {{ $message }}
                                                    </div>
                                                </span>
                                            @enderror

                                            <label class="control-label" for="avatar">Creator : </label>
                                            <input style="margin: 5px auto" name="creator" type="text"
                                                value="{{ Auth()->user()->name }}"
                                                class="form-control  @error('creator') is-invalid @enderror" id="creator"
                                                placeholder="Masukan creator" readonly>
                                            @error('creator')
                                                <span class="invalid-feedback">
                                                    <div class="alert alert-danger">
                                                        {{ $message }}
                                                    </div>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Upload</button>
                                </form>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cencel</button>
                            </div>
                        </div>
                    </div>
                </div>

            @endsection
