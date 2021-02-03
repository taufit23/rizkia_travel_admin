<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Ramsey\Uuid\Generator\RandomBytesGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Paginator;
use Laravolt\Indonesia\Models\Province;
use \App\Models\data_jamaah;
use Illuminate\Pagination\LengthAwarePaginator;


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
    public function import_data()
    {
        return view('admin.import');
    }
    public function edit_data($id)
    {

        $jamaah = data_jamaah::find($id);
        // dd($jamaah);
        return view('admin.edit', ['jamaah' => $jamaah]);
    }

    public function update_data($id)
    {
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
            'tanggal_keberangkatan' => 'required|date|'
        ]);
        $jamaah = [
            'grub' => $request->grub,
            'nama_ayah' => $request->nama_ayah,
            'nik' => $request->nik,
            'alamat' => $request->alamat,
            'desa_kelurahan' => $request->desa_kelurahan,
            'kecamatan' => $request->kecamatan,
            'kabupaten_kota' => $request->kabupaten_kota,
            'provinsi' => $request->provinsi,
            'sex' => $request->sex,
            'name' => $request->name,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'passpor_no' => $request->passpor_no,
            'place_of_isssued_passpor' => $request->place_of_isssued_passpor,
            'issued_passpor' => $request->issued_passpor,
            'expiried_passpor' => $request->expiried_passpor,
            'tanggal_keberangkatan' => $request->tanggal_keberangkatan,
        ];

        $this->data_jamaah->editData($id, $jamaah);

        return redirect('dashboard/data_jamaah')->with('sucess', 'Data Jamaah Berhasil Diupdate');
    }
}
