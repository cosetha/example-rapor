@extends('layouts.appdashboard') @section('title', 'Master Kelas || Cordova')
@section('content')

<div class="card">
    <div class="card-body">
        <h4 class="header-title">Master Kelas</h4>
        <p class="sub-header">Tempat Mengelola data terkait Master Kelas</p>
        <div class="row">
            <div class="button-list">
                <button
                    type="button"
                    class="btn btn-success waves-effect waves-light"
                    data-bs-toggle="modal"
                    data-bs-target="#modal-kelas"
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
                                <th>Nama Keahlian</th>
                                <th>Nama Kelas</th>
                                <th>Tahun</th>                                
                                <th>Tingkat</th>
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
    id="modal-kelas"
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
                        <form action="" method="post" action="{{ url('') }}/dashboard/kelas/store" id="form-tambah">
                            @csrf
                            <div class="form-group ">
                                <label for="nama">Nama Kelas:</label>
                                <input type="text" class="form-control" id="nama-tambah" placeholder="Masukan Nama Kelas" name="nama-tambah" required value = "{{ old('nama') }}">                                        
                            </div>
                            <div class="form-group">
                                <label for="jurusan">Nama Jurusan</label>
                                @if($jurusan->isEmpty())
                                    <a id="jurusan" class="text-decoration-none" href="{{ url('/')}}/dashboard/bidang"> Belum ada data, Klik untuk isi</a>                               
                                @else
                                <select class="form-control jurusan" id="jurusan" name="jurusan">   
                                    <option value="">== Pilih Jurusan ==</option>                                
                                    @foreach($jurusan as $b)
                                    <option value="{{$b->id}}">{{$b->nama_bidang}}</option>
                                    @endforeach                                  
                                </select>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="bidang">Nama Keahlian</label>                              
                                <select class="form-control" id="bidang" name="bidang">                                   
                                    <option disabled selected value="">-- Pilih  Jurusan --</option>                                                
                                </select>                            
                            </div>
                            <div class="form-group">
                                <label for="tahun">Tahun :</label>
                                <input type="text" class="form-control yearpicker" id="tahun"  readonly="readonly"  name="tahun-edit" required value = "" autocomplete="off">                           
                            </div>
                            <div class="form-group">
                                <label for="tigkat">Tingkat :</label>
                                <select class="form-control" id="tingkat" name="tingkat">    
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
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
    id="modal-kelas-edit"
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
                                <label for="nama-edit">Nama Kelas:</label>
                                <input type="text" class="form-control" id="nama-edit" placeholder="Masukan Nama Kelas" name="nama-edit" required value = "{{ old('nama') }}">                                        
                            </div>
                            <div class="form-group">
                                <label for="jurusan-edit">Nama Jurusan</label>
                                @if($jurusan->isEmpty())
                                    <a id="jurusan-edit" class="text-decoration-none" href="{{ url('/')}}/dashboard/bidang"> Belum ada data, Klik untuk isi</a>                               
                                @else
                                <select class="form-control jurusan" id="jurusan-edit" name="jurusan-edit">   
                                    <option value="">== Pilih Jurusan ==</option>                                
                                    @foreach($jurusan as $b)
                                    <option value="{{$b->id}}">{{$b->nama_bidang}}</option>
                                    @endforeach                                  
                                </select>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="bidang-edit">Nama Keahlian</label>                              
                                <select class="form-control" id="bidang-edit" name="bidang-edit">                                   
                                    <option disabled selected value="">-- Pilih  Jurusan --</option>                                                
                                </select>                            
                            </div>
                            <div class="form-group">
                                <label for="tahun-edit">Tahun :</label>
                                <input type="text" class="form-control " id="tahun-edit"  readonly="readonly"  name="tahun-edit" required value = "" autocomplete="off">                           
                            </div>
                            <div class="form-group">
                                <label for="tigkat-edit">Tingkat :</label>
                                <select class="form-control" id="tingkat-edit" name="tingkat-edit">    
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
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
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.yearpicker').yearpicker({
        year:{{$tahun}},
    });

    $('#jurusan').on('change', function () {
        var formData = new FormData()
        formData.append('id', $('#jurusan').val()); 
            $.ajax({
				type: 'post',
				url: '/dashboard/keahlian/create',
				data: formData,
				processData: false,
				contentType: false,
				success: function(response) {
					$('#bidang').empty();

                    for (const element of response) {
                        $('#bidang').append(new Option(element.nama_bidang, element.id))
                    }
                      
                   
				},
				error: function(err) {
					console.log(err);
				}
			});       
    });


    $('#jurusan-edit').on('change', function () {
        var formData = new FormData()
        formData.append('id', $('#jurusan-edit').val()); 
            $.ajax({
				type: 'post',
				url: '/dashboard/keahlian/create',
				data: formData,
				processData: false,
				contentType: false,
				success: function(response) {
					$('#bidang-edit').empty();

                    for (const element of response) {
                        $('#bidang-edit').append(new Option(element.nama_bidang, element.id))
                    }
                      
                   
				},
				error: function(err) {
					console.log(err);
				}
			});       
    });

    var table = $('#table_id').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: '/dashboard/kelas/show',
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
                            data: "keahlian",
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
                            data: 'nama_kelas',
                            name: 'nama_kelas',
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
                        },
                    ]
	});

   
    $('body').on('submit', '#form-tambah', function(e) {
            e.preventDefault();
            var formData = new FormData();
            formData.append('nama', $('input[name=nama-tambah]').val());
            formData.append('tahun', $('#tahun').val());
            formData.append('tingkat', $('#tingkat').val());
            formData.append('bidang', $('#bidang').val());
            $.ajax({
				type: 'post',
				url: '/dashboard/kelas/store',
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
						$('#modal-kelas').modal('hide');
                        $('#form-tambah').trigger('reset');
                       
						Swal.fire({
							icon: 'success',
							title: 'Sukses',
							text: 'Berhasil Menambahkan Kelas',
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
            url: '/dashboard/kelas/edit/'+id,
            type: 'GET',
            success: function(res) {
                $('#modal-kelas-edit').modal('show');
                console.log(res.values)
                $('input[name=edit-id]').val(id);
                $('#nama-edit').val(res.values.nama_kelas);
                $('#tahun-edit').val(res.values.tahun);
                $('#tingkat-edit').val(res.values.tingkat)
                $('#tahun-edit').yearpicker({
                    year:res.values.tahun,
                });
                var formData = new FormData();
                $("#jurusan-edit").val(res.values.keahlian[0].id_bidang);
                formData.append('id', res.values.keahlian[0].id_bidang);
                    $.ajax({
                        type: 'post',
                        url: '/dashboard/keahlian/create',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            $('#bidang-edit').empty();

                            for (const element of response) {
                                $('#bidang-edit').append(new Option(element.nama_bidang, element.id))
                            }
                            $('#bidang-edit').val(res.values.id_keahlian)
                            
                        
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    }); 
                }
            });
		
    })
    $('body').on('submit', '#form-edit', function(e) {
            e.preventDefault();
            var id = $('input[name=edit-id]').val();
            var formData = new FormData();
            formData.append('nama', $('#nama-edit').val());
            formData.append('tahun', $('#tahun-edit').val());
            formData.append('tingkat', $('#tingkat-edit').val());
            formData.append('bidang', $('#bidang-edit').val());
            $.ajax({
				type: 'post',
				url: '/dashboard/kelas/update/'+id,
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
						$('#modal-kelas-edit').modal('hide');
                        $('#form-edit').trigger('reset');
						Swal.fire({
							icon: 'success',
							title: 'Sukses',
							text: 'Berhasil Mengedit Kelas',
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
                        url: '/dashboard/kelas/destroy/' + id,
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
