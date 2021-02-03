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
use App\Imports\DataImport;
use Maatwebsite\Excel\Facades\Excel;
use Session;
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
        }else{
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

    public function edit_data($id)
    {

        $jamaah = data_jamaah::find($id);
        // dd($jamaah);
        return view('admin.edit', ['jamaah' => $jamaah]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update_data(Request $request, $id)
    {
        $data = $request->all();


        // dd($request)->all();
        $item = data_jamaah::find($id);
        // $data()->validate([
        //     'grub' => 'required|min:5',
        //     'nama_ayah' => 'required|min:5',
        //     'nik' => 'required|min:5',
        //     'alamat' => 'required|min:10',
        //     'desa_kelurahan' => 'required|min:3',
        //     'kecamatan' => 'required|min:3',
        //     'kabupaten_kota' => 'required|min:3',
        //     'provinsi' => 'required|min:3',
        //     'sex' => 'required|min:2|max:3',
        //     'name' => 'required|min:2',
        //     'tempat_lahir' => 'required|min:5',
        //     'tanggal_lahir' => 'required|min:5',
        //     'passpor_no' => 'required|min:5',
        //     'place_of_isssued_passpor' => 'required|min:5',
        //     'issued_passpor' => 'required|min:5',
        //     'expiried_passpor' => 'required|min:5',
        //     'tanggal_keberangkatan' => 'required|date|'
        // ]);

        $item->update($data);

        // $this->data_jamaah->editData($id, $jamaah);

        return redirect('dashboard/data_jamaah')->with('sucess', 'Data Jamaah Berhasil Diupdate');
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
    public function import_data_go(Request $request)
    {
        // $this->validate($request, [
        //     'file' => 'required'
        // ]);
        // if ($request->hasFile('file')) {
        //     //GET FILE NYA
        //     $file = $request->file('file');
        //     //MEMBUAT FILENAME DENGAN MENGAMBIL EKSTENSI DARI FILE YANG DI-UPLOAD
        //     $filename = time() . '.' . $file->getClientOriginalExtension();

        //     //FILE TERSEBUT DISIMPAN KEDALAM FOLDER
        //     // STORAGE > APP > PUBLIC > IMPORT
        //     //DENGAN MENGGUNAKAN METHOD storeAs()
        //     $file->storeAs(
        //         'public/import', $filename
        //     );

        //     //MEMBUAT INSTRUKSI JOB QUEUE
        //     ImportJob::dispatch($filename);
        //     //REDIRECT DENGAN FLASH MESSAGE BERHASIL
        //     return redirect()->back()->with(['success' => 'Upload success']);
        // }
        // //JIKA TIDAK ADA FILE, REDIRECT ERROR
        //  return redirect()->back()->with(['error' => 'Failed to upload file']);

        Excel::import(new DataImport, request()->file('file'));
        return back();
    }
}
