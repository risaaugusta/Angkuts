<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    // public function index(){
    //     return view('petugasjadwal');
    // }

    public function beranda(){
        return view('beranda');
    }

    // public function index(){
    //     $petugas = $this->selectDashboard();
    //     return view('user',["petugas"=>$petugas]);
    // }

    public function selectUser(){
        $result = DB::select("select * from user inner join petugas where user.id_petugas = petugas.id_petugas");
        return $result;
    }

    public function konfirmYes(Request $request){
        $result = DB::update("update user set status = 'selesai' where user.id_user = $request->id");
        return $request->id;
    }

    public function konfirmNo(Request $request){
        $result = DB::update("update user set status = 'ditolak' where user.id_user = $request->id");
        return $request->id;
    }

    public function index(){
        $user = $this->selectUser();
        return view('petugasjadwal',["user"=>$user]);
    }
}
