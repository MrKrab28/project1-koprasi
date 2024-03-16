@extends('layout')


@section('content')
    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="mini-stat">
                        <span class="mini-stat-icon bg-purple me-0 float-end"><i class="mdi mdi-account"></i></span>
                        <div class="mini-stat-info">
                            <span class="counter text-purple bold">{{ $anggota }}</span>
                          <p class="fw-bold fs-6">Jumlah Anggota</p>
                        </div>

                    </div>
                </div>
            </div>
        </div> <!--End col -->
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="mini-stat">
                        <span class="mini-stat-icon bg-blue-grey me-0 float-end"><i class="mdi mdi-account"></i></span>
                        <div class="mini-stat-info">
                            <span class="counter text-blue-grey">{{ $petugas }}</span>
                            <p class="fw-bold fs-6">Jumlah Petugas</p>
                        </div>

                    </div>
                </div>
            </div>
        </div> <!-- End col -->
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="mini-stat">
                        <span class="mini-stat-icon bg-brown me-0 float-end"><i class="mdi mdi-cash-multiple"></i></span>
                        <div class="mini-stat-info">
                            <span class="counter text-brown">{{ $pinjamanBelumLunas }}</span>
                            <p class="fw-bold fs-6">Pinjaman Belum Lunas</p>
                        </div>

                    </div>
                </div>
            </div>
        </div> <!-- End col -->
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="mini-stat">
                        <span class="mini-stat-icon bg-teal me-0 float-end"><i class="mdi mdi-coffee"></i></span>
                        <div class="mini-stat-info">
                            <span class="counter text-teal">20544</span>
                            Unique Visitors
                        </div>
                        <p class="text-muted mb-0 mt-4">Total income: $22506 <span class="float-end"><i
                                    class="fa fa-caret-up me-1"></i>10.25%</span></p>
                    </div>
                </div>
            </div>
        </div><!--end col -->
    </div> <!-- end row-->
@endsection
