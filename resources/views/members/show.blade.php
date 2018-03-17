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
                        <a href="{{ route('members.index') }}"><button class="btn hidden-sm-down btn-success"><i class=""></i>View All Registered members</button></a>
                    </div>
                    <div class="col-md-6 col-4 align-self-center">
                      
                        <button class="right-side-toggle waves-effect waves-light btn-info btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                        <a href="{{ route('members.create') }}"><button class="btn pull-right hidden-sm-down btn-primary"><i class=""></i>Back</button></a>
                    </div>
                </div>
               <!-- .row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <!--<button class="btn btn-danger btn-sm pull-right collapsed" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"> Get code <i class="ti-angle-down"></i></button>-->
                                <h4 class="card-title">Membership Details</h4>
                                <h6 class="card-subtitle"> Registered member </h6>
                                
                            <div class="row">
                                  <div class="col-lg-4 col-xlg-3 col-md-5">
                                    <div class="card">
                                        <div class="card-body">
                                            <!--<center class="m-t-30"> <img src="{{ asset('images/1519390982.jpg')}}" class="img-circle" width="150" />-->
                                            <center class="m-t-30"> <img src="{{ url('images/'.$member->image)}}" class="img-circle" width="150" height="150" />
                                                <h4 class="card-title m-t-10">{{ ucfirst($member->surname)}} - {{ ucfirst($member->othername) }}</h4>
                                                <h6 class="card-subtitle">{{ $member->fileno}}</h6>
                                            </center>
                                        </div>
                                        <div>
                                            <hr> 
                                              @if ($member->status === 'Unapproved')
                                                <td><span class="label label-danger">{{ $member->status }}</span></td>
                                                @else
                                                <td><span class="label label-success">{{ $member->status }}</span></td>
                                                 @endif
                                                 
                                            <hr> 
                                            <form action="{{ route('members.register', $member->id) }}" method="POST">
                                                {!! csrf_field() !!}
                                                <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-refresh"></i> Approve Member</button>
                                            </form>
                                            
                                            </div>
                                 
                                    </div>
                                 </div>
                                   <!-- Column -->
                                    <div class="col-lg-8 col-xlg-9 col-md-7">
                                        <div class="card">
                                            <!-- Nav tabs -->
                                            <ul class="nav nav-tabs profile-tab" role="tablist">
                                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Personal</a> </li>
                                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Work</a> </li>
                                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Monthly Contribution</a> </li>
                                            </ul>
                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="home" role="tabpanel">
                                                    <div class="card-body">
                                                           <form class="form-horizontal form-material">
                                                            <div class="form-group">
                                                                <label for="example-email" class="col-md-12">Next of kin</label>
                                                                <div class="col-md-12">
                                                                    <input type="email" value="{{ ucfirst($member->next_of_kin) }}" class="form-control form-control-line" name="example-email" id="example-email" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-12">Phone No</label>
                                                                <div class="col-md-12">
                                                                    <input type="text" value="{{ $member->phone }}" class="form-control form-control-line" readonly>
                                                                </div>
                                                            </div>
                                                             <div class="form-group">
                                                                <label class="col-md-12">Permanent Address</label>
                                                                <div class="col-md-12">
                                                                    <input type="text" placeholder="{{ $member->address }}" class="form-control form-control-line" readonly>
                                                                </div>
                                                            </div>
                                                           
                                                        </form>
                                                    </div>
                                                </div>
                                                <!--second tab-->
                                                <div class="tab-pane" id="profile" role="tabpanel">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Department</strong>
                                                                <br>
                                                                <p class="text-muted">{{ $member->department}}</p>
                                                            </div>
                                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Appointment</strong>
                                                                <br>
                                                                <p class="text-muted">{{ $member->appointment }}</p>
                                                            </div>
                                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Status/Rank</strong>
                                                                <br>
                                                                <p class="text-muted">{{ $member->rank }}</p>
                                                            </div>
                                                            <div class="col-md-3 col-xs-6"> <strong>Location</strong>
                                                                <br>
                                                                <p class="text-muted">{{ $member->address }}</p>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="settings" role="tabpanel">
                                                    <div class="card-body">
                                                       <p>Thanks for your monthly contribution of <b>#{{$member->amount }}</b></p>
                                                       <p>Bank: <b>{{$member->bank }}</b></p>
                                                       <p>Account Name: <b>{{$member->acc_name }}</b></p>
                                                       <p>Account No: <b>{{$member->acc_no }}</b></p>
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