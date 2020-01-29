<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Supplier;
use Session;

class SupplierController extends Controller
{
    public function index() {
        $supplier = supplier::all();
        return view('supplier/index', ['supplier' => $supplier]);
    }

    public function tambah() {
        return view('supplier/tambah');
    }

    public function store(Request $request)
    {
    	$this->validate($request,[
    		'nama_supplier' => 'required'
    	]);
 
        supplier::create([
    		'nama_supplier' => $request->nama_supplier
    	]);
        Session::flash('success','Data berhasil ditambah.');
    	return redirect('/supplier');
    }

    public function edit($id)
    {
        $supplier = Supplier::find($id);
        return view('supplier/edit', ['supplier' => $supplier]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
            'nama_supplier' => 'required'
        ]);
    
        $supplier = Supplier::find($id);
        $supplier->nama_supplier = $request->nama_supplier;
        $supplier->save();
        Session::flash('success','Data berhasil diupdate.');
        return redirect('/supplier');
    }

    public function delete($id) 
    {
        $supplier = Supplier::find($id);
        $supplier->delete();
        Session::flash('success','Data berhasil dihapus.');
        return redirect('/supplier');
    }

    public function trash() {
        $supplier = Supplier::onlyTrashed()->get();
        return view('supplier/trash', ['supplier' => $supplier]);

    }

    public function restore($id) 
    {
        $supplier = Supplier::onlyTrashed()->where('id',$id);
        $supplier->restore();
        Session::flash('success','Data berhasil dikembalikan.');
        return redirect('/supplier/trash');
    }

    public function restoreall()
    {
        $supplier = Supplier::onlyTrashed();
        $supplier->restore();
        Session::flash('success','Data berhasil dikembalikan semua.');
        return redirect('supplier/trash');
    }

    public function hapuspermanen($id) 
    {
        $supplier = Supplier::onlyTrashed()->where('id',$id);
        $supplier->forceDelete();
        Session::flash('success','Data berhasil dihapus.');
        return redirect('/supplier/trash');
    }

    public function hapusall()
    {
        $supplier = Supplier::onlyTrashed();
        $supplier->forceDelete();
        Session::flash('success','Data berhasil dihapus semua.');
        return redirect('supplier/trash');
    }
}
