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
                <li><a href="#subCreate" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-add"></i>
                        <span>Create Data</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                    <div id="subCreate" class="collapse ">
                        <ul class="nav">
                            <li><a href="/dashboard/input"
                                    class="{{ Request::is('dashboard/input') ? 'active' : '' }}"><i
                                        class="lnr lnr-pencil"></i>Input</a></li>

                            @if (auth()->user()->role == 'super_admin')
                                <li>
                                    <a href="/dashboard/import"
                                        class="{{ Request::is('dashboard/import') ? 'active' : '' }}"><i class="fa fa-upload
                                "></i>Import
                                    </a>
                                </li>
                            @endif
                    </div>
                </li>

                @if (auth()->user()->role == 'super_admin')
                    <li>
                        <a href="#sub_import" data-toggle="collapse" class="collapsed"><i class="lnr lnr-download"></i>
                            <span>Export Data</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                        <div id="sub_import" class="collapse ">
                            <ul class="nav">
                                <li>
                                    <a href="Input.html"
                                        class="{{ Request::is('dashboard/export') ? 'active' : '' }}"><i
                                            class="lnr lnr-pencil"></i>Single Data
                                    </a>
                                </li>
                                <li>
                                    <a href="/dashboard/export"
                                        class="{{ Request::is('dashboard/export') ? 'active' : '' }}"><i class="fa fa-upload
                                "></i>Data Per grub
                                    </a>
                                </li>
                        </div>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</div>
<!-- END LEFT SIDEBAR -->
