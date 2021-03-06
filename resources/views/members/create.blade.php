@extends('layout.master')

@section('title')
Membership Registration Form
@endsection

@section('styles')
 <!-- Date picker plugins css -->
    <link href="../assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
  <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
<div class="container-fluid">
       <div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                         @hasanyrole('Admin|Staff')
                        <a href="{{ route('members.index') }}"><button class="btn hidden-sm-down btn-success"><i class=""></i>View All Registered members</button></a>
                        @endhasanyrole
                        @hasanyrole('Member')
                         <a href="{{ route('dashboard') }}"><button class="btn hidden-sm-down btn-default"><i class=""></i>Back To Dashboard</button></a>
                        @endhasanyrole
                    </div>
                    <div class="col-md-6 col-4 align-self-center">
                        <button class="right-side-toggle waves-effect waves-light btn-info btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                         @hasanyrole('Admin|Staff')
                        <a href="{{ route('members.index') }}"><button class="btn pull-right hidden-sm-down btn-primary"><i class=""></i>Back</button></a>
                         @endhasanyrole
                    </div>
                </div>
               <!-- .row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <!--<button class="btn btn-danger btn-sm pull-right collapsed" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"> Get code <i class="ti-angle-down"></i></button>-->
                                <h4 class="card-title">Membership Registration Form</h4>
                                <h6 class="card-subtitle"> Add more members </h6>
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
                           
                                <form class="form" action="{{ route('members.store') }}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Surname</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text" value="{{ old('surname') }}" name="surname" id="example-text-input">
                                        </div>
                                    </div>
                                      <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Other Name</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text" value="{{ old('othername') }}" name="othername" id="example-text-input">
                                        </div>
                                    </div>
                                      <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">File No:</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text" value="{{ old('fileno') }}" name="fileno" id="example-text-input">
                                        </div>
                                    </div>
                                      <div class="form-group m-t-40 row">
                                             <label for="example-text-input" class="col-2 col-form-label">Date Joined</label>
                                            <div class="col-10" >
                                                <input type="text" class="form-control" data-provide="datepicker" name="date_joined" value="{{ old('date_joined') }}" placeholder="mm/dd/yyyy">
                                               </div>
                                        </div>
                                      <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Department</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text" value="{{ old('department') }}" name="department" id="example-text-input">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="example-month-input" class="col-2 col-form-label">Appointment</label>
                                        <div class="col-10">
                                            <select class="custom-select col-12" id="inlineFormCustomSelect" name="appointment" required>
                                              <option value="permanent">Permanent</option>
                                                <option value="contract">Contract</option>
                                               
                                            </select>
                                        </div>
                                    </div>
                                 
                                      <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Status/Rank</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text" value="{{ old('rank') }}" name="rank" id="example-text-input">
                                        </div>
                                    </div>
                                   
                                      <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Amount to be saved per month</label>
                                        <div class="col-10">
                                            <input class="form-control" type="number" value="{{ old('amount') }}" name="amount" id="example-text-input">
                                        </div>
                                    </div>
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Next Of Kin</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text" value="{{ old('next_of_kin') }}" name="next_of_kin" id="example-text-input">
                                        </div>
                                    </div>
                                     <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Permanent Address</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text" value="{{ old('address') }}" name="address" id="example-text-input">
                                        </div>
                                    </div>
                                      <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Phone No:</label>
                                        <div class="col-10">
                                            <input class="form-control" type="number" value="{{ old('phone') }}" name="phone" id="example-text-input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-month-input" class="col-2 col-form-label">Bank</label>
                                        <div class="col-10">
                                            <select class="custom-select col-12" id="inlineFormCustomSelect" name="bank" required>
                                              @foreach ($banks as $b => $bank)
                                                <option value="{{ $banks[$b] }}">{{ $bank }}</option>
                                                @endforeach
                                               
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Account Name</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text" value="{{ old('acc_name') }}" name="acc_name" id="example-text-input">
                                        </div>
                                    </div> 
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Bank Account No:</label>
                                        <div class="col-10">
                                            <input class="form-control" type="number" value="{{ old('acc_no') }}" name="acc_no" id="example-text-input">
                                        </div>
                                    </div>
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label"></label>
                                        <div class="col-10">
                                            <input class="form-control" type="text" value="Unapproved" name="status" id="example-text-input" hidden>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                    <label>Photo file upload</label>
                                    <input type="file" class="form-control" name="image" id="exampleInputFile" aria-describedby="fileHelp">
                                    </div>
                                    <!--<button type="submit" class="btn btn-success waves-effect waves-light m-r-10" data-toggle="modal" data-target="#exampleModalLong">Submit</button>-->
                                    <!--<button type="submit" class="btn btn-inverse waves-effect waves-light">Cancel</button>-->
                                    
                                    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h4 class="modal-title" id="exampleModalLongTitle">DECLARATION</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            I hereby declare that I have read the Bye-Laws of the Unijos Staff Multipurpose Cooperative Society Limited, and I am willing to abide by the Law on being elected as a member.
                                            <br>
                                            <br>
                                            <h5>BURSAR AUTHORIZATION</h5>
                                            I hereby authorize the Bursar to deduct the said amount from my salary with immediate effect and pay same to the account of the University of Jos Staff Multipurpose Cooperative Society Limited.
                                            The authorization stands irrevocable as long as I am an employee of the University or write to withdraw from being a member of the society if necessary. 
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">DECLINE</button>
                                            <!--<button type="button" class="btn btn-primary">ACCEPT</button>-->
                                               <button type="submit" class="btn btn-primary waves-effect waves-light m-r-10" data-toggle="modal" data-target="#exampleModalLong">ACCEPT</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                   
                                </form>
                                 <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" data-toggle="modal" data-target="#exampleModalLong">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
                
     
</div>


@endsection

@section('scripts')
<!-- Date Picker Plugin JavaScript -->
<script src="../assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="">
       // Date Picker
$('.datepicker').datepicker({
    format: 'dd/mm/yyyy',
    startDate: '-3d'
});
</script>
@endsection