@extends('layouts.app')
@section('head')
<div class="" style="margin-top:25px;background-image:url(/storage/01.jpg);padding:80px;background-size: cover;background-repeat: no-repeat;width:100%">
  <div class="row justify-content-center" style="padding:50px;">
    <div class="" style="font-size:80px;color:white;font-weight: 800;" >
      Parking on your hand
    </div>
    <div class="col-sm-10">
      <form action="/search" method="POST" role="search" >
      {{ csrf_field() }}
      <div class="row justify-content-center">
        <div class="input-group" style="border-radius: 5px 0 0 5px;width:700px;margin-top:85px">
          <div class="" >
          <select name="filter" id="filter" class="form-control input" style="height:100%;width:100%;font-size:30px">
            @foreach($filters as $filter=>$filterValue)
              <option value="{{ $filter }}">{{ $filterValue}}</option>
              @endforeach
          </select>
          </div>
            <input type="text" class="form-control" name="search" style=";font-size:30px;background-image: url(/storage/pin-icon.svg);padding-left: 40px;background-repeat: no-repeat;background-size: 25px;    background-position: 10px;"
                placeholder="Search location">
                <span class="input-group-btn">
                <button type="submit" class="btn btn-success" style="font-size:30px;padding-right: 60px;background-image: url(/storage/glass-icon.svg);    background-repeat: no-repeat;    background-position: right 25px center;    background-size: 25px;">
                  Search
                </button>
                </span>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>
@endsection
@section('content')
<div class="container">
        <div class="container">
          <div class="row" style="margin-top:20px;padding-bottom:50px;">
            <div class="col-6 " style="text-align: center">
              <img src="/storage/find.png"  width="200px" style="" alt="">
            </div>
            <div class="col-6">
              <div style="font-size:40px;font-weight: 700;margin-top:70px">
                <div class="text-info">
                  FIND
                </div>
                <div class=""style="margin-top:-20px;margin-left:20px">
                  LOCATION
                </div>
              </div>
              <div class="" style="font-size:20px;">
                with search bar
              </div>

            </div>
          </div>
        </div>
        <div class="container">
          <div class="row" style="padding-bottom:50px">
            <div class="col-6" style="text-align: center">
              <div  style="font-size:40px;font-weight: 700;margin-top:70px">
                RESERVE <div class="text-info" style="margin-top:-20px">
                  &
                </div>
                <div class="" style="margin-top:-20px">
                  PREPAY
                </div>
              </div>
              <div class="" style="font-size:20px;">
                Book a space in just a few minute
              </div>
            </div>
            <div class="col-6">
              <img src="/storage/pay.jpg" width="400px" alt="">
            </div>
          </div>
        </div>
        <div class="container">
          <div class="row" style="">
            <div class="col-6" style="text-align: center">
              <img src="/storage/car.png" width="400px" style="margin-top:70px" alt="">
            </div>
            <div class="col-6" >
              <div  style="font-size:40px;font-weight: 700;margin-top:70px">
                DRIVE ARRIVE
                <div class="" style="margin-top:-20px;">
                  &
                </div>
                <div class="text-info" style="margin-left: 30px;margin-top:-60px">
                  PARK
                </div>
              </div>

              <div class="" style="font-size:20px">
                Enter the space with qr code
              </div>
            </div>
          </div>
        </div>
        </center>
</div>
@endsection
