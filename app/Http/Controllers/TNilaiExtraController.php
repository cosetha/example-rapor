<?php

namespace App\Http\Controllers;

use App\t_nilai_extra;
use Illuminate\Http\Request;
use App\m_kelas;
use App\m_extra;
use DB;

class TNilaiExtraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $kelas = m_kelas::orderBy('tahun','desc')->orderBy('tingkat','desc')->get();
        return view('ekstra.nilai',['kelas'=>$kelas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id, Request $request)
    {
        $ekstra = m_extra::all();
        $kelas = m_kelas::where('id',$id)->get();
        $siswa = m_kelas::find($id)->siswa()->with(['ekstra' => function($query) use ($request) {
            $query->where('tahun', $request->smt);
        }])->paginate(5)  ;     
        return view('ekstra.nilaiAdd',['kelas'=>$kelas,'ekstra'=>$ekstra,'siswa'=>$siswa]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        foreach ($request->ekstra as $key => $value) {
            $data[]= [
                'id_siswa' => $request->siswa,
                'id_extra' => $request->ekstra[$key],
                'tahun' => $request->tahun,
                'nilai' => $request->nilai[$key],
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
            ];
        }
        t_nilai_extra::where('id_siswa',$request->siswa)->where('tahun',$request->tahun)->delete();
        t_nilai_extra::insert($data);       
        return redirect()->back()->with('success', 'Sukses');  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\t_nilai_extra  $t_nilai_extra
     * @return \Illuminate\Http\Response
     */
    public function show(t_nilai_extra $t_nilai_extra)
    {
        $data = DB::table('users')->paginate(20);
        echo $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\t_nilai_extra  $t_nilai_extra
     * @return \Illuminate\Http\Response
     */
    public function edit(t_nilai_extra $t_nilai_extra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\t_nilai_extra  $t_nilai_extra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, t_nilai_extra $t_nilai_extra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\t_nilai_extra  $t_nilai_extra
     * @return \Illuminate\Http\Response
     */
    public function destroy(t_nilai_extra $t_nilai_extra)
    {
        //
    }
}
