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
                            <div id="show_all_employees">
                              <h1 class="text-center text-secondary my-5">Loading...</h1>
                            </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <!--  add new employee modal start  -->
  <div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="#" method="POST" id="add_employee_form" enctype="multipart/form-data">
          @csrf
          <div class="modal-body p-4 bg-light">
            <div class="my-2">
              <label for="Nama">Nama</label>
              <input type="text" name="nama" class="form-control" placeholder="Nama" required>
            </div>
            <div class="my-2">
              <label for="Nominal">Nominal</label>
              <input type="number" name="nominal" class="form-control" placeholder="Rp. " required>
            </div>
            <div class="my-2">
              <label for="nohp">No. Hp</label>
              <input type="text" name="nohp" class="form-control" placeholder="Nomor Handphone" required>
            </div>
            <div class="my-2">
              <label for="Do'a">Do'a</label>
              <input type="text" name="doa" class="form-control" placeholder="Do'a" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" id="add_employee_btn" class="btn btn-primary">Tambah Data</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- add new employee modal end -->

  <!-- edit employee modal start -->
  <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nota</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <!-- <form action="#" method="POST" id="edit_employee_form" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="emp_id" id="emp_id">
          <input type="hidden" name="emp_image" id="emp_image">
          <div class="modal-body p-4 bg-light">
          <div class="my-2">
              <label for="Nama">Nama</label>
              <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama" required>
            </div>
            <div class="my-2">
              <label for="Nominal">Nominal</label>
              <input type="number" name="nominal" id="nominal" class="form-control" placeholder="Rp. " required>
            </div>
            <div class="my-2">
              <label for="Do'a">Doa</label>
              <input type="text" name="doa" id="doa" class="form-control" placeholder="Do'a" required>
            </div>

            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" id="edit_employee_btn" class="btn btn-success">Update Berita</button>
          </div>
        </form> -->
        <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-body printableArea">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pull-left">
                                        <address>
                                            <h3> &nbsp;<b class="text-danger">Yayasan At-Taufiq Malang</b></h3>
                                            <p class="text-muted ms-1">Jl. Sanan No. 70, Purwantoro
                                                <br /> Kecamatan Blimbing,
                                                <br /> Kota Malang,
                                                <br /> Jawa Timur - 651222</p>
                                        </address>
                                    </div>
                                    <!-- <div class="pull-right text-end">
                                        <address>
                                            <h3>Donatur,</h3>
                                            
                                        </address>
                                    </div> -->
                                </div>
                                <!-- <div class="col-md-12">
                                    <div class="table-responsive mt-5" style="clear: both;">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th>Description</th>
                                                    <th class="text-end">Quantity</th>
                                                    <th class="text-end">Unit Cost</th>
                                                    <th class="text-end">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center">1</td>
                                                    <td>Milk Powder</td>
                                                    <td class="text-end">2 </td>
                                                    <td class="text-end"> $24 </td>
                                                    <td class="text-end"> $48 </td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div> -->
                                <!-- <div class="col-md-12">
                                    <div class="pull-right mt-4 text-end">
                                        <hr>
                                    </div>
                                    <div class="clearfix"></div>
                                    <hr>
                                    <div class="text-end">
                                        <button class="btn btn-danger text-white" type="submit"> Cetak Nota </button>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            
      </div>
      </div>
    </div>
  </div>
  <!-- edit employee modal end -->

  

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>  
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script type="text/javascript">
    $(function() {

      // add new employee ajax request
      $("#add_employee_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#add_employee_btn").text('Adding...');
        $.ajax({
          url: '{{ route('offline-store') }}',
          method: 'post',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response) {
            if (response.status == 200) {
              Swal.fire(
                'Added!',
                'Added Successfully!',
                'success'
              )
              fetchAllEmployees();
            }
            $("#add_employee_btn").text('Tambah');
            $("#add_employee_form")[0].reset();
            $("#addEmployeeModal").modal('hide');
          }
        });
      });

      $("#edit_employee_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#edit_employee_btn").text('Updating...');
        $.ajax({
          url: '{{ route('offline-update') }}',
          method: 'post',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response) {
            if (response.status == 200) {
              Swal.fire(
                'Updated!',
                'Foto Kegiatan Updated Successfully!',
                'success'
              )
              fetchAllEmployees();
            }
            $("#edit_employee_btn").text('Update Employee');
            $("#edit_employee_form")[0].reset();
            $("#editEmployeeModal").modal('hide');
          }
        });
      });

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

      // view ajax request
      $(document).on('click', '.viewIcon', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        $.ajax({
          url: '{{ route('online-view') }}',
          method: 'get',
          data: {
            id: id,
            _token: '{{ csrf_token() }}'
          },
          success: function(response) {
            $("#status").val(response.status);
            $("#donatur_name").val(response.donatur_name);
            $("#donatur_email").val(response.donatur_email);
            $("#donatur_phone").val(response.donatur_phone);
            $("#nominal").val(response.nominal);
            $("#message").val(response.message);
            $("#payment_code").val(response.payment_code);
            $("#pdf_url").val(response.pdf_url);
          }
        });
      });

      // fetch all employees ajax request
      fetchAllEmployees();

      function fetchAllEmployees() {
        $.ajax({
          url: '{{ route('online-fetchAll') }}',
          method: 'get',
          success: function(response) {
            $("#show_all_employees").html(response);
            $("table").DataTable({
              order: [0, 'asc']
            });
          }
        });
      }
    });
  </script>

@endsection