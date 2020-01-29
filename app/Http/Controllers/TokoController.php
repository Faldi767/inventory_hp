<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Toko;
use Session;

class TokoController extends Controller
{
    public function index() {
        $toko = Toko::all();
        return view('toko/index', ['toko' => $toko]);
    }

    public function tambah() {
        return view('toko/tambah');
    }

    public function store(Request $request)
    {
    	$this->validate($request,[
    		'nama_toko' => 'required'
    	]);
 
        Toko::create([
    		'nama_toko' => $request->nama_toko
    	]);
        Session::flash('success','Data berhasil ditambah.');
    	return redirect('/toko');
    }

    public function edit($id)
    {
        $toko = Toko::find($id);
        return view('toko/edit', ['toko' => $toko]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
            'nama_toko' => 'required'
        ]);
    
        $toko = Toko::find($id);
        $toko->nama_toko = $request->nama_toko;
        $toko->save();
        Session::flash('success','Data berhasil diupdate.');
        return redirect('/toko');
    }

    public function delete($id) 
    {
        $toko = Toko::find($id);
        $toko->delete();
        Session::flash('success','Data berhasil dihapus.');
        return redirect('/toko');
    }

    public function trash() {
        $toko = Toko::onlyTrashed()->get();
        return view('toko/trash', ['toko' => $toko]);

    }

    public function restore($id) 
    {
        $toko = Toko::onlyTrashed()->where('id',$id);
        $toko->restore();
        Session::flash('success','Data berhasil dikembalikan.');
        return redirect('/toko/trash');
    }

    public function restoreall()
    {
        $toko = Toko::onlyTrashed();
        $toko->restore();
        Session::flash('success','Data berhasil dikembalikan semua.');
        return redirect('toko/trash');
    }

    public function hapuspermanen($id) 
    {
        $toko = Toko::onlyTrashed()->where('id',$id);
        $toko->forceDelete();
        Session::flash('success','Data berhasil dihapus.');
        return redirect('/toko/trash');
    }

    public function hapusall()
    {
        $toko = Toko::onlyTrashed();
        $toko->forceDelete();
        Session::flash('success','Data berhasil dihapus semua.');
        return redirect('toko/trash');
    }
}
