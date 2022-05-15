@extends('layouts.appdashboard') @section('title', 'Nilai Absen || Cordova')
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
        <h4 class="header-title">Nilai Absen</h4>
        <p class="sub-header">Tempat Mengelola data terkait Nilai Absen</p>
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
                                <th class="col-1">No</th>
                                <th class="col-2">Nama</th>
                                <th class="col-3">Nilai Pengetahuan</th>
                                <th class="col-2">NIlai Keterampilan</th>
                            </tr>
                        </thead>
                        <tbody> 
                        <form action="{{url('dashboard/nilai_absen/store').'/'.$kelas[0]->id}}" method="POST">
                        @csrf
                        <input type="hidden" name="tahun" value="{{ isset($_GET['smt']) ? $_GET['smt'] :''}}">
                        @foreach($kelas as $t)
                            @foreach($t->siswa as $k)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$k->nama}}</td>
                                <input type="hidden" name="siswa[]" value="{{$k->id}}">
                                <td>
                                    <div class="row">
                                        <div class="col">
                                            Sakit: <input type="number" name="nh1[]" class="form-control calculate input-sm"  min="0" max="100" value="{{ $k->absensi->count() > 0 ? $k->absensi[0]->s: '0' }}" required>
                                        </div>
                                        <div class="col">
                                            Izin:
                                            <input type="number" name="nh2[]" class="form-control calculate input-sm"  min="0" max="100" value="{{ $k->absensi->count() > 0 ? $k->absensi[0]->i: '0' }}" required>
                                        </div>
                                        <div class="col">
                                            Alpha:<input type="number" name="nh3[]" class="form-control calculate input-sm"  min="0" max="100" value="{{ $k->absensi->count() > 0 ? $k->absensi[0]->a: '0' }}" required>
                                        </div>
                                    </div>                                                                                   
                                </td>
                                <td>
                                    Keterangan <input type="text" name="nk[]" class="form-control input-sm"  min="0"  max="100" value="{{ $k->absensi->count() > 0 ? $k->absensi[0]->keterangan: '' }}" required>
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

    
});
</script>

@endsection
