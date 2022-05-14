<?php

namespace App\Http\Controllers;

use App\t_nilai_absensi;
use App\m_kelas;
use Illuminate\Http\Request;
use DB;

class TNilaiAbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = m_kelas::all();
         return view('absen.nilaiUmum',['kelas'=> $kelas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id, Request $request )
    {
        $kelas = m_kelas::where('id',$id)->with('siswa')->with(['siswa.absensi' => function($query) use ($request) {
            $query->where('tahun', $request->smt);
          }])->orderby('id','asc')->get();
        // echo $kelas[0]->siswa[0]->absensi[0];
          return view('absen.nilaiUmumAdd',['kelas'=>$kelas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = [];
        $data = [];
        foreach ($request->siswa as $key => $value) {
            $id[] = $request->siswa[$key];
            $data[]= [
                'id_siswa' => $request->siswa[$key],
                'tahun' => $request->tahun,
                's' => $request->nh1[$key],
                'i' => $request->nh2[$key],
                'a' => $request->nh3[$key],
                'keterangan' => $request->nk[$key],
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
            ];
        }
        t_nilai_absensi::where('tahun',$request->tahun)->whereIn('id_siswa', $id)->delete();
        t_nilai_absensi::insert($data);       
     
        return redirect()->back()->with('success', 'Sukses');   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\t_nilai_absensi  $t_nilai_absensi
     * @return \Illuminate\Http\Response
     */
    public function show(t_nilai_absensi $t_nilai_absensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\t_nilai_absensi  $t_nilai_absensi
     * @return \Illuminate\Http\Response
     */
    public function edit(t_nilai_absensi $t_nilai_absensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\t_nilai_absensi  $t_nilai_absensi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, t_nilai_absensi $t_nilai_absensi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\t_nilai_absensi  $t_nilai_absensi
     * @return \Illuminate\Http\Response
     */
    public function destroy(t_nilai_absensi $t_nilai_absensi)
    {
        //
    }
}
