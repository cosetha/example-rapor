@extends('layouts.appdashboard') @section('title', 'Nilai Ahli || Cordova')
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
        <h4 class="header-title">Nilai Ahli</h4>
        <p class="sub-header">Tempat Mengelola data terkait Nilai Ahli</p>
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
                                <th class="col-4">Nilai Pengetahuan</th>
                                <th class="col-1">NIlai Keterampilan</th>
                                <th class="col-1">Aksi</th>
                            </tr>
                        </thead>
                        <tbody> 
                        <form action="{{url('dashboard/nilai_ahli/store').'/'.$guru->id}}" method="POST">
                        @csrf
                        <input type="hidden" name="tahun" value="{{ isset($_GET['smt']) ? $_GET['smt'] :''}}">
                        @foreach($kelas as $t)
                            @foreach($t->siswa as $k)
                            @php
                            $nilai = explode(',',$k->nilai);                           
                            @endphp
                            
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$k->nama}}</td>
                                <input type="hidden" name="siswa[]" value="{{$k->id}}">
                                <td>
                                    <div class="row">
                                        <div class="col">
                                            NH1: <input type="number" name="nh1[]" class="form-control calculate input-sm" onkeyup="if(parseInt(this.value)>100){ this.value =100; return false; }" min="0" max="100" value="{{$nilai[0]}}" required>
                                        </div>
                                        <div class="col">
                                            NH2:
                                            <input type="number" name="nh2[]" class="form-control calculate input-sm" onkeyup="if(parseInt(this.value)>100){ this.value =100; return false; }" min="0" max="100" value="{{$nilai[1]}}" required>
                                        </div>
                                        <div class="col">
                                            NH3:<input type="number" name="nh3[]" class="form-control calculate input-sm" onkeyup="if(parseInt(this.value)>100){ this.value =100; return false; }" min="0" max="100" value="{{$nilai[2]}}" required>
                                        </div>
                                        <div class="col">
                                            NH4:<input type="number" name="nh4[]" class="form-control calculate input-sm" onkeyup="if(parseInt(this.value)>100){ this.value =100; return false; }" min="0" max="100" value="{{$nilai[3]}}" required>
                                        </div>
                                        <div class="col">
                                        UTS:<input type="number" name="uts[]" class="form-control calculatemore input-sm" onkeyup="if(parseInt(this.value)>100){ this.value =100; return false; }" min="0" max="100" value="{{$nilai[4]}}" required>
                                        </div>
                                        <div class="col">
                                        UAS <input type="number" name="uas[]" class="form-control calculatemore input-sm" onkeyup="if(parseInt(this.value)>100){ this.value =100; return false; }" min="0" max="100" value="{{$nilai[5]}}" required>
                                        </div>
                                    </div>                                                                                   
                                </td>
                                <td>
                                    Nilai <input type="number" name="nk[]" class="form-control input-sm" onkeyup="if(parseInt(this.value)>100){ this.value =100; return false; }" min="0"  max="100" value="{{$nilai[6]}}" required>
                                </td>
                                <td>
                                    <div style="display:inline;"> <button class="btn btn-success jumlah w-100">Jumlah</button>
                                    <input type="number" name="total[]" class="mt-1 form-control total input-sm" min="0" max="100" value="{{$nilai[7]}}" readonly>                                  
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

    function calculateSum(){
        $('tr').each(function () {
        //the value of sum needs to be reset for each row, so it has to be set inside the row loop
        var sum = 0
        //find the combat elements in the current row and sum it 
        $(this).find('.calculate').each(function () {
            var value = $(this).val();
            
            if (!isNaN(value) && value.length !== 0) {
                sum += parseFloat(value);
            }
        });

        var sum1 = 0
        //find the combat elements in the current row and sum it 
        $(this).find('.calculatemore').each(function () {
            var value = $(this).val();
            
            if (!isNaN(value) && value.length !== 0) {
                sum1 += parseFloat(value);
            }
        });
        let total = ((sum/4)+sum1)/3
        
        //set the value of currents rows sum to the total-combat element in the current row
       
        $('.total', this).val(total.toFixed(0));
    });
    }
    

    calculateSum();

    $(".calculate").on("keydown keyup", function(e) {
        calculateSum();
    });

    $(".calculatemore").on("keydown keyup", function(e) {
        calculateSum();
    });
});
</script>

@endsection
