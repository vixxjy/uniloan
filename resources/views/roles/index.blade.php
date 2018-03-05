@extends('layout.master')

@section('title')
 co-operate loans dashboard
@endsection

@section('content')
  <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
<div class="container-fluid">
       <div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                     <a href="{{ route('users.index') }}"><button class="btn hidden-sm-down btn-primary"><i class=""></i> Back</button></a>
                    </div>
                    <div class="col-md-6 col-4 align-self-center">
                        <button class="right-side-toggle waves-effect waves-light btn-info btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                        <a href="{{ route('roles.create') }}"><button class="btn pull-right hidden-sm-down btn-success"><i class=""></i> Add Role</button></a>
                   
                    </div>
                </div>
               <!-- .row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <!--<button class="btn btn-danger btn-sm pull-right collapsed" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"> Get code <i class="ti-angle-down"></i></button>-->
                                <h4 class="card-title">All  User's Roles</h4>
                                <h6 class="card-subtitle"> Permissions lists </h6>

                                
                                 @if(Session::has('success'))
                                <div class="alert alert-success">{{ Session::get('success') }}</div>
                                @endif
                                       
                                @if (count($roles) === 0)
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="box p-a text-center">
                                                <h3>There are no roles created.. <br />
                                                    
                                                    <a style="margin-top: 30px;" href="{{ route('roles.create') }}" class="btn btn-outline rounded b-primary text-primary">
                                                        Add More roles
                                                    </a>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                @elseif (count($roles) !== 0)
                                 <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                 <th>Role</th>
                                                 <th>Permissions</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Role</th>
                                                <th>Permissions</th>
                                                <th></th>   
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                             @foreach ($roles as $role)
                                            <tr>
                                                <td>{{ $role->name }}</td>
                                                 <td>{{ str_replace(array('[',']','"'),' ', $role->permissions()->pluck('name')) }}</td>
                                                <th><a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning"><i class="glyphicon glyphicon-edit icon-white"></i></a></th>
                                                <th><a title='Delete' class='btn btn-danger' href="{{ route('roles.destroy', $role->id) }}"> <i class="glyphicon glyphicon-trash icon-white"></i></a>
                       </th>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                           
                 
                            </div>
                        </div>
                    </div>
                </div>
                @endif

</div>


@endsection
