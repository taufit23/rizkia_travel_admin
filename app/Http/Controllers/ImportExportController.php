<?php

namespace App\Http\Controllers;

use App\Exports\DataExport;
use App\Exports\Date_of_departure_Export;
use App\Imports\DataImport;
use App\Models\data_jamaah;
use Carbon\Carbon;
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
    public function show_export(Request $request)
    {
        if ($request->has('filter')) {
            $data_jamaah =  data_jamaah::select("*")
            ->where('grub', 'LIKE','%'.$request->filter.'%')
            ->orWhere('tanggal_keberangkatan', 'LIKE','%'.$request->filter.'%')
            ->paginate(10000000);
        }
        else{
            $data_jamaah = data_jamaah::orderBy('created_at', 'desc')->paginate(10000000);
        }

        // $data_jamaah = \App\Models\data_jamaah::paginate(10);

        return view('admin.export', compact('data_jamaah'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    
    
    public function show_export_backup()
    {
        $data_jamaah = data_jamaah::all();
        return view('admin.export_backup' , compact('data_jamaah')); 
    }
    public function exportall()
    {
        return Excel::download(new DataExport, Carbon::now().'.xlsx');
    }
}
