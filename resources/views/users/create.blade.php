@extends('layout.master')

@section('title')
Users Create form
@endsection

@section('content')
  <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
<div class="container-fluid">
       <div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <!--<h3 class="text-themecolor m-b-0 m-t-0">Users Create</h3>-->
                        <!--<ol class="breadcrumb">-->
                        <!--    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>-->
                        <!--    <li class="breadcrumb-item active">Users Basic</li>-->
                        <!--</ol>-->
                    </div>
                    <div class="col-md-6 col-4 align-self-center">
                        <button class="right-side-toggle waves-effect waves-light btn-info btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                        <a href="{{ route('users.index') }}"><button class="btn pull-right hidden-sm-down btn-primary"><i class=""></i>Back</button></a>
                    </div>
                </div>
               <!-- .row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <!--<button class="btn btn-danger btn-sm pull-right collapsed" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"> Get code <i class="ti-angle-down"></i></button>-->
                                <h4 class="card-title">Users Registration Form</h4>
                                <h6 class="card-subtitle"> Create users </h6>
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
                           
                                <form class="form" action="{{ route('users.store') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Name</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text" value="{{ old('name') }}" name="name" id="example-text-input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-email-input" class="col-2 col-form-label">Email</label>
                                        <div class="col-10">
                                            <input class="form-control" type="email" value="{{ old('email') }}" name="email" id="example-email-input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-month-input" class="col-2 col-form-label">Role</label>
                                        <div class="col-10">
                                            <select class="custom-select col-12" id="inlineFormCustomSelect" name="roles">
                                            <option selected="">Assign User's Role</option>
                                                @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-password-input" class="col-2 col-form-label">Password</label>
                                        <div class="col-10">
                                            <input class="form-control" type="password" name="password" value="" id="example-password-input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-password-input" class="col-2 col-form-label">Confirm Password</label>
                                        <div class="col-10">
                                            <input class="form-control" type="password" name="password_confirmation" value="" id="example-password-input">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                    <button type="submit" class="btn btn-inverse waves-effect waves-light">Cancel</button>
                                   
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

</div>


@endsection