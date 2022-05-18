<?php

namespace App\Http\Controllers;

use App\m_siswa;
use Illuminate\Http\Request;
use App\t_keahlian;
use App\m_jurusan;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class MSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $jurusan = m_jurusan::all();  
        return view('siswa',compact('jurusan'));
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
         $date = Carbon::createFromFormat('d-m-Y', $request->tanggal)->format('Y-m-d');
         $tgl = Carbon::createFromFormat('d-m-Y', $request->tanggal_masuk)->format('Y-m-d');

         $siswa = new m_siswa;
         $siswa->nama = $request->nama ;
         $siswa->email = $request->email;
         $siswa->asal_sekolah = $request->asal ;
         $siswa->agama = $request->agama;
         $siswa->alamat = $request->alamat;
         $siswa->id_bidang = $request->bidang;
         $siswa->nipdn = $request->nipdn;
         $siswa->nisn = $request->nisn ;
         $siswa->no_telp = $request->telpon;
         $siswa->no_ijazah = $request->ijazah;
         $siswa->tahun_ijazah = $request->tahun;
         $siswa->tempat_lahir = $request->tempat;
         $siswa->status = $request->status;
         $siswa->jenis_kelamin = $request->jk;
         $siswa->tanggal_lahir = $date;
         $siswa->tanggal_masuk = $tgl;
         $siswa->save();
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\m_siswa  $m_siswa
     * @return \Illuminate\Http\Response
     */
    public function show(m_siswa $m_siswa)
    {
        $siswa = m_siswa::with('komKeahlian')->orderBy('id_bidang','asc')->get();

        return Datatables::of($siswa)->addIndexColumn()
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
     * @param  \App\m_siswa  $m_siswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = m_siswa::with('komKeahlian')->find($id);
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
     * @param  \App\m_siswa  $m_siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $siswa = m_siswa::find($id);

         $date = Carbon::createFromFormat('d-m-Y', $request->tanggal)->format('Y-m-d');
         $tgl = Carbon::createFromFormat('d-m-Y', $request->tanggal_masuk)->format('Y-m-d');
     
         $siswa->nama = $request->nama ;
         $siswa->email = $request->email;
         $siswa->asal_sekolah = $request->asal ;
         $siswa->agama = $request->agama;
         $siswa->alamat = $request->alamat;
         $siswa->id_bidang = $request->bidang;
         $siswa->nipdn = $request->nipdn;
         $siswa->nisn = $request->nisn ;
         $siswa->no_telp = $request->telpon;
         $siswa->no_ijazah = $request->ijazah;
         $siswa->tahun_ijazah = $request->tahun;
         $siswa->tempat_lahir = $request->tempat;
         $siswa->tanggal_lahir = $date;
         $siswa->tanggal_masuk = $tgl;
         $siswa->status = $request->status;
         $siswa->jenis_kelamin = $request->jk;
         $siswa->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\m_siswa  $m_siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kelas = m_siswa::find($id);
        $kelas->delete();
        return response()->json([
            "message" => "Success"
        ]);
    }
}
