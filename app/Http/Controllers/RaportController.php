<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\t_nilai;
use App\t_nilai_ahli;
use PDF;
use App\m_siswa;
use App\m_kelas;
use App\tahun;
use DB;
use App\t_walikelas;
use App\t_kelas;
use App\m_guru;
use App\m_mapel_ahli;
use App\m_mapel;
use Auth;
class RaportController extends Controller
{
    public function sampul1($id)
    {
        $siswa =DB::table('m_siswa')
        ->select(['m_siswa.id', 't_keahlian.nama_bidang as kompetensi_keahlian', 'm_bidang_studi.nama_bidang as bidang_studi'])
        ->join('t_keahlian', 't_keahlian.id', '=', 'm_siswa.id_bidang')
        ->join('m_bidang_studi', 'm_bidang_studi.id', '=', 't_keahlian.id_bidang')
        ->where('m_siswa.id', $id)
        ->get();
        // $pdf = PDF::loadview('raport.halaman1',);
        // return $pdf->download('laporan-pegawai.pdf');
        // return $pdf->stream();
         return view('raport.halaman1',['siswa'=>$siswa]);
        
    }
    public function sampul2($id)
    {
        $siswa =DB::table('m_siswa')
        ->select(['m_siswa.id','m_siswa.nama','m_siswa.nisn','m_siswa.nipdn', 't_keahlian.nama_bidang as kompetensi_keahlian', 'm_bidang_studi.nama_bidang as bidang_studi'])
        ->join('t_keahlian', 't_keahlian.id', '=', 'm_siswa.id_bidang')
        ->join('m_bidang_studi', 'm_bidang_studi.id', '=', 't_keahlian.id_bidang')
        ->where('m_siswa.id', $id)
        ->get();
        return view('raport.halaman2',['siswa'=>$siswa]);
    }
    public function sampul3($id)
    {
        $siswa =DB::table('m_siswa')
        ->select('*')
        ->where('m_siswa.id', $id)
        ->get();
     
        $wali = DB::table('m_wali_murid')
        ->select('*')
        ->where('m_wali_murid.id_siswa', $id)
        ->get();

        $tahun = tahun::where('tahun',request('tahun'))->get();
        return view('raport.halaman3',['siswa'=>$siswa,'wali'=>$wali,'tahun'=>$tahun]);            
    }

    public function raport($id,Request $request)
    {
        $data = m_siswa::with(['kelas'=> function($query) use ($request) {
            $query->where('tahun', substr($request->tahun, 0, 4));
        },'komKeahlian','ekstra.ekstrakurikuler','absensi' => function($query) use ($request) {
            $query->where('tahun', $request->tahun);
        },'ekstra' => function($query) use ($request) {
            $query->where('tahun', $request->tahun);
        },'pkl' => function($query) use ($request) {
            $query->where('tahun', $request->tahun);
        },'sikap' => function($query) use ($request) {
            $query->where('tahun', $request->tahun);
        }])->where('id',$id)->get();
       
        $mapel_ua = m_mapel::where('kelompok','A')->get();
        $mapel_ub = m_mapel::where('kelompok','B')->get();
        $kelas = m_kelas::find($request->kelas);
        if($kelas->tingkat == 1){
            $mapel_a = m_mapel_ahli::where('sub','!=','C3')->where('id_bidang',$kelas->id_keahlian)->where('tingkat',$kelas->tingkat)->get();
        }else{
            $mapel_a = m_mapel_ahli::where('sub','C3')->where('id_bidang',$kelas->id_keahlian)->where('tingkat',$kelas->tingkat)->get();
        }        
        $nilai_u = t_nilai::where('id_siswa',$id)->where('tahun',$request->tahun)->with(['guruMapel.mapel'])->get();        
        $nilai_a = t_nilai_ahli::where('id_siswa',$id)->where('tahun',$request->tahun)->with(['guruMapel.mapel'])->get();
        $tahun = tahun::where('tahun',request('tahun'))->get(); 
        $walikelas = t_walikelas::with('guru')->where('id_kelas',$request->kelas)->get(); 
        $ru = DB::table('t_nilai_umum as tu')->select(['tu.id_siswa',\DB::raw('SUM(SUBSTRING_INDEX(SUBSTRING_INDEX(tu.nilai,",", -3),",", 1)) as nilai_u')])->groupBy('tu.id_siswa')->where('tu.tahun',$request->tahun)->orderBy('nilai_u','desc')->get(); 
        $ra =  DB::table('t_nilai_ahli as tu')->select(['tu.id_siswa',\DB::raw('SUM(SUBSTRING_INDEX(SUBSTRING_INDEX(tu.nilai,",", -3),",", 1)) as nilai_a')])->groupBy('tu.id_siswa')->where('tu.tahun',$request->tahun)->orderBy('nilai_a','desc')->get();  
        foreach ($ru as $key => $value) {
           foreach ($ra as $key1 => $value1) {
              if($value1->id_siswa == $value->id_siswa){
                  $value->nilai_a = $value1->nilai_a;
                  $value->total = $value->nilai_u + $value1->nilai_a;
              }
           }
        }   
        // CONVERT KE ARRAY
        $arr = json_decode($ru,true);
        // SORT BY KEY VALUE
        uasort($arr, function($item1, $item2){
            if(isset($item1['total']) && isset($item2['total'])){
                return $item1['total'] <$item2['total'];
            }elseif(isset($item1['nilai_u']) && isset($item2['nilai_u'])){
                return $item1['nilai_u'] < $item2['nilai_u'];
            }else{
                return $item1['nilai_a'] < $item2['nilai_a'];
            }
           
        });                
        return view('raport.raport',['data'=>$data,'mapel_ua'=>$mapel_ua,'mapel_ub'=>$mapel_ub,'mapel_a'=>$mapel_a,'nilai_u'=>$nilai_u,'nilai_a'=>$nilai_a,'walikelas'=>$walikelas,'tahun'=>$tahun,'rank'=> $arr]);
    }

    public function index()
    {
        $user = m_guru::where('id_user',Auth::id())->first();
        $kelas = t_walikelas::with(['kelas','kelas.keahlian'])->where('id_guru',m_guru::where('id_user',Auth::id())->first()->id)->get();
        return view('raport.kelas',['kelas'=> $kelas]);
        // echo $kelas;
    }

    public function create($id, Request $request)
    {
        $kelas = t_kelas::where('id_kelas',$id)->with('siswa')->orderby('id_siswa','asc')->get();
        return view('raport.listsiswa',['kelas'=>$kelas]);
    }

    public function store($id)
    {
        $siswa = m_siswa::where('id',$id)->with('kelas')->get();
        return view('raport.raport_siswa',['siswa'=>$siswa]);
    }
}
