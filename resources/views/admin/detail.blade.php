@extends('admin.layouts.master')
@section('content')

    <!-- MAIN -->
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <div class="panel panel-profile">
                    <div class="clearfix">
                        <!-- LEFT COLUMN -->
                        <div class="profile-left">
                            @foreach ($jamaah as $jama)
                                @php
                                    $mytime = Carbon\Carbon::now();
                                @endphp
                                <!-- PROFILE HEADER -->
                                <div class="profile-header">
                                    <div class="profile-main">
                                        <img src="{{ $jama->getAvatar() }}" class="img-circle img-fluid"
                                            style="width: 125px;" alt="Avatar">
                                        <h3 class="name text-info bing-bg">{{ $jama->name }}</h3>
                                        <span style="border-radius: 20px;"
                                            class="online-status text-warning bg-primary @if ($jama->tanggal_keberangkatan > $mytime) status-available
                                        @else
                                            status-not-available @endif
                                            ">

                                            @if ($jama->tanggal_keberangkatan > $mytime)
                                                Belum Berangkat
                                            @else
                                                Sudah Berangkat
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                            <!-- END PROFILE HEADER -->
                            <!-- PROFILE DETAIL -->
                            <div class="profile-detail">
                                <div class="profile-info">
                                    <h4 class="heading">Info Jamaah</h4>
                                    <ul class="list-unstyled list-justify">
                                        @foreach ($jamaah as $jama)
                                            <li>Tanggal Keberangkatan <span>{{ $jama->tanggal_keberangkatan }}</span></li>
                                            <li>Grub <span>{{ $jama->grub }}</span></li>
                                            <li>Status Pembayaran <span>{{ $jama->status_pembayaran }}</span></li>
                                            <li>Jenis Paket <span>{{ $jama->jenis_paket }}</span></li>
                                            <li>Passport Number <span>{{ $jama->passpor_no }}</span></li>
                                            <li>place of issue passport
                                                <span>{{ $jama->place_of_isssued_passpor }}</span>
                                            </li>
                                            <li>Passport Issued
                                                <span>{{ $jama->issued_passpor }}</span>
                                            </li>
                                            <li>Passport expiried <span>{{ $jama->expiried_passpor }}</span></li>
                                            @if (auth()->user()->role == 'super_admin')
                                                <li class="text-center">
                                                    <a href="/dashboard/{{ $jama->id }}/data_jamaah/data_jamaah_edit"
                                                        class="btn btn-default">Edit Data jamaah</a>
                                                </li>
                                            @endif

                                        @endforeach
                                    </ul>
                                </div>


                            </div>
                            <!-- END PROFILE DETAIL -->
                        </div>
                        <!-- END LEFT COLUMN -->
                        <!-- RIGHT COLUMN -->
                        <div class="profile-right">
                            @if (session('sucess'))
                                <div class="alert alert-success" style="margin: 10px 0px;" role="alert">
                                    {{ session('sucess') }}
                                </div>
                            @endif
                            <!-- TABBED CONTENT -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="tab-bottom-left1">
                                    <div class="table-responsive">
                                        <h3 style="margin: 0px; important!">Personal Info</h3>
                                        @foreach ($jamaah as $jama)
                                            <table class="table table-">
                                                <tbody>
                                                    <tr>
                                                        <td>Nama</td>
                                                        <td>
                                                            <span>{{ $jama->name }}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>NIK</td>
                                                        <td>
                                                            <span>{{ $jama->nik }}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jenis Kelamin</td>
                                                        <td>
                                                            <span>
                                                                @if ($jama->sex == 'MR')
                                                                    Laki Laki
                                                                @endif
                                                                @if ($jama->sex == 'MRS')
                                                                    Perempuan
                                                                @endif
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tempat/Tanggal lahir</td>
                                                        <td>
                                                            <span>{{ $jama->tempat_lahir . '/' . $jama->tanggal_lahir }}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Alamat Lengkap</td>
                                                        <td>
                                                            <span>{{ $jama->alamat . ', ' . $jama->desa_kelurahan . ', ' . $jama->kecamatan . ', ' . $jama->kabupaten_kota . ', ' . $jama->provinsi }}

                                                                @if (auth()->user()->role == 'super_admin')
                                                                    <a href="/dashboard/{{ $jama->id }}/data_jamaah/alamat_edit"
                                                                        class="btn btn-primary btn-sm">Edit alamat</a>
                                                                @endif
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nama Ayah</td>
                                                        <td>
                                                            <span>{{ $jama->nama_ayah }}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email</td>
                                                        <td>
                                                            <span>{{ $jama->email }}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>No. Telp</td>
                                                        <td>
                                                            <span>{{ $jama->no_telp }}</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <div class="text-center">
                                                <button class="btn btn-outline-info btn-info" type="button"
                                                    data-toggle="modal" data-target="#modal_avatar">Tampil
                                                    Avatar
                                                </button>
                                                <button class="btn btn-outline-info btn-info" type="button"
                                                    data-toggle="modal" data-target="#modal_ktp">Tampil
                                                    KTP
                                                </button>
                                                <button class="btn btn-outline-info btn-info" type="button"
                                                    data-toggle="modal" data-target="#modal_passport">Tampil
                                                    Passport
                                                </button>

                                            </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END TABBED CONTENT -->
                            <div class="text-center">
                                <a href="{{ url()->previous() }}" class="btn btn-default">Kembali</a>
                                <a href="/dashboard/{{ $jama->id }}/data_jamaah/personal_edit"
                                    class="btn btn-warning">Edit Data Personal</a>
                                @if (auth()->user()->role == 'super_admin')
                                    <form style="margin: 10px" action="/dashboard/data_jamaah/{{ $jama->id }}"
                                        method="post"
                                        onclick="return confirm('yakin ingin Menghapus Data {{ $jama->name }}')">
                                        @method('delete')
                                        @csrf
                                        <button class=" btn btn-danger" type="submit">
                                            DELETE
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>

                        <!-- END RIGHT COLUMN -->
                    </div>
                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT -->
    </div>
    <!-- END MAIN -->



    <!-- Modal Avatar -->
    <div class="modal fade" id="modal_avatar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <img src="{{ $jama->getAvatar() }}" class="img-fluid" style="width: 500px;" alt="Avatar">
            </div>
            <div class="modal-footer">
                <a href="/dashboard/{{ $jama->id }}/data_jamaah/upload_avatar" class="btn btn-warning">Edit</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>

    <!-- Modal KTP -->
    <div class="modal fade" id="modal_ktp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <img src="{{ $jama->getKtp() }}" class="img-fluid" style="width: 500px;" alt="Avatar">
            </div>
            <div class="modal-footer">
                <a href="/dashboard/{{ $jama->id }}/data_jamaah/upload_foto_ktp"
                    class="btn btn-primary btn-sm">Edit</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>

    <!-- Modal Passport -->
    <div class="modal fade" id="modal_passport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <img src="{{ $jama->getPassport() }}" class="img-fluid" style="width: 500px;" alt="Avatar">
            </div>
            <div class="modal-footer">
                <a href="/dashboard/{{ $jama->id }}/data_jamaah/upload_foto_passport" class="btn btn-default">Edit</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
    @endforeach
@endsection
