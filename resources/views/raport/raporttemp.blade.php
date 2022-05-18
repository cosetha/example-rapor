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
             
            <div class="col-sm-12 page" style="padding: 0 100px 0 100px">
                <table width="100%">
                    <thead></thead>
                    <tbody>
                        <tr>
                            <td colspan="6" class="text-center font-weight-bold">HASIL PENCAPAIAN KOMPETENSI PESERTA DIDIK</td>
                        </tr>
                        <tr>
                            <td colspan="6"><br><br></td>
                        </tr>
                        <tr>
                            <td width="20%">Nama Madrasah</td>
                            <td width="1%">:</td>
                            <td width="39%" class="font-weight-bold">MTs Negeri 5 Kulon Progo</td>
                            <td width="20%">Kelas</td>
                            <td width="1%">:</td>
                            <td width="19%" class="font-weight-bold">VII A</td>
                        </tr>
                        <tr>
                            <td>Alamat Madrasah</td>
                            <td>:</td>
                            <td class="font-weight-bold">Sumoroto, Sidoharjo, Samigaluh</td>
                            <td>Semester</td>
                            <td>:</td>
                            <td class="font-weight-bold">1</td>
                        </tr>
                        <tr>
                            <td>Nama Siswa</td>
                            <td>:</td>
                            <td class="font-weight-bold">Adi</td>
                            <td>Tahun Pelajaran</td>
                            <td>:</td>
                            <td class="font-weight-bold">2018/2019</td>
                        </tr>
                        <tr>
                            <td>NIS / NISN</td>
                            <td>:</td>
                            <td class="font-weight-bold">101 / 2018101</td>
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
                                        <tr>
                                            <td class="text-center" colspan="1">2</td>
                                            <td colspan="2">Pendidikan Pancasila dan Kewarganegaraan</td>
                                            <td colspan="1" class="text-center">-</td>
                                            <td colspan="1" class="text-center">-</td>                                           
                                            <td colspan="1" class="text-center">-</td>
                                            <td colspan="1" class="text-center">-</td>                                           
                                        </tr>  
                                        <tr>
                                            <td class="text-center" colspan="1">2</td>
                                            <td colspan="2">Pendidikan Pancasila dan Kewarganegaraan</td>
                                            <td colspan="1" class="text-center">-</td>
                                            <td colspan="1" class="text-center">-</td>                                           
                                            <td colspan="1" class="text-center">-</td>
                                            <td colspan="1" class="text-center">-</td>                                           
                                        </tr>  
                                        <tr>
                                            <td class="text-center" colspan="1">2</td>
                                            <td colspan="2">Pendidikan Pancasila dan Kewarganegaraan</td>
                                            <td colspan="1" class="text-center">-</td>
                                            <td colspan="1" class="text-center">-</td>                                           
                                            <td colspan="1" class="text-center">-</td>
                                            <td colspan="1" class="text-center">-</td>                                           
                                        </tr>  
                                        <tr>
                                            <td class="text-center" colspan="1">2</td>
                                            <td colspan="2">Pendidikan Pancasila dan Kewarganegaraan</td>
                                            <td colspan="1" class="text-center">-</td>
                                            <td colspan="1" class="text-center">-</td>                                           
                                            <td colspan="1" class="text-center">-</td>
                                            <td colspan="1" class="text-center">-</td>                                           
                                        </tr>  
                                        <tr>
                                            <td class="text-center" colspan="1">2</td>
                                            <td colspan="2">Pendidikan Pancasila dan Kewarganegaraan</td>
                                            <td colspan="1" class="text-center">-</td>
                                            <td colspan="1" class="text-center">-</td>                                           
                                            <td colspan="1" class="text-center">-</td>
                                            <td colspan="1" class="text-center">-</td>                                           
                                        </tr>  
                                        <tr>
                                            <td class="text-center" colspan="1">2</td>
                                            <td colspan="2">Pendidikan Pancasila dan Kewarganegaraan</td>
                                            <td colspan="1" class="text-center">-</td>
                                            <td colspan="1" class="text-center">-</td>                                           
                                            <td colspan="1" class="text-center">-</td>
                                            <td colspan="1" class="text-center">-</td>                                           
                                        </tr>  
                                        <tr>                                            
                                            <td style="padding-left:15px;" colspan="8"><b>B. Muatan Kewilayahan</b></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" colspan="1">2</td>
                                            <td colspan="2">Seni Budaya</td>
                                            <td colspan="1" class="text-center">-</td>
                                            <td colspan="1" class="text-center">-</td>                                           
                                            <td colspan="1" class="text-center">-</td>
                                            <td colspan="1" class="text-center">-</td>                                           
                                        </tr>   
                                        <tr>
                                            <td class="text-center" colspan="1">2</td>
                                            <td colspan="2">Seni Budaya</td>
                                            <td colspan="1" class="text-center">-</td>
                                            <td colspan="1" class="text-center">-</td>                                           
                                            <td colspan="1" class="text-center">-</td>
                                            <td colspan="1" class="text-center">-</td>                                           
                                        </tr>   
                                        <tr>
                                            <td class="text-center" colspan="1">2</td>
                                            <td colspan="2">Seni Budaya</td>
                                            <td colspan="1" class="text-center">-</td>
                                            <td colspan="1" class="text-center">-</td>                                           
                                            <td colspan="1" class="text-center">-</td>
                                            <td colspan="1" class="text-center">-</td>                                           
                                        </tr>   
                                        <tr>
                                            <td class="text-center" colspan="1">2</td>
                                            <td colspan="2">Seni Budaya</td>
                                            <td colspan="1" class="text-center">-</td>
                                            <td colspan="1" class="text-center">-</td>                                           
                                            <td colspan="1" class="text-center">-</td>
                                            <td colspan="1" class="text-center">-</td>                                           
                                        </tr>   
                                        <tr>                                            
                                            <td style="padding-left:15px;" colspan="8"><b>C. Muatan Pemintan Kejuruan</b></td>
                                        </tr>
                                        <tr>                                            
                                            <td style="padding-left:25px;" colspan="8"><b>C1. Dasar Bidang Keahlian</b></td>
                                        </tr>                                        
                                        <tr>
                                            <td class="text-center" colspan="1">2</td>
                                            <td colspan="2">Fisika</td>
                                            <td colspan="1" class="text-center">-</td>
                                            <td colspan="1" class="text-center">-</td>                                           
                                            <td colspan="1" class="text-center">-</td>
                                            <td colspan="1" class="text-center">-</td>                                           
                                        </tr> 
                                        <tr>
                                            <td class="text-center" colspan="1">2</td>
                                            <td colspan="2">Fisika</td>
                                            <td colspan="1" class="text-center">-</td>
                                            <td colspan="1" class="text-center">-</td>                                           
                                            <td colspan="1" class="text-center">-</td>
                                            <td colspan="1" class="text-center">-</td>                                           
                                        </tr> 
                                        <tr>
                                            <td class="text-center" colspan="1">2</td>
                                            <td colspan="2">Fisika</td>
                                            <td colspan="1" class="text-center">-</td>
                                            <td colspan="1" class="text-center">-</td>                                           
                                            <td colspan="1" class="text-center">-</td>
                                            <td colspan="1" class="text-center">-</td>                                           
                                        </tr>   
                                        <tr>                                            
                                            <td style="padding-left:25px;" colspan="8"><b>C2. Dasar Program Keahlian</b></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" colspan="1">2</td>
                                            <td colspan="2">Fisika</td>
                                            <td colspan="1" class="text-center">-</td>
                                            <td colspan="1" class="text-center">-</td>                                           
                                            <td colspan="1" class="text-center">-</td>
                                            <td colspan="1" class="text-center">-</td>                                           
                                        </tr> 
                                        <tr>
                                            <td class="text-center" colspan="1">2</td>
                                            <td colspan="2">Fisika</td>
                                            <td colspan="1" class="text-center">-</td>
                                            <td colspan="1" class="text-center">-</td>                                           
                                            <td colspan="1" class="text-center">-</td>
                                            <td colspan="1" class="text-center">-</td>                                           
                                        </tr> 
                                        <tr>
                                            <td class="text-center" colspan="1">2</td>
                                            <td colspan="2">Fisika</td>
                                            <td colspan="1" class="text-center">-</td>
                                            <td colspan="1" class="text-center">-</td>                                           
                                            <td colspan="1" class="text-center">-</td>
                                            <td colspan="1" class="text-center">-</td>                                           
                                        </tr>   
                                        <tr>                                            
                                            <td style="padding-left:25px;" colspan="8"><b>C3. Kompetensi Keahlian</b></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" colspan="1">2</td>
                                            <td colspan="2">Fisika</td>
                                            <td colspan="1" class="text-center">-</td>
                                            <td colspan="1" class="text-center">-</td>                                           
                                            <td colspan="1" class="text-center">-</td>
                                            <td colspan="1" class="text-center">-</td>                                           
                                        </tr>   
                                        <tr>
                                            <td class="text-center" colspan="1">2</td>
                                            <td colspan="2">Fisika</td>
                                            <td colspan="1" class="text-center">-</td>
                                            <td colspan="1" class="text-center">-</td>                                           
                                            <td colspan="1" class="text-center">-</td>
                                            <td colspan="1" class="text-center">-</td>                                           
                                        </tr>   
                                        <tr>
                                            <td class="text-center" colspan="1">2</td>
                                            <td colspan="2">Fisika</td>
                                            <td colspan="1" class="text-center">-</td>
                                            <td colspan="1" class="text-center">-</td>                                           
                                            <td colspan="1" class="text-center">-</td>
                                            <td colspan="1" class="text-center">-</td>                                           
                                        </tr>   
                                        <tr>
                                            <td class="text-center" colspan="1">2</td>
                                            <td colspan="2">Fisika</td>
                                            <td colspan="1" class="text-center">-</td>
                                            <td colspan="1" class="text-center">-</td>                                           
                                            <td colspan="1" class="text-center">-</td>
                                            <td colspan="1" class="text-center">-</td>                                           
                                        </tr>   
                                        <tr>
                                            <td class="text-center" colspan="1">2</td>
                                            <td colspan="2">Fisika</td>
                                            <td colspan="1" class="text-center">-</td>
                                            <td colspan="1" class="text-center">-</td>                                           
                                            <td colspan="1" class="text-center">-</td>
                                            <td colspan="1" class="text-center">-</td>                                           
                                        </tr>                                        
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
                                        <td width="33% " class="text-center">                                      
						    				Kulon Progo, 31 Desember 2018
                                            <br>
											Walikelas
                                            <br><br><br><br>
                                            <u><b>Drs. Agung</b></u><br>
                                            NIP. 1001
                                                   
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="6">
                                <br><br>
                                <table class="w-100 p-5">
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
                            <td width="20%">Nama Madrasah</td>
                            <td width="1%">:</td>
                            <td width="39%" class="font-weight-bold">MTs Negeri 5 Kulon Progo</td>
                            <td width="20%">Kelas</td>
                            <td width="1%">:</td>
                            <td width="19%" class="font-weight-bold">VII A</td>
                        </tr>
                        <tr>
                            <td>Alamat Madrasah</td>
                            <td>:</td>
                            <td class="font-weight-bold">Sumoroto, Sidoharjo, Samigaluh</td>
                            <td>Semester</td>
                            <td>:</td>
                            <td class="font-weight-bold">1</td>
                        </tr>
                        <tr>
                            <td>Nama Siswa</td>
                            <td>:</td>
                            <td class="font-weight-bold">Adi</td>
                            <td>Tahun Pelajaran</td>
                            <td>:</td>
                            <td class="font-weight-bold">2018/2019</td>
                        </tr>
                        <tr>
                            <td>NIS / NISN</td>
                            <td>:</td>
                            <td class="font-weight-bold">101 / 2018101</td>
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
                                    <tr height="100pxx">
                                        <td style="width:100%" class="align-top p-2">cell content here</td>                                        
                                    </tr>
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
                                        <tr height="50px">
                                            <td colspan="1" class="text-center">1.</td>
                                            <td colspan="3" class="text-center">cell content here</td>
                                            <td colspan="3" class="text-center">cell content here</td>
                                            <td colspan="2" class="text-center">cell content here</td>
                                            <td colspan="3" class="text-center">cell content here</td>
                                        </tr>
                                        <tr height="50px">
                                            <td colspan="1" class="text-center">1.</td>
                                            <td colspan="3" class="text-center">cell content here</td>
                                            <td colspan="3" class="text-center">cell content here</td>
                                            <td colspan="2" class="text-center">cell content here</td>
                                            <td colspan="3" class="text-center">cell content here</td>
                                        </tr>
                                        <tr height="50px">
                                            <td colspan="1" class="text-center">1.</td>
                                            <td colspan="3" class="text-center">cell content here</td>
                                            <td colspan="3" class="text-center">cell content here</td>
                                            <td colspan="2" class="text-center">cell content here</td>
                                            <td colspan="3" class="text-center">cell content here</td>
                                        </tr>
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
                                        <tr height="50px">
                                           <td class="align-middle text-center">1</td>
                                           <td class="align-middle ">cell content here</td>
                                           <td class="align-middle">cell content here</td>
                                        </tr>
                                        <tr height="50px">
                                           <td class="align-middle text-center">1</td>
                                           <td class="align-middle ">cell content here</td>
                                           <td class="align-middle">cell content here</td>
                                        </tr>
                                        <tr height="50px">
                                           <td class="align-middle text-center">1</td>
                                           <td class="align-middle ">cell content here</td>
                                           <td class="align-middle">cell content here</td>
                                        </tr>
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
                                                    <tr>
                                                        <td width="60%">Sakit</td>
                                                        <td width="40%" class="text-center">1 &nbsp; hari</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Izin</td>
                                                        <td class="text-center">1 &nbsp; hari</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tanpa Keterangan</td>
                                                        <td class="text-center">0 &nbsp; hari</td>
                                                    </tr>
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
                                    <tr>
                                        <td style="width:100%" class="align-top p-2">cell content here</td>                                        
                                    </tr>
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
                                        <td width="33% " class="text-center">
                                      
						    				Kulon Progo, 31 Desember 2018  <br>
											Walikelas
                                            <br><br><br><br>
                                            <u><b>Drs. Agung</b></u><br>
                                            NIP. 1001
                                                   
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="6">
                                <br><br>
                                <table class="w-100 p-5">
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
                            <td width="20%">Nama Madrasah</td>
                            <td width="1%">:</td>
                            <td width="39%" class="font-weight-bold">MTs Negeri 5 Kulon Progo</td>
                            <td width="20%">Kelas</td>
                            <td width="1%">:</td>
                            <td width="19%" class="font-weight-bold">VII A</td>
                        </tr>
                        <tr>
                            <td>Alamat Madrasah</td>
                            <td>:</td>
                            <td class="font-weight-bold">Sumoroto, Sidoharjo, Samigaluh</td>
                            <td>Semester</td>
                            <td>:</td>
                            <td class="font-weight-bold">1</td>
                        </tr>
                        <tr>
                            <td>Nama Siswa</td>
                            <td>:</td>
                            <td class="font-weight-bold">Adi</td>
                            <td>Tahun Pelajaran</td>
                            <td>:</td>
                            <td class="font-weight-bold">2018/2019</td>
                        </tr>
                        <tr>
                            <td>NIS / NISN</td>
                            <td>:</td>
                            <td class="font-weight-bold">101 / 2018101</td>
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
                                        <tr height="100px">                                         
                                           <td class="align-middle ">cell content here</td>
                                           <td class="align-top">cell content here</td>
                                        </tr>
                                        <tr height="100px">                                         
                                           <td class="align-middle ">cell content here</td>
                                           <td class="align-top">cell content here</td>
                                        </tr>
                                        <tr height="100px">                                         
                                           <td class="align-middle ">cell content here</td>
                                           <td class="align-top">cell content here</td>
                                        </tr>
                                        <tr height="100px">                                         
                                           <td class="align-middle ">cell content here</td>
                                           <td class="align-top">cell content here</td>
                                        </tr>
                                    </tbody>
                                </table>
                           </td>
                        </tr>
                        <tr>
                            <td colspan="6"><b>H. Catatan Perkembangan Karakter</b></td>
                        </tr>
                        <tr>
                           <td colspan="6">
                                <table class="table-bordered w-100">
                                    <tr height="200px">
                                        <td style="width:100%" class="align-top p-2">cell content here</td>                                        
                                    </tr>
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
                                        <td width="33% " class="text-center">
                                      
						    				Kulon Progo, 31 Desember 2018  <br>
											Walikelas
                                            <br><br><br><br>
                                            <u><b>Drs. Agung</b></u><br>
                                            NIP. 1001
                                                   
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="6">
                                <br><br>
                                <table class="w-100 p-5">
                                    <tr>
                                        <td width="33%" class="text-center">                                                           
                                        </td>
                                        <td width="33%" class="text-center">
                                            Mengetahui  <br>
											Kepala Sekolah SMK Cordova<br>
                                            <br><br><br><br><br><br>
                                            <u><b>Drs. Agung</b></u><br>
                                            NIP. 1001
                                        </td>
                                        <td width="33%">                                      						    				                                                   
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>                               
            </div>
            
                
        
    </div>
	
</body>
</html>