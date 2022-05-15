@extends('layouts.appdashboard') @section('title', 'Nilai Ekstra || Cordova')
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
        <h4 class="header-title">Nilai Ekstra</h4>
        <p class="sub-header">Tempat Mengelola data terkait Nilai Ekstra</p>
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
                    @foreach($kelas[0]->siswa as $s)              
                      <li class="list-group-item"> <a href="#" class="siswa_list" data-nilai="{{ $s->ekstra->count() > 0 ? $s->ekstra: '0' }}"  data-id="{{$s->id}}"><i class="fa fa-chevron-right"></i> {{$loop->iteration.'. '.$s->nama}}</a></li>               
                    @endforeach()
                  </ul>
                </div>
           </div> 

           <div class="col-sm-6">
                <div class="card" style="width: 100%;">
                  <div class="card-header bg-primary text-light" id="header">
                    Input Nilai Ekstra
                  </div>                  
                  <div class="card-body">                              
                    <form id="myform" action="{{url('dashboard/nilai_ekstra/store').'/'.$kelas[0]->id}}" method="post">
                      @csrf
                      <input type="hidden" name="siswa" id="siswa">
                      <input type="hidden" name="tahun" value="{{ isset($_GET['smt']) ? $_GET['smt'] :''}}">                                                                        
                      <div class="row input-ekstra mb-1">  
                          <div class="col-sm-12 text-right my-1">
                            <button type="button" class="btn-delete btn-sm btn btn-danger"><span class="fa fa-window-close"></span></button>   
                            <button type="button" class="btn-add btn-sm btn btn-warning"><span class="fa fa-pen"></span></button>     
                          </div>                                                                                       
                          <div class="col-sm-6">                
                            <div class="form-group">
                              <label class="form-label">List Ekstra</label>
                                <select name="ekstra[]" class="form-control list_ekstra">
                                  @foreach($ekstra as $k)
                                  <option value="{{$k->id}}">{{$k->nama}}</option>
                                  @endforeach
                                  @if($ekstra->count() == 0)
                                  <option value="" selected disabled>Belum Ada Ekstra</option>
                                  @endif
                                </select>
                            </div> 
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label class="form-label">Nilai ekstra</label>
                                <select name="nilai[]" class="form-control list_nilai">
                                  <option value="A">A</option>
                                  <option value="B">B</option>
                                  <option value="C">C</option>
                                </select>
                            </div>                           
                          </div>                                                                                                                         
                      </div>                                        
                     <input type="submit" id="submit" class="btn btn-success mt-2 p-1"></input>
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
        $('form select')[0].focus();
        $('#header').text("Input Nilai Ekstra "+$(this).text())
        $(this).data('nilai')
        $('#siswa').val($(this).data('id'))
        if($(this).data('nilai') != 0){
         
          $(this).data('nilai').forEach(function (element, i) {
           
            var ele = $('.input-ekstra').first().clone(true);   
            if(i == 0){
              $('.input-ekstra').first().remove();   
            }                
            $('#submit').before(ele);
            $('.input-ekstra .list_ekstra').last().val(element.id_extra)
            $('.input-ekstra .list_nilai').last().val(element.nilai)           
          });         
        }else{    
          var ele = $('.input-ekstra').first().clone(true); 
          $('.input-ekstra').remove()  
          $('#submit').before(ele);
          $('#myform').trigger("reset");
        }
        
  })
  $('.btn-delete').click(function(e){
    if($('.input-ekstra').length > 1){
      console.log('clik')     
      $(this).closest('.input-ekstra').remove();
    }
  })
  $('.btn-add').click(function(e){
    if($('.input-ekstra').length < 3){
      console.log('clik')
      var ele = $(this).closest('.input-ekstra').clone(true);
      $(this).closest('.input-ekstra').after(ele);
    }
  })
  $('form input[type="submit"]').prop("disabled", true); 
});
</script>

@endsection
