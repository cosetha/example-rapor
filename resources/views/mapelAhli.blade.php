@extends('layouts.appdashboard') @section('title', 'Mata Pelajaran Kejuruan || Cordova')
@section('content')

<div class="card">
    <div class="card-body">
        <h4 class="header-title">Mata Pelajaran Kejuruan</h4>
        <p class="sub-header">Tempat Mengelola data terkait Mata Pelajaran Kejuruan</p>
        <div class="row">
            <div class="button-list">
                <button
                    type="button"
                    class="btn btn-success waves-effect waves-light"
                    data-bs-toggle="modal"
                    data-bs-target="#modal-mapel-kejuruan"
                >
                    <span class="btn-label"
                        ><i class="mdi mdi-book-plus-outline"></i></span
                    >Tambah Data
                </button>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table
                        id="table_id"
                        class="table table-bordered"
                        width="100%"
                        cellspacing="0"
                    >
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Bidang Keahlian</th>
                                <th>Sub</th>
                                <th>Nama Mapel</th>
                                <th>Tingkatp</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody> 
                                                      
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div
    id="modal-mapel-kejuruan"
    class="modal fade"
    tabindex="-1"
    role="dialog"
    aria-labelledby="standard-modalLabel"
    aria-hidden="true"
    data-bs-backdrop="static"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-tambah">
                  Tambah Data
                </h4>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <form action="" method="post" action="{{ url('') }}/dashboard/mapel-kejuruan/store" id="form-tambah">
                            @csrf
                            <div class="form-group my-1 ">
                                <label for="nama">Nama Mata Pelajaran Keahlian:</label>
                                <input type="text" class="form-control" id="nama-tambah" placeholder="Masukan Nama Mapel" name="nama-tambah" required value = "{{ old('nama') }}">                                        
                            </div>   
                            
                            <div class="form-group">
                                <label for="tigkat">Tingkat :</label>
                                <select class="form-control" id="tingkat" name="tingkat">    
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>

                            <div class="form-group my-1">
                                <label for="sub">Sub Mapel Kelompok C keahlian</label>
                                <select name="sub" id="sub" class="form-select sub" required>
                                    <option value="" disabled selected>-- Pilih Kelompok Mapel --</option>
                                    <option value="C1"> Dasar Bidang Keahlian </option>
                                    <option value="C2"> Dasar Program Keahlian </option>
                                    <option value="C3"> Kompetensi Keahlian </option>
                                   
                                </select>
                            </div>
                            <div class="form-group my-1">
                                <label for="bidang">Bidang Kompetensi Keahlian</label>
                                @if($bidang->isEmpty())
                                    <a id="bidang" class="text-decoration-none" href="{{ url('/')}}/dashboard/kompetensi"> Belum ada data, Klik untuk isi</a>                               
                                @else
                                <select name="bidang" id="bidang" class="form-select" required> 
                                    <option value="" disabled selected>-- Pilih Kompetensi Keahlian --</option>                         
                                    @foreach($bidang as $b)
                                    <option value="{{$b->id}}">{{$b->nama_bidang}}</option>
                                    @endforeach                                  
                                </select>
                                @endif    
                            </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-light"
                    data-bs-dismiss="modal"
                >
                    Close
                </button>
                <button type="submit" class="btn btn-primary">
                    Save changes
                </button>
                        </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
</div>
<!-- /.modal -->

<div
    id="modal-mapel-kejuruan-edit"
    class="modal fade"
    tabindex="-1"
    role="dialog"
    aria-labelledby="standard-modalLabel"
    aria-hidden="true"
    data-bs-backdrop="static"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="judul-edit">
                  Edit Data
                </h4>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                    <form action="" method="post" action="" id="form-edit">
                        <input type="hidden" name="edit-id" value="">
                            @csrf
                            <div class="form-group ">
                                <label for="nama">Nama Mata Pelajaran Keahlian:</label>
                                <input type="text" class="form-control" id="nama-edit" placeholder="Masukan Nama Mapel" name="nama-edit" required value = "{{ old('nama') }}">                                        
                            </div>

                            <div class="form-group">
                                <label for="tigkat">Tingkat :</label>
                                <select class="form-control" id="tingkat-edit" name="tingkat">    
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>

                            <div class="form-group my-1">
                                <label for="sub-edit">Sub Mapel Kelompok C keahlian</label>
                                <select name="sub-edit" id="sub-edit" class="form-select sub" required>
                                    <option value="C1"> Dasar Bidang Keahlian </option>
                                    <option value="C2"> Dasar Program Keahlian </option>
                                    <option value="C3"> Kompetensi Keahlian </option>
                                    <option value="" selected disabled> Not Available</option>
                                </select>
                            </div>
                            <div class="form-group my-1">
                                <label for="bidang-edit">Bidang Kompetensi Keahlian</label>
                                @if($bidang->isEmpty())
                                    <a id="bidang-edit" class="text-decoration-none" href="{{ url('/')}}/dashboard/kompetensi"> Belum ada data, Klik untuk isi</a>                               
                                @else
                                <select name="bidang-edit" id="bidang-edit" class="form-select" required> 
                                    <option value="" disabled selected>-- Pilih Kompetensi Keahlian --</option>                         
                                    @foreach($bidang as $b)
                                    <option value="{{$b->id}}">{{$b->nama_bidang}}</option>
                                    @endforeach                                  
                                </select>
                                @endif                                
                            </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
</div>
<!-- /.modal -->
@endsection @section('js')
<script>
$(document).ready(function () {

    var table = $('#table_id').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: '/dashboard/mapel-kejuruan/show',
                        type: 'get'
                    },
                    columns: [
                        {
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            searchable: false,
                            className: 'align-middle text-center'
                        },
                        {
                            data: "kom_keahlian",
                            className: 'align-middle text-center',
                            render: function (data, type, row) {
                                //return data.length;
                                var txt = "";
                                data.forEach(function (item) {
                                    if (txt.length > 0) {
                                        txt += ", ";
                                    }
                                    txt += item.nama_bidang;
                                });
                                return txt;
                            },
                        },
                        {
                            data:'sub',
                            className: 'align-middle text-center',
                            render: function (data, type, row) {
                                if(data == "C1"){
                                    return 'Dasar Bidang Keahlian'
                                }else if( data == 'C2'){
                                    return 'Dasar Program Keahlian'
                                }else if(data == 'C3'){
                                    return 'Kompetensi Keahlian'
                                }else{
                                    return 'Not Available'
                                }
                               
                            },
                        },
                        {
                            data: 'nama',
                            name: 'nama',
                            className: 'align-middle text-center'
                        },
                        {
                            data: 'tingkat',
                            name: 'tingkat',
                            className: 'align-middle text-center'
                        },
                        {
                            data: 'aksi',
                            name: 'aksi',
                            searchable: false,
                            orderable: false,
                            className: 'align-middle text-center'
                        }
                    ]
	});

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('body').on('submit', '#form-tambah', function(e) {
            e.preventDefault();
            var formData = new FormData();
            formData.append('nama', $('input[name=nama-tambah]').val());
            formData.append('bidang', $('#bidang').val());
            formData.append('bidang', $('#tingkat').val());
            formData.append('sub', $('#sub').val());
            formData.append('tingkat', $('#tingkat').val());
            if(!$('#bidang').val()){
                Swal.fire({
			    	icon: 'error',
			    	title: 'Ooopss...',
			    	text: 'Kelompok belum dipilih',
			    	timer: 1200,
			    	showConfirmButton: false
			    });
            }else{
                $.ajax({
				type: 'post',
				url: '/dashboard/mapel-kejuruan/store',
				data: formData,
				processData: false,
				contentType: false,
				success: function(response) {
					if (response.hasOwnProperty('error')) {
						Swal.fire({
							icon: 'error',
							title: 'Ooopss...',
							text: response.error,
							timer: 1200,
							showConfirmButton: false
						});
					} else {
						$('#modal-mapel-kejuruan').modal('hide');
                        $('#form-tambah').trigger('reset');
                       
						Swal.fire({
							icon: 'success',
							title: 'Sukses',
							text: 'Berhasil Menambahkan Mata Pelajaran Keahlian',
							timer: 1200,
							showConfirmButton: false
						});
					}
				},
				error: function(err) {
					console.log(err);
				}
			});
            table.ajax.reload();
            }
            
    });
    $('body').on('click', '.btn-edit', function(e) {
            var id = $(this).attr('data-id');
            e.preventDefault()
            $.ajax({
            url: '/dashboard/mapel-kejuruan/edit/'+id,
            type: 'GET',
            success: function(res) {
                $('#modal-mapel-kejuruan-edit').modal('show');
                $('input[name=edit-id]').val(id);
                $('#bidang-edit').val(res.values.id_bidang)
                $('#sub-edit').val(res.values.sub)
                $('#nama-edit').val(res.values.nama);
                $('#tingkat-edit').val(res.values.tingkat);
                
                console.log(res.values)
                }
            });
		
    })
    $('body').on('submit', '#form-edit', function(e) {
            e.preventDefault();
            var id = $('input[name=edit-id]').val();
            var formData = new FormData();
            formData.append('nama',  $('#nama-edit').val());    
            formData.append('bidang', $('#bidang-edit').val());
            formData.append('sub', $('#sub-edit').val());      
            formData.append('tingkat', $('#tingkat-edit').val());      
            $.ajax({
				type: 'post',
				url: '/dashboard/mapel-kejuruan/update/'+id,
				data: formData,
				processData: false,
				contentType: false,
				success: function(response) {
					if (response.hasOwnProperty('error')) {
						Swal.fire({
							icon: 'error',
							title: 'Ooopss...',
							text: response.error,
							timer: 1200,
							showConfirmButton: false
						});
					} else {
						$('#modal-mapel-kejuruan-edit').modal('hide');
                        $('#form-edit').trigger('reset');
						Swal.fire({
							icon: 'success',
							title: 'Sukses',
							text: 'Berhasil Mengedit Mata Pelajaran Keahlian',
							timer: 1200,
							showConfirmButton: false
						});
					}
				},
				error: function(err) {
					console.log(err);
				}
            })
            table.ajax.reload();
    })
    $('body').on('click', '.btn-delete', function(e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            var nama = $(this).attr('data-nama');
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
                    $.ajax({
                        type: 'get',
                        url: '/dashboard/mapel-kejuruan/destroy/' + id,
                        success: function(response) {
                            Swal.fire('Deleted!', nama + ' telah dihapus.', 'success');
                            table.ajax.reload();
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    });
                }
            });
            table.ajax.reload();
    })

    });
</script>

@endsection
