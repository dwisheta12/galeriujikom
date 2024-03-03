<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/explore');
        } else {
            return redirect('/login')->with('error', 'Email Atau Password Salah');
        }

    }

    public function register(Request $request){

        $pesan = [
         'email.required'       =>  'Email Tidak Boleh Kosong',
         'email.unique'         =>  'Email Sudah Terpakai',
         'password.required'    =>  'Password Tidak Boleh Kosong',
         'password.min'         =>  'Password Minimal 6 Karakter',
         'username.required'    =>  'Username Tidak Boleh Kosong',
         'username.unique'      =>  'Username Sudah Terpakai'
         ];

         //Validasi
     $request -> validate ([
         'email'                => 'required|unique:users,email',
         'password'             => 'required|min:6',
         'username'             => 'required|unique:users,username'
     ],$pesan);
         //Proses Simpan
         $dataUser = [
             'email'        => $request->email,
             'password'     => bcrypt($request->password),
             'username'     => $request->username,
             ];
             User::create($dataUser);
             return redirect('/register')->with('success', 'Data Berhasil Di Simpan');

     }

     public function logout(Request $request)
        {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
        }
}
