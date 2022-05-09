@extends('layouts.template1')
@section('content')

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">

        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Data Foto Kegiatan</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <a class="btn btn-success" href="javascript:void(0)" id="createFotoKegiatan">
                                        <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="green" />
                                            <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="black" />
                                            <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="black" />
                                            </svg>
                                        </span> 
                                    Tambah Data</a>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">                          
                                    <table class="table table-bordered data-table" id="laravel_datatable">
                                        <thead>
                                            <tr>     
                                                <th width="5px">No</th>
                                                <th>Judul</th>
                                                <th>Isi/Konten</th>
                                                <th>Gambar</th>
                                                <th width="300px">Action</th>
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
            </div>
    <!-- Modal Tambah -->
    <div class="modal fade" id="ajaxModel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading"></h4>
                </div>
                <div class="modal-body">
                    <form id="fotokegiatanForm" name="fotokegiatanForm" class="form-horizontal">
                    <input type="hidden" name="fotokegiatan_id" id="fotokegiatan_id">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Judul</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" value="" maxlength="50" required="">
                            </div>
                        </div>
        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Konten/Isi</label>
                            <div class="col-sm-12">
                                <textarea type="text" name="author" required="" id="author" placeholder="Enter Author" class="form-control"></textarea>
                            </div>
                        </div>

                        <!-- <div class="form-group row">
                            <label class="col-md-3">Image Upload</label>
                            <div class="col-md-9">
                                <div class="custom-file">
                                <input id="image" type="file" name="image" accept="image/*" onchange="readURL(this);">
                                    <input type="file" class="custom-file-input" id="fotokegiatan_id" name="gambar"
                                        required>
                                        <img id="modal-preview" src="https://via.placeholder.com/150" alt="Preview" class="form-group hidden" width="100" height="100">      
                                </div>
                            </div>
                        </div> -->

                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Image</label>
                            <div class="col-sm-12">
                                <input id="gambar" type="file" name="gambar" accept="gambar/*" onchange="readURL(this);">
                                <input type="hidden" name="hidden_image" id="hidden_image">
                            </div>
                        </div>
                        <img id="modal-preview" src="https://via.placeholder.com/150" alt="Preview" class="form-group hidden" width="100" height="100">
                        
        
                        <div class="text-center pt-15">
                            <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Simpan</button>
                            <button type="reset" class="btn btn-primary" id="cancelBtn" value="create">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>  

<script type="text/javascript">
  $(function () {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
    var table = $('.data-table').DataTable({
       
        processing: true,
        serverSide: true,
        ajax: "fotokegiatan",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'title', name: 'title'},
            {data: 'author', name: 'author'},
            {data: 'gambar', name: 'gambar', orderable: false},
            {data: 'action', name: 'action', orderable: false, searchable: false,},
        ]
       
    });

    $('#cancelBtn').click(function () {
        $('#ajaxModel').modal('hide');
    });
    
    $('#createFotoKegiatan').click(function () {
        $('#saveBtn').val("create-foto-kegiatan");
        $('#fotokegiatan_id').val('');
        $('#fotokegiatanForm').trigger("reset");
        $('#modelHeading').html("Tambah Foto Kegiatan");
        $('#ajaxModel').modal('show');
        $('#modal-preview').attr('src', 'https://via.placeholder.com/150');
    });

    $('body').on('click', '.editFoto', function () {
      var id = $(this).data('id');
      $.get('fotokegiatan/' + fotokegiatan_id +'/edit', function (data) {
          $('#modelHeading').html("Edit Foto Kegiatan");
          $('#saveBtn').val("editFoto");
          $('#ajaxModel').modal('show');
          $('#fotokegiatan_id').val(data.id);
          $('#title').val(data.title);
          $('#author').val(data.author);
          $('#modal-preview').attr('alt', 'No image available');
          if(data.gambar){
            $('#modal-preview').attr('src', SITEURL +'public/images/'+data.gambar);
            $('#hidden_image').attr('src', SITEURL +'public/images/'+data.gambar);
          }
      })
   });
   
    // $('#saveBtn').click(function (e) {
    //     e.preventDefault();
    //     $(this).html('Save');
    
    //     $.ajax({
    //       data: $('#fotokegiatanForm').serialize(),
    //       url: "fotokegiatan/store",
    //       type: "POST",
    //       dataType: 'json',
    //       success: function (data) {
     
    //           $('#fotokegiatanForm').trigger("reset");
    //           $('#ajaxModel').modal('hide');
    //           table.draw();
         
    //       },
    //       error: function (data) {
    //           console.log('Error:', data);
    //           $('#saveBtn').html('Save Changes');
    //       }
    //   });
    // });
    $('body').on('submit', '#fotokegiatanForm', function (e) {
    e.preventDefault();
    var actionType = $('#saveBtn').val();
    $('#saveBtn').html('Sending..');
    var formData = new FormData(this);
    $.ajax({
        type: 'POST',
        url: SITEURL + "fotokegiatan/store",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: (data) => {
            $('#fotokegiatanForm').trigger("reset");
            $('#ajaxModel').modal('hide');
            $('#saveBtn').html('Save Changes');
            var oTable = $('#laravel_datatable').dataTable();
            oTable.fnDraw(false);
        },
        error: function (data) {
            console.log('Error:', data);
            $('#saveBtn').html('Save Changes');
        }
    });
    });             

    $(document).ready(function(){
    readURL = function(input, id) {
        id = id || '#modal-preview';
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $(id).attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
        $('#modal-preview').removeClass('hidden');
        $('#start').hide();
    }
    }
    });
    
    $('body').on('click', '.deleteFoto', function () {
     
        var fotokegiatan_id = $(this).data("id");
        confirm("Are You sure want to delete !");
      
        $.ajax({
            type: "DELETE",
            url: "fotokegiatan/store"+'/'+fotokegiatan_id,
            success: function (data) {
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
     
  });
</script>
@endsection