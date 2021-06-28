<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Exports\ExportUser;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $batas = 5;
        $jumlah_user = User::count();
        $user = User::orderBy('id', 'asc')->paginate($batas);
        $no = $batas * ($user->currentPage()-1);
        return view('user.index', compact('user', 'no', 'jumlah_user'));
    }
    public function create(){
        return view('user.create');
    }
    public function store(Request $request){
        $user = new User;
        $user->id = $request->kode;
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->alamat = $request->alamat;
        $user->nohp = $request->nohp;
        $user->password = bcrypt($request->password);
        
        $user->save();
        return redirect('/user')->with('pesan', 'Data berhasil disimpan');
    }
    public function edit($id){
        $user = User::find($id);
        return view('user.edit', compact('user'));
    }
    public function update(Request $request, $id){
        $this->validate($request, [
            'password'  => 'confirmed',
        ]);
        $user = User::find($id);
        $user->name = $request->name;
    	$user->email = $request->email;
    	$user->nohp = $request->nohp;
    	$user->alamat = $request->alamat;
    	if(!empty($request->password))
    	{
    		$user->password = Hash::make($request->password);
    	}
    	
    	$user->update();

        return redirect('/user')->with('pesan', 'Data berhasil diupdate');
    }
    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return redirect('/user')->with('pesan', 'Data berhasil dihapus');
    }
    public function exportUser(){
        return Excel::download(new exportUser, 'data_user.xlsx');
    }
    public function pdfUser(){
        $user = User::all();
        return view('user.pdfUser', compact('user'));
    }
}
