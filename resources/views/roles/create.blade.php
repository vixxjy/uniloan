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
                        <a href="{{ route('roles.index') }}"><button class="btn pull-right hidden-sm-down btn-primary"><i class=""></i>Back</button></a>
                    </div>
                </div>
               <!-- .row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <!--<button class="btn btn-danger btn-sm pull-right collapsed" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"> Get code <i class="ti-angle-down"></i></button>-->
                                <h4 class="card-title">User's Role Form</h4>
                                <h6 class="card-subtitle"> Add more role </h6>
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
                           
                                <form class="form" action="{{ route('roles.store') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Name</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text" value="{{ old('name') }}" name="name" id="example-text-input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-month-input" class="col-2 col-form-label">Permission</label>
                                        <div class="col-10">
                                             <h3>Assign Permissions</h3>
                                        <div class="form-check">
                                            @foreach ($permissions as $permission)
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="permissions[]" id="checkboxSuccess" value="{{ $permission->id }}"> {{ ucfirst($permission->name)}}
                                            </label>
                                            @endforeach
                                        </div>
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