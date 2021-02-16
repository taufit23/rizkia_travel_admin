@extends('admin.layouts.master')
@section('content')
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="m-3">
                        <form class="navbar-form" method="GET" action="/dashboard/export">
                            @csrf
                            <div class="input-group">
                                <input type="text" name="filter" id="search" class="form-control"
                                    placeholder="filter Data Jamaah">
                                <span class="input-group-btn"><button type="submit" class="btn btn-primary"><i
                                            class="lnr lnr-magnifier"></i></button></span>
                            </div>
                        </form>

                        <div class="com-md-2">
                            <button class="btn-sm btn-primary btn" style="margin-bottom: 20px"
                                onclick="tablesToExcel(['tbl1'], ['#No','Nama', 'Grub', 'Tanggal Keberangkatan'], 'Data Filtered', 'Excel')">Export
                                Filtered Excel
                            </button>
                        </div>

                    </div>
                </div>
                <!-- OVERVIEW -->
                <div class="panel panel-headline">
                    <div class="panel">
                        <h3 style="margin-bottom: 10px" class="panel-title">Export Data Excel :
                            <span>
                                <a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#popupnote">Note</a>
                            </span>
                        </h3>
                        @if (session('sucess'))
                            <div class="alert alert-warning"
                                style="margin-top: 25px; margin-bottom: 0px; margin-left: 5px; margin-right: 5px; "
                                role="alert">
                                {{ session('sucess') }}
                            </div>
                        @endif
                    </div>
                    <div class="panel-body">


                        <div style="overflow-x:auto;">
                            <table id="tbl1" class="table2excel table table-condensed table-bordered">
                                <tr>
                                    <td class="text-center">No</td>
                                    <td class="text-center">Nama Grub</td>
                                    <td class="text-center">Jenis Paket</td>
                                    <td class="text-center">Tanggal Keberangkatan</td>
                                    <td class="text-center">Status Pembayaran</td>
                                    <td class="text-center">Nama</td>
                                    <td class="text-center">Nik</td>
                                    <td class="text-center">Tempat/Tanggal Lahir</td>
                                    <td class="text-center">Jenis Kelamin</td>
                                    <td class="text-center">Nama Ayah</td>
                                    <td class="text-center">No Telp</td>
                                    <td class="text-center">Alamat Lengkap Jamaah</td>
                                </tr>
                                @php $no = 1; @endphp
                                @foreach ($data_jamaah as $jamaah)
                                    <tr>
                                        <td>{{ $no++ }}
                                        </td>
                                        <td>{{ $jamaah->grub }}</td>
                                        <td>{{ $jamaah->jenis_paket }}</td>
                                        <td>{{ $jamaah->tanggal_keberangkatan }}</td>
                                        <td>{{ $jamaah->status_pembayaran }}</td>
                                        <td>{{ $jamaah->name }}</td>
                                        <td>{{ $jamaah->nik }}</td>
                                        <td>{{ $jamaah->tempat_lahir . ' / ' . $jamaah->tanggal_lahir }}</td>
                                        {{-- <td>
                                                    @if ($jamaah->sex == 'MR')
                                                        Laki - Laki
                                                    @else
                                                        Perempuan
                                                    @endif
                                                </td> --}}
                                        <td>{{ $jamaah->sex }}</td>
                                        <td>{{ $jamaah->nama_ayah }}</td>
                                        <td>{{ $jamaah->no_telp }}</td>
                                        <td>{{ $jamaah->alamat . ',' . $jamaah->desa_kelurahan . ',' . $jamaah->kecamatan . ',' . $jamaah->kabupaten_kota . ',' . $jamaah->provinsi }}
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="popupnote" tabindex="-1" role="dialog" aria-labelledby="popupnoteLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="popupnoteLabel">Petunjuk Download Data Filter</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul>
                        <li>Data Dapat Didownload tanpa filter, namun fungsinya akan sama dengan backup, yakni mendownload
                            semua data pada dapabase dengan kolum yang di tentukan oleh tombol</li>
                        <li>Untuk Membuat Filter, Silahkan Ketikkan filter berupa grub keberangkatan atau dengan tanggal
                            keberangkatan</li>
                        <li>Sebelum Menekan tombol download jika ingin difilter, maka tekan terlebih dahulu icon pencarian
                            di samping form input</li>
                        <li>Silahkan download dengan cara menekan tombol "Export Filtered Data"</li>
                        <li>Ketika ingin membuka file yang telah di download, akan muncul popup dari aplikasi excel yang
                            isinya bahwa aplikasi excel tidak memiliki format yang sama dengan file download. namun file
                            tidaklah rusak selagi menekan tombol "yes"</li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection
