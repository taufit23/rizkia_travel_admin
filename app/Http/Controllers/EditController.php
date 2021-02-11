<?php

namespace App\Http\Controllers;

use App\Models\data_jamaah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class EditController extends Controller
{
    // personal Edit
    public function edit_data_pribadi($id)
    {
        $jamaah = data_jamaah::find($id);
        // dd($jamaah);
        return view('admin.edit_personal', ['jamaah' => $jamaah]);
    }
    public function edit_data_pribadi_action(Request $request, $id)
    {
        // dd($request->all());
        $jamaah = data_jamaah::find($id);
        $request->validate([
            'avatar' => 'image|mimes:png,jpg,jpeg,gif,svg|max:2048',
            'name' => 'min:2|max:192|string|',
            'nik' => 'min:2|max:192',
        ]);
        // update avatar
        if ($request->hasFile('avatar')) {
            Storage::delete('public/storage/' . $jamaah->avatar);
            $request->file('avatar')->storeAs('public', $request->id . 'avatar_' . $request->file('avatar')->getClientOriginalName());
            $jamaah->avatar = $request->id . 'avatar_' . $request->file('avatar')->getClientOriginalName();
            $jamaah->save();
        }
        $jamaah->update([
            'name' => $request->name,
            'nik' => $request->nik,
            'tampat_lahir' => $request->tampat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'sex' => $request->sex,
            'nama_ayah' => $request->nama_ayah,
            'email' => $request->email,
            'no_telp' => $request->no_telp
        ]);
        return redirect()->route('detail.jamaah', $id)->with('sucess', 'Data berhasil diUpdate');
    }

    // jamaah edit
    public function edit_data_jamaah($id)
    {
        $jamaah = data_jamaah::find($id);
        // dd($jamaah);
        return view('admin.edit_jamaah', ['jamaah' => $jamaah]);
    }
    public function edit_data_jamaah_action(Request $request, $id)
    {
        // dd($request->all());
        $jamaah = data_jamaah::find($id);
        $request->validate([
            'foto_passport' => 'image|mimes:png,jpg,jpeg,gif,svg|max:2048'
        ]);


        // dd($request->file('foto_passport'));

        // update foto_passport
        if ($request->hasFile('foto_passport')) {
            Storage::delete('public/storage/' . $jamaah->foto_passport);
            $request->file('foto_passport')->storeAs('public', $request->id . 'foto_passport_' . $request->file('foto_passport')->getClientOriginalName());
            $jamaah->foto_passport = $request->id . 'foto_passport_' . $request->file('foto_passport')->getClientOriginalName();
            $jamaah->save();
        }
        $jamaah->update([
            'tanggal_keberangkatan' => $request->tanggal_keberangkatan,
            'grub' => $request->grub,
            'status_pembayaran' => $request->status_pembayaran,
            'jenis_paket' => $request->jenis_paket,
            'passpor_no' => $request->passpor_no,
            'place_of_isssued_passpor' => $request->place_of_isssued_passpor,
            'issued_passpor' => $request->issued_passpor,
            'expiried_passpor' => $request->expiried_passpor,
        ]);
        return redirect()->route('detail.jamaah', $id)->with('sucess', 'Data berhasil diUpdate');
    }

    // alamat edit
    public function edit_alamat($id)
    {
        // $provinsi = \Laravolt\Indonesia\IndonesiaService::allProvinces();
        $jamaah = data_jamaah::find($id);
        // dd($jamaah);
        return view('admin.edit_alamat', [
            'jamaah' => $jamaah,
            'provinsi'     => Laravolt\indonesia\Facade::class,
            ]);
    }
    public function edit_alamat_action(Request $request, $id)
    {
        // dd($request->all());
        $jamaah = data_jamaah::find($id);
        $request->validate([
            'foto_ktp' => 'image|mimes:png,jpg,jpeg,gif,svg|max:2048',
        ]);
        // update foto_ktp
        if ($request->hasFile('foto_ktp')) {
            Storage::delete('public/storage/' . $jamaah->foto_ktp);
            $request->file('foto_ktp')->storeAs('public', $request->id . 'foto_ktp_' . $request->file('foto_ktp')->getClientOriginalName());
            $jamaah->foto_ktp = $request->id . 'foto_ktp_' . $request->file('foto_ktp')->getClientOriginalName();
            $jamaah->save();
        }
        $jamaah->update([
            'provinsi' => $request->provinsi,
            'kabupaten_kota' => $request->kabupaten_kota,
            'kecamatan' => $request->kecamatan,
            'desa_kelurahan' => $request->desa_kelurahan,
            'alamat' => $request->alamat
        ]);
        return redirect()->route('detail.jamaah', $id)->with('sucess', 'Data berhasil diUpdate');
    }
}
