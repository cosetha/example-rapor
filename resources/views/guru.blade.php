@extends('layouts.appdashboard') @section('title', 'Guru || Cordova')
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
        <h4 class="header-title">Guru</h4>
        <p class="sub-header">Tempat Mengelola data terkait Guru</p>
        <div class="row">
            <div class="button-list">
                <button
                    type="button"
                    class="btn btn-success waves-effect waves-light"
                    data-bs-toggle="modal"
                    data-bs-target="#modal-guru"
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
                                <th>Nama</th>
                                <th>NIP</th>
                                <th>BK</th>
                                <th>Username</th>                              
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
    id="modal-guru"
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
                        <form action="" method="post" action="{{ url('') }}/dashboard/guru/store" id="form-tambah">
                            @csrf
                            <div class="form-group ">
                                <label for="nama-tambah" class="form-label">Nama Guru:</label>
                                <input type="text" class="form-control" id="nama-tambah" placeholder="Masukan Nama Guru" name="nama-tambah" required value = "{{ old('nama') }}" onkeydown="return /[a-z, ]/i.test(event.key)"
    onblur="if (this.value == '') {this.value = '';}"
    onfocus="if (this.value == '') {this.value = '';}">                                        
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group ">
                                        <label for="nip-tambah" class="form-label">NIP:</label>
                                        <input type="number" class="form-control" id="nip-tambah" placeholder="Masukan NIP Guru" name="nip-tambah" required value = "{{ old('nip') }}">                                        
                                    </div>
                                </div>
                               <div class="col">
                                <div class="form-group ">
                                        <label for="bk-tambah" class="form-label">Guru BK:</label>
                                        <select name="" id="bk-tambah" class="form-control" required>
                                            <option value="Y">Ya</option>
                                            <option value="N">Bukan</option>
                                        </select>
                                    </div>
                               </div>
                               
                            </div>
                            <div class="row">
                                <h4 class="mt-2"> Login Pengguna</h4>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="username -tambah" class="form-label">Username Login:</label>
                                        <input type="text" class="form-control" id="username-tambah" placeholder="Masukan Username Guru" name="username-tambah" required value = "{{ old('username') }}">                           
                                    </div>
                                </div>
                                
                                
                                <div class="mb-1">
                                    <label for="password" class="form-label">Password Login</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" class="form-control" placeholder="Enter your password" required>
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                </div>       
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
    id="modal-guru-edit"
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
                                <label class="form-label" for="nama-edit">Nama Guru:</label>
                                <input type="text" class="form-control" id="nama-edit" placeholder="Masukan Nama Guru" name="nama-tambah" required value = "{{ old('nama') }}" onkeydown="return /[a-z, ]/i.test(event.key)"
    onblur="if (this.value == '') {this.value = '';}"
    onfocus="if (this.value == '') {this.value = '';}">                                        
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group ">
                                        <label class="form-label" for="nip-edit">NIP:</label>
                                        <input type="number" class="form-control" id="nip-edit" placeholder="Masukan NIP Guru" name="nip-tambah" required value = "{{ old('nip') }}">                                        
                                    </div>
                                </div>
                               <div class="col">
                                <div class="form-group ">
                                        <label class="form-label" for="bk-edit">Guru BK:</label>
                                        <select name="" id="bk-edit" class="form-control" required>
                                            <option value="Y">Ya</option>
                                            <option value="N">Bukan</option>
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
                        url: '/dashboard/guru/show',
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
                            data: 'nama',
                            name: 'nama',
                            className: 'align-middle text-center'
                        },
                        {
                            data: 'nip',
                            name: 'nip',
                            className: 'align-middle text-center'
                        },
                        {
                            data: "is_bk",
                            className: 'align-middle text-center',
                            render: function (data, type, row) {                                                              
                                if(data == 'Y'){
                                   return "Guru BK"
                                }else{
                                    return "Bukan Guru BK"
                                }
                            },
                        },
                        {
                            data: "guru",
                            className: 'align-middle text-center',
                            render: function (data, type, row) {                                                              
                                return data.username
                            },
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
            formData.append('is_bk', $('#bk-tambah').val());
            formData.append('nip', $('#nip-tambah').val());
            formData.append('username', $('#username-tambah').val());
            formData.append('password', $('#password').val());
            $.ajax({
				type: 'post',
				url: '/dashboard/guru/store',
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
						$('#modal-guru').modal('hide');
                        $('#form-tambah').trigger('reset');
                       
						Swal.fire({
							icon: 'success',
							title: 'Sukses',
							text: 'Berhasil Menambahkan Guru',
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
            url: '/dashboard/guru/edit/'+id,
            type: 'GET',
            success: function(res) {
                $('#modal-guru-edit').modal('show');
                $('input[name=edit-id]').val(id);
                $('#nama-edit').val(res.values.nama);
                $('#bk-edit').val(res.values.is_bk);
                $('#nip-edit').val(res.values.nip);
                console.log(res.values)
                }
            });
		
    })
    $('body').on('submit', '#form-edit', function(e) {
            e.preventDefault();
            var id = $('input[name=edit-id]').val();
            var formData = new FormData();
            formData.append('nama',  $('#nama-edit').val());          
            formData.append('is_bk', $('#bk-edit').val());
            formData.append('nip', $('#nip-edit').val());          
            $.ajax({
				type: 'post',
				url: '/dashboard/guru/update/'+id,
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
						$('#modal-guru-edit').modal('hide');
                        $('#form-edit').trigger('reset');
						Swal.fire({
							icon: 'success',
							title: 'Sukses',
							text: 'Berhasil Mengedit Guru',
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
                        url: '/dashboard/guru/destroy/' + id,
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
