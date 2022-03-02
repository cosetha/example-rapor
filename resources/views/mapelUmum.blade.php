@extends('layouts.appdashboard') @section('title', 'Mata Pelajaran || Cordova')
@section('content')

<div class="card">
    <div class="card-body">
        <h4 class="header-title">Mata Pelajaran</h4>
        <p class="sub-header">Tempat Mengelola data terkait Mata Pelajaran</p>
        <div class="row">
            <div class="button-list">
                <button
                    type="button"
                    class="btn btn-success waves-effect waves-light"
                    data-bs-toggle="modal"
                    data-bs-target="#modal-mapel"
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
                                <th>Kelompok</th>
                                <th>Sub</th>
                                <th>Nama Mapel</th>
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
    id="modal-mapel"
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
                        <form action="" method="post" action="{{ url('') }}/dashboard/mapel/store" id="form-tambah">
                            @csrf
                            <div class="form-group my-1 ">
                                <label for="nama">Nama Mata Pelajaran:</label>
                                <input type="text" class="form-control" id="nama-tambah" placeholder="Masukan Nama Mapel" name="nama-tambah" required value = "{{ old('nama') }}">                                        
                            </div>
                            <div class="form-group my-1">
                                <label for="kelompok">Kelompok Mapel</label>
                                <select name="kelompok" id="kelompok" class="form-select kelompok" >
                                    <option value="" disabled selected>-- Pilih Kelompok Mapel --</option>
                                    <option value="A"> A </option>
                                    <option value="B"> B </option>
                                </select>
                            </div>
                            <div class="form-group my-1">
                                <label for="sub">Sub Mapel</label>
                                <select name="sub" id="sub" class="form-select sub" disabled>
                                    <option value="MUNAS"> Muatan Nasional </option>
                                    <option value="MUKEL"> Muatan Kewilayahan </option>
                                    <option value="NA" selected> Not Available</option>
                                </select>
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
    id="modal-mapel-edit"
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
                                <label for="nama">Nama Mata Pelajaran:</label>
                                <input type="text" class="form-control" id="nama-edit" placeholder="Masukan Nama Mapel" name="nama-edit" required value = "{{ old('nama') }}">                                        
                            </div>
                            <div class="form-group my-1">
                                <label for="kelompok-edit">Kelompok Mapel</label>
                                <select name="kelompok-edit" id="kelompok-edit" class="form-select kelompok" >
                                    <option value="" disabled selected>-- Pilih Kelompok Mapel --</option>
                                    <option value="A"> A </option>
                                    <option value="B"> B </option>
                                </select>
                            </div>
                            <div class="form-group my-1">
                                <label for="sub-edit">Sub Mapel</label>
                                <select name="sub-edit" id="sub-edit" class="form-select sub" disabled>
                                    <option value="MUNAS"> Muatan Nasional </option>
                                    <option value="MUKEL"> Muatan Kewilayahan </option>
                                    <option value="NA" selected> Not Available</option>
                                </select>
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
    $('.kelompok').change(function(){
        let val = $(this).val();
        if(val =='A'){
            $('.sub').val('MUNAS')
        }else if(val == 'B'){
            $('.sub').val('MUKEL')
        }else{
            $('.sub').val('NA')
        }
    })


    var table = $('#table_id').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: '/dashboard/mapel/show',
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
                            data: 'kelompok',
                            name: 'kelompok',
                            className: 'align-middle text-center'
                        },
                        {
                            data:'sub',
                            className: 'align-middle text-center',
                            render: function (data, type, row) {
                                if(data == "MUNAS"){
                                    return 'Muatan Nasional'
                                }else if( data == 'MUKEL'){
                                    return 'Muatan Kewilayahan'
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
            formData.append('kelompok', $('#kelompok').val());
            formData.append('sub', $('#sub').val());
            if(!$('#kelompok').val()){
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
				url: '/dashboard/mapel/store',
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
						$('#modal-mapel').modal('hide');
                        $('#form-tambah').trigger('reset');
                       
						Swal.fire({
							icon: 'success',
							title: 'Sukses',
							text: 'Berhasil Menambahkan Mata Pelajaran',
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
            url: '/dashboard/mapel/edit/'+id,
            type: 'GET',
            success: function(res) {
                $('#modal-mapel-edit').modal('show');
                $('input[name=edit-id]').val(id);
                $('#kelompok-edit').val(res.values.kelompok)
                $('#sub-edit').val(res.values.sub)
                $('#nama-edit').val(res.values.nama);
                console.log(res.values)
                }
            });
		
    })
    $('body').on('submit', '#form-edit', function(e) {
            e.preventDefault();
            var id = $('input[name=edit-id]').val();
            var formData = new FormData();
            formData.append('nama',  $('#nama-edit').val());    
            formData.append('kelompok', $('#kelompok-edit').val());
            formData.append('sub', $('#sub-edit').val());      
            $.ajax({
				type: 'post',
				url: '/dashboard/mapel/update/'+id,
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
						$('#modal-mapel-edit').modal('hide');
                        $('#form-edit').trigger('reset');
						Swal.fire({
							icon: 'success',
							title: 'Sukses',
							text: 'Berhasil Mengedit Mata Pelajaran',
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
                        url: '/dashboard/mapel/destroy/' + id,
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
