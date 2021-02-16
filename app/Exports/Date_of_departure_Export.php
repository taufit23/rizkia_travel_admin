<?php

namespace App\Exports;

use App\Models\data_jamaah;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromView;

class Date_of_departure_Export implements FromQuery
{
    use Exportable;
    protected $tanggal_keberangkatan;
    function __construct($tanggal_keberangkatan) {
            $this->tanggal_keberangkatan = $tanggal_keberangkatan;
    }
    public function query()
    {
        return data_jamaah::query();
    }

}
