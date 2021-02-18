<!-- LEFT SIDEBAR -->
<div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
            <ul class="nav">
                <li><a href="/dashboard" class="{{ Request::is('dashboard') ? 'active' : '' }}"><i
                            class="lnr lnr-home"></i> <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="/dashboard/data_jamaah"
                        class="{{ Request::is('dashboard/data_jamaah') ? 'active' : '' }}"><i
                            class="lnr lnr-database"></i>
                        <span>Tampil data</span>
                    </a>
                </li>
                <li><a href="#subCreate" data-toggle="collapse" class="collapsed 
                    @if (Request::is('dashboard/input')) active @endif
                        @if (Request::is('dashboard/import'))
                        active
                        @endif"><i class="lnr lnr-file-add"></i>
                        <span>Create Data</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                    <div id="subCreate" class="collapse ">
                        <ul class="nav">
                            <li><a href="/dashboard/input"
                                    class="{{ Request::is('dashboard/input') ? 'active' : '' }}"><i
                                        class="lnr lnr-pencil"></i>Input</a></li>

                            @if (auth()->user()->role == 'super_admin')
                                <li>
                                    <a href="/dashboard/import"
                                        class="{{ Request::is('dashboard/import') ? 'active' : '' }}"><i class="lnr lnr-cloud-upload
                                "></i>Import
                                    </a>
                                </li>
                            @endif
                    </div>
                </li>

                @if (auth()->user()->role == 'super_admin')
                    <li>
                        <a href="#sub_import" data-toggle="collapse" class="collapsed
                        @if (Request::is('dashboard/export')) active @endif @if (Request::is('dashboard/export'))
                            active
                            @endif"><i class="lnr lnr-download"></i>
                            <span>Export Data</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                        <div id="sub_import" class="collapse ">
                            <ul class="nav">


                                <li>
                                    <a href="/dashboard/export"
                                        class="{{ Request::is('dashboard/export') ? 'active' : '' }}"><i class="fa fa-upload
                                "></i>By Filter
                                    </a>
                                </li>

                                <li>
                                    <a href="/dashboard/export_backup"
                                        class="{{ Request::is('/dashboard/export_backup') ? 'active' : '' }}">
                                        <i class=" lnr lnr-cloud-download"></i>Create Backup Data
                                    </a>
                                </li>
                        </div>
                    </li>
                    <li>
                        <a href="/user/user_management"
                            class="{{ Request::is('user/user_management') ? 'active' : '' }}"><i
                                class="lnr lnr-users"></i>
                            <span>User Management</span>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</div>
<!-- END LEFT SIDEBAR -->
