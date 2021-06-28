<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class AuthController extends Controller
{
    public function login()
    {
    	return view('auth.login');
    }

    public function postlogin(Request $request)
    {
      // echo "$request->email.$request->password "; die;
    	if(Auth::attempt($request->only('email','password'))){
            $akun = user::where('email', $request->email)->first();
            //dd($akun);
            if($akun->role =='admin'){
                Auth::guard('admin')->LoginUsingId($akun->id);
                return redirect('/barang')->with('sukses','Anda Berhasil Login');
            } else if($akun->role ==null){
                Auth::guard('users')->LoginUsingId($akun->id);
                return redirect('/home')->with('sukses','Anda Berhasil Login');
            }
    	}
    	return redirect('/login')->with('error','Akun Belum Terdaftar');
    }

    public function logout()
    {
        if(Auth::guard('admin')->check()){
            Auth::guard('admin')->logout();
        } else if(Auth::guard('users')->check()){
            Auth::guard('users')->logout();
        }
    	return redirect('login')->with('sukses','Anda Telah Logout');
    } 
}
