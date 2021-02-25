@extends('admin.layouts.master')
@section('content')

    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <div class="panel panel-profile">
                    <div class="clearfix"></div>
                    <div class="profile-center">
                        @if (session('sucess'))
                            <div class="alert alert-success" style="margin-bottom: 10px; " role="alert">
                                {{ session('sucess') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger" style="margin-bottom: 10px; " role="alert">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form class="form-horizontal" method="POST" action="/{{ $user->id }}/edit_password_user/update">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('current_password') ? ' has-error' : '' }}">
                                <label for="current_password" class="col-md-4 control-label">Current Password</label>

                                <div class="col-md-6">
                                    <input id="current_password" type="password" class="form-control"
                                        name="current_password" required>

                                    @if ($errors->has('current_password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('current_password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('new_password') ? ' has-error' : '' }}">
                                <label for="new_password" class="col-md-4 control-label">New Password</label>

                                <div class="col-md-6">
                                    <input id="new_password" type="password" class="form-control" name="new_password"
                                        required>

                                    @if ($errors->has('new_password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('new_password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="new_password_confirm" class="col-md-4 control-label">Confirm New
                                    Password</label>

                                <div class="col-md-6">
                                    <input id="new_password_confirm" type="password" class="form-control"
                                        name="new_password_confirm" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <a href="{{ url()->previous() }}" class="btn btn-default">Kembali</a>
                                    <button type="submit" class="btn btn-primary">
                                        Change Password
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
