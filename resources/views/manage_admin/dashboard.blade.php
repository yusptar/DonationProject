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
                                                    <i class="mdi mdi-clipboard-flow mb-1 font-16"></i>
                                                    <h5 class="mb-0 mt-1">Rp. {{$jumlah_online}}, 00</h5>
                                                    <small class="font-light">Donasi Transfer</small>
                                                </div>
                                            </div>
                                            <div class="col-6 mt-3">
                                                <div class="bg-dark p-10 text-white text-center">
                                                    <i class="mdi mdi-receipt mb-1 font-16"></i>
                                                    <h5 class="mb-0 mt-1">Rp. {{$jumlah_offline}}, 00</h5>
                                                    <small class="font-light">Donasi Offline</small>
                                                </div>
                                            </div>
                                            <div class="col-6 mt-3">
                                                <div class="bg-dark p-10 text-white text-center">
                                                    <i class="mdi mdi-account-plus g mb-1 font-16"></i>
                                                    <h5 class="mb-0 mt-1">Rp. {{$total}}, 00</h5>
                                                    <small class="font-light">Total Donasi</small>
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

                <div class="row">
                    <!-- column -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Riwayat Donasi</h4>
                            </div>
                            @foreach($donasi as $d)
                            <div class="comment-widgets scrollable">
                                <!-- Comment Row -->
                                <div class="d-flex flex-row comment-row mt-0">
                                    <div class="p-2"><img src="{{ asset('user/assets/img/default.jpg')}}" alt="user" width="50"
                                            class="rounded-circle"></div>
                                    <div class="comment-text w-100">
                                        <h6 class="font-medium">{{$d->donatur_name}}</h6>
                                        <span class="mb-3 d-block">Telah berdonasi sebesar Rp. {{ number_format($d->nominal, 0) }}</span>
                                        <div class="comment-footer">
                                            <span class="text-muted float-end">{{ $d->created_at->format('d M Y') }}</span>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            @endforeach
                        </div>
                       
                        
                        
                    </div>
                    <!-- column -->

                    
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