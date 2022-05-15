<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
class RaportController extends Controller
{
    public function sampul1()
    {
        $pdf = PDF::loadview('raport.halaman1');
        // return $pdf->download('laporan-pegawai.pdf');
        // return $pdf->stream();
        return view('raport.halaman3');
    }
    public function sampul2()
    {
        return view('raport.halaman2');
    }
    public function sampul3()
    {
        return view('raport.halaman2');
    }
}
