@extends('layouts.template1')
@section('content')
<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Dashboard</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Dashbboard</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid"> 
                <!-- ============================================================== -->
                <!-- Sales Cards  -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-md-3">
                        <div class="card mt-0">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="peity_line_neutral left text-center mt-2"><span><span
                                                style="display: none;">10,15,8,14,13,10,10</span>
                                            <canvas width="50" height="24"></canvas>
                                        </span>
                                        <h6>10%</h6>
                                    </div>
                                </div>
                                <div class="col-md-6 border-left text-center pt-2">
                                    <h3 class="mb-0 fw-bold">150</h3>
                                    <span class="text-muted">New Users</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card mt-0">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="peity_bar_bad left text-center mt-2"><span><span
                                                style="display: none;">3,5,6,16,8,10,6</span>
                                            <canvas width="50" height="24"></canvas>
                                        </span>
                                        <h6>-40%</h6>
                                    </div>
                                </div>
                                <div class="col-md-6 border-left text-center pt-2">
                                    <h3 class="mb-0 fw-bold">4560</h3>
                                    <span class="text-muted">Orders</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card mt-0">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="peity_line_good left text-center mt-2"><span><span
                                                style="display: none;">12,6,9,23,14,10,17</span>
                                            <canvas width="50" height="24"></canvas>
                                        </span>
                                        <h6>+60%</h6>
                                    </div>
                                </div>
                                <div class="col-md-6 border-left text-center pt-2">
                                    <h3 class="mb-0 ">5672</h3>
                                    <span class="text-muted">Active Users</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card mt-0">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="peity_bar_good left text-center mt-2" ><span>12,6,9,23,14,10,13</span>
                                        <h6>+30%</h6>
                                    </div>
                                </div>
                                <div class="col-md-6 border-left text-center pt-2">
                                    <h3 class="mb-0 fw-bold">2560</h3>
                                    <span class="text-muted">Register</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-md-flex align-items-center">
                                    <div>
                                        <h4 class="card-title">Statistik</h4>
                                        <h5 class="card-subtitle">Data Masuk Donasi</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- column -->
                                    <div class="col-lg-9">
                                        <div class="flot-chart">
                                            <div class="flot-chart-content" id="flot-line-chart"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="bg-dark p-10 text-white text-center">
                                                    <i class="mdi mdi-account-card-details mb-1 font-16"></i>
                                                    <h5 class="mb-0 mt-1">{{$jumlah_donatur}}</h5>
                                                    <small class="font-light">Donatur</small>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="bg-dark p-10 text-white text-center">
                                                    <i class="mdi mdi-face mb-1 font-16"></i>
                                                    <h5 class="mb-0 mt-1">{{$jumlah_santri}}</h5>
                                                    <small class="font-light">Santri</small>
                                                </div>
                                            </div>
                                            <div class="col-6 mt-3">
                                                <div class="bg-dark p-10 text-white text-center">
                                                    <i class="mdi mdi-account-multiple mb-1 font-16"></i>
                                                    <h5 class="mb-0 mt-1">{{$jumlah_pengasuh}}</h5>
                                                    <small class="font-light">Pengasuh</small>
                                                </div>
                                            </div>
                                            <div class="col-6 mt-3">
                                                <div class="bg-dark p-10 text-white text-center">
                                                    <i class="mdi mdi-account-plus g mb-1 font-16"></i>
                                                    <h5 class="mb-0 mt-1">x</h5>
                                                    <small class="font-light">Akun Baru</small>
                                                </div>
                                            </div>
                                            <div class="col-6 mt-3">
                                                <div class="bg-dark p-10 text-white text-center">
                                                    <i class="mdi mdi-receipt mb-1 font-16"></i>
                                                    <h5 class="mb-0 mt-1">Rp. </h5>
                                                    <small class="font-light">Donasi Offline</small>
                                                </div>
                                            </div>
                                            <div class="col-6 mt-3">
                                                <div class="bg-dark p-10 text-white text-center">
                                                    <i class="mdi mdi-clipboard-flow mb-1 font-16"></i>
                                                    <h5 class="mb-0 mt-1">Rp. </h5>
                                                    <small class="font-light">Donasi Transfer</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- column -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
                
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
        </div>
@endsection        