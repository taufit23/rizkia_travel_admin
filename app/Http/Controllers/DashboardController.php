<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use \App\Models\data_jamaah;
use App\Models\Galery_Jamaah;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use mysqli;
use PhpParser\Node\Stmt\While_;
class DashboardController extends Controller
{
    public function index()
    {
        $image_galery = Galery_Jamaah::orderBy('updated_at', 'desc')->get();
        $countall = data_jamaah::count();
        $time = Carbon::now();
        $data_jamaah = data_jamaah::select('tanggal_keberangkatan'); 
        return view('admin/index', compact('countall', 'time', 'image_galery'));
    }

    public function slide_show()
    {
        $image_galery = Galery_Jamaah::orderBy('updated_at', 'desc')->get();
        return view('slide_show.index', compact('image_galery'));
    }
    public function slide_show_tambah(Request $request)
    {
        // dd($request);

        $request->validate([
            'image' => 'image|mimes:png,jpg,jpeg,gif,svg|max:20048',
            'title' => 'string|min:5',
            'deskripsi' => 'string',
        ]);

        // update image
        if ($request->hasFile('image')) {
            $request->file('image')->storeAs('public/image_jamaah', $request->id . 'image_' . $request->file('image')->getClientOriginalName());

            Galery_Jamaah::create([
                'image' => 'image_' . $request->file('image')->getClientOriginalName(),
                'title' => $request->title,
                'deskripsi' => $request->deskripsi,
                'creator' => $request->creator
            ]);
            return redirect('slide_show/slide_show_management')->with('sucess', 'Gambar Telah Di Upload');
        }
    }
}
