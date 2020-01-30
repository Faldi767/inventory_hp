<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

Use App\BarangMasuk;
Use App\Smartphone;
Use App\Supplier;
Use Session;

class BarangMasukController extends Controller
{
    public function index() 
    {
        $barangmasuk = BarangMasuk::all();
        return view('barangmasuk/index', ['barangmasuk' => $barangmasuk]);
    }

    public function tambah()
    {
        $smartphone = Smartphone::all();
        $supplier = Supplier::all();
        return view('barangmasuk/tambah', ['smartphone' => $smartphone, 'supplier' => $supplier]);
    }

    public function store(Request $request)
    {
    	$this->validate($request,[
            'supplier_id' => 'required',
            'smartphone_id' => 'required',
            'jumlah' => 'required',
            'bukti' => 'required|file|image|mimes:jpeg,png,jpg'
        ]);

        $bukti = $request->file('bukti');
        $nama_bukti = time()."_".$bukti->getClientOriginalName();
        $tujuan_upload = 'buktibarangmasuk';
        $bukti->move($tujuan_upload,$nama_bukti);
 
        BarangMasuk::create([
    		'supplier_id' => $request->supplier_id,
            'smartphone_id' => $request->smartphone_id,
            'jumlah' => $request->jumlah,
            'bukti' => $nama_bukti
    	]);
        Session::flash('success','Data berhasil ditambah.');
    	return redirect('/barangmasuk');
    }
}
