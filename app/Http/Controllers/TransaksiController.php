<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

Use App\Transaksi;
Use App\Smartphone;
Use App\Toko;
Use Session;

class TransaksiController extends Controller
{
    public function index() 
    {
        $transaksi = Transaksi::all();
        return view('transaksi/index', ['transaksi' => $transaksi]);
    }

    public function tambah()
    {
        $smartphone = Smartphone::all();
        $toko = Toko::all();
        return view('transaksi/tambah', ['smartphone' => $smartphone, 'toko' => $toko]);
    }

    public function store(Request $request)
    {
    	$this->validate($request,[
            'toko_id' => 'required',
            'smartphone_id' => 'required',
            'jumlah' => 'required',
            'bukti' => 'file|image|mimes:jpeg,png,jpg'
        ]);

        if(Smartphone::find($request->smartphone_id)->jumlah < $request->jumlah) {
            $jumlaherror = Smartphone::find($request->smartphone_id)->jumlah;
            $text = "Jumlah tidak boleh lebih dari $jumlaherror";
            Session::flash('error', $text);
            return redirect('/transaksi/tambah');
        }
 
        Transaksi::create([
    		'toko_id' => $request->toko_id,
            'smartphone_id' => $request->smartphone_id,
            'jumlah' => $request->jumlah
    	]);
        Session::flash('success','Data berhasil ditambah.');
    	return redirect('/transaksi');
    }

    public function edit($id)
    {
        $transaksi = Transaksi::find($id);
        return view('transaksi/edit', ['transaksi' => $transaksi]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
            'bukti' => 'required|file|image|mimes:jpeg,png,jpg'
        ]);

		$file = $request->file('bukti');
		$nama_file = time()."_".$file->getClientOriginalName();
		$tujuan_upload = 'buktitransaksi';
        $file->move($tujuan_upload,$nama_file);
        
        $transaksi = Transaksi::find($id);
        $transaksi->bukti = $nama_file;
        $transaksi->status = 1;
        $transaksi->save();
        Session::flash('success','Data berhasil diupdate.');
        return redirect('/transaksi');
    }
}
