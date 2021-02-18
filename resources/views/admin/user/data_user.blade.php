@extends('admin.layouts.master')
@section('content')
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form class="navbar-form navbar-right" style="margin-right: 3px" method="GET"
                            action="/user/user_management">
                            @csrf
                            <div class="input-group">
                                <input type="text" name="cari" id="search" class="form-control"
                                    placeholder="Cari Data User">
                                <span class="input-group-btn"><button type="submit" class="btn btn-primary"><i
                                            class="lnr lnr-magnifier"></i></button></span>
                            </div>
                        </form>


                        <!-- CONDENSED TABLE -->
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Data User's</h3>
                                @if (session('sucess'))
                                    <div class="alert alert-warning"
                                        style="margin-top: 25px; margin-bottom: 0px; margin-left: 5px; margin-right: 5px; "
                                        role="alert">
                                        {{ session('sucess') }}
                                    </div>
                                @endif

                            </div>

                            <div class="panel-body">
                                <div class="col" style="margin: 10px auto">
                                    <a href="/user/user_management/tambah" class="bnt btn-sm btn-info">Tambah User</a>
                                </div>
                                <table class="table table-condensed">
                                    <thead>
                                        <tr>
                                            <th>#No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Avatar</th>
                                            <th>Role</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 1; @endphp
                                        @foreach ($user as $personal_user)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $personal_user->name }}</td>
                                                <td>{{ $personal_user->email }}</td>
                                                <td>
                                                    <img class="img-thumbnail" src="{{ $personal_user->getAvatar() }}"
                                                        alt="{{ $personal_user->name }}" style="width: 70px">
                                                </td>
                                                <td>{{ $personal_user->role }}</td>
                                                <td>

                                                    <form action="/dashboard/delete_user/{{ $personal_user->id }}"
                                                        method="post"
                                                        onclick="return confirm('yakin ingin Menghapus Data {{ $personal_user->name }}')">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="d-inline badge bg-danger text-dark mx-1 "
                                                            type="submit">
                                                            DELETE
                                                        </button>
                                                    </form>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $user->onEachSide(5)->links() }}
                            </div>
                        </div>
                        <!-- END CONDENSED TABLE -->
                    </div>
                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT -->
    </div>
    <!-- END MAIN -->

@endsection
