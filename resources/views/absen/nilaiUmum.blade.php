@extends('layouts.appdashboard') @section('title', 'Nilai Absen || Cordova')
@section('content')

<div class="card">
    <div class="card-body">
        <h4 class="header-title ">Nilai Absen</h4>
        <p class="sub-header">Tempat Mengelola data terkait Nilai Absen</p>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="row">
            @if(count($kelas)== 0)
            <div class="alert alert-warning">
                Tidak ada matapelajaran dan kelas yang diampu
            </div>
            @else
            @foreach($kelas as $k)
            <div class="col-md-3">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h4 class="card-title"> Kelas: {{$k->nama_kelas}} {{$k->tahun}} </h4>
                        <h5 class="card-subtitle mb-2 text-muted"> Data Absensi</h5>
                        <p class="card-text"> <button class="btn btn-success w-100">Tabel absensi per semester</button> </p>
                        <i class="card-link">Nilai :</i>
                        <a href="nilai_absen/add/{{$k->id}}?smt={{$k->tahun.'1'}}" class="card-link">Ganjil</a>
                        <a href="nilai_absen/add/{{$k->id}}?smt={{$k->tahun.'2'}}" class="card-link">Genap</a>
                    </div>                   
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>
@endsection @section('js')
<script>
$(document).ready(function () {
   

});
</script>

@endsection
