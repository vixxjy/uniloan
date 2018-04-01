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
                                <h4 class="card-title">Edit Membership Registration Form</h4>
                                <h6 class="card-subtitle"> Edit members </h6>
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
                           
                                <form class="form" action="{{ route('members.update', $member->id) }}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                     
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Surname</label>
                                      
                                        <div class="col-4">
                                          <center class="m-t-30"> <img src="{{ url('images/'.$member->image)}}" class="img-circle" width="150" height="150" />  
                                        </div>
                                          <div class="col-6">
                                            <input class="form-control" type="text" value="{{ $member->surname }}" name="surname" id="example-text-input">
                                        </div>
                                    </div>
                                      <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Other Name</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text" value="{{ $member->othername }}" name="othername" id="example-text-input">
                                        </div>
                                    </div>
                                      <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">File No:</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text" value="{{ $member->fileno }}" name="fileno" id="example-text-input">
                                        </div>
                                    </div>
                                     <div class="form-group m-t-40 row">
                                             <label for="example-text-input" class="col-2 col-form-label">Date Joined</label>
                                            <div class="col-10" >
                                                <input type="text" class="form-control" data-provide="datepicker" name="date_joined" value="{{ $member->date_joined }}"  placeholder="mm/dd/yyyy">
                                               </div>
                                        </div>
                                      <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Department</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text" value="{{ $member->department }}" name="department" id="example-text-input">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="example-month-input" class="col-2 col-form-label">Appointment</label>
                                        <div class="col-10">
                                            <select class="custom-select col-12" id="inlineFormCustomSelect" name="appointment">
                                            <option selected="">{{ $member->appointment }}</option>
                                              <option value="permanent">Permanent</option>
                                                <option value="contract">Contract</option>
                                               
                                            </select>
                                        </div>
                                    </div>
                                 
                                      <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Status/Rank</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text" value="{{ $member->rank }}" name="rank" id="example-text-input">
                                        </div>
                                    </div>
                                   
                                      <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Amount to be saved per month</label>
                                        <div class="col-10">
                                            <input class="form-control" type="number" value="{{ $member->amount }}" name="amount" id="example-text-input">
                                        </div>
                                    </div>
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Next Of Kin</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text" value="{{ $member->next_of_kin }}" name="next_of_kin" id="example-text-input">
                                        </div>
                                    </div>
                                     <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Permanent Address</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text" value="{{ $member->address }}" name="address" id="example-text-input">
                                        </div>
                                    </div>
                                      <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Phone No:</label>
                                        <div class="col-10">
                                            <input class="form-control" type="number" value="{{ $member->phone }}" name="phone" id="example-text-input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-month-input" class="col-2 col-form-label">Bank</label>
                                        <div class="col-10">
                                            <select class="custom-select col-12" id="inlineFormCustomSelect" name="bank">
                                            <option style="color: red;">{{ $member->bank }}</option>
                                              @foreach ($banks as $b => $bank)
                                                <option value="{{ $banks[$b] }}">{{ $bank }}</option>
                                                @endforeach
                                               
                                            </select>
                                        </div>
                                    </div>
                                      <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Account Name</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text" value="{{ $member->acc_name }}" name="acc_name" id="example-text-input">
                                        </div>
                                    </div>
                                      <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Account No</label>
                                        <div class="col-10">
                                            <input class="form-control" type="number" value="{{ $member->acc_no }}" name="acc_no" id="example-text-input">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <label>Photo file upload</label>
                                    <input type="file" class="form-control" name="image" id="exampleInputFile" aria-describedby="fileHelp">
                                    </div>
                                    <!-- <div class="form-group">-->
                                    <!--<label>Photo file upload</label>-->
                                    <!--<input type="file" class="form-control" name="image" id="exampleInputFile" aria-describedby="fileHelp">-->
                                    <!--</div>-->
                                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                    <!--<button type="submit" class="btn btn-inverse waves-effect waves-light">Cancel</button>-->
                                   
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

</div>


@endsection