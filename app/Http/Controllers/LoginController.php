<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
    }


    public function postlogin(Request $request){
    //    dd($request->all())
    if(Auth::attempt($request->only('name','password'))){
        return redirect('/home');
    }
    else{
        return redirect('/login');
    }

    $messages = [
        'required' => ': harus di isi ! ',
        'min' => 'attribute harus diisi minimal 5 karakter !',
        'max' => 'attribute sudah melebihi batas maksimal !',
    ];

    $this->validate($request,[
        'nama' => 'required|min:5|max:20',
        'password' => 'required',
    ],$messages );

     return view('proses',['data' => $request]);

    }

    public function logout(Request $request){
        Auth::logout();
        return redirect('/');
    }

}
