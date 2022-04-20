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
                        <h4 class="page-title">Data Pengguna</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <a class="btn btn-success" href="javascript:void(0)" id="createUser">
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
                                    <table class="table table-bordered data-table">
                                        <thead>
                                            <tr>     
                                                <th width="5px">No</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Roles</th>
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
                    <form id="userForm" name="userForm" class="form-horizontal">
                    <input type="hidden" name="user_id" id="user_id">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Nama</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="" maxlength="50" required="">
                            </div>
                        </div>
        
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email" value="" maxlength="50" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-12">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" autocomplete="off" value="" maxlength="50" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="roles" class="col-sm-2 control-label">Roles</label>
                            <div class="col-sm-12">
                                <select name="roles" id="roles" class="form-control">
                                        <option value="" disabled selected>Choose Roles</option>
                                        <!-- <option value="Admin">Admin</option> -->
                                        <option value="Donatur">Donatur</option>
                                        <option value="Pengasuh">Pengasuh</option> 
                                </select>
                                <!-- <input type="text" class="form-control" id="roles" name="roles" placeholder="Choose Roles" value="" maxlength="50" required=""> -->
                            </div>
                        </div>
        
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
        ajax: "{{ route('manageuser.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'roles', name: 'roles'},
            {data: 'action', name: 'action', orderable: false, searchable: false,},
        ]
       
    });
    
    $('#createUser').click(function () {
        $('#saveBtn').val("create-user");
        $('#user_id').val('');
        $('#userForm').trigger("reset");
        $('#modelHeading').html("Tambah User");
        $('#ajaxModel').modal('show');
    });

    $('body').on('click', '.editUser', function () {
      var id = $(this).data('id');
      $.get("{{ route('manageuser.index') }}" +'/' + id +'/edit', function (data) {
          $('#modelHeading').html("Edit User");
          $('#saveBtn').val("edit-user");
          $('#ajaxModel').modal('show');
          $('#user_id').val(data.id);
          $('#name').val(data.name);
          $('#email').val(data.email);
          $('#password').val(data.password);
          $('#roles').val(data.roles);
      })
   });

   $('#cancelBtn').click(function () {
        $('#ajaxModel').modal('hide');
    });
   
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Save');
    
        $.ajax({
          data: $('#userForm').serialize(),
          url: "{{ route('manageuser.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
     
              $('#userForm').trigger("reset");
              $('#ajaxModel').modal('hide');
              table.draw();
         
          },
          error: function (data) {
              console.log('Error:', data);
              $('#saveBtn').html('Save Changes');
          }
      });
    });
    
    $('body').on('click', '.deleteUser', function () {
     
        var id = $(this).data("id");
        confirm("Are You sure want to delete !");
      
        $.ajax({
            type: "DELETE",
            url: "{{ route('manageuser.store') }}"+'/'+id,
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
