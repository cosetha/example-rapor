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
                                <th class="col-2">Nama</th>                               
                                <th class="col-1">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>                         
                        @csrf                        
                        @foreach($kelas as $t)
                            @foreach($t->siswa as $k)
                            @php
                                $tahun = $_GET['smt'];
                            @endphp
                            
                            <tr>
                                <td>{{$k->nipdn}}</td>
                                <td>{{$k->nama}}</td>
                                <td>
                                    <a href="{{url('dashboard/raport/sampul1').'/'.$k->id.'?tahun='.$tahun}}" class="btn btn-success btn-sm" target="_blank"><i class="fa fa-print"></i> S 1</a>
                                    <a href="{{url('dashboard/raport/sampul2').'/'.$k->id.'?tahun='.$tahun}}" class="btn btn-success btn-sm" target="_blank"><i class="fa fa-print"></i> S 2</a>
                                    <a href="{{url('dashboard/raport/sampul3').'/'.$k->id.'?tahun='.$tahun}}" class="btn btn-success btn-sm" target="_blank"><i class="fa fa-print"></i> S 3</a>       
                                    <a href="{{url('dashboard/raport/raport').'/'.$k->id.'?tahun='.$tahun.'&kelas='.Request::segment(4)}}" class="btn btn-success btn-sm" target="_blank"><i class="fa fa-print"></i> Raport</a>                                                                                                                                 
                                </td>                           
                            </tr>
                            @endforeach
                        @endforeach 
                                           
                        </tbody>
                    </table>
                    <button class="btn btn-success" type ="submit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection @section('js')
<script>
$(document).ready(function () {
       $('#table_id').DataTable();
});
</script>

@endsection
