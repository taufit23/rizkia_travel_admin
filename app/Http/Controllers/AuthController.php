<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('auths.login');
    }
    public function postlogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ],
    [
        'required' => 'Mana Bisa Login Kalau Nggak Diisi',
        'email' => 'Masukin Email Yang bener dong!!'
    ]);
        // dd($request->all());
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/dashboard');
        }
        return redirect('/');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
    public function my_profile($id)
    {
        $user = User::where('id',$id)->get();
        return view('admin.user.detail', ['user' => $user]);
    }
    public function edit_profile($id)
    {
        return view('admin.user.edit');
    }
}
