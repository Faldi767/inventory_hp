<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Role;
use Session;

class RoleController extends Controller
{
    public function index() {
        $role = Role::all();
        return view('role/role', ['role' => $role]);
    }

    public function tambah() {
        return view('role/tambah');
    }

    public function store(Request $request)
    {
    	$this->validate($request,[
    		'nama_role' => 'required'
    	]);
 
        Role::create([
    		'nama_role' => $request->nama_role
    	]);
        Session::flash('success','Data berhasil ditambah.');
    	return redirect('/role');
    }

    public function edit($id)
    {
        $role = Role::find($id);
        return view('role/edit', ['role' => $role]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
            'nama_role' => 'required'
        ]);
    
        $role = Role::find($id);
        $role->nama_role = $request->nama_role;
        $role->save();
        Session::flash('success','Data berhasil diupdate.');
        return redirect('/role');
    }

    public function delete($id) 
    {
        $role = Role::find($id);
        $role->delete();
        Session::flash('success','Data berhasil dihapus.');
        return redirect('/role');
    }

    public function trash() {
        $role = Role::onlyTrashed()->get();
        return view('role/trash', ['role' => $role]);

    }

    public function restore($id) 
    {
        $role = Role::onlyTrashed()->where('id',$id);
        $role->restore();
        Session::flash('success','Data berhasil dikembalikan.');
        return redirect('/role/trash');
    }

    public function restoreall()
    {
        $role = Role::onlyTrashed();
        $role->restore();
        Session::flash('success','Data berhasil dikembalikan semua.');
        return redirect('role/trash');
    }

    public function hapuspermanen($id) 
    {
        $role = Role::onlyTrashed()->where('id',$id);
        $role->forceDelete();
        Session::flash('success','Data berhasil dihapus.');
        return redirect('/role/trash');
    }

    public function hapusall()
    {
        $role = Role::onlyTrashed();
        $role->forceDelete();
        Session::flash('success','Data berhasil dihapus semua.');
        return redirect('role/trash');
    }
}
