<?php

namespace App\Http\Controllers;

use App\t_pkl;
use Illuminate\Http\Request;
use App\m_kelas;
class TPklController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = m_kelas::orderBy('tahun','desc')->orderBy('tingkat','desc')->get();
        return view('pkl.nilai',['kelas'=>$kelas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id, Request $request)
    {
        $kelas = m_kelas::where('id',$id)->with('siswa')->with(['siswa.pkl' => function($query) use ($request) {
            $query->where('tahun', $request->smt);
        }])->orderby('id','asc')->get();
        return view('pkl.nilaiAdd',['kelas'=>$kelas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        foreach ($request->mitra as $key => $value) {
            $data[]= [
                'id_siswa' => $request->siswa,               
                'tahun' => $request->tahun,
                'mitra' => $request->mitra[$key],
                'lokasi' => $request->lokasi[$key],
                'lama' => $request->lama[$key],
                'keterangan' => $request->keterangan[$key],
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
            ];
        }
        t_pkl::where('id_siswa',$request->siswa)->where('tahun',$request->tahun)->delete();
        t_pkl::insert($data);       
        return redirect()->back()->with('success', 'Sukses');  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\t_pkl  $t_pkl
     * @return \Illuminate\Http\Response
     */
    public function show(t_pkl $t_pkl)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\t_pkl  $t_pkl
     * @return \Illuminate\Http\Response
     */
    public function edit(t_pkl $t_pkl)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\t_pkl  $t_pkl
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, t_pkl $t_pkl)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\t_pkl  $t_pkl
     * @return \Illuminate\Http\Response
     */
    public function destroy(t_pkl $t_pkl)
    {
        //
    }
}
