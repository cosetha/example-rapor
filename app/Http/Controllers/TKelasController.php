<?php

namespace App\Http\Controllers;

use App\t_kelas;
use App\m_kelas;
use App\m_siswa;
use Illuminate\Http\Request;

class TKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = m_kelas::with(['keahlian','siswa'])->orderBy('tahun','desc')->get();
        $kelas = m_kelas::with(['keahlian'])->orderBy('tahun','desc')->get();
        return view('setKelas',['bidang' => $kelas,'kelas'=>$data]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\t_kelas  $t_kelas
     * @return \Illuminate\Http\Response
     */
    public function show(t_kelas $t_kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\t_kelas  $t_kelas
     * @return \Illuminate\Http\Response
     */
    public function edit(t_kelas $t_kelas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\t_kelas  $t_kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, t_kelas $t_kelas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\t_kelas  $t_kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy(t_kelas $t_kelas)
    {
        //
    }

    public function getKelas()
    {
        
    }

    public function getSiswa(Request $request)
    {
        $siswa = m_siswa::with('komKeahlian')->where('id_bidang',$request->id)->orderBy('tanggal_masuk','desc')->get();
        return response()->json($siswa);
    }

    public function getSiswaPerm(Request $request)
    {
        $kelas = $request->kelas;
        $siswa = m_siswa::whereHas('kelas',function($q) use($kelas){
            $q->where('t_kelas_siswa.id_kelas', '=', $kelas);
        })->get();
        return response()->json($siswa);
    }

    public function addSiswa(Request $request)
    {
        $data = [];
        $siswa[] = $request->siswa;
        for ($i = 0; $i < count($request->siswa); $i++) {
            $data[] = [               
                'id_siswa' => $request->siswa[$i],
                'id_kelas' => $request->kelas
            ];
        }
        t_kelas::where('id_kelas',$request->kelas)->delete();
        t_kelas::insert($data);       
        return response()->json([
            'message' => 'Success'
        ]);
    }

    public function removeSiswa($id)
    {
        t_kelas::where('id_siswa',$id)->delete();
        return response()->json([
            'message' => 'Success'
        ]);
    }
}
