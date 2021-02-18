<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\Echo_;

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
    public function delete_user(Request $request, $id)
    {
        $user = User::find($id);
        // dd($user);
        $user->delete();
        return redirect()->back()->with('sucess', 'Data User Berhasil Dihapus');
    }
    public function edit_password_user($id)
    {
        $user = User::find($id);
        // dd($user);
        return view('admin.user.edit_password', compact('user'));
    }
    public function update_password_user(Request $request)
    {
        // dd($request);
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

        return redirect()->route('my_profile', $request->id)->with("sucess","Password changed successfully !");
    }

}
