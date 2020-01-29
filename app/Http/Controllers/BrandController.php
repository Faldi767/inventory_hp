<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Brand;
use Session;

class BrandController extends Controller
{
    public function index() {
        $brand = brand::all();
        return view('brand/index', ['brand' => $brand]);
    }

    public function tambah() {
        return view('brand/tambah');
    }

    public function store(Request $request)
    {
    	$this->validate($request,[
    		'nama_brand' => 'required'
    	]);
 
        brand::create([
    		'nama_brand' => $request->nama_brand
    	]);
        Session::flash('success','Data berhasil ditambah.');
    	return redirect('/brand');
    }

    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('brand/edit', ['brand' => $brand]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
            'nama_brand' => 'required'
        ]);
    
        $brand = Brand::find($id);
        $brand->nama_brand = $request->nama_brand;
        $brand->save();
        Session::flash('success','Data berhasil diupdate.');
        return redirect('/brand');
    }

    public function delete($id) 
    {
        $brand = Brand::find($id);
        $brand->delete();
        Session::flash('success','Data berhasil dihapus.');
        return redirect('/brand');
    }

    public function trash() {
        $brand = Brand::onlyTrashed()->get();
        return view('brand/trash', ['brand' => $brand]);

    }

    public function restore($id) 
    {
        $brand = Brand::onlyTrashed()->where('id',$id);
        $brand->restore();
        Session::flash('success','Data berhasil dikembalikan.');
        return redirect('/brand/trash');
    }

    public function restoreall()
    {
        $brand = Brand::onlyTrashed();
        $brand->restore();
        Session::flash('success','Data berhasil dikembalikan semua.');
        return redirect('brand/trash');
    }

    public function hapuspermanen($id) 
    {
        $brand = Brand::onlyTrashed()->where('id',$id);
        $brand->forceDelete();
        Session::flash('success','Data berhasil dihapus.');
        return redirect('/brand/trash');
    }

    public function hapusall()
    {
        $brand = Brand::onlyTrashed();
        $brand->forceDelete();
        Session::flash('success','Data berhasil dihapus semua.');
        return redirect('brand/trash');
    }
}
