<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Session;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use App\Models\AdminUser;
use App\Models\ModelAdmin;

class AdminController extends Controller
{
    public function index(){
        $petugas = ModelAdmin::all();
        return view('admin',['petugas'=>$petugas]);
        // return view('admin');
    }

    public function histori(){
        $user = $this->selectUser();
        return view('admin_histori',["user"=>$user]);
    }

    public function selectUser(){
        $result = DB::select("select * from user inner join petugas where user.id_petugas = petugas.id_petugas");
        return $result;
    }

    public function insertForm()
    {
        return view ('admin_input');
    }

    public function insertFormValidator(Request $request){
        $rules=[
            'nama_tps' => 'required|min:1|max:30',
                    'alamat_tps' => 'required',
        ];
        $error_message=[
            'required' => ':attribute wajib diisi.',
            'size' => ':attribute harus berukuran :size karakter.',
            'max' => 'attribute maksimal berisi :max karakter.',
            'min' => 'attribute minimal berisi :min karakter.',
            'in' => ':attribute yang dipilih tidak valid.'
        ];
        $validator=Validator::make($request->all(),$rules,$error_message);

        if($validator->fails()){
            return redirect('/admin-input')->withErrors($validator)->withInput();
        }else{
            $data = new ModelAdmin();
            $data->nama_tps = $request->nama_tps;
            $data->alamat_tps = $request->alamat_tps;
            $data->save();
            $request->session()->flash('message', 'Data berhasil ditambahkan!');
            return redirect()->route('admin');
        }
    }

    public function edit(ModelAdmin $petugas){
        return view('admin_edit',['petugas'=>$petugas]);
    }

    public function update(Request $request, ModelAdmin $petugas){
        $validateData = $request->validate([
            // 'id_petugas'      => 'required|size:8|unique:petugas,id_petugas,'.$petugas->id_petugas,
            'nama_tps'        => 'required|min:3|max:50',
            'alamat_tps'          => 'required',
            ]);

            // $mahasiswa = Mahasiswa::find($mahasiswa->id)->update($validateData);
            $petugas->update($validateData);
            // dd($petugas);

        return redirect()->route('admin',['petugas'=>$petugas->id_petugas])
        ->with('pesan',"Update data {$validateData['nama_tps']} berhasil");
    }

    public function destroy( $id){
        DB::table("petugas")->where('id_petugas', '=', $id)->delete();
        return redirect()->route('admin')
        ->with('pesan',"Hapus data berhasil");
    }

    public function selectView(){
        $result = DB::select("select*from petugas");
        return view('/',["petugas"=>$result]);
    }

}
