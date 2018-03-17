@extends('layout.master')

@section('title')
 co-operate loans dashboard
@endsection

@section('content')
 @hasanyrole('Admin|Staff')
          happy
        @endhasanyrole
@endsection

