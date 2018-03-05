@extends('layout.master')

@section('title')
Membership Registration Form
@endsection

@section('content')
  <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
<div class="container-fluid">
       <div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <a href="{{ route('products.index') }}"><button class="btn hidden-sm-down btn-info"><i class=""></i>View All products</button></a>
                    </div>
                    <div class="col-md-6 col-4 align-self-center">
                        <button class="right-side-toggle waves-effect waves-light btn-info btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                        <a href="{{ route('products.create') }}"><button class="btn pull-right hidden-sm-down btn-primary"><i class=""></i>Back</button></a>
                    </div>
                </div>
               <!-- .row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <!--<button class="btn btn-danger btn-sm pull-right collapsed" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"> Get code <i class="ti-angle-down"></i></button>-->
                                <h4 class="card-title">Product Details</h4>
                                <h6 class="card-subtitle"> Registered product </h6>
                                
                            <div class="row">
                                  <div class="col-lg-6 col-xlg-6 col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <center class="m-t-30"> <img src="{{ asset('assets/images/iphone.jpg')}}" class="img-responsive radius" style=" height: 280px; width: 350px;" />
                                                <h4 class="card-title m-t-10">{{ ucfirst($product->name)}}</h4>
                                                <h6 class="card-subtitle" style="color: red;"><b>#{{ $product->price}}</b></h6>
                                                
                                            </center>
                                        </div>
                                        <div>
                                            <hr> </div>
                                 
                                    </div>
                                 </div>
                                 
                                  <div class="col-lg-6 col-xlg-6 col-md-6">
                                        <div class="card">
                                            <!-- Nav tabs -->
                                            <ul class="nav nav-tabs profile-tab" role="tablist">
                                               <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Description</a> </li>
                                            </ul>
                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                
                                                <div class="tab-pane active" id="home" role="tabpanel">
                                                    <div class="card-body">
                                                    <p>{{$product->description}}</p>
                                                    <button class="btn btn-success">Buy Now</button>
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


@endsection