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
                                        <h4 class="card-title">Total Amount Collected</h4>
                                        <h2 style="color: red; font-size: 30px;">#0.00</h2>
                                    </div>
                                </div>
                                <div class="col-lg-4 b-l">
                                       <div class="card-body">
                                            <!--<center class="m-t-30"> <img src="{{ asset('images/1519390982.jpg')}}" class="img-circle" width="150" />-->
                                            <center class="m-t-30"> <img src="" class="img-circle" width="150" />
                                                <h4 class="card-title m-t-10">WELCOME: Mr/Mrs {{ $users->name }}</h4>
                                                <h6 class="card-subtitle">{{$users->email}}</h6>
                                               <hr>
                                               <p>Register to be a member</p>
                                               <hr>
                                                <!--<a href="{{ route('members.create')}}"><button class="btn btn-warning btn-lg">Become A Member</button></a>-->
                                            </center>
                                      </div>
                                </div>
                             
                                <div class="col-lg-4 col-sm-8 b-l">
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

