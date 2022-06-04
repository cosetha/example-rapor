<?php

namespace App\Http\Controllers;

use App\t_nilai_sikap;
use Illuminate\Http\Request;
use App\m_kelas;

class TNilaiSikapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = m_kelas::orderBy('tahun','desc')->orderBy('tingkat','desc')->get();
        return view('sikap.nilai',['kelas'=> $kelas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id)
    {
        $kelas = m_kelas::where('id',$id)->get();
        $siswa = m_kelas::find($id)->siswa()->with(['sikap' => function($query) use ($request) {
            $query->where('tahun', $request->smt);
        }])->paginate(5)  ;     
        return view('sikap.nilaiAdd',['kelas'=>$kelas,'siswa'=>$siswa]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $deskripsi = [$request->integritas,$request->religius,$request->nasionalis,$request->mandiri,$request->gotong];

        $nilai = t_nilai_sikap::updateOrCreate(
            ['id_siswa' =>  request('siswa'),'tahun'=>request('tahun')],
            ['tahun' => request('tahun'),
            'id_siswa' => request('siswa'),
            'catatan' => request('catatan'),
            'sikap' => 'Integritas/Religius/Nasionalis/Mandiri/Gotong-royong',
            'deskripsi' =>  implode('/',$deskripsi),            
            ]
        );
        
        return redirect()->back()->with('success', 'Sukses');  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\t_nilai_sikap  $t_nilai_sikap
     * @return \Illuminate\Http\Response
     */
    public function show(t_nilai_sikap $t_nilai_sikap)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\t_nilai_sikap  $t_nilai_sikap
     * @return \Illuminate\Http\Response
     */
    public function edit(t_nilai_sikap $t_nilai_sikap)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\t_nilai_sikap  $t_nilai_sikap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, t_nilai_sikap $t_nilai_sikap)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\t_nilai_sikap  $t_nilai_sikap
     * @return \Illuminate\Http\Response
     */
    public function destroy(t_nilai_sikap $t_nilai_sikap)
    {
        //
    }
}
