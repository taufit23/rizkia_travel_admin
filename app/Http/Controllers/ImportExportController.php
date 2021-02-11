<?php

namespace App\Http\Controllers;

use App\Exports\DataExport;
use App\Imports\DataImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportExportController extends Controller
{
    // tampilan halaman import data
    public function import_data()
    {
        return view('admin.import');
    }

    // tombol download sampel data
    public function download_data()
    {
        $file = public_path()."/sample/sample_data.csv";
        $header = array(
            'Content-Type: aplication/csv',
        );
        return response()->download($file, 'data sample.csv', $header);
    }

    // untuk exekutor import data
    public function store(Request $request)
    {
        Excel::import(new DataImport, $request->file('file'));
        return redirect('dashboard/data_jamaah')->with('sucess', 'Data Jamaah Berhasil Diimport');
    }
    public function show_export()
    {
        return view('admin/export');
    }

    public function export()
    {
        return Excel::download(new DataExport, 'Data_jamaah.xlsx');
    }

}
