@extends('admin.layouts.master')
@section('content')
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <!-- OVERVIEW -->
                <div class="panel panel-headline">
                    <div class="panel">
                        <div class="panel">
                            <h3 class="panel-title">Export Data Excel</h3>
                            @if (session('sucess'))
                                <div class="alert alert-warning"
                                    style="margin-top: 25px; margin-bottom: 0px; margin-left: 5px; margin-right: 5px; "
                                    role="alert">
                                    {{ session('sucess') }}
                                </div>
                            @endif
                            <div class="panel-body">
                                <div class="row" style="margin: 10px 20px;">
                                    <div class="col">
                                        <div class="row">
                                            <a class="brn btn-lg btn-primary text-center"
                                                href="/dashboard/export/go">Download
                                                Backup</a>

                                        </div>
                                    </div>
                                </div>
                            </div>




                        </div>
                    </div>
                </div>
            </div>



        @endsection
