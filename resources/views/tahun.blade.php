@extends('layouts.appdashboard') @section('title', 'Tahun || Cordova')

@section('css')
<style>
    .datepicker{
        z-index: 1600;
        cursor: pointer;
    }
</style>
@endsection
@section('content')

<div class="card">
    <div class="card-body">
        <h4 class="header-title">Tahun</h4>
        <p class="sub-header">Tempat Mengelola data terkait Tahun</p>
        <div class="row">
            <div class="button-list">
                <button
                    type="button"
                    class="btn btn-success waves-effect waves-light"
                    data-bs-toggle="modal"
                    data-bs-target="#modal-tahun"
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
                                <th>Tahun</th>
                                <th>Semester</th>
                                <th>Status</th>
                                <th>Nama Kepala Sekolah</th>
                                <th>NIP Kepala Sekolah</th>
                                <th>Tanggal Rapor</th>
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
    id="modal-tahun"
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
                        <form action="" method="post" action="{{ url('') }}/dashboard/tahun/store" id="form-tambah">
                            @csrf                            
                            <div class="row mt-1">
                                <div class="col">
                                    <div class="form-group ">
                                        <label for="nama-tambah">Nama Kepala Sekolah :</label>
                                        <input type="text" class="form-control" id="nama-tambah" placeholder="Masukan Nama Kepala Sekolah" name="nama-tambah" required value = "">                                        
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group ">
                                        <label for="nip-tambah">NIP :</label>
                                        <input type="number" class="form-control" id="nip-tambah" placeholder="Masukan Nama Kepala Sekolah" name="nip-tambah" required value = "">                                        
                                    </div>  
                                </div>                              
                            </div>
                            <div class="form-group mt-1 ">
                                <label for="tahun-tambah">Tahun:</label>
                                <input type="text" class="form-control yearpicker"  readonly="readonly"  id="tahun-tambah" placeholder="Masukan tahun" name="tahun-tambah"  autocomplete="off" required value = "">                                        
                            </div>
                            <div class="row mt-1">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="semester-tambah">Semester :</label>
                                        <select class="form-select" id="semester-tambah" name="semester">                                   
                                            <option value="1">Ganjil</option>  
                                            <option value="2">Genap</option>                         
                                        </select>
                                    </div>                                   
                                </div>                                
                            </div>  
                            <div class="form-group mt-1 ">
                                <label for="tanggal-tambah">Tanggal rapor:</label>
                                <input type="text" class="form-control datepicker" id="tanggal-tambah" name="tanggal-tambah" required value = "" autocomplete="off">                                        
                            </div>                               
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">
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
    id="modal-tahun-edit"
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
                            <div class="row mt-1">
                                <div class="col">
                                    <div class="form-group ">
                                        <label for="nama-edit">Nama Kepala Sekolah :</label>
                                        <input type="text" class="form-control" id="nama-edit" placeholder="Masukan Nama Kepala Sekolah" name="nama-edit" required value = "">                                        
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group ">
                                        <label for="nip-edit">NIP :</label>
                                        <input type="number" class="form-control" id="nip-edit" placeholder="Masukan Nama Kepala Sekolah" name="nip-edit" required value = "">                                        
                                    </div>  
                                </div>
                            </div>
                            <div class="form-group mt-1 ">
                                <label for="tahun-edit">Tahun:</label>
                                <input type="text" class="form-control yearpicker" id="tahun-edit"  readonly="readonly"  name="tahun-edit" required value = "" autocomplete="off">                                        
                            </div>                           
                            <div class="row mt-1">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="semester-edit">Semester :</label>
                                        <select class="form-select" id="semester-edit" name="semester-edit">                                   
                                            <option value="1">Ganjil</option>  
                                            <option value="2">Genap</option>                         
                                        </select>
                                    </div>                                   
                                </div>                                
                            </div>
                            <div class="form-group mt-1 ">
                                <label for="tanggal-edit">Tanggal rapor:</label>
                                <input type="text" class="form-control datepicker" id="tanggal-edit" name="tanggal-edit" required value = "" autocomplete="off">                                        
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

    $('.datepicker').datepicker({
        format: 'dd-mm-yyyy',
        autoclose: true
    })
    

    $('.yearpicker').yearpicker();

   
   
    var table = $('#table_id').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: '/dashboard/tahun/show',
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
                            data: "tahun",
                            className: 'align-middle text-center',
                            render: function (data, type, row) {
                                //return data.length;
                                var txt = String(data).substring(0,4);                               
                                return txt;
                            },
                        },
                        {
                            data: "tahun",
                            className: 'align-middle text-center',
                            render: function (data, type, row) {
                                //return data.length;
                                var txt = String(data).substring(4,5);                              
                                if(txt == 1){
                                    return "Ganjil"
                                }else if(txt == 2){
                                    return "Genap"
                                }else{
                                    return "NA"
                                }                                                             
                            },
                        },
                        {
                            data: 'status',
                            render: function (data, type, row) {
                                //return data.length;                                                          
                                if(data == 'Y'){
                                    return "AKTIF"
                                }else if(data == 'N'){
                                    return "NON-AKTIF"
                                }else{
                                    return "NA"
                                }                                                             
                            },
                            className: 'align-middle text-center'
                        },
                        {
                            data: 'nama_kepsek',
                            name: 'nama_kepsek',
                            className: 'align-middle text-center'
                        },
                        {
                            data: 'nip_kepsek',
                            name: 'nip_kepsek',
                            className: 'align-middle text-center'
                        },
                        {
                            data: 'tanggal_rapor',
                            render: function (data, type, row) {
                                let tanggal = new Date(data)
                                return tanggal.getDate() +'/'+ (parseInt(tanggal.getMonth()) + 1) + '/' + tanggal.getFullYear()
                            },
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
            formData.append('tahun', $('#tahun-tambah').val() + $('#semester-tambah').val());
            formData.append('nama_kepsek', $('#nama-tambah').val());
            formData.append('nip_kepsek', $('#nip-tambah').val());
            formData.append('tanggal', $('#tanggal-tambah').val());
            $.ajax({
				type: 'post',
				url: '/dashboard/tahun/store',
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
						$('#modal-tahun').modal('hide');
                        $('#form-tambah').trigger('reset');
                       
						Swal.fire({
							icon: 'success',
							title: 'Sukses',
							text: 'Berhasil Menambahkan Tahun',
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
    });
    $('body').on('click', '.btn-edit', function(e) {
            var id = $(this).attr('data-id');
            e.preventDefault()
            $.ajax({
            url: '/dashboard/tahun/edit/'+id,
            type: 'GET',
            success: function(res) {
                $('#modal-tahun-edit').modal('show');
                $('input[name=edit-id]').val(id);
                $('#nama-edit').val(res.values.nama_kepsek);
                $("#nip-edit").val(res.values.nip_kepsek);
                let tanggal = new Date(res.values.tanggal_rapor)                
                $("#tanggal-edit").val(String(tanggal.getDate() +'-'+ (parseInt(tanggal.getMonth()) + 1) + '-' + tanggal.getFullYear()));
                $("#tahun-edit").val(String(res.values.tahun).substring(0,4));
                $("#semester-edit").val(String(res.values.tahun).substring(4,5));
                }
            });
		
    })

    $('body').on('click', '.btn-aktif', function(e) {
            var id = $(this).attr('data-id');
            e.preventDefault()
            $.ajax({
            url: '/dashboard/tahun/aktif/'+id,
            type: 'GET',
            success: function(res) {
                Swal.fire({
					icon: 'success',
					title: 'Sukses',
					text: 'Berhasil Mengaktifkan Tahun Ajaran',
					timer: 1200,
					showConfirmButton: false
				});
                table.ajax.reload();
            }
               
            });
		
    })

    $('body').on('submit', '#form-edit', function(e) {
            e.preventDefault();
            var id = $('input[name=edit-id]').val();
            var formData = new FormData();
            formData.append('tahun', $('#tahun-edit').val() + $('#semester-edit').val());
            formData.append('nama_kepsek', $('#nama-edit').val());
            formData.append('nip_kepsek', $('#nip-edit').val());
            formData.append('tanggal', $('#tanggal-edit').val());
            $.ajax({
				type: 'post',
				url: '/dashboard/tahun/update/'+id,
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
						$('#modal-tahun-edit').modal('hide');
                        $('#form-edit').trigger('reset');
						Swal.fire({
							icon: 'success',
							title: 'Sukses',
							text: 'Berhasil Mengedit Tahun',
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
                title: nama.substring(4,5) == 1?'Hapus ' +  nama.substring(0,4)+" Ganjil" :'Hapus ' +  nama.substring(0,4)+ " Genap" + ' ?',
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
                        url: '/dashboard/tahun/destroy/' + id,
                        success: function(response) {
                            Swal.fire('Deleted! ',  nama.substring(4,5) == 1? nama.substring(0,4)+" Ganjil" + ' telah dihapus.' : nama.substring(0,4)+ " Genap" + ' telah dihapus.', 'success');
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
