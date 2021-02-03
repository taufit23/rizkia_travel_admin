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
                    <p class="panel-subtitle">Period: Des 14, 2015 - Jan 14, 2021</p>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="metric">
                                <span class="icon"><i class="fa fa-download"></i></span>
                                <p>
                                    <span class="number">1,252</span>
                                    <span class="title">Jumlah Jama'ah</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="metric">
                                <span class="icon"><i class="fa fa-shopping-bag"></i></span>
                                <p>
                                    <span class="number">203</span>
                                    <span class="title">Jama'ah yang telah berangkat</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="metric">
                                <span class="icon"><i class="fa fa-eye"></i></span>
                                <p>
                                    <span class="number">274,678</span>
                                    <span class="title">Jama'ah yang belum berangkat</span>
                                </p>
                            </div>
                        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->

@endsection
