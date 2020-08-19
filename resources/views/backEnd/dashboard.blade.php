@extends('backEnd.layouts.master')
@section('title','Dashboard')
@section('content')
<style type="text/css">
.dash-card
{
  padding: 20px!important;
}
</style>
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
    </div>
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
                                <h4 class="card-title">Site Analysis</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="bg-dark p-10 text-white text-center">
                                           <i class="fa fa-plus m-b-5 font-16"></i>
                                           <h5 class="m-b-0 m-t-5">0</h5>
                                           <small class="font-light">All Users</small>
                                        </div>
                                    </div>
                                     <div class="col-3">
                                        <div class="bg-dark p-10 text-white text-center">
                                           <i class="fa fa-user m-b-5 font-16"></i>
                                           <h5 class="m-b-0 m-t-5">0</h5>
                                           <small class="font-light">Active Users</small>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="bg-dark p-10 text-white text-center">
                                           <i class="fa fa-cart-plus m-b-5 font-16"></i>
                                           <h5 class="m-b-0 m-t-5">0</h5>
                                           <small class="font-light">Rejected Users</small>
                                        </div>
                                    </div>
                                     <div class="col-3">
                                        <div class="bg-dark p-10 text-white text-center">
                                           <i class="fa fa-tag m-b-5 font-16"></i>
                                           <h5 class="m-b-0 m-t-5">0</h5>
                                           <small class="font-light">Pending Users</small>
                                        </div>
                                    </div>
                                    <div class="col-3 m-t-15">
                                        <div class="bg-dark p-10 text-white text-center">
                                           <i class="fa fa-table m-b-5 font-16"></i>
                                           <h5 class="m-b-0 m-t-5">0</h5>
                                           <small class="font-light">Product</small>
                                        </div>
                                    </div>
                                    <div class="col-3 m-t-15">
                                        <div class="bg-dark p-10 text-white text-center">
                                           <i class="fa fa-globe m-b-5 font-16"></i>
                                           <h5 class="m-b-0 m-t-5">0</h5>
                                           <small class="font-light">Orders</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('backEnd.common.footer')
</div>
@endsection