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
                                    <div class="overlay"></div>
                                    <div class="profile-main">
                                        <img src="{{ $jama->getAvatar() }}" class="img-circle img-fluid"
                                            style="width: 125px;" alt="Avatar">
                                        <h3 class="name">{{ $jama->name }}</h3>
                                        <span class="online-status
                                                                                @if ($jama->tanggal_keberangkatan > $mytime) status-available
                                        @else
                                            status-not-available @endif
                                            ">
                                            {{-- {{ dd($mytime) }} --}}

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
                                            <li>Passport Number <span>{{ $jama->passpor_no }}</span></li>
                                            <li>place of issue passport
                                                <span>{{ $jama->place_of_isssued_passpor }}</span>
                                            </li>
                                            <li>Passport Issued
                                                <span>{{ $jama->place_of_isssued_passpor }}</span>
                                            </li>
                                            <li>Passport expiried <span>{{ $jama->expiried_passpor }}</span></li>

                                        @endforeach
                                    </ul>
                                </div>


                            </div>
                            <!-- END PROFILE DETAIL -->
                        </div>
                        <!-- END LEFT COLUMN -->
                        <!-- RIGHT COLUMN -->
                        <div class="profile-right">
                            <!-- TABBED CONTENT -->
                            <div class="custom-tabs-line tabs-line-bottom left-aligned">
                                <ul class="nav" role="tablist">
                                    <li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab">
                                            Basic Info</a></li>
                                    {{-- <li><a href="#tab-bottom-left2" role="tab" data-toggle="tab">Projects <span
                                                class="badge">7</span></a></li> --}}
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="tab-bottom-left1">
                                    <div class="table-responsive">
                                        @foreach ($jamaah as $jama)
                                            <table class="table project-table">
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
                                                            <span>{{ $jama->alamat . ', ' . $jama->desa_kelurahan . ', ' . $jama->kecamatan . ', ' . $jama->kabupaten_kota . ', ' . $jama->provinsi }}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nama Ayah</td>
                                                        <td>
                                                            <span>{{ $jama->nama_ayah }}</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                    </div>
                                </div>
                                {{-- <div class="tab-pane fade" id="tab-bottom-left2">
                                    <div class="table-responsive">
                                        <table class="table project-table">
                                            <tbody>
                                                <tr>
                                                    <td><a href="#">Spot Media</a></td>
                                                    <td>
                                                        <div class="progress">
                                                            <div> <span>60% Complete</span>
                                                            </div>
                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td><a href="#">E-Commerce Site</a></td>
                                                    <td>
                                                        <div class="progress">
                                                            <div> <span>33% Complete</span>
                                                            </div>
                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td><a href="#">Project 123GO</a></td>
                                                    <td>
                                                        <div class="progress">
                                                            <div> <span>68% Complete</span>
                                                            </div>
                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td><a href="#">Wordpress Theme</a></td>
                                                    <td>
                                                        <div class="progress">
                                                            <div> <span>75%</span>
                                                            </div>
                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td><a href="#">Project 123GO</a></td>
                                                    <td>
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-success"
                                                                role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                                                aria-valuemax="100" style="width: 100%;">
                                                                <span>100%</span>
                                                            </div>
                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td><a href="#">Redesign Landing Page</a></td>
                                                    <td>
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-success"
                                                                role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                                                aria-valuemax="100" style="width: 100%;">
                                                                <span>100%</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div> --}}
                            </div>
                            <!-- END TABBED CONTENT -->
                            <div class="text-center">
                                <a href="/dashboard/data_jamaah" class="btn btn-default">Kembali</a>
                                <a href="/dashboard/{{ $jama->id }}/edit" class="btn btn-warning">Edit Profile</a>
                            </div>
                        </div>
                        @endforeach
                        <!-- END RIGHT COLUMN -->
                    </div>
                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT -->
    </div>
    <!-- END MAIN -->


@endsection
