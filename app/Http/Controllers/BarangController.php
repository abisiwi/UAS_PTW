<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataBarang;
use App\Exports\exportBarang;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Auth;

class barangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $batas = 5;
        $jumlah_data = DataBarang::count();
        $barang = DataBarang::orderBy('id', 'asc')->paginate($batas);
        $no = $batas * ($barang->currentPage()-1);
        return view('barang.index', compact('barang', 'no', 'jumlah_data'));
    }
    public function create(){
        return view('barang.create');
    }
    public function store(Request $request){
        $barang = new DataBarang;
        $barang->nama_barang = $request->nama;
        $barang->harga = $request->harga;
        $barang->stok = $request->stok;
        $barang->keterangan = $request->keterangan;
        if($request->hasFile('gambar')){
            $file       = $request->file('gambar');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads', $filename);
            $barang->gambar = $filename;
        }else{
            return $request;
            $barang->gambar='';
        }
        $barang->save();
        return redirect()->route('barang')->with('pesan', 'Data berhasil disimpan');
    }
    public function edit($id){
        $barang = DataBarang::find($id);
        return view('barang.edit', compact('barang'));
    }
    public function update(Request $request, $id){
        $barang = DataBarang::find($id);
        $barang->nama_barang = $request->nama;
        $barang->harga = $request->harga;
        $barang->stok = $request->stok;
        $barang->keterangan = $request->keterangan;

        if($request->hasFile('gambar')){
            $file       = $request->file('gambar');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads', $filename);
            $barang->gambar = $filename;
        }else{
            $barang->nama_barang = $request->nama;
            $barang->harga = $request->harga;
            $barang->keterangan = $request->keterangan;
        }

        $barang->update();
        return redirect()->route('barang')->with('pesan', 'Data berhasil diupdate');
    }
    public function destroy($id){
        $barang = DataBarang::find($id);
        $barang->delete();
        return redirect('/barang')->with('pesan', 'Data berhasil dihapus');
    }

    public function exportBarang(){
        return Excel::download(new ExportBarang, 'data_barang.xlsx');
    }
    public function pdfBarang(){
        $barang = DataBarang::all();
        return view('barang.pdfBarang', compact('barang'));
    }

}
