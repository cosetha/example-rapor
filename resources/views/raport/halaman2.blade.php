<!DOCTYPE html>
<html>
<head>
	<title>Cetak Raport</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <style>
        @page {
        size: A4;
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
                margin-right: 0.65in;                          
                }    
        
        }
        hr {
            width: 70%;
            border: 3px dotted;
            border-style: none none dotted;
            color: black;
            margin 10px
        }
    </style>
</head>
<body>
	<div class="container">
    <br><br><br>
        <img src="{{asset('img/LOGO SMK.png')}}" class="my-3 mx-auto d-block"  width="200px" alt="" srcset="">
        <br><br><br>
        <div class="row">
            <div class="col-sm-12" style="padding: 0 100px 0 100px">
                <h1 class="text-center">LAPORAN HASIL BELAJAR SEKOLAH MENENGAH KEJURUAN (SMK) </h1>
                <br><br>
                <br>
                <br>
                <p class="text-center font-weight-bold text-uppercase" style="margin-bottom: 25px; font-size:20px">{{$siswa[0]->nama}}</p>
                <hr>
                <p class="text-center font-weight-bold text-uppercase" style="margin-bottom: 25px; font-size:20px">{{$siswa[0]->nisn}}</p>
                <hr>
                <p class="text-center font-weight-bold text-uppercase" style="margin-bottom: 25px; font-size:20px">{{$siswa[0]->nipdn}}</p>
                <hr>
                <p class="text-center font-weight-bold text-uppercase" style="margin-bottom: 25px; font-size:20px">{{$siswa[0]->bidang_studi}}</p>
                <hr>
                <p class="text-center font-weight-bold text-uppercase" style="margin-bottom: 25px; font-size:20px">{{$siswa[0]->kompetensi_keahlian}}</p>
                <hr>
                <br>
                <br>
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