<?php

namespace App\Imports;

use App\Models\data_jamaah;
use Maatwebsite\Excel\Concerns\ToModel;

class DataImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        return new data_jamaah([
            'grub' => $row['grub'],
            'nama_ayah' => $row['nama_ayah'],
            'nama_ayah' => $row['nama_ayah'],
            'nik' => $row['nik'],
            'alamat' => $row['alamat'],
            'desa_kelurahan' => $row['desa_kelurahan'],
            'kecamatan' => $row['kecamatan'],
            'kabupaten_kota' => $row['kabupaten_kota'],
            'provinsi' => $row['provinsi'],
            'sex' => $row['sex'],
            'name' => $row['name'],
            'tempat_lahir' => $row['tempat_lahir'],
            'tanggal_lahir' => $row['tanggal_lahir'],
            'passpor_no' => $row['passpor_no'],
            'place_of_isssued_passpor' => $row['place_of_isssued_passpor'],
            'issued_passpor' => $row['issued_passpor'],
            'expiried_passpor' => $row['expiried_passpor'],
            'tanggal_keberangkatan' => $row['tanggal_keberangkatan'],
        ]);
    }
}
