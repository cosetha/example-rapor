<?php

namespace App\Http\Controllers;

use App\t_guru_mapel_ahli;
use App\m_guru;
use App\m_kelas;
use App\m_mapel_ahli;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Auth;

class TGuruMapelAhliController extends Controller
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
        $mf = m_mapel_ahli::all();
        return view('setMapelAhli',['kf' => $kf,'gf' => $gf,'mf' => $mf]);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $ahli = m_mapel_ahli::where('id_bidang',$request->id)->get();
        return response()->json($ahli);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cek = t_guru_mapel_ahli::where([['tahun',$request->tahun],['m_kelas_id',$request->kelas],['m_mapel_id',$request->mapel]])->get();
        if(count($cek) >0){
            return response()->json([
                'error' => 'Data Mapel Sudah Ada'
            ]);
        }else{
            $t = new t_guru_mapel_ahli;
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
     * @param  \App\t_guru_mapel_ahli  $t_guru_mapel_ahli
     * @return \Illuminate\Http\Response
     */
    public function show(t_guru_mapel_ahli $t_guru_mapel_ahli)
    {
        $walikelas = t_guru_mapel_ahli::with(['guru','mapel','kelas','kelas.keahlian'])->get();
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
     * @param  \App\t_guru_mapel_ahli  $t_guru_mapel_ahli
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = t_guru_mapel_ahli::find($id);
        $kelas = t_guru_mapel_ahli::with('kelas')->find($id);
        $mapel = m_mapel_ahli::where('id_bidang',$kelas->kelas[0]->id_keahlian)->get();
        if($data !=null){
            $res['message'] = "Success!";
            $res['values'] = $data;
            $res['mapel'] = $mapel;
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
     * @param  \App\t_guru_mapel_ahli  $t_guru_mapel_ahli
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $t = t_guru_mapel_ahli::find($id);
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
     * @param  \App\t_guru_mapel_ahli  $t_guru_mapel_ahli
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $t = t_guru_mapel_ahli::find($id);
        $t->delete();
        return response()->json([
            "message" => "Success"
        ]);
    }

    public function coba(){
        echo \App\m_guru::where('id_user',4)->whereHas('walikelas')->count();
        
    }
}
