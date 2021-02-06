<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Ramsey\Uuid\Generator\RandomBytesGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Paginator;
use Laravolt\Indonesia\Models\Province;
use \App\Models\data_jamaah;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Jobs\ImportJob;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Facades\Excel;
use Session;
use App\Exports\DataExport;
use App\Imports\DataImport;
// use App\Import\


class DashboardController extends Controller
{
    public function index()
    {
        return view('admin/index');
    }
    public function tampil_data(Request $request)
    {
        if ($request->has('cari')) {
            $data_jamaah =  data_jamaah::where('nik', 'LIKE','%'.$request->cari.'%')->paginate(10000000);
        }elseif ($request->has('cari_nama')){
            $data_jamaah =  data_jamaah::where('name', 'LIKE','%'.$request->cari_nama.'%')->paginate(10000000);
        }
        else{
            $data_jamaah = data_jamaah::orderBy('created_at', 'desc')->paginate(10);
        }

        // $data_jamaah = \App\Models\data_jamaah::paginate(10);

        return view('admin.data_jamaah', compact('data_jamaah'))->with('i', (request()->input('page', 1) - 1) * 5);

        // return \Iluminate\Http\Response;
    }
    public function detail_data($id)
    {
        $jamaah = data_jamaah::where('id',$id)->get();
        return view('admin.detail', ['jamaah' => $jamaah]);
    }
    public function delete_data(Request $request, $id)
    {
        $jamaah = data_jamaah::find($id);
        $jamaah->delete();
        return redirect('dashboard/data_jamaah')->with('sucess', 'Data Jamaah Berhasil Dihapus');
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
    // tampilan halaman import data
    public function import_data()
    {
        return view('admin.import');
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
    public function input()
    {
        return view('admin.input');
    }

    public function input_go(Request $request)
    {

    }


    public function edit_data($id)
    {

        $jamaah = data_jamaah::find($id);
        // dd($jamaah);
        return view('admin.edit', ['jamaah' => $jamaah]);
    }
    public function update(Request $request, $id)
    {
        $jamaah = data_jamaah::find($id);

        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('image_jamaah/', $request->file('avatar')->GetClientoriginalName());
            $jamaah->avatar = $request->file('avatar')->GetClientoriginalName();
            $jamaah->save();
        }
        else if ($request->hasFile('foto_passport')) {
            $request->file('foto_passport')->move('image_jamaah/', $request->file('foto_passport')->GetClientoriginalName());
            $jamaah->foto_passport = $request->file('foto_passport')->GetClientoriginalName();
            $jamaah->save();
        }
        else if ($request->hasFile('foto_ktp')) {
            $request->file('foto_ktp')->move('image_jamaah/', $request->file('foto_ktp')->GetClientoriginalName());
            $jamaah->foto_ktp = $request->file('foto_ktp')->GetClientoriginalName();
            $jamaah->save();
        }
        $jamaah->update($request->all());
        return redirect('dashboard/data_jamaah/', $id)->with('sucess', 'Data Jamaah Berhasil Diedit');
    }
}

