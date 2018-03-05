@extends('layout.master')

@section('title')
 co-operate loans Application
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
                        <a href="{{ route('loans.create') }}"><button class="btn pull-right hidden-sm-down btn-success"><i class=""></i> Apply for Loan</button></a>
                   
                    </div>
                </div>
               <!-- .row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <!--<button class="btn btn-danger btn-sm pull-right collapsed" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"> Get code <i class="ti-angle-down"></i></button>-->
                                <h4 class="card-title">Applied Loans</h4>
                                <h6 class="card-subtitle"> List of applied loans by members </h6>

                                
                                 @if(Session::has('success'))
                                <div class="alert alert-success">{{ Session::get('success') }}</div>
                                @endif
                                       
                                @if (count($loans) === 0)
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="box p-a text-center">
                                               
                                            </div>
                                        </div>
                                    </div>
                                @elseif (count($loans) !== 0)
                    
                                 <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                 <th>File No:</th>
                                                 <th>Surname</th>
                                                 <th>Department</th>
                                 
                                                 <th>Amount Applied</th>
                                                 <th>Phone</th>
                                                 <th>Status</th>
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
                                     
                                                 <th>Amount Applied</th>
                                                 <th>Phone No:</th>
                                                 <th>Status</th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                             @foreach ($loans as $loan)
                                            <tr>
                                                <td>{{ $loan->fileno }}</td>
                                                <td>{{ $loan->name }}</td>
                                                <td>{{ $loan->department }}</td>
                                                <td>#{{ $loan->amount_of_advance }}</td>
                                                <td>{{ $loan->phone }}</td>
                                                @if ($loan->status === 'Unapproved')
                                                <td><span class="label label-danger">{{ $loan->status }}</span></td>
                                                @else
                                                <td><span class="label label-success">{{ $loan->status }}</span></td>
                                                 @endif
                                                <th>
                                                    <form action="{{ route('loans.register', $loan->id) }}" method="POST">
                                                                {!! csrf_field() !!}
                                                                <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-refresh"></i></button>
                                                            </form>
                                                    </th>
                                            
                                                
                                                <th><a href="{{ route('loans.show', $loan->id) }}" class="btn btn-info"><i class="glyphicon glyphicon-eye-open"></i></a></th>
                                            
                                                <!--<th><a href="{{ route('loans.edit', $loan->id) }}" class="btn btn-warning"><i class="glyphicon glyphicon-edit icon-white"></i></a></th>-->
                                              
                                                <th><a title='Delete' class='btn btn-danger' href="{{ route('loans.destroy', $loan->id) }}"> <i class="glyphicon glyphicon-trash icon-white"></i></a>
            
                                                
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