<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Session;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use App\Models\ModelUser;

class UserController extends Controller
{
    public function index(){
        $petugas = $this->selectDashboard();
        return view('user',["petugas"=>$petugas]);
    }

    public function beranda(){
        return view('risa');
    }

    public function jadwalList(){
        $user = $this->selectUser();
        return view('user_jadwal',["user"=>$user]);
    }

    public function insertForm()
    {
        $petugas = $this->selectTPS();
        return view('user_input',["petugas"=>$petugas]);
    }

    public function insertFormValidator(Request $request){
        $rules=[
            'nama' => 'required|min:1|max:30',
                    'alamat' => 'required',
                    'berat_sampah' => 'required|min:1|max:2',
                    'tanggal_jemput' => 'required',
                    'id_petugas' => 'required',
                    // 'status' => 'required',
        ];
        $error_message=[
            'required' => ':attribute wajib diisi.',
            'size' => ':attribute harus berukuran :size karakter.',
            'max' => 'attribute maksimal berisi :max karakter.',
            'min' => 'attribute minimal berisi :min karakter.',
            'in' => ':attribute yang dipilih tidak valid.'
        ];
        $validator=Validator::make($request->all(),$rules,$error_message);
        // dd($validator->errors());
        if($validator->fails()){
            return redirect('/user-input')->withErrors($validator)->withInput();
        }else{
            $data = new ModelUser();
            $data->nama = $request->nama;
            $data->alamat = $request->alamat;
            $data->berat_sampah = $request->berat_sampah;
            $data->tanggal_jemput = $request->tanggal_jemput;
            $data->id_petugas = $request->id_petugas;
            $data->save();
            $request->session()->flash('message', 'Data berhasil ditambahkan!');
            return redirect()->route('user-jadwal');
        }
    }

    public function selectTPS(){
        $result = DB::select("select id_petugas, nama_tps from petugas");
        return $result;
    }

    public function selectDashboard(){
        $result = DB::select("select id_petugas, nama_tps, alamat_tps from petugas");
        return $result;
    }

    public function selectUser(){
        $result = DB::select("select * from user inner join petugas where user.id_petugas = petugas.id_petugas");
        return $result;
    }

    public function delete(Request $request){
        $result = DB::delete("delete from user");
        $request->session()->flash('message_fail', 'Data berhasil dihapus!');
        return redirect()->route('/');
    }

    public function selectView(){
        $result = DB::select("select*from user");
        return view('/',["user"=>$result]);
    }
}
