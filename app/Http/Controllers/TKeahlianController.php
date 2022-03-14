<?php

namespace App\Http\Controllers;

use App\t_keahlian;
use App\m_jurusan;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class TKeahlianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurusan = m_jurusan::all();
        return view('komKeahlian',['bidang' => $jurusan]);
        
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
        $kompetensi = new t_keahlian;
        $kompetensi->nama_bidang = $request->nama;
        $kompetensi->id_bidang = $request->bidang;
        $kompetensi->save();
        return response()->json([
            'message' => 'Success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\t_keahlian  $t_keahlian
     * @return \Illuminate\Http\Response
     */
    public function show(t_keahlian $t_keahlian)
    {
        $kompetensi = t_keahlian::with('bidangStudi')->orderBy('id','desc')->get();

        return Datatables::of($kompetensi)->addIndexColumn()
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
     * @param  \App\t_keahlian  $t_keahlian
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = t_keahlian::find($id);
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
     * @param  \App\t_keahlian  $t_keahlian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kompetensi = t_keahlian::find($id);
        $kompetensi->nama_bidang = $request->nama;
        $kompetensi->id_bidang = $request->bidang;        
        $kompetensi->save();
        return response()->json([
            'message' => 'Success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\t_keahlian  $t_keahlian
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kompetensi = t_keahlian::find($id);
        $kompetensi->delete();
        return response()->json([
            "message" => "Success"
        ]);
    }
}
