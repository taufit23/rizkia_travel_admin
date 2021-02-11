@extends('admin.layouts.master')
@section('content')

    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <div class="panel panel-profile">
                    <div class="clearfix">
                        <!-- LEFT COLUMN -->
                        <div class="profile-center">
                            <!-- PROFILE HEADER -->
                            <div class="profile-header">
                                <div class="overlay"></div>
                                <div class="profile-main">
                                    <img src="{{ auth()->user()->getAvatar() }}" class="img-circle"
                                        alt="{{ auth()->user()->name . '/' . auth()->user()->role }}"
                                        style="width: 150px">
                                    <h3 class="name">{{ auth()->user()->name }}</h3>
                                    <span class="online-status status-available">
                                        @if (auth()->user()->role == 'super_admin')
                                            Best
                                        @endif
                                        Admin
                                    </span>
                                </div>
                            </div>
                            <!-- END PROFILE HEADER -->
                            <!-- PROFILE DETAIL -->
                            <div class="profile-detail">
                                <div class="profile-info">
                                    <h4 class="heading">Basic Info</h4>
                                    <ul class="list-unstyled list-justify">
                                        <li>Name <span>{{ auth()->user()->name }}</span></li>
                                        <li>Email <span>{{ auth()->user()->email }}</span></li>
                                        <li>Email
                                            <span>
                                                @if (auth()->user()->role == 'super_admin')
                                                    Best
                                                @endif
                                                Admin
                                            </span>
                                        </li>
                                    </ul>
                                </div>

                                <div class="text-center"><a href="edit_profile" class="btn btn-primary">Edit
                                        Profile</a></div>
                            </div>
                            <!-- END PROFILE DETAIL -->
                        </div>
                        <!-- END LEFT COLUMN -->
                    </div>
                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT -->
    </div>

@endsection
