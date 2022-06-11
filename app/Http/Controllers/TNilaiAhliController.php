<?php

namespace App\Http\Controllers;

use App\t_nilai_ahli;
use Illuminate\Http\Request;
use App\t_guru_mapel_ahli;
use App\m_mapel_ahli;
use App\t_kelas;
use App\m_guru;
use Auth;

class TNilaiAhliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = m_guru::where('id_user',Auth::id())->first();
        $kelas = t_guru_mapel_ahli::with(['kelas','kelas.keahlian','mapel'])->where('m_guru_id',m_guru::where('id_user',Auth::id())->first()->id)->get();
        return view('ahli.nilaiUmum',['kelas'=> $kelas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,$id)
    {
        $kelas = t_kelas::where('id_kelas',$id)->with('siswa')->orderby('id_siswa','asc')->get();
        $guru = m_guru::select('id')->where('id_user',Auth::id())->first();
        $id_guru = t_guru_mapel_ahli::select('id')->where([['m_guru_id',$guru->id],['m_kelas_id',$id],['m_mapel_id',$request->mapel]])->first();
        $nilai = t_nilai_ahli::where([['id_guru',$id_guru->id],['tahun',$request->smt]])->orderby('id_siswa','asc')->get();
        $mapel = m_mapel_ahli::find($request->mapel);

        // for ($i=0; $i <count($kelas->siswa) ; $i++) { 
        //    $kelas->siswa[$i]['nilai'] = $nilai[$i]->
        // }
        foreach($kelas as $k){
            foreach ($k->siswa as $s) {
                if($nilai->count() >0){
                    foreach ($nilai as $n) {
                        if($s->id == $n->id_siswa){
                          $s['nilai'] = $n->nilai;
                          break;
                        }else{
                          $s['nilai'] = '0,0,0,0,0,0,0,0';
                        }
                      }
                }else{
                    $s['nilai'] = '0,0,0,0,0,0,0,0';
                }
                
            }
        }
        
        return view('ahli.nilaiUmumAdd',['kelas'=>$kelas,'guru'=>$id_guru,'mapel'=>$mapel]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        
        $data = [];
        foreach ($request->siswa as $key => $value) {
            $nilai = [$request->nh1[$key],$request->nh2[$key],$request->nh3[$key],$request->nh4[$key],$request->uts[$key],$request->uas[$key],$request->nk[$key],$request->total[$key],$this->konversi($request->total[$key]),$this->konversi($request->nk[$key])];
            $data[]= [
                'id_siswa' => $request->siswa[$key],
                'id_guru' => $id,
                'tahun' => $request->tahun,
                'nilai' => implode(',',$nilai),
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
            ];
        }
        t_nilai_ahli::where('id_guru',$id)->where('tahun',$request->tahun)->delete();
        t_nilai_ahli::insert($data);       
       
        return redirect()->back()->with('success', 'Sukses');   
    }
    function konversi($val){
        if($val<=100 && $val >= 81){
            return 'A';
        }elseif($val<=80 && $val >= 71){
            return 'AB';
        }elseif($val<=70 && $val >= 66){
            return 'B';
        }elseif($val<=65 && $val >= 61){
            return 'BC';
        }elseif($val<=60 && $val >= 56){
            return 'C';
        }else{
            return 'D';
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\t_nilai_ahli  $t_nilai_ahli
     * @return \Illuminate\Http\Response
     */
    public function show(t_nilai_ahli $t_nilai_ahli)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\t_nilai_ahli  $t_nilai_ahli
     * @return \Illuminate\Http\Response
     */
    public function edit(t_nilai_ahli $t_nilai_ahli)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\t_nilai_ahli  $t_nilai_ahli
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, t_nilai_ahli $t_nilai_ahli)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\t_nilai_ahli  $t_nilai_ahli
     * @return \Illuminate\Http\Response
     */
    public function destroy(t_nilai_ahli $t_nilai_ahli)
    {
        //
    }
}
