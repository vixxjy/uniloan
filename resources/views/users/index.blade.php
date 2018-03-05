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
                      <a href="{{ route('roles.index') }}"><button class="btn hidden-sm-down btn-primary"><i class=""></i>Roles</button></a>
                    <a href="{{ route('permissions.index') }}"><button class="btn hidden-sm-down btn-primary"><i class=""></i>Permissions</button></a>
                    </div>
                    <div class="col-md-6 col-4 align-self-center">
                        <button class="right-side-toggle waves-effect waves-light btn-info btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                        <a href="{{ route('users.create') }}"><button class="btn pull-right hidden-sm-down btn-success"><i class=""></i> Create User</button></a>
                   
                    </div>
                </div>
               <!-- .row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <!--<button class="btn btn-danger btn-sm pull-right collapsed" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"> Get code <i class="ti-angle-down"></i></button>-->
                                <h4 class="card-title">All Registered Users</h4>
                                <h6 class="card-subtitle"> Registered users list </h6>

                                
                                 @if(Session::has('success'))
                                <div class="alert alert-success">{{ Session::get('success') }}</div>
                                @endif
                                       
                                @if (count($users) === 0)
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="box p-a text-center">
                                                <h3>There are no users created.. <br />
                                                    
                                                    <a style="margin-top: 30px;" href="{{ route('users.create') }}" class="btn btn-outline rounded b-primary text-primary">
                                                        Create a User
                                                    </a>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                @elseif (count($users) !== 0)
                                 <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Date/Time Added</th>
                                                <th>User Roles</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Date/Time Added</th>
                                                <th>User Roles</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                             @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->created_at->format('F d, Y h:ia') }}</td>
                                                <td>{{ $user->roles()->pluck('name')->implode(' ') }}</td>
                                                <th><a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning"><i class="glyphicon glyphicon-edit icon-white"></i></a></th>
                                                <th><a title='Delete' class='btn btn-danger' href="{{ route('users.destroy', $user->id) }}"> <i class="glyphicon glyphicon-trash icon-white"></i></a>
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
@section('scripts')
<!-- This is data table -->
    <script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
<!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
   <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
             'csv', 'excel'
        ]
    });
    </script>
@endsection