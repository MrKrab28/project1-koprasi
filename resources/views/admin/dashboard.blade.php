@extends('layout')


@section('content')
<div class="row">
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="mini-stat">
                    <span class="mini-stat-icon bg-purple me-0 float-end"><i
                            class="mdi mdi-basket"></i></span>
                    <div class="mini-stat-info">
                        <span class="counter text-purple">25140</span>
                        Total Sales
                    </div>
                    <p class=" mb-0 mt-4 text-muted">Total income: $22506 <span class="float-end"><i
                                class="fa fa-caret-up me-1"></i>10.25%</span></p>
                </div>
            </div>
        </div>
    </div> <!--End col -->
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="mini-stat">
                    <span class="mini-stat-icon bg-blue-grey me-0 float-end"><i
                            class="mdi mdi-black-mesa"></i></span>
                    <div class="mini-stat-info">
                        <span class="counter text-blue-grey">65241</span>
                        New Orders
                    </div>
                    <p class="text-muted mb-0 mt-4">Total income: $22506 <span class="float-end"><i
                                class="fa fa-caret-up me-1"></i>10.25%</span></p>
                </div>
            </div>
        </div>
    </div> <!-- End col -->
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="mini-stat">
                    <span class="mini-stat-icon bg-brown me-0 float-end"><i
                            class="mdi mdi-buffer"></i></span>
                    <div class="mini-stat-info">
                        <span class="counter text-brown">85412</span>
                        New Users
                    </div>
                    <p class="text-muted mb-0 mt-4">Total income: $22506 <span class="float-end"><i
                                class="fa fa-caret-up me-1"></i>10.25%</span></p>
                </div>
            </div>
        </div>
    </div> <!-- End col -->
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="mini-stat">
                    <span class="mini-stat-icon bg-teal me-0 float-end"><i
                            class="mdi mdi-coffee"></i></span>
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
