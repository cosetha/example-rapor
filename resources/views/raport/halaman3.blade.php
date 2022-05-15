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
        html, body {
            width: 210mm;
            height: 297mm;
        }
        
        }
    </style>
</head>
<body class="vh-100">
	<div class="container">    
        <div class="row">
            <div class="col-sm-12" style="padding: 0 100px 0 100px">
            <br><br>
                <h5 class="text-center">KETERANGAN TENTANG DIRI SISWA  </h5>
                <br>           
                <table class="mt-3" style="width:100%;">
                    <tr>
                        <td width="3%" class="font-weight-bold">1.</td>
                        <td class="font-weight-bold" width="40%">Nama Siswa (Lengkap)</td>
                        <td width="2%" class="font-weight-bold">:</td>
                        <td class="font-weight-bold text-uppercase" width="55%"> </td>
                    </tr>

                    <tr>
                        <td width="3%" class="font-weight-bold">2.</td>
                        <td class="font-weight-bold" width="40%">Nomor Induk (NIPDN)</td>
                        <td width="2%" class="font-weight-bold">:</td>
                        <td class="font-weight-bold text-uppercase" width="55%"> </td>
                    </tr>

                    <tr>
                        <td width="3%" class="font-weight-bold">3.</td>
                        <td class="font-weight-bold" width="40%">Nomor Induk Siswa Nasional (NISN)</td>
                        <td width="2%" class="font-weight-bold">:</td>
                        <td class="font-weight-bold text-uppercase" width="55%"> </td>
                    </tr>

                    <tr>
                        <td width="3%" class="font-weight-bold">4.</td>
                        <td class="font-weight-bold" width="40%">Tempat, Tanggal Lahir</td>
                        <td width="2%" class="font-weight-bold">:</td>
                        <td class="font-weight-bold text-uppercase" width="55%"> </td>
                    </tr>

                    <tr>
                        <td width="3%" class="font-weight-bold">5.</td>
                        <td class="font-weight-bold" width="40%">Jenis Kelamin</td>
                        <td width="2%" class="font-weight-bold">:</td>
                        <td class="font-weight-bold text-uppercase" width="55%"> </td>
                    </tr>
                    <tr>
                        <td width="3%" class="font-weight-bold">6.</td>
                        <td class="font-weight-bold" width="40%">Agama</td>
                        <td width="2%" class="font-weight-bold">:</td>
                        <td class="font-weight-bold text-uppercase" width="55%"> </td>
                    </tr>
                    <tr>
                        <td width="3%" class="font-weight-bold">7.</td>
                        <td class="font-weight-bold" width="40%">Status dalam Keluarga</td>
                        <td width="2%" class="font-weight-bold">:</td>
                        <td class="font-weight-bold text-uppercase" width="55%"> </td>
                    </tr>
                    <tr>
                        <td width="3%" class="font-weight-bold">8.</td>
                        <td class="font-weight-bold" width="40%">Anak Ke</td>
                        <td width="2%" class="font-weight-bold">:</td>
                        <td class="font-weight-bold text-uppercase" width="55%"> </td>
                    </tr>
                    <tr>
                        <td width="3%" class="font-weight-bold">9.</td>
                        <td class="font-weight-bold" width="40%">Alamat Siswa</td>
                        <td width="2%" class="font-weight-bold">:</td>
                        <td class="font-weight-bold text-uppercase" width="55%"> </td>
                    </tr>
                    <tr>
                        <td width="3%" class="font-weight-bold">10.</td>
                        <td class="font-weight-bold" width="40%">Nomor HP</td>
                        <td width="2%" class="font-weight-bold">:</td>
                        <td class="font-weight-bold text-uppercase" width="55%"> </td>
                    </tr>
                    <tr>
                        <td width="3%" class="font-weight-bold">11.</td>
                        <td class="font-weight-bold" width="40%">Sekolah Asal	</td>
                        <td width="2%" class="font-weight-bold">:</td>
                        <td class="font-weight-bold text-uppercase" width="55%"> </td>
                    </tr>
                    <tr>
                        <td width="3%" class="font-weight-bold"></td>
                        <td class="font-weight-bold" width="40%">Diterima di Sekolah ini</td>
                        <td width="2%" class="font-weight-bold"></td>
                        <td class="font-weight-bold text-uppercase" width="55%"> </td>
                    </tr>
                    <tr>
                        <td width="3%" class="font-weight-bold"></td>
                        <td class="font-weight-bold" width="40%">Di Kelas</td>
                        <td width="2%" class="font-weight-bold">:</td>
                        <td class="font-weight-bold text-uppercase" width="55%"> </td>
                    </tr>
                    <tr>
                        <td width="3%" class="font-weight-bold">12.</td>
                        <td class="font-weight-bold" width="40%">Pada Tanggal</td>
                        <td width="2%" class="font-weight-bold">:</td>
                        <td class="font-weight-bold text-uppercase" width="55%"> </td>
                    </tr>
                    <tr>
                        <td width="3%" class="font-weight-bold">13.</td>
                        <td class="font-weight-bold" width="40%">Nama Orang Tua</td>
                        <td width="2%" class="font-weight-bold">:</td>
                        <td class="font-weight-bold text-uppercase" width="55%"> </td>
                    </tr>
                    <tr>
                        <td width="3%" class="font-weight-bold"></td>
                        <td class="font-weight-bold" width="40%">a. Ayah</td>
                        <td width="2%" class="font-weight-bold">:</td>
                        <td class="font-weight-bold text-uppercase" width="55%"> </td>
                    </tr>
                    <tr>
                        <td width="3%" class="font-weight-bold"></td>
                        <td class="font-weight-bold" width="40%">b. Ibu</td>
                        <td width="2%" class="font-weight-bold">:</td>
                        <td class="font-weight-bold text-uppercase" width="55%"> </td>
                    </tr>
                    <tr>
                        <td width="3%" class="font-weight-bold">14.</td>
                        <td class="font-weight-bold" width="40%">Alamat Orangtua</td>
                        <td width="2%" class="font-weight-bold">:</td>
                        <td class="font-weight-bold text-uppercase" width="55%"> </td>
                    </tr>
                    <tr>
                        <td width="3%" class="font-weight-bold">15.</td>
                        <td class="font-weight-bold" width="40%">Nomor Telepon / HP</td>
                        <td width="2%" class="font-weight-bold">:</td>
                        <td class="font-weight-bold text-uppercase" width="55%"> </td>
                    </tr>
                    <tr>
                        <td width="3%" class="font-weight-bold">16.</td>
                        <td class="font-weight-bold" width="40%"> Pekerjaan Orang Tua</td>
                        <td width="2%" class="font-weight-bold">:</td>
                        <td class="font-weight-bold text-uppercase" width="55%"> </td>
                    </tr>
                    <tr>
                        <td width="3%" class="font-weight-bold"></td>
                        <td class="font-weight-bold" width="40%">a. Ayah</td>
                        <td width="2%" class="font-weight-bold">:</td>
                        <td class="font-weight-bold text-uppercase" width="55%"> </td>
                    </tr>
                    <tr>
                        <td width="3%" class="font-weight-bold"></td>
                        <td class="font-weight-bold" width="40%">b. Ibu</td>
                        <td width="2%" class="font-weight-bold">:</td>
                        <td class="font-weight-bold text-uppercase" width="55%"> </td>
                    </tr>
                    <tr>
                        <td width="3%" class="font-weight-bold">17.</td>
                        <td class="font-weight-bold" width="40%">Nama Wali Siswa</td>
                        <td width="2%" class="font-weight-bold">:</td>
                        <td class="font-weight-bold text-uppercase" width="55%"> </td>
                    </tr>
                    <tr>
                        <td width="3%" class="font-weight-bold">18.</td>
                        <td class="font-weight-bold" width="40%">Alamat Wali Siswa</td>
                        <td width="2%" class="font-weight-bold">:</td>
                        <td class="font-weight-bold text-uppercase" width="55%"> </td>
                    </tr>
                    <tr>
                        <td width="3%" class="font-weight-bold">19.</td>
                        <td class="font-weight-bold" width="40%"> Nomor Telepon / HP</td>
                        <td width="2%" class="font-weight-bold">:</td>
                        <td class="font-weight-bold text-uppercase" width="55%"> </td>
                    </tr>
                    <tr>
                        <td width="3%" class="font-weight-bold">20.</td>
                        <td class="font-weight-bold" width="40%"> Pekerjaan Wali Siswa</td>
                        <td width="2%" class="font-weight-bold">:</td>
                        <td class="font-weight-bold text-uppercase" width="55%"> </td>
                    </tr>
                    
                </table>
                <br>  
                <br>  
                <br>                           
            </div>
            <div class="col-sm-4 offset-sm-3">
                <div class="bg-danger border border-dark" alt="pas foto" style="width:3cm; height:4cm;">
            
                </div>            
            </div>
            <div class="col-sm-4">
                <p class="font-weight-bold"> Banyuwangi, ……………… 2022</p>
                <p class="font-weight-bold">Kepala SMK Cordova</p>
                <br>
                <br>
                <br>
                <p class="font-weight-bold"><u>Moh. Badrodin Zuhri, M.Pd.I</u></p>
                <p class="font-weight-bold">NIP: </p>
            </div>
        </div>
    </div>
	
</body>
</html>