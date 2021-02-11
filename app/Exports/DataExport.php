<?php

namespace App\Exports;

use App\Models\data_jamaah;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;


use Maatwebsite\LaravelNovaExcel\Actions\ExportToExcel;

class DataExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return data_jamaah::all();
    }
}
