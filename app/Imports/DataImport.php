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
        // dd(array(), $row);
        return new data_jamaah([
            'grub' => $row[1],
            'nama_ayah' => $row[2],
            'nik' => $row[3],
            'alamat' => $row[4],
            'desa_kelurahan' => $row[5],
            'kecamatan' => $row[6],
            'kabupaten_kota' => $row[7],
            'provinsi' => $row[8],
            'sex' => $row[9],
            'name' => $row[10],
            'tanggal_lahir' => $row[11],
            'passpor_no' => $row[12],
            'place_of_isssued_passpor' => $row[13],
            'issued_passpor' => $row[14],
            'expiried_passpor' => $row[15],
            'tanggal_keberangkatan' => $row[16],
        ]);
    }
}
