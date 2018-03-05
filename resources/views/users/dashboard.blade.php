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
       
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="row">
                                <div class="col-lg-4 b-l">
                                    <div class="card-body">
                                        <h4 class="card-title">Weekly Transactions</h4>
                                        <h2 style="color: green; font-size: 30px;">#0.00</h2>
                                        <br>
                                        <br>
                                        <hr>
                                        <h4 class="card-title">Monthly Transactions</h4>
                                        <h2 style="color: blue; font-size: 30px;">#0.00</h2>
                                        <br>
                                        <hr>
                                        <h4 class="card-title">Total Amount</h4>
                                        <h2 style="color: red; font-size: 30px;"></h2>
                                    </div>
                                </div>
                                <div class="col-lg-4 b-l">
                                       <div class="card-body">
                                            <!--<center class="m-t-30"> <img src="{{ asset('images/1519390982.jpg')}}" class="img-circle" width="150" />-->
                                            <center class="m-t-30"> <img src="" class="img-circle" width="150" />
                                                <h4 class="card-title m-t-10">Name</h4>
                                                <h6 class="card-subtitle">Member no</h6>
                                            </center>
                                      </div>
                                </div>
                             
                                <div class="col-lg-4 col-sm-8 b-l">
                                    <div class="card-body">
                                        <h4 class="font-medium text-inverse">User Profile</h4>
                                        <ul class="list-inline">
                                         
                                         
                                        
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

