<?php

namespace App\Http\Controllers;

use App\tahun;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class TahunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tahun');
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
        $date = Carbon::createFromFormat('d-m-Y',request('tanggal'));
        $usableDate = $date->format('Y-m-d');
        $tahun = tahun::updateOrCreate(
            ['tahun' =>  request('tahun')],
            ['tahun' => request('tahun'),
            'status' => 'N',
            'nama_kepsek' => request('nama_kepsek'),
            'nip_kepsek' => request('nip_kepsek'),
            'tanggal_rapor' =>  $usableDate,            
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tahun  $tahun
     * @return \Illuminate\Http\Response
     */
    public function show(tahun $tahun)
    {
        $tahun = tahun::orderBy('id','desc')->get();

        return Datatables::of($tahun)->addIndexColumn()
        ->addColumn('aksi', function($row){
            $btn = '<button href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->tahun.'" class="btn btn-info waves-effect waves-light btn-edit m-1">
            Edit <span class="mdi mdi-file-document-edit-outline"></span>
            </button> &nbsp';
            $btn = $btn. '<button href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->tahun.'" class="btn btn-danger m-1 waves-effect waves-light btn-delete"">
            Delete <span class="mdi mdi-close-circle-outline"></span></i>
            </button>';
            if($row->status !="Y"){
            $btn = $btn. '<button href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->tahun.'" class="btn btn-success m-1 waves-effect waves-light btn-aktif"">
            Aktifkan <span class="mdi mdi-power"></span></i>
            </button>';
            }
            return $btn;
        })
        ->rawColumns(['aksi'])
            ->make(true);  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tahun  $tahun
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = tahun::find($id)->first();
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
     * @param  \App\tahun  $tahun
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $date = Carbon::createFromFormat('d-m-Y',request('tanggal'));
        $usableDate = $date->format('Y-m-d');
        $tahun = tahun::find($id);
        $tahun->tahun = $request->tahun;
        $tahun->nama_kepsek = $request->nama_kepsek;
        $tahun->nip_kepsek = $request->nip_kepsek;
        $tahun->tanggal_rapor =  $usableDate ;              
        $tahun->save();
        return response()->json([
            'message' => 'Success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tahun  $tahun
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tahun = tahun::find($id);
        $tahun->delete();
        return response()->json([
            "message" => "Success"
        ]);
    }

    public function AktifkanSemester($id){
        DB::table('tahun')->update(array('status' => 'N'));

        $tahun = tahun::find($id);       
        $tahun->status = "Y";
        $tahun->save();

        return response([
            'message' => 'sukses'
        ]);
    }
}
