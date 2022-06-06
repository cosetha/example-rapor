@extends('layouts.appdashboard') @section('title', 'Set Wali Kelas || Cordova')
@section('content')

<div class="card">
    <div class="card-body">
        <h4 class="header-title">Set Wali Kelas</h4>
        <p class="sub-header">Tempat Mengelola data terkait Set Wali Kelas</p>
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
                                <th>Nama Wali Kelas</th>
                                <th>NIPDN</th>
                                <th>Nama Kelas</th> 
                                <th>Tahun</th>                                
                                <th>Bidang Keahlian</th>
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
                            <div class="form-group">
                                <label for="guru">Nama Guru</label> 
                                @if(!$guru->isEmpty())                                                                                           
                                <select class="form-control" id="guru" name="guru" required>                                   
                                    @foreach($guru as $g)
                                    <option value="{{$g->id}}">{{$g->nama.'-'.$g->nip}}</option>
                                    @endforeach                                      
                                </select>   
                                @else
                                <a id="jurusan-edit" class="text-decoration-none" href="{{ url('/')}}/dashboard/guru"> Belum ada data, Klik untuk isi</a>                                                        
                                @endif
                            </div>
                            <div class="form-group">
                            <label for="kelas">Nama Kelas</label>
                                @if(!$kelas->isEmpty())                                                                                              
                                <select class="form-control" id="kelas" name="kelas" required>                                   
                                    @foreach($kelas as $k)
                                    <option value="{{$k->id}}">{{$k->nama_kelas.'-'.$k->tahun}}</option>
                                    @endforeach                                      
                                </select> 
                                @else 
                                <a id="jurusan-edit" class="text-decoration-none" href="{{ url('/')}}/dashboard/kelas"> Belum ada data, Klik untuk isi</a>                                                          
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
                            <div class="form-group">
                                <label for="kelas_edit">Nama Kelas</label>
                                @if(!$kf->isEmpty())                              
                                <select class="form-control" id="kelas_edit" name="kelas_edit" required disabled>                                   
                                    @foreach($kf as $k)
                                    <option value="{{$k->id}}">{{$k->nama_kelas.'-'.$k->tahun}}</option>
                                    @endforeach                                      
                                </select>                            
                                @endif
                            </div> 
                            <div class="form-group">
                                <label for="guru_edit">Nama Guru</label>
                                @if(!$gf->isEmpty())                              
                                <select class="form-control" id="guru_edit" name="guru_edit" required>                                   
                                    @foreach($gf as $g)
                                    <option value="{{$g->id}}">{{$g->nama.'-'.$g->nip}}</option>
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
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

        
    var table = $('#table_id').DataTable({
                    processing: true,
                    
                    ajax: {
                        url: '/dashboard/set_walikelas/show',
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
                            data: "guru",
                            className: 'align-middle text-center',
                            render: function (data, type, row) {
                                //return data.length;
                                var txt = "";
                                data.forEach(function (item) {
                                    if (txt.length > 0) {
                                        txt += ", ";
                                    }
                                    txt += item.nama;
                                });
                                return txt;
                            },
                        },
                        {
                            data: "guru",
                            className: 'align-middle text-center',
                            render: function (data, type, row) {
                                //return data.length;
                                var txt = "";
                                data.forEach(function (item) {
                                    if (txt.length > 0) {
                                        txt += ", ";
                                    }
                                    txt += item.nip;
                                });
                                return txt;
                            },
                        },                  
                        {
                            data: "kelas",
                            className: 'align-middle text-center',
                            render: function (data, type, row) {
                                //return data.length;
                                var txt = "";
                                data.forEach(function (item) {
                                    if (txt.length > 0) {
                                        txt += ", ";
                                    }
                                    txt += item.nama_kelas;
                                });
                                return txt;
                            },
                        },
                        {
                            data: "kelas",
                            className: 'align-middle text-center',
                            render: function (data, type, row) {
                                //return data.length;
                                var txt = "";
                                data.forEach(function (item) {
                                    if (txt.length > 0) {
                                        txt += ", ";
                                    }
                                    txt += item.tahun;
                                });
                                return txt;
                            },
                        },
                        {
                            data: "kelas",
                            className: 'align-middle text-center',
                            render: function (data, type, row) {
                                //return data.length;
                                var txt = "";
                                data[0].keahlian.forEach(function (item) {
                                    if (txt.length > 0) {
                                        txt += ", ";
                                    }
                                    txt += item.nama_bidang;
                                });
                                return txt;
                            },
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
            formData.append('kelas', $('#kelas').val());
            formData.append('guru', $('#guru').val());
            $.ajax({
				type: 'post',
				url: '/dashboard/set_walikelas/store',
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
							text: 'Berhasil Menambahkan Wali Kelas',
							timer: 1200,
							showConfirmButton: false
						});
                        setTimeout(location.reload.bind(location), 1800);
					}
				},
				error: function(err) {
					console.log(err);
				}
			});
            setTimeout(location.reload.bind(location), 1800);
            table.ajax.reload();
    });
    $('body').on('click', '.btn-edit', function(e) {
            var id = $(this).attr('data-id');
            $('input[name=edit-id]').val(id);
            e.preventDefault()
            $.ajax({
            url: '/dashboard/set_walikelas/edit/'+id,
            type: 'GET',
            success: function(res) {
                $('#modal-kelas-edit').modal('show');               
                $('#kelas_edit').val(res.values.id_kelas)
                $('#guru_edit').val(res.values.id_guru)
                }
            });
		
    })
    $('body').on('submit', '#form-edit', function(e) {
            e.preventDefault();
            var id = $('input[name=edit-id]').val();
            var formData = new FormData();
            formData.append('kelas', $('#kelas_edit').val());
            formData.append('guru', $('#guru_edit').val());
            $.ajax({
				type: 'post',
                url: '/dashboard/set_walikelas/update/'+id,
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
							text: 'Berhasil Mengedit Wali Kelas',
							timer: 1200,
							showConfirmButton: false
						});
                        setTimeout(location.reload.bind(location), 1800);
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
                        url: '/dashboard/set_walikelas/destroy/' + id,
                        success: function(response) {
                            Swal.fire('Deleted!', nama + ' telah dihapus.', 'success');
                            table.ajax.reload();
                            setTimeout(location.reload.bind(location), 1800);
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
