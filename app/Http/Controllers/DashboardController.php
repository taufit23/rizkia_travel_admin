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


<<<<<<< HEAD

=======
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

    public function update_data($id)
    {
        // $data = $request->all();
        // dd($request)->all();
        // $item = data_jamaah::find($id);

        Request()->validate([
            'grub' => 'required|min:5',
            'nama_ayah' => 'required|min:5',
            'nik' => 'required|min:5',
            'alamat' => 'required|min:10',
            'desa_kelurahan' => 'required|min:3',
            'kecamatan' => 'required|min:3',
            'kabupaten_kota' => 'required|min:3',
            'provinsi' => 'required|min:3',
            'sex' => 'required|min:2|max:3',
            'name' => 'required|min:2',
            'tempat_lahir' => 'required|min:5',
            'tanggal_lahir' => 'required|min:5',
            'passpor_no' => 'required|min:5',
            'place_of_isssued_passpor' => 'required|min:5',
            'issued_passpor' => 'required|min:5',
            'expiried_passpor' => 'required|min:5',
            'tanggal_keberangkatan' => 'required|date|',
            'status_pembayaran' => 'required',
            'no_telp' => 'required|int',
            'email' => 'required',
            'avatar' => 'required|mimes:jpf,jpeg,bmp,png|max:1024',
            'foto_passport' => 'required|mimes:jpf,jpeg,bmp,png|max:1024',
            'foto_ktp' => 'required|mimes:jpf,jpeg,bmp,png|max:1024',
        ],[
            'reqired' => 'wajib diisi !!',
        ]);

        // jika validasi lolos
        $file = Request()->avatar;
        $file = Request()->foto_passport;
        $file = Request()->foto_ktp;
        $fileName = Request()->nik . Requsest->name() . '.' . $file->extension();
        $file->move(public_path('image_jamaah'), $fileName);

        $data = [
            'grub' => Request->grub,
            'nama_ayah' => Request->nama_ayah,
            'nik' => Request->nik,
            'alamat' => Request->alamat,
            'desa_kelurahan' => Request->desa_kelurahan,
            'kecamatan' => Request->kecamatan,
            'kabupaten_kota' => Request->kabupaten,
            'provinsi' => Request->provinsi,
            'sex' => Request->sex,
            'name' => Request->name,
            'tempat_lahir' => Request->tempat_lahir,
            'tanggal_lahir' => Request->Tanggal_lahir,
            'passpor_no' => Request->passpor_no,
            'place_of_isssued_passpor' => Request->place_of_isssued_passpor,
            'issued_passpor' => Request->issued_passpor,
            'expiried_passpor' => Request->expiried_passpor,
            'tanggal_keberangkatan' => Request->tanggal_keberangkatan,
            'status_pembayaran' => Request->status_pembayaran,
            'no_telp' => Request->no_telp,
            'email' => Request->email,
            'avatar' => $fileName,
            'foto_passport' => $fileName,
            'foto_ktp' => $fileName,
        ];

        $this->data_jamaah->editData($id, $data);
        return redirect('dashboard/data_jamaah')->with('sucess', 'Data Jamaah Berhasil Diupdate');

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

        // $item->update($data);

        // $this->data_jamaah->editData($id, $jamaah);

        // return redirect('dashboard/data_jamaah')->with('sucess', 'Data Jamaah Berhasil Diupdate');
    }
>>>>>>> e87669f5b627c76d978c025b453c15740084186f
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
<<<<<<< HEAD

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
=======
    public function input_go(Request $request)
    {
        // dd($request);
        // $this->validate($request, [
        //     'nama_depan' => 'required|min:5',
        //     'email' => 'required|email|unique:users',
        //     'jenis_kelamin' => 'required',
        //     'agama' => 'required',
        //     'avatar' => 'mimes:jpeg,bmp,png'
        // ]);
        //
>>>>>>> e87669f5b627c76d978c025b453c15740084186f
    }
}

