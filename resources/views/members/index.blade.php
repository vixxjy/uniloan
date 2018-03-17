@extends('layout.master')

@section('title')
 co-operate loans Membership list
@endsection

@section('content')
  <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
<div class="container-fluid">
       <div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                     
                    </div>
                    <div class="col-md-6 col-4 align-self-center">
                        <button class="right-side-toggle waves-effect waves-light btn-info btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                        <a href="{{ route('members.create') }}"><button class="btn pull-right hidden-sm-down btn-success"><i class=""></i> Add Member</button></a>
                   
                    </div>
                </div>
               <!-- .row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <!--<button class="btn btn-danger btn-sm pull-right collapsed" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"> Get code <i class="ti-angle-down"></i></button>-->
                                <h4 class="card-title">Registered Members</h4>
                                <h6 class="card-subtitle"> membership list </h6>

                                
                                 @if(Session::has('success'))
                                <div class="alert alert-success">{{ Session::get('success') }}</div>
                                @endif
                                       
                                @if (count($members) === 0)
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="box p-a text-center">
                                                <!--<h3>There are no members yet <br />-->
                                                    
                                                <!--</h3>-->
                                            </div>
                                        </div>
                                    </div>
                                @elseif (count($members) !== 0)
                                 <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                 <th>File No:</th>
                                                 <th>Surname</th>
                                                 <th>Department</th>
                                                 <!--<th>Appointment</th>-->
                                                 <th>Status/Rank</th>
                                                 <th>Amount/month</th>
                                                 <!--<th>Address</th>-->
                                                 <th>Phone</th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                 <th>File No:</th>
                                                 <th>Surname</th>
                                                 <th>Department</th>
                                                 <!--<th>Appointment</th>-->
                                                 <th>Status/Rank</th>
                                                 <th>Amount/month</th>
                                                 <!--<th>Address</th>-->
                                                 <th>Phone No:</th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                             @foreach ($members as $member)
                                            <tr>
                                                <td>{{ $member->fileno }}</td>
                                                <td>{{ $member->surname }}</td>
                                                <td>{{ $member->department }}</td>
                                                <!--<td>{{ $member->appointment }}</td>-->
                                                <td>{{ $member->rank }}</td>
                                                <td>#{{ $member->amount }}</td>
                                                <!--<td>{{ $member->address }}</td>-->
                                                <td>{{ $member->phone }}</td>
                                                
                                                <th><a href="{{ route('members.show', $member->id) }}" class="btn btn-info"><i class="glyphicon glyphicon-eye-open"></i></a></th>
                                                @can('edit Member')
                                                <th><a href="{{ route('members.edit', $member->id) }}" class="btn btn-warning"><i class="glyphicon glyphicon-edit icon-white"></i></a></th>
                                                @endcan
                                                @can('delete Member')
                                                <th><a class='btn btn-danger' data-toggle="tooltip" data-placement="top" title="Are You sure, You want to delete this Member" href="{{ route('members.destroy', $member->id) }}"> <i class="glyphicon glyphicon-trash icon-white"></i></a>
                                                @endcan
                                                
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