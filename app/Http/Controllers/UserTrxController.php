<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usertrx;
use App\User;
use App\Exports\ExportTrx;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class UserTrxController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $batas = 5;
        $jumlah_trx = Usertrx::count();
        $trx = Usertrx::with('user')->paginate($batas);
        $no = $batas * ($trx->currentPage()-1);
        return view('usertrx.index', compact('trx','no', 'jumlah_trx'));
    }
    public function edit($id){
        $trx = Usertrx::find($id);
        return view('usertrx.edit', compact('trx'));
    }
    public function update(Request $request, $id){
        $trx = Usertrx::find($id);
        $trx->id = $request->id;
        $trx->user_id = $request->user_id;
        $trx->status = $request->status;
        $trx->kode = $request->kode;
        $trx->jumlah_harga = $request->jumlah_harga;
        $trx->update();
        return redirect('/usertrx')->with('pesan', 'Data berhasil diupdate');
    }
    public function destroy($id){
        $trx = Usertrx::find($id);
        $trx->delete();
        return redirect('/usertrx')->with('pesan', 'Data berhasil dihapus');
    }
    public function exportTrx(){
        return Excel::download(new exportTrx, 'data_transaksi.xlsx');
    }
    public function pdfUsertrx(){
        $trx = Usertrx::with('user')->paginate();
        $tot = Usertrx::sum('jumlah_harga');
        
        return view('usertrx.pdfTrx', compact('trx','tot'));
    }
}
