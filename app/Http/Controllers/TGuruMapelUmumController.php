<?php

namespace App\Http\Controllers;

use App\t_guru_mapel;
use App\m_guru;
use App\m_kelas;
use App\m_mapel;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class TGuruMapelUmumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {               
        $kf = m_kelas::all();
        $gf = m_guru::all();
        $mf = m_mapel::all();
        $data = t_guru_mapel::with(['guru','kelas','mapel'])->get();
        return view('setMapel',['kf' => $kf,'gf' => $gf,'mf' => $mf]);    
        // echo $data;
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
        $cek = t_guru_mapel::where([['tahun',$request->tahun],['m_kelas_id',$request->kelas],['m_mapel_id',$request->mapel]])->get();
        if(count($cek) >0){
            return response()->json([
                'error' => 'Data Mapel Sudah Ada'
            ]);
        }else{
            $t = new t_guru_mapel;
            $t->m_kelas_id = $request->kelas;
            $t->m_guru_id = $request->guru;
            $t->m_mapel_id = $request->mapel;
            $t->tahun = $request->tahun;
            $t->save();
            return response()->json([
                'message' => 'Success'
            ]);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\t_guru_mapel  $t_guru_mapel
     * @return \Illuminate\Http\Response
     */
    public function show(t_guru_mapel $t_guru_mapel)  
    {
        $walikelas = t_guru_mapel::with(['guru','mapel','kelas','kelas.keahlian'])->get();
        return Datatables::of($walikelas)->addIndexColumn()
        ->addColumn('aksi', function($row){
            $btn = '<button href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->nama.'" class="btn btn-info waves-effect waves-light btn-edit mx-2">
            Edit <span class="mdi mdi-file-document-edit-outline"></span>
            </button> &nbsp';
            $btn = $btn. '<button href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->nama.'" class="btn btn-danger waves-effect waves-light btn-delete"">
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
     * @param  \App\t_guru_mapel  $t_guru_mapel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = t_guru_mapel::find($id);
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
     * @param  \App\t_guru_mapel  $t_guru_mapel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $t = t_guru_mapel::find($id);
        $t->m_kelas_id = $request->kelas;
        $t->m_guru_id = $request->guru;
        $t->m_mapel_id = $request->mapel;
        $t->tahun = $request->tahun;
        $t->save();
        return response()->json([
            'message' => 'Success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\t_guru_mapel  $t_guru_mapel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $t = t_guru_mapel::find($id);
        $t->delete();
        return response()->json([
            "message" => "Success"
        ]);
    }
}
