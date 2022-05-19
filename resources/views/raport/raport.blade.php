<!DOCTYPE html>
<html>
<head>
	<title>Cetak Raport</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <style>
        @page {
        size: F4;
        margin: 0;
        }
        @media print {
            
            html{
                width: 8.5in;
                height: 13in; 
                }  
            body{
                width: 6.5in; 
                padding: 0; 
                margin-left: 0.65in;                          
                }      
            .page-break{
            display: inline-block;
            page-break-after: always;
            }               
            table.table-bordered{
                border:1px solid black !important;
                margin-top:20px !important;
            }
            table.table-bordered > thead > tr > th{
                border:1px solid black !important;
            }
            table.table-bordered > tbody > tr > td{
                border:1px solid black !important;
            }
        }
        div.page
        {
            page-break-after: always;
            page-break-inside: avoid;
        }
        

        hr {
            width: 100%;
            border: 3px dotted;
            border-style: none none dotted;
            color: black;
            margin 10px
        }

        table.table-bordered{
            border:1px solid black;
            margin-top:20px;
        }
        table.table-bordered > thead > tr > th{
            border:1px solid black;
        }
        table.table-bordered > tbody > tr > td{
            border:1px solid black;
        }
       
    </style>
</head>
<body class="min-vh-100">
	<div class="container">
             <br><br>
            <div class="col-sm-12 page" style="padding: 0 100px 0 100px">
                <table width="100%">
                    <thead></thead>
                    <tbody>                                            
                        <tr>
                            <td width="20%">Nama Sekolah</td>
                            <td width="1%">:</td>
                            <td width="39%" class="font-weight-bold">SMK CORDOVA</td>
                            <td width="20%">Kelas</td>
                            <td width="1%">:</td>
                            <td width="19%" class="font-weight-bold">{{$data[0]->kelas()->first()->nama_kelas}}</td>
                        </tr>
                        <tr>
                            <td>Alamat Madrasah</td>
                            <td>:</td>
                            <td class="font-weight-bold">Jl. KH. Achmad Musayyidi No.2 Karangdoro</td>
                            <td>Semester</td>
                            <td>:</td>
                            @php
                            $smt = substr($_GET['tahun'],4, 5);
                            @endphp
                            <td class="font-weight-bold">{{ $smt == 1 ? 'Ganjil' :'Genap'}}</td>
                        </tr>
                        <tr>
                            <td>Nama Peserta Didik</td>
                            <td>:</td>
                            <td class="font-weight-bold">{{$data[0]->nama}}</td>
                            <td>Tahun Pelajaran</td>
                            <td>:</td>
                            @php
                            $ta = (int) substr($_GET['tahun'],0, 4) + 1;
                            @endphp
                            <td class="font-weight-bold">{{substr($_GET['tahun'],0, 4).'/'.$ta}}</td>
                        </tr>
                        <tr>
                            <td>NIS / NISN</td>
                            <td>:</td>
                            <td class="font-weight-bold">{{$data[0]->nipdn}} / {{$data[0]->nisn}}</td>
                            <td colspan="3"></td>
                        </tr>
                        <tr>
                            <td colspan="6"><br><br></td>
                        </tr>
                        <tr>
                            <td colspan="6"><b>A. Nilai Akademik</b></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <table class="w-100 table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="1" rowspan="2" width="5%" class="text-center align-middle">No.</th>
                                            <th colspan="2" rowspan="2" width="55%" class="text-center align-middle">Mata Pelajaran</th>
                                            <th colspan="2">Pengetahuan</th>
                                            <th colspan="2">Keterampilan</th>
                                        </tr>
                                        <tr>
                                            <th width="10%">Nilai</th>
                                            <th width="10%">Predikat</th>                                           
                                            <th width="10%">Nilai</th>
                                            <th width="10%">Predikat</th>                                           
                                        </tr>                                                                            
                                    </thead>
                                    <tbody>
                                        <tr>                                            
                                            <td style="padding-left:15px;" colspan="8"><b>A. Muatan Nasional</b></td>
                                        </tr>
                                        @foreach($mapel_ua as $key=>$value)
                                        <tr>
                                            @foreach($nilai_u as $nu)
                                               @if($value->id == $nu->guruMapel()->first()->mapel()->first()->id)
                                               @php
                                                $nilai = explode(',',$nu->nilai);  
                                                                  
                                                @endphp
                                                    <td class="text-center" colspan="1">{{strval($key+1).'.'}}</td>
                                                    <td colspan="2">{{$value->nama}}</td>
                                                    <td colspan="1" class="text-center">{{$nilai[7]}}</td>
                                                    <td colspan="1" class="text-center">{{$nilai[8]}}</td>                                           
                                                    <td colspan="1" class="text-center">{{$nilai[6]}}</td>
                                                    <td colspan="1" class="text-center">{{$nilai[9]}}</td> 
                                                    @break
                                                @else
                                                    <td class="text-center" colspan="1">{{strval($key+1).'.'}}</td>
                                                    <td colspan="2">{{$value->nama}}</td>
                                                    <td colspan="1" class="text-center">-</td>
                                                    <td colspan="1" class="text-center">-</td>                                           
                                                    <td colspan="1" class="text-center">-</td>
                                                    <td colspan="1" class="text-center">-</td> 
                                                @endif                                                  
                                            @endforeach                                        
                                        </tr>  
                                        @endforeach
                                        <tr>                                            
                                            <td style="padding-left:15px;" colspan="8"><b>B. Muatan Kewilayahan</b></td>
                                        </tr>
                                        @foreach($mapel_ub as $key=>$value)
                                        <tr>
                                            @foreach($nilai_u as $nu)
                                               @if($value->id == $nu->guruMapel()->first()->mapel()->first()->id)
                                               @php
                                                $nilai = explode(',',$nu->nilai);  
                                                                    
                                                @endphp
                                                    <td class="text-center" colspan="1">{{strval($key+1).'.'}}</td>
                                                    <td colspan="2">{{$value->nama}}</td>
                                                    <td colspan="1" class="text-center">{{$nilai[7]}}</td>
                                                    <td colspan="1" class="text-center">{{$nilai[8]}}</td>                                           
                                                    <td colspan="1" class="text-center">{{$nilai[6]}}</td>
                                                    <td colspan="1" class="text-center">{{$nilai[9]}}</td> 
                                                    @break
                                                @else
                                                    <td class="text-center" colspan="1">{{strval($key+1).'.'}}</td>
                                                    <td colspan="2">{{$value->nama}}</td>
                                                    <td colspan="1" class="text-center">-</td>
                                                    <td colspan="1" class="text-center">-</td>                                           
                                                    <td colspan="1" class="text-center">-</td>
                                                    <td colspan="1" class="text-center">-</td> 
                                                @endif                                                  
                                            @endforeach                                        
                                        </tr>  
                                        @endforeach 
                                        <tr>                                            
                                            <td style="padding-left:15px;" colspan="8"><b>C. Muatan Pemintan Kejuruan</b></td>
                                        </tr>
                                        <tr>                                            
                                            <td style="padding-left:25px;" colspan="8"><b>C1. Dasar Bidang Keahlian</b></td>
                                        </tr>                                        
                                        @foreach($mapel_a as $key=>$value)
                                            @if($value->sub == "C1")
                                            <tr>
                                                @foreach($nilai_a as $nu)
                                                @if($value->id == $nu->guruMapel()->first()->mapel()->first()->id)
                                                @php
                                                    $nilai = explode(',',$nu->nilai);  
                                                                        
                                                    @endphp
                                                        <td class="text-center" colspan="1">{{strval($key+1).'.'}}</td>
                                                        <td colspan="2">{{$value->nama}}</td>
                                                        <td colspan="1" class="text-center">{{$nilai[7]}}</td>
                                                        <td colspan="1" class="text-center">{{$nilai[8]}}</td>                                           
                                                        <td colspan="1" class="text-center">{{$nilai[6]}}</td>
                                                        <td colspan="1" class="text-center">{{$nilai[9]}}</td> 
                                                        @break
                                                    @else
                                                        <td class="text-center" colspan="1">{{strval($key+1).'.'}}</td>
                                                        <td colspan="2">{{$value->nama}}</td>
                                                        <td colspan="1" class="text-center">-</td>
                                                        <td colspan="1" class="text-center">-</td>                                           
                                                        <td colspan="1" class="text-center">-</td>
                                                        <td colspan="1" class="text-center">-</td> 
                                                    @endif                                                  
                                                @endforeach                                        
                                            </tr>                                          
                                            @endif
                                        @endforeach 
                                        <tr>                                            
                                            <td style="padding-left:25px;" colspan="8"><b>C2. Dasar Program Keahlian</b></td>
                                        </tr>
                                        @php $no = 1; @endphp
                                        @foreach($mapel_a as $key=>$value)
                                            @if($value->sub == "C2")
                                            <tr>
                                           
                                                @foreach($nilai_a as $nu)
                                                
                                                @if($value->id == $nu->guruMapel()->first()->mapel()->first()->id)
                                                @php
                                                    $nilai = explode(',',$nu->nilai);                                                                       
                                                    @endphp
                                                        <td class="text-center" colspan="1">{{strval($no).'.'}}</td>
                                                        <td colspan="2">{{$value->nama}}</td>
                                                        <td colspan="1" class="text-center">{{$nilai[7]}}</td>
                                                        <td colspan="1" class="text-center">{{$nilai[8]}}</td>                                           
                                                        <td colspan="1" class="text-center">{{$nilai[6]}}</td>
                                                        <td colspan="1" class="text-center">{{$nilai[9]}}</td> 
                                                        @break
                                                @else
                                                        <td class="text-center" colspan="1">{{strval($no).'.'}}</td>
                                                        <td colspan="2">{{$value->nama}}</td>
                                                        <td colspan="1" class="text-center">-</td>
                                                        <td colspan="1" class="text-center">-</td>                                           
                                                        <td colspan="1" class="text-center">-</td>
                                                        <td colspan="1" class="text-center">-</td> 
                                                @endif    
                                                @php $no++;@endphp                                              
                                                @endforeach                                        
                                            </tr>                                              
                                            @endif
                                        @endforeach  
                                        <tr>                                            
                                            <td style="padding-left:25px;" colspan="8"><b>C3. Kompetensi Keahlian</b></td>
                                        </tr>
                                        @foreach($mapel_a as $key=>$value)
                                            @if($value->sub == "C3")
                                            <tr>
                                                @foreach($nilai_a as $nu)
                                                @if($value->id == $nu->guruMapel()->first()->mapel()->first()->id)
                                                @php
                                                    $nilai = explode(',',$nu->nilai);  
                                                                         
                                                    @endphp
                                                        <td class="text-center" colspan="1">{{strval($key+1).'.'}}</td>
                                                        <td colspan="2">{{$value->nama}}</td>
                                                        <td colspan="1" class="text-center">{{$nilai[7]}}</td>
                                                        <td colspan="1" class="text-center">{{$nilai[8]}}</td>                                           
                                                        <td colspan="1" class="text-center">{{$nilai[6]}}</td>
                                                        <td colspan="1" class="text-center">{{$nilai[9]}}</td> 
                                                        @break
                                                    @else
                                                        <td class="text-center" colspan="1">{{strval($key+1).'.'}}</td>
                                                        <td colspan="2">{{$value->nama}}</td>
                                                        <td colspan="1" class="text-center">-</td>
                                                        <td colspan="1" class="text-center">-</td>                                           
                                                        <td colspan="1" class="text-center">-</td>
                                                        <td colspan="1" class="text-center">-</td> 
                                                    @endif                                                  
                                                @endforeach                                        
                                            </tr>                                             
                                            @endif
                                        @endforeach                                       
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="6"><br></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <table class="w-100 p-5">
                                    <tr>
                                        <td width="33%" class="text-center">                                       
                                            Mengetahui : 
                                            <br>
                                            Orang Tua/Wali, 
                                            <br><br><br><br>
                                           
                                            <u><hr></u>
                                       
                                        </td>
                                        <td width="33%"></td>
                                    @if(count($tahun) == 0 || count($walikelas) == 0)
                                       
                                        <td width="33% " class="text-center">                                      
						    				Banyuwangi, 31 Desember 2018
                                            <br>
											Walikelas
                                            <br><br><br><br>
                                            <u><b>Drs. Agung</b></u><br>
                                            NIP. 1001                                                   
                                        </td>
                                    @else
                                       
                                        <td width="33% " class="text-center">                                      
						    				Banyuwangi,  <?php
                                            setlocale(LC_TIME, 'IND');
                                            $date =  Carbon\Carbon::parse($tahun[0]->tanggal_rapor)->formatLocalized('%d %B %Y');
                                            echo $date;
                                            ?>
                                            <br>
											Walikelas
                                            <br><br><br><br>
                                            <u><b>Drs. Agung</b></u><br>
                                            NIP. 1001                                                   
                                        </td>
                                    @endif
                                    </tr>
                                </table>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="6">
                                <br><br>
                                <table class="w-100 p-5">
                                @if(count($tahun) == 0)
                                    <tr>
                                        <td width="33%" class="text-center">                                                           
                                        </td>
                                        <td width="33%" class="text-center">
                                            Mengetahui  <br>
											Kepala Sekolah SMK Cordova<br>
                                            <br><br><br><br>
                                            <u><b>Drs. Agung</b></u><br>
                                            NIP. 1001
                                        </td>
                                        <td width="33%">                                      						    				                                                   
                                        </td>
                                    </tr>
                                @else
                                @php
                                $result = substr($tahun[0]->tahun, 0, 4);            
                                @endphp
                                    <tr>
                                        <td width="33%" class="text-center">                                                           
                                        </td>
                                        <td width="33%" class="text-center">
                                            Mengetahui  <br>
											Kepala Sekolah SMK Cordova<br>
                                            <br><br><br><br>
                                            <u><b>{{$tahun[0]->nama_kepsek}}</b></u><br>
                                            NIP. {{$tahun[0]->nip_kepsek}}
                                        </td>
                                        <td width="33%">                                      						    				                                                   
                                        </td>
                                    </tr>
                                @endif
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>                               
            </div>
           
          

            <div class="col-sm-12 page" style="padding: 0 100px 0 100px">
            <br><br>
                <table width="100%">
                    <thead></thead>
                    <tbody>                       
                        <tr>
                            <td width="20%">Nama Sekolah</td>
                            <td width="1%">:</td>
                            <td width="39%" class="font-weight-bold">SMK CORDOVA</td>
                            <td width="20%">Kelas</td>
                            <td width="1%">:</td>
                            <td width="19%" class="font-weight-bold">{{$data[0]->kelas()->first()->nama_kelas}}</td>
                        </tr>
                        <tr>
                            <td>Alamat Madrasah</td>
                            <td>:</td>
                            <td class="font-weight-bold">Jl. KH. Achmad Musayyidi No.2 Karangdoro</td>
                            <td>Semester</td>
                            <td>:</td>
                            @php
                            $smt = substr($_GET['tahun'],4, 5);
                            @endphp
                            <td class="font-weight-bold">{{ $smt == 1 ? 'Ganjil' :'Genap'}}</td>
                        </tr>
                        <tr>
                            <td>Nama Peserta Didik</td>
                            <td>:</td>
                            <td class="font-weight-bold">{{$data[0]->nama}}</td>
                            <td>Tahun Pelajaran</td>
                            <td>:</td>
                            @php
                            $ta = (int) substr($_GET['tahun'],0, 4) + 1;
                            @endphp
                            <td class="font-weight-bold">{{substr($_GET['tahun'],0, 4).'/'.$ta}}</td>
                        </tr>
                        <tr>
                            <td>NIS / NISN</td>
                            <td>:</td>
                            <td class="font-weight-bold">{{$data[0]->nipdn}} / {{$data[0]->nisn}}</td>
                            <td colspan="3"></td>
                        </tr>
                        <tr>
                            <td colspan="6"><br><br></td>
                        </tr>
                        <tr>
                            <td colspan="6"><b>B. Catatan Akademik</b></td>
                        </tr>
                        <tr>
                           <td colspan="6">
                                <table class="table-bordered w-100">
                                    @if(count($data[0]->absensi) == 0)
                                    <tr height="100pxx">
                                        <td style="width:100%" class="text-center p-2">-</td>                                        
                                    </tr>
                                    @else
                                    <tr height="100pxx">
                                        <td style="width:100%" class="align-top p-2">{{$data[0]->absensi[0]->keterangan}}</td>                                        
                                    </tr>
                                    @endif
                                </table>
                           </td>
                        </tr>
                        <tr>
                            <td colspan="6"><br></td>
                        </tr>
                        <tr>
                            <td colspan="6"><b>C. Praktik Kerja Lapangan</b></td>
                        </tr>
                        <tr>
                           <td colspan="6">
                                <table class="table-bordered w-100">                                   
                                    <thead>
                                        <tr>
                                            <th colspan="1" width="8.4%" class="text-center">No.</th>
                                            <th colspan="3" width="25%" class="text-center">Mitra DU/DI</th>
                                            <th colspan="3" width="25%"class="text-center">Lokasi</th>
                                            <th colspan="2" width="16.6%"class="text-center">Lamanya(bulan)</th>
                                            <th colspan="3" width="25%"class="text-center">Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($data[0]->pkl) == 0)
                                        <tr height="50px">
                                            <td colspan="1" class="text-center">1.</td>
                                            <td colspan="3" class="text-center">-</td>
                                            <td colspan="3" class="text-center">-</td>
                                            <td colspan="2" class="text-center">-</td>
                                            <td colspan="3" class="text-center">-</td>
                                        </tr>
                                        <tr height="50px">
                                            <td colspan="1" class="text-center">2.</td>
                                            <td colspan="3" class="text-center">-</td>
                                            <td colspan="3" class="text-center">-</td>
                                            <td colspan="2" class="text-center">-</td>
                                            <td colspan="3" class="text-center">-</td>
                                        </tr>
                                        <tr height="50px">
                                            <td colspan="1" class="text-center">3.</td>
                                            <td colspan="3" class="text-center">-</td>
                                            <td colspan="3" class="text-center">-</td>
                                            <td colspan="2" class="text-center">-</td>
                                            <td colspan="3" class="text-center">-</td>
                                        </tr>
                                        @else
                                        @php $no= 1; @endphp
                                            @for ($i = 0; $i < count($data[0]->pkl); $i++)                                           
                                            <tr height="50px">
                                                <td colspan="1" class="text-center">{{strval($no++) .'. '}}</td>
                                                <td colspan="3" class="text-center">{{$data[0]->pkl[$i] ?$data[0]->pkl[$i]->mitra: '-'}}</td>
                                                <td colspan="3" class="text-center">{{$data[0]->pkl[$i] ?$data[0]->pkl[$i]->lokasi: '-'}}</td>
                                                <td colspan="2" class="text-center">{{$data[0]->pkl[$i] ?$data[0]->pkl[$i]->lama: '-'}}</td>
                                                <td colspan="3" class="text-center">{{$data[0]->pkl[$i] ?$data[0]->pkl[$i]->keterangan: '-'}}</td>
                                            </tr>                                            
                                            @endfor
                                                @if(count($data[0]->pkl) < 3)
                                                @for ($i = 0; $i < 3-count($data[0]->pkl); $i++)                                           
                                                <tr height="50px">
                                                    <td colspan="1" class="text-center">{{strval($no++) .'. '}}</td>
                                                    <td colspan="3" class="text-center">-</td>
                                                    <td colspan="3" class="text-center">-</td>
                                                    <td colspan="2" class="text-center">-</td>
                                                    <td colspan="3" class="text-center">-</td>
                                                </tr>  
                                                                                        
                                                @endfor
                                                @endif 
                                        @endif
                                    </tbody>
                                </table>
                           </td>
                        </tr>

                        <tr>
                            <td colspan="6"><b>D. Ekstrakurikuler</b></td>
                        </tr>
                        <tr>
                           <td colspan="6">
                                <table class="table-bordered w-100">
                                    <thead>
                                        <tr>
                                            <th width="8.4%" class="text-center">No.</th>
                                            <th width="50%" class="text-center">Kegiatan Ekstrakurikuler</th>
                                            <th width="41.6%" class="text-center">Keterangan</th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($data[0]->ekstra) == 0)
                                        <tr height="50px">
                                           <td class="align-middle text-center">1.</td>
                                           <td class="align-middle ">-</td>
                                           <td class="align-middle">-</td>
                                        </tr>
                                        <tr height="50px">
                                           <td class="align-middle text-center">2.</td>
                                           <td class="align-middle "></td>
                                           <td class="align-middle"></td>
                                        </tr>
                                        <tr height="50px">
                                           <td class="align-middle text-center">3.</td>
                                           <td class="align-middle "></td>
                                           <td class="align-middle"></td>
                                        </tr>
                                    @else
                                    @php $no= 1; @endphp
                                            @for ($i = 0; $i < count($data[0]->ekstra); $i++)                                           
                                            <tr height="50px">
                                                <td class="align-middle text-center">{{strval($no++) .'. '}}</td>
                                                <td class="align-middle p-1">{{$data[0]->ekstra[$i] ?$data[0]->ekstra[$i]->ekstrakurikuler[0]->nama: '-'}}</td>
                                                <td class="align-middle p-1">{{$data[0]->ekstra[$i] ?$data[0]->ekstra[$i]->nilai: '-'}}</td>                                                
                                            </tr>                                            
                                            @endfor
                                            @if(count($data[0]->ekstra) < 3)
                                                @for ($i = 0; $i < 3-count($data[0]->ekstra); $i++)                                           
                                                <tr height="50px">
                                                    <td class="align-middle text-center">{{strval($no++) .'. '}}</td>
                                                    <td class="align-middle text-center">-</td>
                                                    <td class="align-middle text-center">-</td>
                                                </tr>
                                                                                        
                                                @endfor
                                            @endif 
                                        @endif                        
                                    </tbody>
                                </table>
                           </td>
                        </tr>
                        <tr>
                            <td colspan="6"><b>E. Ketidakhadiran</b></td>
                        </tr>
                        <tr>
                           <td colspan="6">
                                <table class="w-100">                                  
                                    <tbody>
                                        <tr>
                                        <td width="40%">
                                            <table class="table-bordered"  width="100%">
                                                <tbody>
                                                @if(count($data[0]->absensi)==0)
                                                    <tr>
                                                        <td width="60%">Sakit</td>
                                                        <td width="40%" class="text-center">- &nbsp; hari</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Izin</td>
                                                        <td class="text-center">- &nbsp; hari</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tanpa Keterangan</td>
                                                        <td class="text-center">- &nbsp; hari</td>
                                                    </tr>
                                                @else
                                                    <tr>
                                                        <td width="60%">Sakit</td>
                                                        <td width="40%" class="text-center">{{$data[0]->absensi[0]->s}} &nbsp; hari</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Izin</td>
                                                        <td class="text-center">{{$data[0]->absensi[0]->i}} &nbsp; hari</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tanpa Keterangan</td>
                                                        <td class="text-center">{{$data[0]->absensi[0]->a}} &nbsp; hari</td>
                                                    </tr>
                                                @endif
                                                </tbody>
                                            </table>
                                        </td>
                                           <td width="60%"></td>                                           
                                        </tr>
                                    </tbody>
                                </table>
                           </td>
                        </tr>
                        <tr>
                            <td colspan="6"><b>F. Ranking dan Kenaikan Kelas</b></td>
                        </tr>
                        <tr>
                           <td colspan="6">
                                <table class="table-bordered w-100">
                                    @if(count($rank) ==0)
                                    <tr>
                                        <td style="width:100%" class="text-center p-2">-</td>                                        
                                    </tr>
                                   
                                    @else
                                    @foreach($rank as $key=> $a)
                                        @if($a['id_siswa'] == $data[0]->id)
                                        <tr>
                                            <td style="width:100%" class="align-top p-2">{{'Ranking '.strval($key+1).' dari '.strval(count($rank)).' siswa'}}</td>                                        
                                        </tr>
                                        @endif
                                    @endforeach
                                    @endif
                                   
                                </table>
                           </td>
                        </tr>
                        <tr>
                            <td colspan="6"><br></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <table class="w-100 p-5">
                                    <tr>
                                        <td width="33%" class="text-center">
                                       
                                            Mengetahui : 
                                            <br>
                                            Orang Tua/Wali, 
                                            <br><br><br><br>
                                            
                                            <u><hr></u>
                                       
                                        </td>
                                        <td width="33%"></td>
                                        @if(count($tahun) == 0 || count($walikelas) == 0)
                                       
                                        <td width="33% " class="text-center">                                      
						    				Banyuwangi, 31 Desember 2018
                                            <br>
											Walikelas
                                            <br><br><br><br>
                                            <u><b>Drs. Agung</b></u><br>
                                            NIP. 1001                                                   
                                        </td>
                                    @else
                                       
                                        <td width="33% " class="text-center">                                      
						    				Banyuwangi,  <?php
                                            setlocale(LC_TIME, 'IND');
                                            $date =  Carbon\Carbon::parse($tahun[0]->tanggal_rapor)->formatLocalized('%d %B %Y');
                                            echo $date;
                                            ?>
                                            <br>
											Walikelas
                                            <br><br><br><br>
                                            <u><b>Drs. Agung</b></u><br>
                                            NIP. 1001                                                   
                                        </td>
                                    @endif
                                    </tr>
                                </table>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="6">
                                <br><br>
                                <table class="w-100 p-5">
                                @if(count($tahun) == 0)
                                    <tr>
                                        <td width="33%" class="text-center">                                                           
                                        </td>
                                        <td width="33%" class="text-center">
                                            Mengetahui  <br>
											Kepala Sekolah SMK Cordova<br>
                                            <br><br><br><br>
                                            <u><b>Drs. Agung</b></u><br>
                                            NIP. 1001
                                        </td>
                                        <td width="33%">                                      						    				                                                   
                                        </td>
                                    </tr>
                                @else
                                @php
                                $result = substr($tahun[0]->tahun, 0, 4);            
                                @endphp
                                    <tr>
                                        <td width="33%" class="text-center">                                                           
                                        </td>
                                        <td width="33%" class="text-center">
                                            Mengetahui  <br>
											Kepala Sekolah SMK Cordova<br>
                                            <br><br><br><br>
                                            <u><b>{{$tahun[0]->nama_kepsek}}</b></u><br>
                                            NIP. {{$tahun[0]->nip_kepsek}}
                                        </td>
                                        <td width="33%">                                      						    				                                                   
                                        </td>
                                    </tr>
                                @endif
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>                               
            </div>
           

            <div class="col-sm-12 page" style="padding: 0 100px 0 100px">
            <br><br>
                <table width="100%">
                    <thead></thead>
                    <tbody>                                               
                    <tr>
                            <td width="20%">Nama Sekolah</td>
                            <td width="1%">:</td>
                            <td width="39%" class="font-weight-bold">SMK CORDOVA</td>
                            <td width="20%">Kelas</td>
                            <td width="1%">:</td>
                            <td width="19%" class="font-weight-bold">{{$data[0]->kelas()->first()->nama_kelas}}</td>
                        </tr>
                        <tr>
                            <td>Alamat Madrasah</td>
                            <td>:</td>
                            <td class="font-weight-bold">Jl. KH. Achmad Musayyidi No.2 Karangdoro</td>
                            <td>Semester</td>
                            <td>:</td>
                            @php
                            $smt = substr($_GET['tahun'],4, 5);
                            @endphp
                            <td class="font-weight-bold">{{ $smt == 1 ? 'Ganjil' :'Genap'}}</td>
                        </tr>
                        <tr>
                            <td>Nama Peserta Didik</td>
                            <td>:</td>
                            <td class="font-weight-bold">{{$data[0]->nama}}</td>
                            <td>Tahun Pelajaran</td>
                            <td>:</td>
                            @php
                            $ta = (int) substr($_GET['tahun'],0, 4) + 1;
                            @endphp
                            <td class="font-weight-bold">{{substr($_GET['tahun'],0, 4).'/'.$ta}}</td>
                        </tr>
                        <tr>
                            <td>NIS / NISN</td>
                            <td>:</td>
                            <td class="font-weight-bold">{{$data[0]->nipdn}} / {{$data[0]->nisn}}</td>
                            <td colspan="3"></td>
                        </tr>
                        <tr>
                            <td colspan="6"><br><br></td>
                        </tr>
                        <tr>
                            <td colspan="6"><b>G. Deskripsi Perkembangan Karakter</b></td>
                        </tr>
                        <tr>
                           <td colspan="6">
                                <table class="table-bordered w-100">
                                    <thead>
                                        <tr>                                           
                                            <th width="40%" class="text-center">Karakter yang dibangun</th>
                                            <th width="60%" class="text-center">Deskripsi</th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($data[0]->sikap) == 0)
                                        <tr height="100px">                                         
                                           <td class="align-middle pl-1">Integritas</td>
                                           <td class="align-top">-</td>
                                        </tr>
                                        <tr height="100px">                                         
                                           <td class="align-middle pl-1">Religius</td>
                                           <td class="align-top">-</td>
                                        </tr>
                                        <tr height="100px">                                         
                                           <td class="align-middle pl-1">Nasionalis</td>
                                           <td class="align-top">-</td>
                                        </tr>
                                        <tr height="100px">                                         
                                           <td class="align-middle pl-1">Mandiri</td>
                                           <td class="align-top">-</td>
                                        </tr>
                                        <tr height="100px">                                         
                                           <td class="align-middle pl-1">Gotorng-royong</td>
                                           <td class="align-top">-</td>
                                        </tr>
                                    </tbody>
                                    @else
                                    @php
                                    $ns = explode('/',$data[0]->sikap[0]->deskripsi)
                                    @endphp
                                        <tr height="100px">                                         
                                           <td class="align-middle pl-1">Integritas</td>
                                           <td class="align-top">{{$ns[0]}}</td>
                                        </tr>
                                        <tr height="100px">                                         
                                           <td class="align-middle pl-1">Religius</td>
                                           <td class="align-top">{{$ns[1]}}</td>
                                        </tr>
                                        <tr height="100px">                                         
                                           <td class="align-middle pl-1">Nasionalis</td>
                                           <td class="align-top">{{$ns[2]}}</td>
                                        </tr>
                                        <tr height="100px">                                         
                                           <td class="align-middle pl-1">Mandiri</td>
                                           <td class="align-top">{{$ns[3]}}</td>
                                        </tr>
                                        <tr height="100px">                                         
                                           <td class="align-middle pl-1">Gotorng-royong</td>
                                           <td class="align-top">{{$ns[4]}}</td>
                                        </tr>
                                    @endif
                                </table>
                           </td>
                        </tr>
                        <tr>
                            <td colspan="6"><b>H. Catatan Perkembangan Karakter</b></td>
                        </tr>
                        <tr>
                        @if(count($data[0]->sikap) == 0)
                           <td colspan="6">
                                <table class="table-bordered w-100">
                                    <tr height="200px">
                                        <td style="width:100%" class="text-center p-2">-</td>                                        
                                    </tr>
                                </table>
                           </td>
                        @else
                            <td colspan="6">
                                <table class="table-bordered w-100">
                                    <tr height="200px">
                                        <td style="width:100%" class="align-top p-2">{{$data[0]->sikap[0]->catatan}}</td>                                        
                                    </tr>
                                </table>
                           </td>
                        @endif
                        </tr>
                        <tr>
                            <td colspan="6"><br></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <table class="w-100 p-5">
                                    <tr>
                                        <td width="33%" class="text-center">
                                       
                                            Mengetahui : 
                                            <br>
                                            Orang Tua/Wali, 
                                            <br><br><br><br>
                                            
                                            <u><hr></u>
                                       
                                        </td>
                                        <td width="33%"></td>
                                        @if(count($tahun) == 0 || count($walikelas) == 0)
                                       
                                        <td width="33% " class="text-center">                                      
						    				Banyuwangi, 31 Desember 2018
                                            <br>
											Walikelas
                                            <br><br><br><br>
                                            <u><b>Drs. Agung</b></u><br>
                                            NIP. 1001                                                   
                                        </td>
                                    @else
                                       
                                        <td width="33% " class="text-center">                                      
						    				Banyuwangi,  <?php
                                            setlocale(LC_TIME, 'IND');
                                            $date =  Carbon\Carbon::parse($tahun[0]->tanggal_rapor)->formatLocalized('%d %B %Y');
                                            echo $date;
                                            ?>
                                            <br>
											Walikelas
                                            <br><br><br><br>
                                            <u><b>Drs. Agung</b></u><br>
                                            NIP. 1001                                                   
                                        </td>
                                    @endif
                                    </tr>
                                </table>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="6">
                                <br><br>
                                <table class="w-100 p-5">
                                @if(count($tahun) == 0)
                                    <tr>
                                        <td width="33%" class="text-center">                                                           
                                        </td>
                                        <td width="33%" class="text-center">
                                            Mengetahui  <br>
											Kepala Sekolah SMK Cordova<br>
                                            <br><br><br><br>
                                            <u><b>Drs. Agung</b></u><br>
                                            NIP. 1001
                                        </td>
                                        <td width="33%">                                      						    				                                                   
                                        </td>
                                    </tr>
                                @else
                                @php
                                $result = substr($tahun[0]->tahun, 0, 4);            
                                @endphp
                                    <tr>
                                        <td width="33%" class="text-center">                                                           
                                        </td>
                                        <td width="33%" class="text-center">
                                            Mengetahui  <br>
											Kepala Sekolah SMK Cordova<br>
                                            <br><br><br><br>
                                            <u><b>{{$tahun[0]->nama_kepsek}}</b></u><br>
                                            NIP. {{$tahun[0]->nip_kepsek}}
                                        </td>
                                        <td width="33%">                                      						    				                                                   
                                        </td>
                                    </tr>
                                @endif
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>                               
            </div>
            
                
        
    </div>
	
</body>
</html>