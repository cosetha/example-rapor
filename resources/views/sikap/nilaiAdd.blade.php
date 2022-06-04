@extends('layouts.appdashboard') @section('title', 'Nilai Sikap || Cordova')
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
        <h4 class="header-title">Nilai Sikap</h4>
        <p class="sub-header">Tempat Mengelola data terkait Nilai Sikap</p>
        <div class="row mt-3">
            @if (\Session::has('success'))
                <div class="alert alert-success">                   
                   {!! \Session::get('success') !!}               
                </div>
            @endif
           <div class="col-sm-6">
              <div class="card" style="width: 100%;">
                  <div class="card-header bg-primary text-light">
                    {{'Data Siswa Kelas '.$kelas[0]->nama_kelas.' Tahun '.$kelas[0]->tahun}}
                  </div>
                  <ul class="list-group list-group-flush">   
                    @foreach($siswa as $s)              
                      <li class="list-group-item"> <a href="#" class="siswa_list" data-nilai="{{ $s->sikap->count() > 0 ? $s->sikap[0]->deskripsi: '0' }}" data-catatan="{{ $s->sikap->count() > 0 ? $s->sikap[0]->catatan: '0' }}" data-id="{{$s->id}}"><i class="fa fa-chevron-right"></i> {{$loop->iteration.'. '.$s->nama}}</a></li>               
                    @endforeach()
                  </ul>
                  {{$siswa->links()}}
                </div>
           </div> 

           <div class="col-sm-6">
                <div class="card" style="width: 100%;">
                  <div class="card-header bg-primary text-light" id="header">
                    Input Deskripsi
                  </div>
                  <div class="card-body">
                    <form id="myform" action="{{url('dashboard/nilai_sikap/store').'/'.$kelas[0]->id}}" method="post">
                      @csrf
                      <input type="hidden" name="siswa" id="siswa">
                      <input type="hidden" name="tahun" value="{{ isset($_GET['smt']) ? $_GET['smt'] :''}}">
                      <div class="form-group">
                        <label class="form-label" for="integritas">Integritas</label>
                        <input type="text" name="integritas" id="integritas" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label class="form-label" for="religius">Religius</label>
                        <input type="text" name="religius" id="religius" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label class="form-label" for="nasionalis">Nasionalis</label>
                        <input type="text" name="nasionalis" id="nasionalis" class="form-control" required>
                      </div><div class="form-group">
                        <label class="form-label" for="mandiri">Mandiri</label>
                        <input type="text" name="mandiri" id="mandiri" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label class="form-label" for="gotong">Gotong-royong</label>
                        <input type="text" name="gotong" id="gotong" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label class="form-label" for="catatan">Catatan</label>
                        <textarea name="catatan" class="form-control" id="catatan" cols="20" rows="5" required></textarea>
                      </div>
                     <input type="submit" class="btn btn-success mt-2 p-1"></input>
                    </form>
                  </div>
                </div>
           </div>
           
        </div>
    </div>
</div>
@endsection @section('js')
<script>
$(document).ready(function () {
  $('.siswa_list').click(function(e){
        e.preventDefault()
        $('form input[type="submit"]').prop("disabled", false);
        $('form input[type="text"]').prop("disabled", false);
        $('form textarea').prop("disabled", false);
        $('form input[type="text"]')[0].focus();
        $('#header').text("Input Deskripsi"+$(this).text())
        $(this).data('nilai')
        $('#siswa').val($(this).data('id'))
        if($(this).data('nilai') != 0){
          const data = $(this).data('nilai').split('/')
          $('#integritas').val(data[0])
          $('#religius').val(data[1])
          $('#nasionalis').val(data[2])
          $('#mandiri').val(data[3])
          $('#gotong').val(data[4])
          $('#catatan').val($(this).data('catatan'))
        }else{
          $('#myform').trigger("reset");
        }
        
  })
  $('form input[type="submit"]').prop("disabled", true);
  $('form textarea').prop("disabled", true);
  $('form input[type="text"]').prop("disabled", true);
});
</script>

@endsection
