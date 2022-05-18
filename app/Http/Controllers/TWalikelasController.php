<?php

namespace App\Http\Controllers;

use App\t_walikelas;
use App\m_guru;
use App\m_kelas;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class TWalikelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $kelas = m_kelas::doesntHave('walikelas')->get();
        $guru = m_guru::get();
        $kf = m_kelas::all();
        $gf = m_guru::all();
        return view('setWalikelas',['kelas' => $kelas,'guru'=>$guru,'kf' => $kf,'gf' => $gf]);    
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
        $t = new t_walikelas;
        $t->id_kelas = $request->kelas;
        $t->id_guru = $request->guru;
        $t->save();
        return response()->json([
            'message' => 'Success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\t_walikelas  $t_walikelas
     * @return \Illuminate\Http\Response
     */
    public function show(t_walikelas $t_walikelas)  
    {
        $walikelas = t_walikelas::with(['guru','kelas','kelas.keahlian'])->get();
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
     * @param  \App\t_walikelas  $t_walikelas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = t_walikelas::find($id);
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
     * @param  \App\t_walikelas  $t_walikelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $t = t_walikelas::find($id);
        $t->id_kelas = $request->kelas;
        $t->id_guru = $request->guru;
        $t->save();
        return response()->json([
            'message' => 'Success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\t_walikelas  $t_walikelas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $t = t_walikelas::find($id);
        $t->delete();
        return response()->json([
            "message" => "Success"
        ]);
    }
}
