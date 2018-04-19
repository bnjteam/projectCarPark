@extends('layouts.app')
@section('head')
<div class="" style="background-image:url(storage/01.jpg);padding:200px;background-size: cover;background-repeat: no-repeat;width:100%">
  <div class="row justify-content-center" style="padding:50px;background-color:red">
    <div class="" style="font-size:80px;color:white;font-weight: 800;" >
      Parking on your hand
    </div>
    <div class="col-sm-10">
      <form action="/search" method="POST" role="search" >
      {{ csrf_field() }}
      <div class="input-group" style="border-radius: 5px 0 0 5px;">
          <input type="text" class="form-control" name="q" style="font-size:30px;background-image: url(storage/pin-icon.svg);padding-left: 40px;background-repeat: no-repeat;background-size: 20px;    background-position: 10px;"
              placeholder="Search location">
              <span class="input-group-btn">
              <button type="submit" class="btn btn-success" style="font-size:30px;padding-right: 60px;background-image: url(storage/glass-icon.svg);    background-repeat: no-repeat;    background-position: right 25px center;    background-size: 25px;">
                Search
              </button>
              </span>
      </div>

    </div>
  </div>

</form>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-11">
          <div class="card">
          <div class="card-header">{{ __('Home') }}</div>
          <div class="card-body">
            <div class="container">
                <div class="row">
                  <div class="col-md-6">
                  <a class="btn btn-link" href="{{ url('/park_reserve') }}">
                      {{ __('reserve') }}

                  </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
