@extends('layouts.appdashboard') @section('title', 'Raport Siswa|| Cordova')
@section('css')
<style>
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
</style>
@endsection
@section('content')

<div class="card">
    <div class="card-body">
        <h4 class="header-title">Raport Siswa </h4>
        <p class="sub-header">List Siswa</p>
        <div class="row mt-3">
            <div class="col-sm-12">
            @if (\Session::has('success'))
                <div class="alert alert-success">                   
                    {!! \Session::get('success') !!}               
                </div>
            @endif
                <div class="table-responsive">
                    <table
                        id="table_id"
                        class="table table-bordered"
                        width="100%"
                        cellspacing="0"
                    >
                        <thead>
                            <tr>
                                <th class="col-1">NIPDN</th>
                                <th class="col-1">Nama</th> 
                                <th class="col-1">KELAS</th>                               
                                <th class="col-2">Ganjil</th>
                                <th class="col-2">Genap</th>
                            </tr>
                        </thead>
                        <tbody>                         
                        @csrf                        
                        @foreach($siswa as $s)
                            @foreach($s->kelas as $k)                                                       
                            <tr>
                                <td>{{$s->nipdn}}</td>
                                <td>{{$s->nama}}</td>
                                <td>{{$k->nama_kelas.' - '.$k->tahun}}</td>
                                <td>
                                    <a href="{{url('dashboard/raport/sampul1').'/'.$s->id.'?tahun='.$k->tahun.'1'}}" class="btn btn-success btn-sm" target="_blank"><i class="fa fa-print"></i> S 1</a>
                                    <a href="{{url('dashboard/raport/sampul2').'/'.$s->id.'?tahun='.$k->tahun.'1'}}" class="btn btn-success btn-sm" target="_blank"><i class="fa fa-print"></i> S 2</a>
                                    <a href="{{url('dashboard/raport/sampul3').'/'.$s->id.'?tahun='.$k->tahun.'1'}}" class="btn btn-success btn-sm" target="_blank"><i class="fa fa-print"></i> S 3</a>       
                                    <a href="{{url('dashboard/raport/raport').'/'.$s->id.'?tahun='.$k->tahun.'1'.'&kelas='.$k->id}}" class="btn btn-success btn-sm" target="_blank"><i class="fa fa-print"></i> Raport</a>                                                                                                                                 
                                </td> 
                                <td>
                                    <a href="{{url('dashboard/raport/sampul1').'/'.$s->id.'?tahun='.$k->tahun.'2'}}" class="btn btn-success btn-sm" target="_blank"><i class="fa fa-print"></i> S 1</a>
                                    <a href="{{url('dashboard/raport/sampul2').'/'.$s->id.'?tahun='.$k->tahun.'2'}}" class="btn btn-success btn-sm" target="_blank"><i class="fa fa-print"></i> S 2</a>
                                    <a href="{{url('dashboard/raport/sampul3').'/'.$s->id.'?tahun='.$k->tahun.'2'}}" class="btn btn-success btn-sm" target="_blank"><i class="fa fa-print"></i> S 3</a>       
                                    <a href="{{url('dashboard/raport/raport').'/'.$s->id.'?tahun='.$k->tahun.'2'.'&kelas='.$k->id}}" class="btn btn-success btn-sm" target="_blank"><i class="fa fa-print"></i> Raport</a>                                                                                                                                 
                                </td>                               
                            </tr>
                            @endforeach
                        @endforeach 
                                           
                        </tbody>
                    </table>                                       
                </div>
            </div>
        </div>
    </div>
</div>
@endsection @section('js')
<script>
$(document).ready(function () {
    
});
</script>

@endsection
