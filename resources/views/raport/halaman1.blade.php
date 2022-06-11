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
        
        }
    </style>
</head>
<body class="p=5">
	<div class="container">
    <br><br><br>
        <img src="{{asset('img/LOGO SMK.png')}}" class="my-3 mx-auto d-block"  width="200px" alt="" srcset="">
        <br>
        <div class="row">
            <div class="col-sm-12" style="padding: 0 100px 0 100px">
                <h1 class="text-center font-weight-bold">LAPORAN HASIL BELAJAR SEKOLAH MENENGAH KEJURUAN (SMK) </h1>
                <br>           
                <table class="mt-5 table" style="width:100%;">
               
                    <tr>
                        <td class="font-weight-bold" style="width:40%">Program Keahlian</td>
                        <td class="font-weight-bold text-uppercase">:   {{$siswa[0]->bidang_studi}}        </td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Kompetensi Keahlian</td>
                        <td class="font-weight-bold text-uppercase">: {{$siswa[0]->kompetensi_keahlian}} </td>
                    </tr>                    
                    <tr>
                        <td class="font-weight-bold">Nama Sekolah</td>
                        <td class="font-weight-bold">: SMK Cordova</td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">NPSN</td>
                        <td class="font-weight-bold">: 69990467</td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Alamat Sekolah</td>
                        <td class="font-weight-bold">: Jl. KH. Achmad Musayyidi No.2 Karangdoro</td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Kelurahan</td>
                        <td class="font-weight-bold">: Karangdoro</td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Kecamatan</td>
                        <td class="font-weight-bold">: Tegalsari</td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Kabupaten / Kota</td>
                        <td class="font-weight-bold">: Banyuwangi</td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Provinsi</td>
                        <td class="font-weight-bold">:  Jawa Timur</td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Kode POS</td>
                        <td class="font-weight-bold">: 68491</td>
                    </tr>
                </table>
                <br>
                <br>
                <br>
                <p class="text-center font-weight-bold">PEMERINTAH PROVINSI JAWA TIMUR</p>
                <p class="text-center font-weight-bold">DINAS PENDIDIKAN</p>
                <p class="text-center font-weight-bold">CABANG DINAS PENDIDIKAN</p>
                <p class="text-center font-weight-bold">WILAYAH KABUPATEN BANYUWANGI</p>
            </div>
        </div>
    </div>
	
</body>
</html>