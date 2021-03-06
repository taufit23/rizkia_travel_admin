@extends('admin.layouts.master')
@section('content')
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!-- CONDENSED TABLE -->
                        <div class="panel">
                            <div class="m-3" style="margin: auto 20px">
                                <form class="navbar-form navbar-right" method="GET" action="/dashboard/data_jamaah">
                                    @csrf
                                    <div class="input-group">
                                        <input type="text" name="cari" id="search" class="form-control"
                                            placeholder="Cari Data Jamaah">
                                        <span class="input-group-btn"><button type="submit" class="btn btn-primary"><i
                                                    class="lnr lnr-magnifier"></i></button></span>
                                    </div>
                                </form>
                            </div>
                            <div class="panel-heading">
                                <h3 class="panel-title">Data Jamaah</h3>
                                @if (session('sucess'))
                                    <div class="alert alert-warning"
                                        style="margin-top: 25px; margin-bottom: 0px; margin-left: 5px; margin-right: 5px; "
                                        role="alert">
                                        {{ session('sucess') }}
                                    </div>
                                @endif
                            </div>



                            <div class="panel-body">
                                <table class="table table-condensed">
                                    <thead>
                                        <tr>
                                            <th>#No</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            {{-- <th>Alamat Lengkap</th> --}}
                                            <th>Grub</th>
                                            <th>Tanggal Keberangkatan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 1; @endphp
                                        @foreach ($data_jamaah as $jamaah)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $jamaah->nik }}</td>
                                                <td>{{ $jamaah->name }}</td>
                                                {{-- <td>{{ $jamaah->alamat.$jamaah->desa_kelurahan.$jamaah->kecamatan.$jamaah->kabupaten_kota. $jamaah->provinsi }}</td> --}}
                                                <td>{{ $jamaah->grub }}</td>
                                                <td>{{ $jamaah->tanggal_keberangkatan }}</td>
                                                <td>
                                                    <a href="/dashboard/{{ $jamaah->id }}/detail">
                                                        <button class="badge bg-primary text-dark mx-1 ">Detail</button>
                                                    </a>
                                                    @if (auth()->user()->role == 'super_admin')
                                                        <form action="/dashboard/data_jamaah/{{ $jamaah->id }}"
                                                            method="post"
                                                            onclick="return confirm('yakin ingin Menghapus Data {{ $jamaah->name }}')">
                                                            @method('delete')
                                                            @csrf
                                                            <button class="d-inline badge bg-danger text-dark mx-1 "
                                                                type="submit">
                                                                DELETE
                                                            </button>
                                                        </form>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination" style="align-content: space-around">
                                        <li class="page-item">
                                            {{ $data_jamaah->links('vendor.pagination.custom') }}
                                        </li>
                                    </ul>
                                </nav>

                                {{-- {{ $data_jamaah->onEachSide(5)->links() }} --}}
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
