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
                <h4 class="page-title">Data Donasi Online</h4> 
                  <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <!-- <ol class="breadcrumb">
                            <a class="btn btn-success" data-bs-toggle="modal" href="javascript:void(0)" data-bs-target="#addEmployeeModal">
                                <span class="svg-icon svg-icon-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="green" />
                                    <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="black" />
                                    <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="black" />
                                    </svg>
                                </span> 
                            Tambah Data</a>
                        </ol> -->
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
                            <div id="show_all_onlines">
                              <h1 class="text-center text-secondary my-5">Loading...</h1>
                            </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Data Donasi Offline</h4> 
                  <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <!-- <ol class="breadcrumb">
                            <a class="btn btn-success" data-bs-toggle="modal" href="javascript:void(0)" data-bs-target="#addEmployeeModal">
                                <span class="svg-icon svg-icon-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="green" />
                                    <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="black" />
                                    <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="black" />
                                    </svg>
                                </span> 
                            Tambah Data</a>
                        </ol> -->
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
                            <div id="show_all_offlines">
                              <h1 class="text-center text-secondary my-5">Loading...</h1>
                            </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

  

  <div class="page-wrapper">
      <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                
                  <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <!-- <ol class="breadcrumb">
                            <a class="btn btn-success" data-bs-toggle="modal" href="javascript:void(0)" data-bs-target="#addEmployeeModal">
                                <span class="svg-icon svg-icon-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="green" />
                                    <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="black" />
                                    <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="black" />
                                    </svg>
                                </span> 
                            Tambah Data</a>
                        </ol> -->
                    </nav>
                  </div>           
            </div>
        </div>
      </div>
      
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>  
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script type="text/javascript">
    $(function() {

      // add new employee ajax request
      // $("#add_employee_form").submit(function(e) {
      //   e.preventDefault();
      //   const fd = new FormData(this);
      //   $("#add_employee_btn").text('Adding...');
      //   $.ajax({
      //     url: '{{ route('offline-store') }}',
      //     method: 'post',
      //     data: fd,
      //     cache: false,
      //     contentType: false,
      //     processData: false,
      //     dataType: 'json',
      //     success: function(response) {
      //       if (response.status == 200) {
      //         Swal.fire(
      //           'Added!',
      //           'Added Successfully!',
      //           'success'
      //         )
      //         fetchAllEmployees();
      //       }
      //       $("#add_employee_btn").text('Tambah');
      //       $("#add_employee_form")[0].reset();
      //       $("#addEmployeeModal").modal('hide');
      //     }
      //   });
      // });

      // edit employee ajax request
      // $(document).on('click', '.editIcon', function(e) {
      //   e.preventDefault();
      //   let id = $(this).attr('id');
      //   $.ajax({
      //     url: '{{ route('offline-edit') }}',
      //     method: 'get',
      //     data: {
      //       id: id,
      //       _token: '{{ csrf_token() }}'
      //     },
      //     success: function(response) {
      //       $("#nama").val(response.nama);
      //       $("#nominal").val(response.nominal);
      //       $("#nohp").val(response.nohp);
      //       $("#doa").val(response.doa);
      //       $("#emp_id").val(response.id);
      //     }
      //   });
      // });

      // view ajax request
      // $(document).on('click', '.viewIcon', function(e) {
      //   e.preventDefault();
      //   let id = $(this).attr('id');
      //   $.ajax({
      //     url: '{{ route('offline-view') }}',
      //     method: 'get',
      //     data: {
      //       id: id,
      //       _token: '{{ csrf_token() }}'
      //     },
      //     success: function(response) {
      //       $("#nama").val(response.nama);
      //       $("#nominal").val(response.nominal);
      //       $("#nohp").val(response.nohp);
      //       $("#doa").val(response.doa);
      //       $("#emp_id").val(response.id);
      //     }
      //   });
      // });

      // update employee ajax request
      // $("#edit_employee_form").submit(function(e) {
      //   e.preventDefault();
      //   const fd = new FormData(this);
      //   $("#edit_employee_btn").text('Updating...');
      //   $.ajax({
      //     url: '{{ route('offline-update') }}',
      //     method: 'post',
      //     data: fd,
      //     cache: false,
      //     contentType: false,
      //     processData: false,
      //     dataType: 'json',
      //     success: function(response) {
      //       if (response.status == 200) {
      //         Swal.fire(
      //           'Updated!',
      //           'Foto Kegiatan Updated Successfully!',
      //           'success'
      //         )
      //         fetchAllEmployees();
      //       }
      //       $("#edit_employee_btn").text('Update Employee');
      //       $("#edit_employee_form")[0].reset();
      //       $("#editEmployeeModal").modal('hide');
      //     }
      //   });
      // });

      // delete employee ajax request
      $(document).on('click', '.deleteIcon', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        let csrf = '{{ csrf_token() }}';
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: '{{ route('offline-delete') }}',
              method: 'delete',
              data: {
                id: id,
                _token: csrf
              },
              success: function(response) {
                console.log(response);
                Swal.fire(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                )
                fetchAllEmployees();
              }
            });
          }
        })
      });

      // fetch all employees ajax request
      fetchAllOnlines();

      function fetchAllOnlines() {
        $.ajax({
          url: '{{ route('cetaklaporan-fetchAll-online') }}',
          method: 'get',
          success: function(response) {
            $("#show_all_onlines").html(response);
            $("table").DataTable({
              order: [0, 'asc']
            });
          }
        });
      }


      // fetch all employees ajax request
      fetchAllOfflines();

      function fetchAllOfflines() {
        $.ajax({
          url: '{{ route('cetaklaporan-fetchAll-offline') }}',
          method: 'get',
          success: function(response) {
            $("#show_all_offlines").html(response);
            $("table").DataTable({
              order: [0, 'asc']
            });
          }
        });
      }
    });
  </script>


@endsection