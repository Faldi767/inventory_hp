<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

Use App\Client;
Use App\Role;
Use App\Toko;
Use Session;

class ClientController extends Controller
{
    public function index() 
    {
        $client = Client::all();
        return view('client/index', ['client' => $client]);
    }

    public function tambah()
    {
        $role = Role::where('nama_role', '!=', "Developer")->get();
        $toko = Toko::all();
        return view('client/tambah', ['role' => $role, 'toko' => $toko]);
    }

    public function store(Request $request)
    {
    	$this->validate($request,[
            'user_nama' => 'required',
            'username' => 'required',
            'password' => 'required',
            'role_id' => 'required',
            'toko_id' => 'required'
    	]);
 
        Client::create([
    		'user_nama' => $request->user_nama,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
            'toko_id' => $request->toko_id
    	]);
        Session::flash('success','Data berhasil ditambah.');
    	return redirect('/client');
    }

    public function edit($id)
    {
        $client = Client::find($id);
        $toko = Toko::all();
        $role = Role::where('nama_role', '!=', "Developer")->get();
        return view('client/edit', ['client' => $client, 'role' => $role, 'toko' => $toko]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
            'user_nama' => 'required',
            'username' => 'required',
            'password' => '',
            'role_id' => 'required'
        ]);
    
        $client = Client::find($id);
        $client->user_nama = $request->user_nama;
        $client->username = $request->username;
        if(isset($request->password)) {
        $client->password = Hash::make($request->password);
        }
        $client->role_id = $request->role_id;
        $client->save();
        Session::flash('success','Data berhasil diupdate.');
        return redirect('/client');
    }

    public function delete($id) 
    {
        $client = Client::find($id);
        $client->delete();
        Session::flash('success','Data berhasil dihapus.');
        return redirect('/client');
    }

    public function trash() {
        $client = Client::onlyTrashed()->get();
        return view('client/trash', ['client' => $client]);
    }

    public function restore($id) 
    {
        $client = Client::onlyTrashed()->where('id',$id);
        $client->restore();
        Session::flash('success','Data berhasil dikembalikan.');
        return redirect('/client/trash');
    }

    public function restoreall()
    {
        $client = Client::onlyTrashed();
        $client->restore();
        Session::flash('success','Data berhasil dikembalikan semua.');
        return redirect('client/trash');
    }

    public function hapuspermanen($id) 
    {
        $client = Client::onlyTrashed()->where('id',$id);
        $client->forceDelete();
        Session::flash('success','Data berhasil dihapus.');
        return redirect('/client/trash');
    }

    public function hapusall()
    {
        $client = Client::onlyTrashed();
        $client->forceDelete();
        Session::flash('success','Data berhasil dihapus semua.');
        return redirect('client/trash');
    }
}
