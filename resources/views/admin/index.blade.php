@extends('admin.layouts.master')
@section('content')

    <!-- MAIN -->
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <!-- OVERVIEW -->
                <div class="panel panel-headline">
                    <div class="panel-heading">
                        <h3 class="panel-title">Weekly Overview</h3>
                        <p class="panel-subtitle">{{ $time }}</p>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="metric">
                                    <span class="icon"><i class="fa fa-download"></i></span>
                                    <p>
                                        <span class="number">{{ $countall }}</span>
                                        <span class="title">Jumlah Jama'ah</span>
                                    </p>
                                </div>
                                <div id="demo" class="slide" data-ride="carousel">

                                    <!-- Indicators -->
                                    <ul class="carousel-indicators">
                                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                                        <li data-target="#demo" data-slide-to="1"></li>
                                        <li data-target="#demo" data-slide-to="2"></li>
                                    </ul>

                                    <!-- The slideshow -->
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="{{ asset('image/031.jpg') }}" alt="">
                                        </div>
                                    </div>

                                    <!-- Left and right controls -->
                                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                        <span class="carousel-control-prev-icon"></span>
                                    </a>
                                    <a class="carousel-control-next" href="#demo" data-slide="next">
                                        <span class="carousel-control-next-icon"></span>
                                    </a>

                                </div>
                            </div>


                            <!-- END MAIN CONTENT -->
                        </div>
                        <!-- END MAIN -->

                    @endsection
