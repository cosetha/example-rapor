@extends('layouts.appdashboard') @section('title', 'Nilai Umum || Cordova')
@section('content')

<div class="card">
    <div class="card-body">
        <h4 class="header-title ">Nilai Umum</h4>
        <p class="sub-header">Tempat Mengelola data terkait Nilai Umum</p>
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
                        <h4 class="card-title"> Kelas: {{$k->kelas[0]->nama_kelas}} {{$k->kelas[0]->tahun}} </h4>
                        <h5 class="card-subtitle mb-2 text-muted"> {{$k->mapel[0]->nama}}</h5>
                        <p class="card-text"> <button class="btn btn-success w-100">Nilai Umum</button> </p>
                        <i class="card-link">Nilai :</i>
                        <a href="nilai_umum/add/{{$k->m_kelas_id}}?guru={{Auth::id()}}&mapel={{$k->mapel[0]->id}}&smt={{$k->kelas[0]->tahun.'1'}}" class="card-link">Ganjil</a>
                        <a href="nilai_umum/add/{{$k->m_kelas_id}}?guru={{Auth::id()}}&mapel={{$k->mapel[0]->id}}&smt={{$k->kelas[0]->tahun.'2'}}" class="card-link">Genap</a>
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
