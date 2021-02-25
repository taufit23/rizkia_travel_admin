<?php

namespace App\Http\Controllers;

use App\Models\data_jamaah;
use Illuminate\Http\Request;

class InputController extends Controller
{
    public function input()
    {
        return view('admin.input');
    }
    public function input_go(Request $request)
    {
        // dd($request);
        $request->validate([
            'grub' => 'required|string',
            'jenis_paket' => 'required|string',
            'tanggal_keberangkatan' => 'required|date',
            'status_pembayaran' => 'required|string',
            'name' => 'required|string|min:2',
            'nik' => 'required|min:16|max:16|unique:data_jamaah,nik',
            'avatar' => 'image|mimes:png,jpg,jpeg,gif,svg|max:2048',
            'passpor_no' => 'max:10|unique:data_jamaah,passpor_no',
            'place_of_isssued_passpor' => 'string',
            'issued_passpor' => 'date',
            'expiried_passpor' => 'date',
            'sex' => 'required|min:2|max:3'
        ]);
            data_jamaah::create([
            'grub'                      => $request->grub,
            'jenis_paket'               => $request->jenis_paket,
            'tanggal_keberangkatan'     => $request->tanggal_keberangkatan,
            'status_pembayaran'         => $request->status_pembayaran,
            'name'                      => $request->name,
            'nik'                       => $request->nik,
            'tempat_lahir'              => $request->tempat_lahir,
            'tanggal_lahir'             => $request->tanggal_lahir,
            'sex'                       => $request->sex,
            'nama_ayah'                 => $request->nama_ayah,
            'email'                     => $request->email,
            'no_telp'                   => $request->no_telp,
            'passpor_name'              => $request->passpor_name,
            'passpor_no'                => $request->passpor_no,
            'place_of_isssued_passpor'  => $request->place_of_isssued_passpor,
            'issued_passpor'            => $request->issued_passpor,
            'expiried_passpor'          => $request->expiried_passpor,
            'provinsi'                  => $request->provinsi,
            'kabupaten_kota'            => $request->kabupaten_kota,
            'kecamatan'                 => $request->kecamatan,
            'desa_kelurahan'            => $request->desa_kelurahan,
            'alamat'                    => $request->alamat,
            ]);

         return redirect('dashboard/data_jamaah')->with('sucess', 'Data Jamaah Berhasil DiInput, Lakukan Pengeditan Untuk Input Foto di dalam tombol detail!!!');
    }
}
