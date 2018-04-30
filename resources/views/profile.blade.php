@extends('layouts.app')
@section('head')
<ul class="breadcrumb">
  <li><a href="/home">Home</a> / </li>
  <li class = "active">Profile</a></li>
</ul>
@endsection


@section('content')
<center>
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="card">
            <div class="card-header">{{ __('Profile') }}</div>
            <div class="card-body">

  @if(isset($user->start_date_package) and isset($user->end_date_package))
  <div class="panel-heading">
    <ul class="list-group">
    <li style="text-transform: capitalize;" class="mb-0 list-group-item">Your Package : <span style="cursor:default" class="btn btn-success"> {{ $user->type }} Package </span></li>
    <li class="mb-0 list-group-item">Start Package Date: {{ $user->start_date_package }}</li>
    <li class="mb-0 list-group-item">
      @if (isset($endDate))
        @if ($endDate!='Today' && $endDate!='Tomorrow')
            End Package Date: {{ $user->end_date_package }} (remain : {{$endDate}} days)
        @else
            End Package Date: {{ $user->end_date_package }} ({{$endDate}})
        @endif


      @else
        End Package Date: {{ $user->end_date_package }}
      @endif
    </li>
  </ul>
</div>

  @else

  <div class="alert alert-dismissible alert-warning">
    <button type="button" class="close" data-dismiss="alert">&times;</button>

    <P class="mb-0">Your package has emtry or expired</p>
    <P class="mb-0">Please apply for package<a href="/package"> Member</a> or <a href="/register_owner">Parking Owner</a></p>
    @endif
  </div>

<div class="panel panel-default">
    <div class="panel-heading">
    <img style="border-radius: 50%" width='300'  src="{{ $user->avatar }}" alt=""><br><br>
    <h5>[ <i class="fa fa-user-circle"> ระดับสมาชิก : </i>
       {{ $user->level }} ]
     <h5>
    </div>
    <ul class="list-group">
    <li class="list-group-item">
        <h5>Name : {{ $user->name }}</h5>
    </li>
    <li class="list-group-item">
        <h6>Last Name : {{ $user->lastname }}</h6>
    </li>


      <li class="list-group-item">Email: {{ $user->email }}</li>
      <li class="list-group-item">
        Status {!! $user->is_enabled ?
          '<i class="fa fa-check">Active</i>' : '<i class="fa fa-times">Suspends</i>' !!}
      </li>

      <li class="list-group-item">
        Joining Date : {{ $user->created_at->diffForHumans() }}
      </li>
      <li class="list-group-item">
        Last Update : {{ $user->updated_at->diffForHumans() }}
      </li>

      @if(empty($user->start_date_package) and empty($user->end_date_package))
      <li class="list-group-item">
        Your package has emtry or expired
        <P>Please apply for package<a href="/package"> Member</a> or <a href="/register_owner">Parking Owner</a></p>
      </li>
      @endif
    </ul>
</div>
</div>
<center>
</div>





@endsection
