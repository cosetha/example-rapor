<?php

namespace App\Http\Controllers;

use App\m_guru;
use App\User;
use App\tahun;
use App\Relation;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class MGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // print_r(m_guru::find(1)->relation()->first()->tojson());
        // foreach (m_guru::find(1)->relation()->get() as $relation) {
        //     // $plan = $relation->kelas;
        //     // $student = $relation->mapel;

        //     // echo($relation."<br />");
        //     echo($relation);
        // }
       
        // // print_r(m_guru::find(1)->relation()->first()->mapel()->first()->nama);
        // foreach (m_guru::find(1)->relation()->first()->mapel()->get() as $relation) {
        //     echo($relation);
        // }

        //  foreach (m_guru::find(1)->relation()->get() as $relation) {
        //     // $plan = $relation->kelas;
        //     // $student = $relation->mapel;

        //     // echo($relation."<br />");
        //     echo($relation->kelas()->first()."<br>");
        // }

        // $tahun =  tahun::select('*',DB::raw("'10%' as tax"))->get();
        // foreach ($tahun as $key => $value) {
        //     $value['tax'] = '10%';
        //     echo $value;
        // }
      
        return view('guru');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $guru = m_guru::find(2);
        // $guru->relation()->create([
        //     'm_kelas_id' => 1,
        //     'm_mapel_id' => 1,
        //  ]);
        //  return response()->json([
        //     'error' => "MBULLLED"
        // ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $guru = m_guru::find(2);
        // $data = new Relation([
        //     'm_kelas_id' => 1,
        //     'm_mapel_id' => 1,
        //  ]);

        //  $guru->relation()->save($data);
        //  return response()->json([
        //     'error' => "MBULLL"
        // ]);
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
                $u->name = $request->nama;
                $u->username = $request->username;
                $u->email = $request->email;
                $u->password = bcrypt($request->password);
                $u->level = 'Guru';
                $u->remember_token = '';
                $u->save();

                $g = new m_guru;
                $g->nama = $request->nama;
                $g->nip = $request->nip;
                $g->is_bk = $request->is_bk;
                $g->id_user = $u->id;
                $g->save();
            });
           
        } 

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\m_guru  $m_guru
     * @return \Illuminate\Http\Response
     */
    public function show(m_guru $m_guru)
    {
        $guru = m_guru::with('guru')->orderBy('id','desc')->get();

        return Datatables::of($guru)->addIndexColumn()
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
     * @param  \App\m_guru  $m_guru
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = m_guru::find($id);
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
     * @param  \App\m_guru  $m_guru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $g = m_guru::find($id);
        $g->nama = $request->nama;
        $g->nip = $request->nip;
        $g->is_bk = $request->is_bk;     
        $g->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\m_guru  $m_guru
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $guru = m_guru::find($id);
        // $guru->relation()->whereColumn([
        //     ['m_mapel_id', '=', 1],
        //     ['m_kelas_id', '=', 1],
        // ])->delete();
        //  return response()->json([
        //     'error' => "MBULLLEDIN"
        // ]);

        $guru = m_guru::find($id);
        $guru->guru()->delete();
        $guru->delete();
        return response()->json([
            "message" => "Success"
        ]);
    }
}
