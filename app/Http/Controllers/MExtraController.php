<?php

namespace App\Http\Controllers;

use App\m_extra;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
class MExtraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ekstra');
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
        $ekstra = new m_extra;
        $ekstra->nama = $request->nama;
        $ekstra->save();
        return response()->json([
            'message' => 'Success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\m_extra  $m_extra
     * @return \Illuminate\Http\Response
     */
    public function show(m_extra $m_extra)
    {
          
        $ekstra = m_extra::orderBy('id','desc')->get();

        return Datatables::of($ekstra)->addIndexColumn()
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
     * @param  \App\m_extra  $m_extra
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = m_extra::find($id)->first();
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
     * @param  \App\m_extra  $m_extra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ekstra = m_extra::find($id);
        $ekstra->nama = $request->nama;
        $ekstra->save();
        return response()->json([
            'message' => 'Success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\m_extra  $m_extra
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ekstra = m_extra::find($id);
        $ekstra->delete();
        return response()->json([
            "message" => "Success"
        ]);
    }
}
