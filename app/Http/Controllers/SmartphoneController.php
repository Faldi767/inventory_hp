<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

Use App\Smartphone;
Use App\Brand;
Use Session;

class SmartphoneController extends Controller
{
    public function index() 
    {
        $smartphone = Smartphone::all();
        return view('smartphone/index', ['smartphone' => $smartphone]);
    }

    public function tambah()
    {
        $brand = Brand::all();
        return view('smartphone/tambah', ['brand' => $brand]);
    }

    public function store(Request $request)
    {
    	$this->validate($request,[
            'nama_smartphone' => 'required',
            'brand_id' => 'required'
    	]);
 
        Smartphone::create([
    		'nama_smartphone' => $request->nama_smartphone,
            'brand_id' => $request->brand_id
    	]);
        Session::flash('success','Data berhasil ditambah.');
    	return redirect('/smartphone');
    }

    public function edit($id)
    {
        $smartphone = Smartphone::find($id);
        $brand = Brand::all();
        return view('smartphone/edit', ['smartphone' => $smartphone, 'brand' => $brand]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
            'nama_smartphone' => 'required',
            'brand_id' => 'required'
        ]);
    
        $smartphone = Smartphone::find($id);
        $smartphone->nama_smartphone = $request->nama_smartphone;
        $smartphone->brand_id = $request->brand_id;
        $smartphone->save();
        Session::flash('success','Data berhasil diupdate.');
        return redirect('/smartphone');
    }

    public function delete($id) 
    {
        $smartphone = Smartphone::find($id);
        $smartphone->delete();
        Session::flash('success','Data berhasil dihapus.');
        return redirect('/smartphone');
    }

    public function trash() {
        $smartphone = Smartphone::onlyTrashed()->get();
        return view('smartphone/trash', ['smartphone' => $smartphone]);
    }

    public function restore($id) 
    {
        $smartphone = Smartphone::onlyTrashed()->where('id',$id);
        $smartphone->restore();
        Session::flash('success','Data berhasil dikembalikan.');
        return redirect('/smartphone/trash');
    }

    public function restoreall()
    {
        $smartphone = Smartphone::onlyTrashed();
        $smartphone->restore();
        Session::flash('success','Data berhasil dikembalikan semua.');
        return redirect('smartphone/trash');
    }

    public function hapuspermanen($id) 
    {
        $smartphone = Smartphone::onlyTrashed()->where('id',$id);
        $smartphone->forceDelete();
        Session::flash('success','Data berhasil dihapus.');
        return redirect('/smartphone/trash');
    }

    public function hapusall()
    {
        $smartphone = Smartphone::onlyTrashed();
        $smartphone->forceDelete();
        Session::flash('success','Data berhasil dihapus semua.');
        return redirect('smartphone/trash');
    }
}
