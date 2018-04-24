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
          <input type="text" class="form-control" name="search" style="font-size:30px;background-image: url(storage/pin-icon.svg);padding-left: 40px;background-repeat: no-repeat;background-size: 20px;    background-position: 10px;"
              placeholder="Search location">
              <span class="input-group-btn">
              <button type="submit" class="btn btn-success" style="font-size:30px;padding-right: 60px;background-image: url(storage/glass-icon.svg);    background-repeat: no-repeat;    background-position: right 25px center;    background-size: 25px;">
                Search
              </button>
              </span>
      </div>
      </form>
    </div>
  </div>
@endsection
@section('content')
<div class="container">
    <!-- <div class="row justify-content-center"> -->
        <!-- <div class="col-sm-11">
          <div class="card">
          <div class="card-header">{{ __('Home') }}</div>
          <div class="card-body">
            <div class="container">
                <div class="row">
                  <div class="col-md-6">
                  <a class="btn btn-link" href="{{ url('/park_reserve') }}">

                  </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> -->
          <div class="row" style="padding-top:50px;padding-bottom:50px;">
            <div class="col-6 " style="text-align: center">
              <img src="storage/find.jpg"  width="350px" alt="">
            </div>
            <div class="col-6">
              <div style="font-size:40px;font-weight: 700;margin-top:20px">
                FIND LOCATION
              </div>

            </div>
          </div>

          <div class="row" style="padding-bottom:50px">
            <div class="col-6">
              <div  style="font-size:40px;font-weight: 700;margin-top:20px">
                RESERVE AND PREPAY
              </div>
              <div class="" style="font-size:20px">
                Book a space in just a few minute
              </div>
            </div>
            <div class="col-6">
              <img src="storage/reserved-park.jpg" width="350px" alt="">
            </div>


            <!-- <img src="storage/pay.jpg" alt=""> -->
          </div>
          <div class="row" style="">
            <div class="col-6" style="text-align: center">
              <img src="storage/find.jpg" width="350px" alt="">
            </div>
            <div class="col-6">
              <div  style="font-size:40px;font-weight: 700;margin-top:20px">
                DRIVE ARRIVE AND PARK
              </div>

              <div class="" style="font-size:20px">
                Enter the space with your qr code
              </div>
            </div>


          </div>


        </center>

    <!-- </div> -->

</div>
@endsection
