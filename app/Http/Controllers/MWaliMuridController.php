<?php

namespace App\Http\Controllers;

use App\m_wali_murid;
use App\m_siswa;
use App\User;
use Illuminate\Http\Request;
use App\tahun;
use App\Relation;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;

class MWaliMuridController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user = User::with('guru')->find(2);
        // echo($user."<br>");
        // $wali =  User::with('wali')->find(5);
        // echo($wali);
        $data = m_siswa::all();
        return view('wali',['bidang'=> $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messsages = array(          
            'username.unique' => 'Username telah digunakan', 
            'email.unique' => 'Email sudah digunakan',                 

        );
        $validator = Validator::make(
            $request->all(),
            [                
                "email" => 'unique:users',
                "username"=> 'unique:users'
            ],
            $messsages
        );
        if ($validator->fails()) {
            $error = $validator->errors()->first();

            return response()->json([
                'error' => $error,
            ]);
        } else {
            DB::transaction(function() use($request) {
                $u = new User;
                $u->name = $request->nama_ayah. '-'.$request->nama_ibu;
                $u->username = $request->username;
                $u->email = $request->email;
                $u->password = bcrypt($request->password);
                $u->level = 'Wali';
                $u->remember_token = '';
                $u->save();
                $tanggal_lahir = Carbon::createFromFormat('d-m-Y', $request->tanggal_lahir)->format('Y-m-d');
                $w = new m_wali_murid;
                $w->nama_ayah = $request->nama_ayah;
                $w->nama_ibu = $request->nama_ibu;
                $w->alamat = $request->alamat;
                $w->tanggal_lahir = $tanggal_lahir;
                $w->tempat_lahir = $request->tempat_lahir;
                $w->pekerjaan = $request->pekerjaan;
                $w->no_telp = $request->no_telp;
                if($request->has('wali_siswa')){
                    $w->wali_siswa = $request->wali_siswa;
                }
                $w->id_siswa = $request->id_siswa;
                $w->id_user = $u->id;
                $w->save();
            });
           
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\m_wali_murid  $m_wali_murid
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $wali = m_wali_murid::with('wali')->orderBy('id','desc')->get();

        return Datatables::of($wali)->addIndexColumn()
        ->addColumn('aksi', function($row){
            $btn = '<button href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->nama_bidang.'" class="btn btn-info waves-effect waves-light btn-edit mx-2">
            Edit <span class="mdi mdi-file-document-edit-outline"></span>
            </button> &nbsp';
            $btn = $btn. '<button href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->nama_bidang.'" class="btn btn-danger waves-effect waves-light btn-delete"">
            Delete <span class="mdi mdi-close-circle-outline"></span></i>
            </button>';
            return $btn;
        })
        ->rawColumns(['aksi'])
            ->make(true);    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\m_wali_murid  $m_wali_murid
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = m_wali_murid::find($id);
        if($data !=null){
            $res['message'] = "Success!";
            $res['values'] = $data;
            return response($res);
        }
        else{
            $res['message'] = "Empty!";
            return response($res);
        }    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\m_wali_murid  $m_wali_murid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $w = m_wali_murid::find($id);
        $tanggal_lahir = Carbon::createFromFormat('d-m-Y', $request->tanggal_lahir)->format('Y-m-d');        
        $w->nama_ayah = $request->nama_ayah;
        $w->nama_ibu = $request->nama_ibu;
        $w->alamat = $request->alamat;
        $w->tanggal_lahir = $tanggal_lahir;
        $w->tempat_lahir = $request->tempat_lahir;
        $w->pekerjaan = $request->pekerjaan;
        $w->no_telp = $request->no_telp;
        $w->id_siswa = $request->id_siswa;
        if($request->has('wali_siswa')){
            $w->wali_siswa = $request->wali_siswa;
        }       
        $w->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\m_wali_murid  $m_wali_murid
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wali = m_wali_murid::find($id);
        $wali->wali()->delete();
        $wali->delete();
        return response()->json([
            "message" => "Success"
        ]);
    }
}
