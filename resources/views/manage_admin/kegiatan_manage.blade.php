@extends('layouts.template1')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<body>
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Foto Kegiatan</h4>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                        <a href="javascript:void(0)" class="btn btn-info ml-3" id="create-new-kegiatan">Add New</a>
                        <br><br></br><br>
                        <table class="table table-bordered table-striped" id="laravel_datatable">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>S. No</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
      <div class="modal fade" id="ajax-kegiatan-modal" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h4 class="modal-title" id="kegiatanCrudModal"></h4>
               </div>
               <div class="modal-body">
                  <form id="kegiatanForm" name="kegiatanForm" class="form-horizontal" enctype="multipart/form-data">
                  
                     <input type="hidden" name="kegiatan_id" id="kegiatan_id">
                     <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-12">
                           <input type="text" class="form-control" id="title" name="title" placeholder="Enter Tilte" value="" maxlength="50" required="">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-12">
                           <input type="text" class="form-control" id="description" name="description" placeholder="Enter Description" value="" required="">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 control-label">Image</label>
                        <div class="col-sm-12">
                           <input id="image" type="file" name="image" accept="image/*" onchange="readURL(this);">
                           <input type="hidden" name="hidden_image" id="hidden_image">
                        </div>
                     </div>
                     <img id="modal-preview" src="https://via.placeholder.com/150" alt="Preview" class="form-group hidden" width="100" height="100">
                     <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="btn-save" value="create">Save changes
                        </button>
                     </div>
                  </form>
               </div>
               <div class="modal-footer"></div>
            </div>
         </div>
      </div>
   </body>

   <script type="text/javascript">
        var SITEURL = '{{URL::to('')}}';
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#laravel_datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: SITEURL + "kegiatan-list",
                type: 'GET',
            },
            columns: [{
                    data: 'id',
                    name: 'id',
                    'visible': false
                },
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'image',
                    name: 'image',
                    orderable: false
                },
                {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'description',
                    name: 'description'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false
                },
            ],
            order: [
                [0, 'desc']
            ]
        });
        /*  When user click add user button */
        $('#create-new-kegiatan').click(function () {
            $('#btn-save').val("create-kegiatan");
            $('#kegiatan_id').val('');
            $('#kegiatanForm').trigger("reset");
            $('#kegiatanCrudModal').html("Add New kegiatan");
            $('#ajax-kegiatan-modal').modal('show');
            $('#modal-preview').attr('src', 'https://via.placeholder.com/150');
        });
        /* When click edit user */
        $('body').on('click', '.edit-kegiatan', function () {
            var kegiatan_id = $(this).data('id');
            $.get('kegiatan-list/' + kegiatan_id + '/edit', function (data) {
                $('#title-error').hide();
                $('#kegiatan_code-error').hide();
                $('#description-error').hide();
                $('#kegiatanCrudModal').html("Edit kegiatan");
                $('#btn-save').val("edit-kegiatan");
                $('#ajax-kegiatan-modal').modal('show');
                $('#kegiatan_id').val(data.id);
                $('#title').val(data.title);
                $('#description').val(data.description);
                $('#modal-preview').attr('alt', 'No image available');
                if (data.image) {
                    $('#modal-preview').attr('src', SITEURL + 'public/kegiatan/' + data.image);
                    $('#hidden_image').attr('src', SITEURL + 'public/kegiatan/' + data.image);
                }
            })
        });
        $('body').on('click', '#delete-kegiatan', function () {
            var kegiatan_id = $(this).data('id');
            if (confirm("Are You sure want to delete !")) {
                $.ajax({
                    type: "get",
                    url: SITEURL + "kegiatan-list/delete/" + kegiatan_id,
                    success: function (data) {
                        var oTable = $('#laravel_datatable').dataTable();
                        oTable.fnDraw(false);
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }
        });
    });
    $('body').on('submit', '#kegiatanForm', function (e) {
        e.preventDefault();
        var actionType = $('#btn-save').val();
        $('#btn-save').html('Sending..');
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: SITEURL + "kegiatan-list/store",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                $('#kegiatanForm').trigger("reset");
                $('#ajax-kegiatan-modal').modal('hide');
                $('#btn-save').html('Save Changes');
                var oTable = $('#laravel_datatable').dataTable();
                oTable.fnDraw(false);
            },
            error: function (data) {
                console.log('Error:', data);
                $('#btn-save').html('Save Changes');
            }
        });
    });

    function readURL(input, id) {
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
    </script>
@endsection