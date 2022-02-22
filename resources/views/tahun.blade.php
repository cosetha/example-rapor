@extends('layouts.appdashboard') @section('title', 'Tahun || Cordova')
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
                                <th>Nama Bidang</th>
                                <th>Nama Keahlian</th>
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
                            <div class="form-group ">
                                <label for="nama">Tahun:</label>
                                <input type="text" class="form-control" id="nama-tambah" placeholder="Masukan tahun" name="tahun-tambah" required value = "{{ old('nama') }}">                                        
                            </div>
                            <div class="row mt-1">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="semester">Semester :</label>
                                        <select class="form-select" id="semester" name="semester">                                   
                                            <option value="1">Ganjil</option>  
                                            <option value="2">Genap</option>                         
                                        </select>
                                    </div>                                   
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="status-tam">Status :</label>
                                        <select class="form-select" id="status-tam" name="status-tam">                                   
                                            <option value="Y">Aktif</option>  
                                            <option value="N">Non-Aktif</option>                         
                                        </select>
                                    </div>                                    
                                </div>
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
                            <div class="form-group ">
                                <label for="nama-edit">Tahun:</label>
                                <input type="text" class="form-control" id="tahun-edit" placeholder="Masukan tahun" name="tahun-edit" required value = "{{ old('nama') }}">                                        
                            </div>                           
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="semester">Semester :</label>
                                        <select class="form-select" id="semester-edit" name="semester-edit">                                   
                                            <option value="1">Ganjil</option>  
                                            <option value="2">Genap</option>                         
                                        </select>
                                    </div>                                   
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="status-edit">Status :</label>
                                        <select class="form-select" id="status-edit" name="status-edit">                                   
                                            <option value="Y">Aktif</option>  
                                            <option value="N">Non-Aktif</option>                         
                                        </select>
                                    </div>                                    
                                </div>
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
                            data: "bidang_studi",
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
                            data: 'nama_bidang',
                            name: 'nama_bidang',
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
                $('#nama-edit').val(res.values.nama_bidang);
                $("#bidang-edit").val(res.values.id_bidang);
                }
            });
		
    })
    $('body').on('submit', '#form-edit', function(e) {
            e.preventDefault();
            var id = $('input[name=edit-id]').val();
            var formData = new FormData();
            formData.append('nama', $('#nama-edit').val());
            formData.append('bidang', $('#bidang-edit').val());
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
                        url: '/dashboard/tahun/destroy/' + id,
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
