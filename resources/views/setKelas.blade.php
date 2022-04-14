@extends('layouts.appdashboard') @section('title', 'Set Kelas || Cordova')
@section('content')

<div class="card">
    <div class="card-body">
        <h4 class="header-title ">Set Kelas</h4>
        <p class="sub-header">Tempat Mengelola data terkait Set Kelas</p>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="row mb-5">
            <div class="col">
                <form action="{{url('/dashboard/set_kelas/add_siswa')}}" method="POST">
                    @csrf
                    <label for="kelas" class="form-label"> Pilih Kelas</label>
                    @if($bidang->isEmpty())
                    <a id="kelas" class="text-decoration-none" href="{{ url('/')}}/dashboard/kelas"> Belum ada data, Klik untuk isi</a>                               
                    @else
                    <select class="form-control" id="kelas" name="kelas" style="width: 350px" required>
                    <option disabled selected value="">-- Pilih  Kelas --</option>                                     
                        @foreach($bidang as $b)
                        <option value="{{$b->id}}" data-bidang="{{$b->id_keahlian}}">{{$b->nama_kelas.' - '.$b->tahun.' - '.'Keahlian '.$b->keahlian[0]->nama_bidang}}</option>
                        @endforeach                                  
                    </select>
                    @endif
                    <div class="row">
                        <div class="col-md-4 mt-2"> 
                            <label for="siswa_temp" class="form-label mt-2">Pilih Siswa</label>                          
                            <select name="siswa_temp" id="siswa_temp" class="form-select" multiple size="20">

                            </select>
                        </div>
                        <div class="col-md-2 text-center align-self-center">
                            <div class="btn-group-vertical">
                                <button type="button" id="add" class="btn btn-success"> Add </button>
                                <button type="button" id="remove" class="btn btn-danger d-block my-2 "> Remove </button>
                            </div>
                        </div>
                        <div class="col-md-4 mt-2" >
                            <label for="siswa_perm" class="form-label mt-2">Siswa Terpilih</label>                          
                            <select name="siswa_perm" id="siswa_perm" class="form-select" multiple size="20">
                            </select>
                        </div>
                    </div>

                    <button type="submit" id="button_add" class="btn btn-primary mt-5">Simpan</button>
                </form>
            </div>           
        </div>

        <div class="row mt-5">
            @foreach($kelas as $k)
            <div class="col-md-3 ">
                <div class="card text-white h-100 mb-3" >
                    <div class="card-header bg-primary">Kelas: {{$k->nama_kelas}} {{$k->tahun}} </div>
                    <div class="card-body">
                    @if(count($k->siswa) >0)                
                    <table class="text-dark table-responsive table">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Nama</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($k->siswa as $s)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$s->nipdn.'-'.$s->nama}}</td>
                                <td><a href="#" class="btn btn-danger btn-delete btn-xs" data-id="{{$s->id}}" data-nama="{{$s->nama}}" data-idk="{{$k->id}}" ><i class=" fas fa-window-close"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <p class="card-text text-dark">No Data</p>
                    @endif
                    </div>
                    <div class="card-footer">
                        <p class="text-muted">{{$k->keahlian[0]->nama_bidang}}</p>
                    </div>
                </div>
            </div>
           
            @endforeach
        </div>
    </div>
</div>
@endsection @section('js')
<script>
$(document).ready(function () {
    $('#add').click(function() {  
        return !$('#siswa_temp option:selected').remove().appendTo('#siswa_perm');  
    });  
    $('#remove').click(function() {  
        return !$('#siswa_perm option:selected').remove().appendTo('#siswa_temp');  
    });  
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $('#kelas').on('change', function () {
        var formData = new FormData()
        formData.append('id', $('#kelas :selected').data('bidang')); 
        formData.append('kelas', $('#kelas').val()); 
            $.ajax({
				type: 'post',
				url: '/dashboard/set_kelas/get_siswa',
				data: formData,
				processData: false,
				contentType: false,
				success: function(response) {
					$('#siswa_temp').empty();

                    console.log(response.length)
                    for (const element of response) {
                        let tanggal = new Date(element.tanggal_masuk)
                        $('#siswa_temp').append(new Option(element.nama+' Tahun '+ tanggal.getFullYear(), element.id))
                    }
                      
                   
				},
				error: function(err) {
					console.log(err);
				}
			});    
            
            $.ajax({
				type: 'post',
				url: '/dashboard/set_kelas/get_siswa_perm',
				data: formData,
				processData: false,
				contentType: false,
				success: function(response) {
					$('#siswa_perm').empty();

                    for (const element of response) {
                        let tanggal = new Date(element.tanggal_masuk)
                        $('#siswa_perm').append(new Option(element.nama+' Tahun '+ tanggal.getFullYear(), element.id))
                    }
                      
                   
				},
				error: function(err) {
					console.log(err);
				}
			});     
    });


    function getKelas() {
        $.ajax({
            url: '/dashboard/set_kelas/get_kelas/',
            type: 'GET',
            success: function(res) {                
                console.log(res.values)
                }
            });   
    }

    function getSiswa() {
        $.ajax({
            url: '/dashboard/set_kelas/get_siswa/',
            type: 'GET',
            success: function(res) {                
                console.log(res.values)
                }
            });   
    }
    $('#button_add').click(function(e){
        e.preventDefault()
        addSiswa()
    })
    function addSiswa() {
        var options = $('#siswa_perm option');
        var values = $.map(options ,function(option) {
            return option.value;
        });
       
        let formData = new FormData();
        for (var i = 0; i < values.length; i++) {
            formData.append('siswa[]', values[i]);
        }
        formData.append('kelas', $('#kelas').val()); 
        console.log(...formData)
        $.ajax({
            type: 'post',
			url: '/dashboard/set_kelas/add_siswa',
			data: formData,
			processData: false,
			contentType: false,
            success: function(res) {                
                    Swal.fire({
						icon: 'success',
						title: 'Sukses',
						text: 'Berhasil Menambahkan Siswa',
						timer: 1200,
						showConfirmButton: false
					});
                    setTimeout(location.reload.bind(location), 1800);
                }
            });   
    }

    function removeSiswa() {
        $.ajax({
            url: '/dashboard/set_kelas/get_siswa/',
            type: 'GET',
            success: function(res) {                
                console.log(res.values)
                
                }
            });   
    }
    $('.btn-delete').click(function(e){
        e.preventDefault()
        let id = $(this).data('id')
        let idk = $(this).data('idk')
        let nama = $(this).data('nama')
        Swal.fire({
                title: 'Hapus ' + nama + ' ?',
                text: 'Anda tidak dapat mengurungkan aksi ini!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.value) {
                    $(this).closest('tr').remove()
                    $.ajax({
                        type: 'get',
                        url: '/dashboard/set_kelas/remove/'+id,
                        success: function(response) {
                            Swal.fire('Deleted!', nama + ' telah dihapus.', 'success');
                            setTimeout(location.reload.bind(location), 1500);
                            console.log(response);
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    });
                }
            });
        
    })

});
</script>

@endsection
