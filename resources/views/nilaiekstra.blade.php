@extends('layouts.appdashboard') @section('title', 'Nilai Umum || Cordova')
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
        <h4 class="header-title">Nilai Umum</h4>
        <p class="sub-header">Tempat Mengelola data terkait Nilai Umum</p>
        <div class="row mt-3">
            <div class="col-sm-12">
            @if (\Session::has('success'))
                <div class="alert alert-success">                   
                    {!! \Session::get('success') !!}               
                </div>
            @endif
               
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
