<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    public function update_profile(Request $request, $id)
    {
        // dd($request->all());
        $user = User::find($id);
        $request->validate([
            'avatar' => 'image|mimes:png,jpg,jpeg,gif,svg|max:2048',
            'name' => 'min:2|max:192|string|',
            'email' => 'email'
        ]);
        // update avatar
        if ($request->hasFile('avatar')) {
            Storage::delete('public/storage/' . $user->avatar);
            // dd($user);
            $request->file('avatar')->storeAs('public', $request->id . 'user_avatar_' . $request->file('avatar')->getClientOriginalName());
            $user->avatar = $request->id . 'user_avatar_' . $request->file('avatar')->getClientOriginalName();
            $user->save();
        }
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            ]);
        return redirect()->route('my_profile', $id)->with('sucess', 'Data Berhasil diUpdate');
    }
}
