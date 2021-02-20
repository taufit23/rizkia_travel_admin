<?php

namespace App\Http\Controllers;

use App\Models\data_jamaah;
use Illuminate\Http\Request;

class TampilDataController extends Controller
{
    public function tampil_data(Request $request)
    {
        if ($request->has('cari')) {
            $data_jamaah =  data_jamaah::select("*")
            ->where('nik', 'LIKE','%'.$request->cari.'%')
            ->orWhere('name', 'LIKE','%'.$request->cari.'%')
            ->orWhere('passpor_no', 'LIKE','%'.$request->cari.'%')
            ->orWhere('grub', 'LIKE','%'.$request->cari.'%')
            ->orWhere('tanggal_keberangkatan', 'LIKE','%'.$request->cari.'%')
            ->paginate(10000000);
        }
        else{
            $data_jamaah = data_jamaah::orderBy('created_at', 'desc')->paginate(5);
        }

        // $data_jamaah = \App\Models\data_jamaah::paginate(10);

        return view('admin.data_jamaah', compact('data_jamaah'))->with('i', (request()->input('page', 1) - 1) * 5);
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
        return redirect()->back()->with('sucess', 'Data Jamaah Berhasil Dihapus');
    }
}
