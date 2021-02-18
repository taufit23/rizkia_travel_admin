<!-- NAVBAR -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="brand">
        <a href="/dashboard"><img src="{{ asset('/image/logo9.png') }}" alt="Rizkia Logos"
                class="img-responsive logo"></a>
    </div>
    <div class="container-fluid">
        <div class="navbar-btn">
            <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>



        </div>
        <div id="navbar-menu">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img
                            src="{{ auth()->user()->getAvatar() }}" class="img-circle"
                            alt="{{ auth()->user()->name }}">
                        <span class="text-align-edge">{{ Auth()->user()->name }}</span> <i
                            class="icon-submenu lnr lnr-chevron-down"></i></a>
                    <ul class="dropdown-menu">
                        <li class="{{ Request::is('dashboard/input') ? 'active' : '' }} ">
                            <a href="/{{ auth()->user()->id }}/edit_password_user">
                                <i class="lnr lnr-lock"></i>
                                <span>Change Password
                                </span>
                            </a>
                        </li>

                        <li class="{{ Request::is('auth()->user()->id/my_profile') ? 'active' : '' }} ">
                            <a href="/{{ auth()->user()->id }}/my_profile">
                                <i class="lnr lnr-user"></i>
                                <span>My Profile
                                </span>
                            </a>
                        </li>
                        <li><a href="/logout"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- END NAVBAR -->
