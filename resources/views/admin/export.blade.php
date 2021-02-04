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
                            <div class="panel-heading">
                                <h3 class="panel-title">Export Data CSV</h3>
                                @if (session('sucess'))
                                    <div class="alert alert-warning"
                                        style="margin-top: 25px; margin-bottom: 0px; margin-left: 5px; margin-right: 5px; "
                                        role="alert">
                                        {{ session('sucess') }}
                                    </div>
                                @endif
                            </div>
                            <div class="panel-body">
                                <div class="col">
                                    <div class="row">
                                        <a class="brn btn-sm btn-block btn-primary text-center"
                                            href="/dashboard/export/go">Download
                                            data</a>
                                    </div>
                                </div>
                            </div>

                            <!--END OVER VIEW-->
                            <!-- END MAIN CONTENT -->
                        </div>
                    </div>
                </div>
            </div>
        @endsection
