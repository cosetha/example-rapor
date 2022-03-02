<?php

namespace App\Http\Controllers;

use App\m_mapel;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
class MMapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mapelUmum');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mapel = new m_mapel;
        $mapel->nama = $request->nama;
        $mapel->kelompok = $request->kelompok;
        $mapel->sub = $request->sub;
        $mapel->save();
        return response()->json([
            'message' => 'Success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\m_mapel  $m_mapel
     * @return \Illuminate\Http\Response
     */
    public function show(m_mapel $m_mapel)
    {
        $mapel = m_mapel::orderBy('id','desc')->get();

        return Datatables::of($mapel)->addIndexColumn()
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
     * @param  \App\m_mapel  $m_mapel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = m_mapel::find($id)->first();
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
     * @param  \App\m_mapel  $m_mapel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $mapel = m_mapel::find($id);
        $mapel->nama = $request->nama;
        $mapel->kelompok = $request->kelompok;
        $mapel->sub = $request->sub;
        $mapel->save();
        return response()->json([
            'message' => 'Success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\m_mapel  $m_mapel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mapel = m_mapel::find($id);
        $mapel->delete();
        return response()->json([
            "message" => "Success"
        ]);
    }
}
