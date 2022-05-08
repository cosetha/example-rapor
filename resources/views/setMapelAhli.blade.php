@extends('layouts.appdashboard') @section('title', 'Set Mata Pelajaran Ahli|| Cordova')
@section('content')

<div class="card">
    <div class="card-body">
        <h4 class="header-title">Set Mata Pelajaran Keahlian</h4>
        <p class="sub-header">Tempat Mengelola data terkait Set Mata Pelajaran</p>
        <div class="row">
            <div class="button-list">
                <button
                    type="button"
                    class="btn btn-success waves-effect waves-light"
                    data-bs-toggle="modal"
                    data-bs-target="#modal-set_mapel_ahli"
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
                                <th>Nama Mata Pelajaran</th>
                                <th>Nama Guru</th>
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
    id="modal-set_mapel_ahli"
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
                        <form action="" method="post" action="{{ url('') }}/dashboard/set_mapel_ahli/store" id="form-tambah">
                            @csrf                                                      
                            <div class="form-group">
                                <label for="kelas">Nama Kelas</label>
                                @if(!$kf->isEmpty())                              
                                <select class="form-control" id="kelas" name="kelas" required> 
                                <option value="">Pilih Kelas</option>                                     
                                    @foreach($kf as $k)
                                    <option value="{{$k->id}}" data-tingkat="{{$k->tingkat}}" data-id="{{$k->id_keahlian}}">{{$k->nama_kelas.','.$k->tahun}}</option>
                                    @endforeach                                      
                                </select>                            
                                @endif
                            </div> 
                            <div class="form-group">
                                <label for="mapel">Nama mapel</label>                                                       
                                <select class="form-control" id="mapel" name="mapel" required>                                                                     
                                    <option disabled selected value="">-- Pilih  Kelas --</option>                                                                    
                                </select>                                                          
                            </div> 
                            <div class="form-group">
                                <label for="guru">Nama Guru</label>
                                @if(!$gf->isEmpty())                              
                                <select class="form-control" id="guru" name="guru" required>                                   
                                    @foreach($gf as $g)
                                    <option value="{{$g->id}}">{{$g->nama.','.$g->nip}}</option>
                                    @endforeach                                      
                                </select>                            
                                @endif
                            </div>                              
                            <div class="form-group">
                                <label for="tahun">Tahun :</label>
                                <input type="text" class="form-control" id="tahun"  readonly="readonly"  name="tahun-edit"   autocomplete="off" required>                           
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
    id="modal-set_mapel_ahli-edit"
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
                                <select class="form-control" id="kelas_edit" name="kelas_edit" required >                           
                                    @foreach($kf as $k)
                                    <option value="{{$k->id}}" data-tingkat="{{$k->tingkat}}" data-id="{{$k->id_keahlian}}" >{{$k->nama_kelas.','.$k->tahun}}</option>
                                    @endforeach                                      
                                </select>                            
                                @endif
                            </div>                             
                            <div class="form-group">
                                <label for="mapel_edit">Nama Mapel</label>                      
                                <select class="form-control" id="mapel_edit" name="mapel_edit" required >                                   
                                    <option disabled selected value="">-- Pilih  Kelas --</option>                                            
                                </select>                            
                            </div>       
                            <div class="form-group">
                                <label for="guru_edit">Nama Guru</label>
                                @if(!$gf->isEmpty())                              
                                <select class="form-control" id="guru_edit" name="guru_edit" required>                                   
                                    @foreach($gf as $g)
                                    <option value="{{$g->id}}">{{$g->nama.','.$g->nip}}</option>
                                    @endforeach                                      
                                </select>                            
                                @endif
                                <input type="hidden" name="tingkat_edit" id="tingkat_edit">
                            </div>                      
                            <div class="form-group">
                                <label for="tahun_edit">Tahun :</label>
                                <input type="text" class="form-control" id="tahun_edit"  readonly="readonly"  name="tahun_edit" required value = "" autocomplete="off">                           
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

    $('.yearpicker').yearpicker({
      
    });
    $('#kelas').on('change', function() {
        let data = $(this).find("option:selected").text()
        let arr = data.split(',')
        let tingkat = $(this).find("option:selected").data('tingkat')
        $('#tahun').val(arr[1])
        var formData = new FormData()
        formData.append('id', $(this).find("option:selected").data('id')); 
        formData.append('tingkat', tingkat); 
            $.ajax({
				type: 'post',
				url: '/dashboard/set_mapel_ahli/get_mapel',
				data: formData,
				processData: false,
				contentType: false,
				success: function(response) {
                    if(response.length != 0){
                        $('#mapel').empty();
                        for (const element of response) {
                            $('#mapel').append(new Option(element.nama, element.id))
                        }
                    }else{
                        $('#mapel').empty();
                        $('#mapel').append(new Option('Mapel Keahlian belum ditambahkan',''))
                        $("#mapel option:selected").attr('disabled','disabled')
                    }
                      
                   
				},
				error: function(err) {
					console.log(err);
				}
			}); 
    });

    $('#kelas_edit').on('change', function() {
        let data = $(this).find("option:selected").text()
        let arr = data.split(',')
        let tingkat = $(this).find("option:selected").data('tingkat')
        $('#tahun_edit').val(arr[1])
        var formData = new FormData()
        formData.append('id', $(this).find("option:selected").data('id')); 
        
        formData.append('tingkat', tingkat); 
            $.ajax({
				type: 'post',
				url: '/dashboard/set_mapel_ahli/get_mapel',
				data: formData,
				processData: false,
				contentType: false,
				success: function(response) {
                    if(response.length != 0){
                        $('#mapel_edit').empty();
                        for (const element of response) {
                            $('#mapel_edit').append(new Option(element.nama, element.id))
                        }
                    }else{
                        $('#mapel_edit').empty();
                        $('#mapel_edit').append(new Option('Mapel Keahlian belum ditambahkan',''))
                        $("#mapel_edit option:selected").attr('disabled','disabled')
                    }
                      
                   
				},
				error: function(err) {
					console.log(err);
				}
			}); 
    });

   
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

        
    var table = $('#table_id').DataTable({
                    processing: true,
                    
                    ajax: {
                        url: '/dashboard/set_mapel_ahli/show',
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
                            data: "mapel",
                            className: 'align-middle text-center',
                            render: function (data, type, row) {
                                //return data.length;
                                var txt = "";
                                data.forEach(function (item) {
                                    if (txt.length > 0) {
                                        txt += ", ";
                                    }
                                    txt += item.kelompok+", "+item.sub;
                                });
                                return txt;
                            },
                        },
                        {
                            data: "mapel",
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
                                    txt += item.nama;
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
                            data: "tahun",
                            className: 'align-middle text-center',
                           
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
            formData.append('mapel', $('#mapel').val());
            formData.append('guru', $('#guru').val());
            formData.append('tahun', $('#tahun').val());
            formData.append('kelas', $('#kelas').val());
            $.ajax({
				type: 'post',
				url: '/dashboard/set_mapel_ahli/store',
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
						$('#modal-set_mapel_ahli').modal('hide');
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
    });
    $('body').on('click', '.btn-edit', function(e) {
            var id = $(this).attr('data-id');
            $('input[name=edit-id]').val(id);
            e.preventDefault()
            $.ajax({
            url: '/dashboard/set_mapel_ahli/edit/'+id,
            type: 'GET',
            success: function(res) {
                $('#modal-set_mapel_ahli-edit').modal('show');               
                $('#guru_edit').val(res.values.m_guru_id)                
                $('#kelas_edit').val(res.values.m_kelas_id)
                $('#tahun_edit').val(res.values.tahun)
                $('#mapel_edit').empty();
                for (const element of res.mapel) {
                    $('#mapel_edit').append(new Option(element.nama, element.id))
                }
                $('#mapel_edit').val(res.values.m_mapel_id)
                }
            });
		
    })
    $('body').on('submit', '#form-edit', function(e) {
            e.preventDefault();
            var id = $('input[name=edit-id]').val();
            var formData = new FormData();
            formData.append('kelas', $('#kelas_edit').val());
            formData.append('mapel', $('#mapel_edit').val());
            formData.append('guru', $('#guru_edit').val());
            formData.append('tahun', $('#tahun_edit').val());
            $.ajax({
				type: 'post',
                url: '/dashboard/set_mapel_ahli/update/'+id,
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
						$('#modal-set_mapel_ahli-edit').modal('hide');
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
                        url: '/dashboard/set_mapel_ahli/destroy/' + id,
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
