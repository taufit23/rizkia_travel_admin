@extends('admin.layouts.master')
@section('content')
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <!-- OVERVIEW -->
                <div class="panel panel-headline">
                    <div class="panel">

                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Import Data CSV</h3>
                            </div>
                            <div class="panel-body">
                                <div class="col">
                                    <div class="row">
                                        <input type="file">
                                        <button type="button" class="btn btn-default"><i class="fa fa-plus-square"></i>
                                            Default
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- Buat Preview Data -->
                            <div style="overflow-x:auto;">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan='14' class='text-center'>Contoh Data Tabel</th>
                                        </tr>
                                    </thead>
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>grub</th>
                                            <th>Nama_ayah</th>
                                            <th>nik</th>
                                            <th>alamat</th>
                                            <th>desa_kelurahan</th>
                                            <th>kecamatan</th>
                                            <th>kabupaten_kota</th>
                                            <th>profinsi</th>
                                            <th>sex</th>
                                            <th>name</th>
                                            <th>tempat_lahir</th>
                                            <th>tanggal_lahir</th>
                                            <th>passpor_no</th>
                                            <th>place_of_issued_passpor</th>
                                            <th>issued_passpor</th>
                                            <th>expiried_passpor</th>
                                            <th>tanggal_keberangkatan</th>
                                            <th>avatar</th>
                                            <th>created_at</th>
                                            <th>updated_at</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td>ERWIN ASNARAYANTO</td>
                                            <td>MAJI</td>
                                            <td>1471103112630061</td>
                                            <td>JL. MELATI RT 001 RW 001</td>
                                            <td>KULIM</td>
                                            <td>TENAYAN RAYA</td>
                                            <td>PEKANBARU</td>
                                            <td>Riau</td>
                                            <td>MR</td>
                                            <td>TUKIRIN MAJI ABDULLAH</td>
                                            <td>PEKANBARU</td>
                                            <td>31 Desember 1972</td>
                                            <td>C6384746</td>
                                            <td>PEKANBARU</td>
                                            <td>22 Januari 2020</td>
                                            <td>22 Januari 2025</td>
                                            <td>2021-02-25</td>
                                            <td> - </td>
                                            <td> - </td>
                                            <td> - </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <caption>
                                <h4>Acuan : </h4>
                                <ul>
                                    <li>Data yang sudah ada harus dirubah terlebih dahulu layaknya format di atas</li>
                                    <span>Untuk data yang diberi tanda strip ( - ) silahkan dikosongkan saja</span>
                                    <li>Bisa juga dengan cara mendownload file sampel di atas, dan mempaste data yang akan
                                        di import ke file sampel tersebuat</li>

                                </ul>
                            </caption>
                            <!--END OVER VIEW-->
                            <!-- END MAIN CONTENT -->
                        </div>
                    </div>
                </div>
            </div>
        @endsection
