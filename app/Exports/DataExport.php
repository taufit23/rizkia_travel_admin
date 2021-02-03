<?php

namespace App\Exports;

use App\data_jamaah;
use Maatwebsite\Excel\Concerns\FromCollection;

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
