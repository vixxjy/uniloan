@extends('layout.master')

@section('title')
 co-operate loans dashboard
@endsection

@section('content')
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">

                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-inverse card-info">
                            <div class="box bg-info text-center">
                                <h1 class="font-light text-white">{{ count($members)}}</h1>
                                <h6 class="text-white">Members</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-primary card-inverse">
                            <div class="box text-center">
                                <h1 class="font-light text-white">{{ count($users)}}</h1>
                                <h6 class="text-white">Users</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-inverse card-success">
                            <div class="box text-center">
                                <h1 class="font-light text-white">{{ count($loans)}}</h1>
                                <h6 class="text-white">Loans</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-inverse card-warning">
                            <div class="box text-center">
                                <h1 class="font-light text-white">10%</h1>
                                <h6 class="text-white">Defaulters</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="row">
                                <div class="col-lg-4 b-l">
                                    <div class="card-body">
                                        <h4 class="card-title">Weekly Transactions</h4>
                                        <h2 style="color: green; font-size: 30px;">#100000</h2>
                                        <br>
                                        <br>
                                        <hr>
                                        <h4 class="card-title">Monthly Transactions</h4>
                                        <h2 style="color: blue; font-size: 30px;">#500000</h2>
                                        <br>
                                        <hr>
                                        <h4 class="card-title">Total Products</h4>
                                        <h2 style="color: red; font-size: 30px;">{{ count($products)}}</h2>
                                    </div>
                                </div>
                             
                                <div class="col-lg-8 col-sm-8 b-l">
                                    <div class="card-body">
                                        <h4 class="font-medium text-inverse">Loan Analysis</h4>
                                        <ul class="list-inline">
                                            <li class="p-l-0">
                                                <h6 class="text-muted"><i class="fa fa-circle m-r-5 text-success"></i>2016</h6>
                                            </li>
                                            <li>
                                                <h6 class="text-muted"><i class="fa fa-circle m-r-5 text-info"></i>2017</h6>
                                            </li>
                                        </ul>
                                        <div class="total-revenue4" style="height: 300px;"></div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
           
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
   
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
      
@endsection

