<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserManagementController extends Controller
{
    public function tampil_data(Request $request)
    {
        if ($request->has('cari')) {
            $user =  User::select("*")
            ->where('name', 'LIKE','%'.$request->cari.'%')
            ->orWhere('role', 'LIKE','%'.$request->cari.'%')
            ->orWhere('email', 'LIKE','%'.$request->cari.'%')->paginate(10000000);
        }
        else{
            $user = user::orderBy('created_at', 'desc')->paginate(10);
        }

        // $user = \App\Models\user::paginate(10);

        return view('admin.user.data_user', compact('user'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function tambah()
    {
        return view('admin.user.tambah');
    }
    public function tambah_go(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required|string|min:4|',
            'email' => 'required|email|',
            'role' => 'required'
        ]);
        User::create([
        'name' => $request->name,
        'email' => $request->email,
        'role' => $request->role,
        'password' => bcrypt('Rizkia'),
        ]);

        $details = [
            'title' => 'Standard password accepted',
            'body' => '',
            'data' => 'Password Standart Anda Adalah',
            'password' => 'Rizkia',
        ];



        Mail::to("$request->email")->send(new TestMail($details));

         return redirect('/user/user_management')->with('sucess', 'User Baru Ditambahkan!!!, Silahkan Ingatkan Untuk Melihat Emailnya');
    }
}
