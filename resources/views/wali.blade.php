@extends('layouts.appdashboard') @section('title', 'Wali Murid || Cordova')
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
        <h4 class="header-title">Wali Murid</h4>
        <p class="sub-header">Tempat Mengelola data terkait Wali Murid</p>
        <div class="row">
            <div class="button-list">
                <button
                    type="button"
                    class="btn btn-success waves-effect waves-light"
                    data-bs-toggle="modal"
                    data-bs-target="#modal-wali"
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
                                <th>Nama Ayah</th>
                                <th>Nama Ibu</th>
                                <th>Alamat</th>
                                <th>No Telp</th>
                                <th>Username</th>
                                <th>Email</th>
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
    id="modal-wali"
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
                        <form action="" method="post" action="{{ url('') }}/dashboard/wali/store" id="form-tambah">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="nama_ayah" class="form-label">Nama Auah</label>
                                        <input type="text" name="nama_ayah" id="nama_ayah" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="nama_ibu" class="form-label">Nama Ibu</label>
                                        <input type="text" name="nama_ibu" id="nama_ibu" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <label for="siswa" class="form-label">Data Siswa</label>
                                @if($bidang->isEmpty())
                                <a id="siswa" class="text-decoration-none" href="{{ url('/')}}/dashboard/siswa"> Belum ada data, Klik untuk isi</a>                               
                                @else
                                <select class="form-control" id="siswa" name="siswa">                                   
                                    @foreach($bidang as $b)
                                    <option value="{{$b->id}}">{{$b->nisn.' - '.$b->nama}}</option>
                                    @endforeach                                  
                                </select>
                                @endif
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="tempat_lahir" class="form-label">Tempat Lahir Ayah</label>
                                        <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col">                                   
                                    <div class="form-group">
                                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir Ayah</label>
                                        <input type="text" name="tanggal_lahir" id="tanggal_lahir" class="form-control datepicker" readonly required>
                                    </div>                                    
                                </div>                                
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="alamat" class="form-label">Alamat Orang Tua</label>
                                        <input type="text" name="alamat" id="alamat" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="telepon" class="form-label">No Telp Orang Tua</label>
                                        <input type="number" name="telepon" id="telepon" class="form-control" required>
                                    </div>
                                </div>                                
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="pekerjaan_ayah" class="form-label">Pekerjaan Ayah</label>
                                        <input type="text" name="pekerjaan_ayah" id="pekerjaan_ayah" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col">                                   
                                    <div class="form-group">
                                        <label for="pekerjaan_ibu" class="form-label">Pekerjaan Ibu</label>
                                        <input type="text" name="pekerjaan_ibu" id="pekerjaan_ibu" class="form-control" required>
                                    </div>                                    
                                </div>                                
                            </div>

                            <div class="row">
                                <h4 class="mt-2"> Login Pengguna</h4>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="username -tambah" class="form-label">Username Login:</label>
                                        <input type="text" class="form-control" id="username-tambah" placeholder="Masukan Username Wali Murid" name="username-tambah" required value = "{{ old('username') }}">                           
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="email-tambah" class="form-label">Email Login:</label>
                                        <input type="email" class="form-control" id="email-tambah" placeholder="Masukan Email Wali Murid" name="email-tambah" required value = "{{ old('email') }}">                           
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
    id="modal-wali-edit"
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
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="nama_ayah-edit" class="form-label">Nama Auah</label>
                                        <input type="text" name="nama_ayah-edit" id="nama_ayah-edit" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="nama_ibu-edit" class="form-label">Nama Ibu</label>
                                        <input type="text" name="nama_ibu-edit" id="nama_ibu-edit" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <label for="siswa-edit" class="form-label">Data Siswa</label>
                                @if($bidang->isEmpty())
                                <a id="siswa-edit" class="text-decoration-none" href="{{ url('/')}}/dashboard/siswa"> Belum ada data, Klik untuk isi</a>                               
                                @else
                                <select class="form-control" id="siswa-edit" name="siswa-edit">                                   
                                    @foreach($bidang as $b)
                                    <option value="{{$b->id}}">{{$b->nisn.' - '.$b->nama}}</option>
                                    @endforeach                                  
                                </select>
                                @endif
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="tempat_lahir-edit" class="form-label">Tempat Lahir Ayah</label>
                                        <input type="text" name="tempat_lahir-edit" id="tempat_lahir-edit" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col">                                   
                                    <div class="form-group">
                                        <label for="tanggal_lahir-edit" class="form-label">Tanggal Lahir Ayah</label>
                                        <input type="text" name="tanggal_lahir-edit" id="tanggal_lahir-edit" class="form-control datepicker"  readonly required>
                                    </div>                                    
                                </div>                                
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="alamat-edit" class="form-label">Alamat Orang Tua</label>
                                        <input type="text" name="alamat-edit" id="alamat-edit" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="telepon-edit" class="form-label">No Telp Orang Tua</label>
                                        <input type="number" name="telepon-edit" id="telepon-edit" class="form-control" required>
                                    </div>
                                </div>                                
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="pekerjaan_ayah-edit" class="form-label">Pekerjaan Ayah</label>
                                        <input type="text" name="pekerjaan_ayah-edit" id="pekerjaan_ayah-edit" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col">                                   
                                    <div class="form-group">
                                        <label for="pekerjaan_ibu-edit" class="form-label">Pekerjaan Ibu</label>
                                        <input type="text" name="pekerjaan_ibu-edit" id="pekerjaan_ibu-edit" class="form-control" required>
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
    $('.datepicker').datepicker({
        format: 'dd-mm-yyyy',
        autoclose: true
    })
    var table = $('#table_id').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: '/dashboard/wali/show',
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
                            data: 'nama_ayah',
                            name: 'nama_ayah',
                            className: 'align-middle text-center'
                        },
                        {
                            data: 'nama_ibu',
                            name: 'nama_ibu',
                            className: 'align-middle text-center'
                        },
                        {
                            data: 'alamat',
                            name: 'alamat',
                            className: 'align-middle text-center'
                        },   
                        {
                            data: 'no_telp',
                            name: 'no_telp',
                            className: 'align-middle text-center'
                        },    
                        {
                            data: "wali",
                            className: 'align-middle text-center',
                            render: function (data, type, row) {                                                              
                                return data.username
                            },
                        },
                        {
                            data: "wali",
                            className: 'align-middle text-center',
                            render: function (data, type, row) {                                                              
                                return data.email
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
            let pekerjaan_a = $('#pekerjaan_ayah').val();
            let pekerjaan_b = $('#pekerjaan_ibu').val();
            let pekerjaan = pekerjaan_a.concat(",", pekerjaan_b);
            formData.append('nama_ayah', $('input[name=nama_ayah]').val());
            formData.append('nama_ibu', $('#nama_ibu').val());
            formData.append('tempat_lahir', $('#tempat_lahir').val());
            formData.append('alamat', $('#tempat_lahir').val());
            formData.append('tanggal_lahir', $('#tanggal_lahir').val());
            formData.append('no_telp', $('#telepon').val());
            formData.append('pekerjaan', pekerjaan);
            formData.append('id_siswa', $('#siswa').val());
            formData.append('username', $('#username-tambah').val());
            formData.append('email', $('#email-tambah').val());
            formData.append('password', $('#password').val());            
            $.ajax({
				type: 'post',
				url: '/dashboard/wali/store',
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
						$('#modal-wali').modal('hide');
                        $('#form-tambah').trigger('reset');
                       
						Swal.fire({
							icon: 'success',
							title: 'Sukses',
							text: 'Berhasil Menambahkan Wali Murid',
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
            url: '/dashboard/wali/edit/'+id,
            type: 'GET',
            success: function(res) {
                $('#modal-wali-edit').modal('show');
                $('input[name=edit-id]').val(id);
                $('#nama_ayah-edit').val(res.values.nama_ayah);
                $('#nama_ibu-edit').val(res.values.nama_ibu);
                let pekerjaan = res.values.pekerjaan.split(",")
                $('#pekerjaan_ayah-edit').val(pekerjaan[0]);
                $('#pekerjaan_ibu-edit').val(pekerjaan[1]);
                let tanggal = new Date(res.values.tanggal_lahir)                               
                $('#tanggal_lahir-edit').val(String(tanggal.getDate() +'-'+ (parseInt(tanggal.getMonth()) + 1) + '-' + tanggal.getFullYear()));
                $('#tempat_lahir-edit').val(res.values.tempat_lahir);
                $('#telepon-edit').val(res.values.no_telp);
                $('#alamat-edit').val(res.values.alamat);
                $('#siswa-edit').val(res.values.id_siswa);              
                console.log(res.values)
                }
            });
		
    })
    $('body').on('submit', '#form-edit', function(e) {
            e.preventDefault();
            var id = $('input[name=edit-id]').val();
            var formData = new FormData();
            let pekerjaan_a = $('#pekerjaan_ayah-edit').val();
            let pekerjaan_b = $('#pekerjaan_ibu-edit').val();
            let pekerjaan = pekerjaan_a.concat(",", pekerjaan_b);
            formData.append('nama_ayah', $('input[name=nama_ayah-edit]').val());
            formData.append('nama_ibu', $('#nama_ibu-edit').val());
            formData.append('tempat_lahir', $('#tempat_lahir-edit').val());
            formData.append('alamat', $('#tempat_lahir-edit').val());           
            formData.append('tanggal_lahir', $('#tanggal_lahir-edit').val());
            formData.append('no_telp', $('#telepon-edit').val());
            formData.append('pekerjaan', pekerjaan);
            formData.append('id_siswa', $('#siswa-edit').val());          
            $.ajax({
				type: 'post',
				url: '/dashboard/wali/update/'+id,
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
						$('#modal-wali-edit').modal('hide');
                        $('#form-edit').trigger('reset');
						Swal.fire({
							icon: 'success',
							title: 'Sukses',
							text: 'Berhasil Mengedit Wali Murid',
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
                        url: '/dashboard/wali/destroy/' + id,
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
