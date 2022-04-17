@extends('layouts.template1')
@section('content')

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Data Pengguna</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <button type="button" class="btn btn-outline-success btn-rounded" id="tambah-user">
                                        <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="green" />
                                            <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="black" />
                                            <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="black" />
                                            </svg>
                                        </span>
                                    Tambah Data</button>
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
                                    <table id="zero_config" class="table align-middle table-row-dashed">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $no = 1;
                                        @endphp

                                        @foreach($users as $user)
                                            <tr>
                                                <th>{{$no++}}</th>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->email}}</td>
                                                @if ($user->roles == "Admin")
                                                    <td><div class="badge rounded-pill bg-danger">Admin</div></td>
                                                @elseif($user->roles == "Donatur")
                                                    <td><div class="badge rounded-pill bg-success">Donatur</div></td>
                                                @else
                                                    <td><div class="badge rounded-pill bg-dark">Pengasuh</div></td>
                                                @endif
                                                <td>
                                                    @if ($user->roles == "Donatur")
                                                    <a href="javascript:void(0)" class="btn btn-primary edit btn-sm btn-rounded" data-id="{{ $user->id }}">Edit</a>
                                                    <a href="javascript:void(0)" class="btn btn-primary delete btn-sm btn-rounded" data-id="{{ $user->id }}">Delete</a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>            
            </div>
            <!-- Tambah Data -->
            <div class="modal fade" id="user-model" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="userModel"></h4>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0)" id="addEditBookForm" name="addEditBookForm" class="form-horizontal" method="POST">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Nama</label>
                        <div class="col-sm-12">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama" value="" maxlength="50" required="">
                        </div>
                    </div>  
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-12">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan Email" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-12">
                        <input type="text" class="form-control" id="password" name="password" placeholder="Masukkan Password" value="" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Roles</label>
                        <div class="col-sm-12">
                        <input type="text" class="form-control" id="roles" name="roles" placeholder="Pilih Roles" value="" required="">
                        </div>
                    </div>
                    <div class="text-center pt-15">
                            <button type="reset" id="btn-cancel" class="btn btn-light me-3">Batal</button>
                            <button type="submit" id="btn-save" class="btn btn-primary" value="tambah-user">
                              <span class="indicator-label">Simpan</span>                       
                            </button>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">    
                </div>
                </div>
            </div>
            </div>
        <!-- end bootstrap model -->
<script type="text/javascript">
 $(document).ready(function($){
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#tambah-user').click(function () {
       $('#addEditBookForm').trigger("reset");
       $('#userModel').html("Tambah Data");
       $('#user-model').modal('show');
    });

    $('#btn-cancel').click(function () {
       $('#user-model').modal('hide');
    });
 
    $('body').on('click', '.edit', function () {
        var id = $(this).data('id');
         
        // ajax
        $.ajax({
            type:"POST",
            url: "{{ url('edit-user') }}",
            data: { id: id },
            dataType: 'json',
            success: function(res){
              $('#ajaxBookModel').html("Edit Book");
              $('#ajax-book-model').modal('show');
              $('#id').val(res.id);
              $('#name').val(res.name);
              $('#email').val(res.email);
              $('#password').val(res.password);
           }
        });
    });
    $('body').on('click', '.delete', function () {
       if (confirm("Delete Record?") == true) {
        var id = $(this).data('id');
         
        // ajax
        $.ajax({
            type:"POST",
            url: "{{ url('delete-user') }}",
            data: { id: id },
            dataType: 'json',
            success: function(res){
              window.location.reload();
           }
        });
       }
    });
    $('body').on('click', '#btn-save', function (event) {
          var id = $("#id").val();
          var name = $("#name").val();
          var email = $("#email").val();
          var password = $("#password").val();
          var roles = $("#roles").val();
          $("#btn-save").html('Please Wait...');
          $("#btn-save").attr("disabled", true);
         
        // ajax
        $.ajax({
            type:"POST",
            url: "{{ url('tambah-user') }}",
            data: {
              id:id,
              title:title,
              code:code,
              author:author,
            },
            dataType: 'json',
            success: function(res){
             window.location.reload();
            $("#btn-save").html('Submit');
            $("#btn-save"). attr("disabled", false);
           }
        });
    });
});
</script>
@endsection
