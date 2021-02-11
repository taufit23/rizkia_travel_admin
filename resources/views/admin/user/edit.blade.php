@extends('admin.layouts.master')
@section('content')
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <div class="panel panel-profile">
                    <div class="clearfix">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="text-center m-3">
                                    <img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
                                    <h6>Upload a different photo...</h6>
                                    <input type="file" class="form-control">
                                </div>
                            </div>

                            <!-- edit form column -->
                            <div class="col-md-7 personal-info">
                                <div class="alert alert-info alert-dismissable">
                                    <a class="panel-close close" data-dismiss="alert">×</a>
                                    <i class="fa fa-coffee"></i>
                                    This is an <strong>.alert</strong>. Use this to show important messages to the user.
                                </div>
                                <h3>Personal info</h3>

                                <form class="form-horizontal" role="form">
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">First name:</label>
                                        <div class="col-lg-8">
                                            <input class="form-control" type="text" value="Jane">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Last name:</label>
                                        <div class="col-lg-8">
                                            <input class="form-control" type="text" value="Bishop">
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
@endsection
