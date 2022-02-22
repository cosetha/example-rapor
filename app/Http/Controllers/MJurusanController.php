<?php

namespace App\Http\Controllers;

use App\m_jurusan;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
class MJurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kejur = m_jurusan::orderBy('id','desc')->get()->toJson();
        return view('bidangStudi',['bidang'=>$kejur]);
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
        $kejur = new m_jurusan;
        $kejur->nama_bidang = $request->nama;
        $kejur->save();
        return response()->json([
            'message' => 'Success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\m_jurusan  $m_jurusan
     * @return \Illuminate\Http\Response
     */
    public function show(m_jurusan $m_jurusan)
    {
        
        $jurusan = m_jurusan::orderBy('id','desc')->get();

        return Datatables::of($jurusan)->addIndexColumn()
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
     * @param  \App\m_jurusan  $m_jurusan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $data = m_jurusan::find($id)->first();
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
     * @param  \App\m_jurusan  $m_jurusan
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request, $id)
    {
        $bk = m_jurusan::find($id);
        $bk->nama_bidang = $request->nama;
        $bk->save();
        return response()->json([
            'message' => 'Success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\m_jurusan  $m_jurusan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bk = m_jurusan::find($id);
        $bk->delete();
        return response()->json([
            "message" => "Success"
        ]);
    }
}
