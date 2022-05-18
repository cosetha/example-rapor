@extends('layouts.appdashboard') @section('title', 'Master Siswa || Cordova')
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
        <h4 class="header-title">Master Siswa</h4>
        <p class="sub-header">Tempat Mengelola data terkait Master Siswa</p>
        <div class="row">
            <div class="button-list">
                <button
                    type="button"
                    class="btn btn-success waves-effect waves-light"
                    data-bs-toggle="modal"
                    data-bs-target="#modal-siswa"
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
                                <th>NIPDN</th>
                                <th>Nama Siswa</th>
                                <th>NISN</th>
                                <th>Asal Sekolah</th>                                
                                <th>Tempat Tanggal Lahir</th>
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
<div id="modal-siswa" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg">
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
                        <form action="" method="post" action="{{ url('') }}/dashboard/siswa/store" id="form-tambah" name="form-tambah">
                            @csrf
                            <div class="form-group ">
                                <label for="nama">Nama Siswa:</label>
                                <input type="text" class="form-control" id="nama" placeholder="Masukan Nama Siswa" name="nama" required value = "{{ old('nama') }}">                                        
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email-tambah" name="email" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="asal">Asal Sekolah</label>
                                        <input type="text" class="form-control" id="asal" name="asal" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="agama">Agama</label>
                                        <select id="agama" name="agama" class="form-control">
                                            <option value="Islam">Islam</option>
                                            <option value="Protestan">Protestan</option>
                                            <option value="Katolik">Katolik</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Buddha">Buddha</option>
                                            <option value="Khonghucu">Khonghucu</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="jurusan">Nama Jurusan</label>
                                        @if($jurusan->isEmpty())
                                            <a id="jurusan" class="text-decoration-none" href="{{ url('/')}}/dashboard/bidang"> Belum ada data, Klik untuk isi</a>                               
                                        @else
                                        <select class="form-control jurusan" id="jurusan" name="jurusan" required>   
                                            <option value="">== Pilih Jurusan ==</option>                                
                                            @foreach($jurusan as $b)
                                            <option value="{{$b->id}}">{{$b->nama_bidang}}</option>
                                            @endforeach                                  
                                        </select>
                                        @endif
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="bidang">Nama Keahlian</label>                              
                                        <select class="form-control" id="bidang" name="bidang" required>                                   
                                            <option disabled selected value="">-- Pilih  Jurusan --</option>                                                
                                        </select>                            
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="nipdn">NIPDN</label>
                                        <input type="number" class="form-control" id="nipdn" name="nipdn" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="nisn">NISN</label>
                                        <input type="number" class="form-control" name="nisn" id="nisn"required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="telpon">No telepon</label>
                                        <input type="number" class="form-control"  name="telpon" id="telpon"required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="tanggal-masuk">Tanggal Masuk</label>
                                    </div>
                                    <input type="text" class="form-control datepicker" id="tanggal-masuk" name="tanggal-masuk" readonly required value = "" autocomplete="off">  
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="tempat">Tempat Lahir</label>
                                        <input type="text" id="tempat" name="tempat" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="tanggal">Tanggal lahir</label>
                                    </div>
                                    <input type="text" class="form-control datepicker" id="tanggal" name="tanggal" readonly required value = "" autocomplete="off">  
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="jk">Jenis Kelamin</label>
                                   
                                        <select name="" id="jk" class="form-control">
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>  
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="status-kel">Status dalam keluarga</label>
                                        <input type="text" name="status-kel" id="status-kel" class="form-control" required>
                                    </div>  
                                </div> 
                                <div class="col">
                                    <div class="form-group">
                                        <label for="anak">Anak ke-</label>
                                        <input type="text" name="anak" id="anak" class="form-control" required>
                                    </div>  
                                </div>   
                                <div class="col">
                                    <div class="form-group">
                                    <label for="diterima">Diterima di kelas-</label>
                                       <select name="diterima" id="diterima" class="form-control" required>
                                           <option value="10">10</option>
                                           <option value="11">11</option>
                                           <option value="12">12</option>
                                       </select>
                                    </div>  
                                </div>                                 
                            </div> 
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" name="alamat" id="alamat" class="form-control" required>
                                    </div>  
                                </div>                                 
                            </div> 
                                         
                            <div class="row" id="kolom">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="ijazah">No Ijazah</label>
                                        <input type="number"" id="ijazah" name="ijazah" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="tahun-ijazah">Tahun Ijazah</label>
                                    </div>
                                    <input type="text" class="form-control yearpicker" id="tahun" name="tahun" readonly required value = "" autocomplete="off">  
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

<div id="modal-siswa-edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg">
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
                        <input type="hidden" name="edit-id" id ="edit-id" value="">
                            @csrf
                            <div class="form-group ">
                                <label for="nama-edit">Nama Siswa:</label>
                                <input type="text" class="form-control" id="nama-edit" placeholder="Masukan Nama Siswa" name="nama-edit" required value = "{{ old('nama') }}">                                        
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="email-edit">Email</label>
                                        <input type="email" class="form-control" id="email-edit" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="asal-edit">Asal Sekolah</label>
                                        <input type="text" class="form-control" id="asal-edit"required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="agama-edit">Agama</label>
                                        <select id="agama-edit" class="form-control">
                                            <option value="Islam">Islam</option>
                                            <option value="Protestan">Protestan</option>
                                            <option value="Katolik">Katolik</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Buddha">Buddha</option>
                                            <option value="Khonghucu">Khonghucu</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="jurusan-edit">Nama Jurusan</label>
                                        @if($jurusan->isEmpty())
                                            <a id="jurusan-edit" class="text-decoration-none" href="{{ url('/')}}/dashboard/bidang"> Belum ada data, Klik untuk isi</a>                               
                                        @else
                                        <select class="form-control jurusan" id="jurusan-edit" name="jurusan-edit" required>   
                                            <option value="">== Pilih Jurusan ==</option>                                
                                            @foreach($jurusan as $b)
                                            <option value="{{$b->id}}">{{$b->nama_bidang}}</option>
                                            @endforeach                                  
                                        </select>
                                        @endif
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="bidang-edit">Nama Keahlian</label>                              
                                        <select class="form-control" id="bidang-edit" name="bidang-edit" required>                                   
                                            <option disabled selected value="">-- Pilih  Jurusan --</option>                                                
                                        </select>                            
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="nipdn-edit">NIPDN</label>
                                        <input type="number" class="form-control" id="nipdn-edit" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="nisn-edit">NISN</label>
                                        <input type="number" class="form-control" id="nisn-edit"required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="telpon-edit">No telepon</label>
                                        <input type="number" class="form-control" id="telpon-edit"required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="tanggal-masuk-edit">Tanggal Masuk</label>
                                    </div>
                                    <input type="text" class="form-control datepicker" id="tanggal-masuk-edit" name="tanggal-masuk-edit" readonly required value = "" autocomplete="off">  
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="tempat-edit">Tempat Lahir</label>
                                        <input type="text"" id="tempat-edit" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="tanggal-edit">Tanggal lahir</label>
                                   
                                        <input type="text" class="form-control datepicker" id="tanggal-edit" name="tanggal-edit"  readonly required value = "" autocomplete="off">  
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="jk-edit">Jenis Kelamin</label>
                                   
                                        <select name="" id="jk-edit" class="form-control">
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>  
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="status-edit">Status dalam keluarga</label>
                                        <input type="text" name="status-edit" id="status-edit" class="form-control" required>
                                    </div>  
                                </div>  
                                <div class="col">
                                    <div class="form-group">
                                        <label for="anak-edit">Anak ke-</label>
                                        <input type="text" name="anak-edit" id="anak-edit" class="form-control" required>
                                    </div>  
                                </div>   
                                <div class="col">
                                    <div class="form-group">
                                        <label for="diterima-edit">Diterima di kelas-</label>
                                       <select name="diterima-edit" id="diterima-edit" class="form-control" required>
                                           <option value="10">10</option>
                                           <option value="11">11</option>
                                           <option value="12">12</option>
                                       </select>
                                    </div>  
                                </div>                                 
                            </div> 
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="alamat-edit">Alamat</label>
                                        <input type="text" name="" id="alamat-edit" class="form-control" required>
                                    </div>                                     
                                </div>                                 
                            </div> 
                                         
                            <div class="row" id="kolom-edit">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="ijazah-edit">No Ijazah</label>
                                        <input type="number"" id="ijazah-edit" class="form-control"  required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="tahun-ijazah-edit">Tahun Ijazah</label>
                                        <input type="text" class="form-control " id="tahun-ijazah-edit" name="tahun-ijazah"  readonly required  autocomplete="off">  
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
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $('.datepicker').datepicker({
        format: 'dd-mm-yyyy',
        autoclose: true
    })
    

    $('.yearpicker').yearpicker();

   

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
                        url: '/dashboard/siswa/show',
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
                            data: 'nipdn',
                            name: 'nipdn',
                            className: 'align-middle text-center'
                        },                        
                        {
                            data: 'nama',
                            name: 'nama',
                            className: 'align-middle text-center'
                        }, 
                        {
                            data: 'nisn',
                            name: 'nisn',
                            className: 'align-middle text-center'
                        },    
                        {
                            data: 'asal_sekolah',
                            name: 'asal_sekolah',
                            className: 'align-middle text-center'
                        },  
                        {
                            render: function ( data, type, row, meta )
                            {
                                let tanggal = new Date(row.tanggal_lahir)                               
                                return row.tempat_lahir + ", " +  tanggal.getDate() +'/'+ (parseInt(tanggal.getMonth()) + 1) + '/' + tanggal.getFullYear();
                            },
                            className: 'align-middle text-center',
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
            formData.append('nama', $('#nama').val());
            formData.append('email', $('#email-tambah').val());
            formData.append('asal', $('#asal').val()+'/'+$('#diterima').val());
            formData.append('agama', $('#agama').val());
            formData.append('jurusan', $('#jurusan').val());
            formData.append('bidang', $('#bidang').val());
            formData.append('nipdn', $('#nipdn').val());
            formData.append('nisn', $('#nisn').val());
            formData.append('telpon', $('#telpon').val());
            formData.append('ijazah', $('#ijazah').val());
            formData.append('tahun', $('#tahun').val());
            formData.append('tempat', $('#tempat').val());
            formData.append('tanggal', $('#tanggal').val()); 
            formData.append('alamat', $('#alamat').val()); 
            formData.append('jk', $('#jk').val()); 
            formData.append('status', $('#status-kel').val()+'/'+$('#anak').val()); 
            formData.append('tanggal_masuk', $('#tanggal-masuk').val()); 
            console.log($('#tanggal_masuk').val());
            $.ajax({
				type: 'post',
				url: '/dashboard/siswa/store',
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
						$('#modal-siswa').modal('hide');
                        $('#form-tambah').trigger('reset');
                       
						Swal.fire({
							icon: 'success',
							title: 'Sukses',
							text: 'Berhasil Menambahkan Siswa',
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
            $('#edit-id').val(id)
            e.preventDefault()
            $.ajax({
            url: '/dashboard/siswa/edit/'+id,
            type: 'GET',
            success: function(res) {
                $('#modal-siswa-edit').modal('show');
                console.log(res.values)
                let asal = res.values.asal_sekolah.split('/')
                let status = res.values.status.split('/')
                $('#status-edit').val(status[0])
                $('#anak-edit').val(status[1])
                $('#nama-edit').val(res.values.nama)
                $('#email-edit').val(res.values.email)
                $('#asal-edit').val(asal[0])
                $('#diterima-edit').val(asal[1])
                $('#agama-edit').val(res.values.agama)
                $('#nipdn-edit').val(res.values.nipdn)
                $('#nisn-edit').val(res.values.nisn)
                $('#telpon-edit').val(res.values.no_telp)
                $('#ijazah-edit').val(res.values.no_ijazah)
                $('#jk-edit').val(res.values.jenis_kelamin)
                $('#tempat-edit').val(res.values.tempat_lahir)
                let tanggal = new Date(res.values.tanggal_lahir)                
                $("#tanggal-edit").val(String(tanggal.getDate() +'-'+ (parseInt(tanggal.getMonth()) + 1) + '-' + tanggal.getFullYear())); 
                let tanggalms = new Date(res.values.tanggal_masuk)                
                $("#tanggal-masuk-edit").val(String(tanggalms.getDate() +'-'+ (parseInt(tanggal.getMonth()) + 1) + '-' + tanggal.getFullYear()));                   
                $('#alamat-edit').val(res.values.alamat)
                $('#tahun-ijazah-edit').yearpicker({
                    year:res.values.tahun_ijazah,
                });
                $('#tahun-ijazah-edit').val(res.values.tahun_ijazah)
                var formData = new FormData();
                $("#jurusan-edit").val(res.values.kom_keahlian[0].id_bidang);
                formData.append('id', res.values.kom_keahlian[0].id_bidang);
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
                            $('#bidang-edit').val(res.values.id_bidang)            
                                                    
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
            formData.append('nama',    $('#nama-edit').val());
            formData.append('email',   $('#email-edit').val());
            formData.append('asal',    $('#asal-edit').val()+'/'+$('#diterima-edit').val());
            formData.append('agama',   $('#agama-edit').val());
            formData.append('jurusan', $('#jurusan-edit').val());
            formData.append('bidang',  $('#bidang-edit').val());
            formData.append('nipdn',   $('#nipdn-edit').val());
            formData.append('nisn',    $('#nisn-edit').val());
            formData.append('telpon',  $('#telpon-edit').val());
            formData.append('ijazah',  $('#ijazah-edit').val());
            formData.append('jk',  $('#jk-edit').val());
            formData.append('tahun',   $('#tahun-ijazah-edit').val());
            formData.append('tempat',  $('#tempat-edit').val());
            formData.append('tanggal', $('#tanggal-edit').val()); 
            formData.append('tanggal_masuk', $('#tanggal-masuk-edit').val()); 
            formData.append('alamat',  $('#alamat-edit').val()); 
            formData.append('status', $('#status-edit').val()+'/'+$('#anak-edit').val()); 
            $.ajax({
				type: 'post',
				url: '/dashboard/siswa/update/'+id,
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
						$('#modal-siswa-edit').modal('hide');
                        $('#form-edit').trigger('reset');
						Swal.fire({
							icon: 'success',
							title: 'Sukses',
							text: 'Berhasil Mengedit Siswa',
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
                        url: '/dashboard/siswa/destroy/' + id,
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
