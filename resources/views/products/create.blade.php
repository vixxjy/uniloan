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
                        <a href="{{ route('products.index') }}"><button class="btn hidden-sm-down btn-success"><i class=""></i>View All Products</button></a>
                    </div>
                    <div class="col-md-6 col-4 align-self-center">
                        <button class="right-side-toggle waves-effect waves-light btn-info btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                        <a href="{{ route('products.index') }}"><button class="btn pull-right hidden-sm-down btn-primary"><i class=""></i>Back</button></a>
                    </div>
                </div>
               <!-- .row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <!--<button class="btn btn-danger btn-sm pull-right collapsed" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"> Get code <i class="ti-angle-down"></i></button>-->
                                <h4 class="card-title">Products Registration Form</h4>
                                <h6 class="card-subtitle"> Add more products </h6>
                                @if($errors->any())
                                    <div class="alert alert-danger">
                                    @foreach($errors->all() as $error)
                                        <p>{{ $error }}</p>
                                    @endforeach()
                                    </div>
                                @endif
                                
                                 @if(Session::has('success'))
                                <div class="alert alert-success">{{ Session::get('success') }}</div>
                                @endif
                           
                                <form class="form" action="{{ route('products.store') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Product Name</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text" value="{{ old('name') }}" name="name" id="example-text-input">
                                        </div>
                                    </div>
                                      <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Description</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text" value="{{ old('description') }}" name="description" id="example-text-input">
                                        </div>
                                    </div>
                                      <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Price (#)</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text" value="{{ old('price') }}" name="price" id="example-text-input">
                                        </div>
                                    </div>
                                   <!-- <div class="form-group">-->
                                    <!--<label>Photo file upload</label>-->
                                    <!--<input type="file" class="form-control" name="image" id="exampleInputFile" aria-describedby="fileHelp">-->
                                    <!--</div>-->
                                    
                            
                                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                    <button type="submit" class="btn btn-inverse waves-effect waves-light">Cancel</button>
                                   
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

</div>


@endsection