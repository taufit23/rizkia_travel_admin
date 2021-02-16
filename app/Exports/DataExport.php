<?php

namespace App\Exports;

use App\Models\data_jamaah;
use Maatwebsite\Excel\Concerns\{Exportable, FromCollection, WithColumnFormatting, WithMapping, WithHeadings};
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class DataExport implements FromCollection, WithMapping, WithHeadings, WithColumnFormatting{

    use Exportable;

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return data_jamaah::all();
    }
    public function map($data_jamaah) : array
    {
        return [
            '',
            $data_jamaah->grub             ,
            $data_jamaah->nama_ayah ,
            $data_jamaah->nik,
            $data_jamaah->alamat    ,
            $data_jamaah->desa_kelurahan   ,
            $data_jamaah->kecamatan ,
            $data_jamaah->kabupaten_kota   ,
            $data_jamaah->provinsi  ,
            $data_jamaah->sex,
            $data_jamaah->name      ,
            $data_jamaah->tempat_lahir     ,
            $data_jamaah->tanggal_lahir    ,
            $data_jamaah->passpor_no,
            $data_jamaah->place_of_isssued_passpor,
            $data_jamaah->issued_passpor   ,
            $data_jamaah->expiried_passpor ,
            $data_jamaah->tanggal_keberangkatan   ,
            $data_jamaah->status_pembayaran   ,
            $data_jamaah->jenis_paket   ,
            $data_jamaah->no_telp   ,
            $data_jamaah->email   ,
        ];
    }
    public function headings() : array
    {
        return [
            'id',
            'grub'                    ,
            'nama_ayah'               ,
            'nik'                     ,
            'alamat'                  ,
            'desa_kelurahan'          ,
            'kecamatan'               ,
            'kabupaten_kota'          ,
            'provinsi'                ,
            'sex'                     ,
            'name'                    ,
            'tempat_lahir'            ,
            'tanggal_lahir'           ,
            'passpor_no'              ,
            'place_of_isssued_passpor',
            'issued_passpor'          ,
            'expiried_passpor'        ,
            'tanggal_keberangkatan'   ,
            'status_pembayaran'   ,
            'jenis_paket'   ,
            'no_telp'   ,
            'email'   ,
            'avatar'   ,
            'created_at'   ,
            'updated_at'   ,
        ];
    }
    public function columnFormats(): array
    {
        return [
            'A' => DataType::TYPE_STRING,
            'B' => DataType::TYPE_STRING,
            'C' => DataType::TYPE_STRING,
            'E' => DataType::TYPE_STRING,
            'F' => DataType::TYPE_STRING,
            'G' => DataType::TYPE_STRING,
            'H' => DataType::TYPE_STRING,
            'I' => DataType::TYPE_STRING,
            'J' => DataType::TYPE_STRING,
            'K' => DataType::TYPE_STRING,
            'L' => DataType::TYPE_STRING,
            'M' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'N' => DataType::TYPE_STRING,
            'O' => DataType::TYPE_STRING,
            'P' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'Q' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'R' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'S' => DataType::TYPE_STRING,
            'T' => DataType::TYPE_STRING,
            'U' => DataType::TYPE_STRING,
            'V' => DataType::TYPE_STRING,
            'W' => DataType::TYPE_STRING,
            'X' => DataType::TYPE_STRING,
            'Y' => DataType::TYPE_STRING,

        ];
    }
    
}
