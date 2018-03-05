@extends('layout.master')

@section('title')
Membership Loan Application Form
@endsection

@section('styles')
       <!-- Date picker plugins css -->
    <link href="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
  <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
<div class="container-fluid">
       <div class="row page-titles">
                    <!--<div class="col-md-6 col-8 align-self-center">-->
                    <!--    <a href="{{ route('members.index') }}"><button class="btn hidden-sm-down btn-success"><i class=""></i>View All Registered members</button></a>-->
                    <!--</div>-->
                    <div class="col-md-12 col-4 align-self-center">
                        <button class="right-side-toggle waves-effect waves-light btn-info btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                        <a href="{{ route('loans.index') }}"><button class="btn pull-right hidden-sm-down btn-primary"><i class=""></i>Back</button></a>
                    </div>
                </div>
               <!-- .row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <!--<button class="btn btn-danger btn-sm pull-right collapsed" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"> Get code <i class="ti-angle-down"></i></button>-->
                                <h4 class="card-title">Loan Application Form</h4>
                                <h6 class="card-subtitle"> Application for soft, ordinary, emergency and special loans. </h6>
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
                           
                                <form class="form" action="{{ route('loans.store') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Fullname</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text" value="{{$loan->name}}" name="name" id="example-text-input">
                                        </div>
                                    </div>
                                      <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">File No</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text" value="{{ $loan->fileno }}" name="fileno" id="example-text-input">
                                        </div>
                                    </div>
                                      <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Department</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text" value="{{ $loan->department }}" name="department" id="example-text-input">
                                        </div>
                                    </div>
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Date of Appointment</label>
                                        <div class="col-10">
                                            <input class="form-control mydatepicker" placeholder="mm/dd/yyyy" type="text" value="{{ $loan->date_of_appointment }}" name="date_of_appointment" id="example-text-input">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="example-month-input" class="col-2 col-form-label">Type of Loan</label>
                                        <div class="col-10">
                                            <select class="custom-select col-12" id="inlineFormCustomSelect" name="type_of_loan">
                                            <option selected="">Select Loan Type</option>
                                              <option value="ordinary">Ordinary Loan</option>
                                                <option value="soft">Soft Loan</option>
                                                <option value="emergency">Emergency Loan</option>
                                                <option value="special">Special Loan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Date Joined</label>
                                        <div class="col-10">
                                            <input class="form-control mydatepicker" placeholder="mm/dd/yyyy" type="text" value="{{ $loan->date_joined }}" name="date_joined" id="example-text-input">
                                        </div>
                                    </div>
                                 
                                      <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Status/Rank</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text" value="{{ $loan->rank }}" name="rank" id="example-text-input">
                                        </div>
                                    </div>
                                   
                                      <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Amount Saved</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text" value="{{ $loan->amount_saved }}" name="amount_saved" id="example-text-input">
                                        </div>
                                    </div>
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Date of Last Loan</label>
                                        <div class="col-10">
                                            <input class="form-control mydatepicker" id="datepicker-autoclose" placeholder="mm/dd/yyyy" type="text" value="{{ $loan->date_of_last_loan }}" name="date_of_last_loan" id="example-text-input">
                                        </div>
                                    </div>
                                     <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Amount of Outstanding</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text" value="{{ $loan->amount_outstanding }}" name="amount_outstanding" id="example-text-input">
                                        </div>
                                    </div>
                                      <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Amount of Advance</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text" value="{{ $loan->amount_of_advance }}" name="amount_of_advance" id="example-text-input">
                                        </div>
                                    </div>
                                        <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Period Of Payment</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text" value="{{ $loan->period_of_payment }}" name="period_of_payment" id="example-text-input">
                                        </div>
                                    </div>
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Purpose of Loan</label>
                                        <div class="col-10"> 
                                            <textarea class="form-control" type="text" name="purpose_of_loan" rows="3"  id="example-text-input">{{ $loan->purpose_of_loan }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Phone</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text" value="{{ $loan->phone }}" name="phone" id="example-text-input">
                                        </div>
                                    </div>
                                     <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">E-Account</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text" value="{{ $loan->e_account }}" name="e_account" id="example-text-input">
                                        </div>
                                    </div>
                                    <!-- <div class="form-group m-t-40 row">-->
                                    <!--    <label for="example-text-input" class="col-2 col-form-label"></label>-->
                                    <!--    <div class="col-10">-->
                                    <!--        <input class="form-control" type="text" value="Unregistered" name="status" id="example-text-input" hidden>-->
                                    <!--    </div>-->
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

@section('scripts')
    <!-- Date Picker Plugin JavaScript -->
    <script src="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script type="text/javascript" src="">
           // Date Picker
    jQuery('.mydatepicker, #datepicker').datepicker();
    jQuery('#datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true
    });
    </script>
@endsection