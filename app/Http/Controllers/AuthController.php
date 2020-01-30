<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Client;
use Session;

class AuthController extends Controller
{
    public function login() {
        return view('login');
    }

    public function store(Request $request) {
        $this->validate($request,[
    		'username' => 'required',
    		'password' => 'required'
        ]);
        
        if(Client::where('username', '=', $request->username)->count() > 0)
        {
            $userdata = Client::where('username', '=', $request->username)->first();
            if (Hash::check($request->password, $userdata->password)) {
                $request->session()->put('id', $userdata->id);
                $request->session()->put('user_nama', $userdata->user_nama);
                $request->session()->put('username', $userdata->username);
                $request->session()->put('nama_role', $userdata->role->nama_role);
                $request->session()->put('nama_toko', $userdata->toko->nama_toko);
                Session::flash('success','Login berhasil.');
                return redirect('/');
            }
            else {
                Session::flash('error','Username atau password salah.');
                return redirect('/login');
            }
        } else {
            Session::flash('error','Username atau password salah.');
            return redirect('/login');
        }
    }

    public function logout(Request $request) {
        $request->session()->forget('username');
        $request->session()->forget('id');
        $request->session()->forget('user_nama');
        $request->session()->forget('role_id');
        Session::flash('success','Logout berhasil.');
        return redirect('/login');
    }
}
