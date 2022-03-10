<?php

namespace App\Http\Controllers;

use App\m_kelas;
use App\tahun;
use App\t_keahlian;
use App\m_jurusan;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurusan = m_jurusan::all();        
        $akademik = tahun::select('tahun')->where('status','Y')->first();
        if(empty($akademik)){
            $tahun = '2018';
            $semester =  '2';
        }else{
            $tahun = Str::substr($akademik->tahun, 0, 4);
            $semester =  Str::substr($akademik->tahun, 4, 1);
        }     
      
        return view('kelas',compact('jurusan','tahun','semester'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $ahli = t_keahlian::where('id_bidang',$request->id)->get();
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
        $kelas = new m_kelas;
        $kelas->nama_kelas = $request->nama;
        $kelas->tahun = $request->tahun;
        $kelas->id_keahlian = $request->bidang;
        $kelas->tingkat = $request->tingkat;
        $kelas->save();
        return response()->json([
            'message' => 'Success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\m_kelas  $m_kelas
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $mapel = m_kelas::with('keahlian')->orderBy('id','desc')->get();

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
     * @param  \App\m_kelas  $m_kelas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = m_kelas::with('keahlian')->find($id);
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
     * @param  \App\m_kelas  $m_kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kelas = m_kelas::find($id);
        $kelas->nama_kelas = $request->nama;
        $kelas->tahun = $request->tahun;
        $kelas->id_keahlian = $request->bidang;
        $kelas->tingkat = $request->tingkat;
        $kelas->save();
        return response()->json([
            'message' => 'Success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\m_kelas  $m_kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kelas = m_kelas::find($id);
        $kelas->delete();
        return response()->json([
            "message" => "Success"
        ]);
    }
}
